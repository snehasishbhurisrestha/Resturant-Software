<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

use App\Helpers\ApiResponse;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\OrderItemAddon;
use App\Models\MenuItem;
use App\Models\Addon;
use App\Models\Table;
use App\Models\PrintJob;
use App\Models\Section;

class PosCartApiController extends Controller
{
    protected $restaurantId = 1;

    /*
    |--------------------------------------------------------------------------
    | GET OR CREATE ORDER
    |--------------------------------------------------------------------------
    */
    public function getOrCreateOrder($sectionId, $tableId, $orderType)
    {
        $order = Order::where('section_id', $sectionId)
            ->where('table_id', $tableId)
            ->whereIn('status', ['draft', 'kot'])
            ->latest()
            ->first();

        if (!$order) {

            $order = Order::create([
                'restaurant_id' => auth()->user()->restaurant_id ?? 1,
                'section_id' => $sectionId,
                'table_id' => $tableId,
                'order_type' => $orderType,
                'created_by' => auth()->id(),
                'status' => 'draft',
                'order_no' => 'ORD' . now()->format('YmdHis'),
            ]);
        }

        return $order;
    }

    /*
    |--------------------------------------------------------------------------
    | CALCULATE ORDER
    |--------------------------------------------------------------------------
    */
    public function calculateOrder($orderId)
    {
        $order = Order::with('items.item')->find($orderId);

        if (!$order) {
            return;
        }

        $foodSubtotal = 0;
        $drinkSubtotal = 0;
        $discount = 0;

        foreach ($order->items as $row) {

            if ($row->is_complimentary) {
                continue;
            }

            $discount += $row->discount;

            $dietary = strtolower(optional($row->item)->dietary);

            if ($dietary === 'drink') {

                $drinkSubtotal += $row->line_total;

            } else {

                $foodSubtotal += $row->line_total;
            }
        }

        $subtotal = $foodSubtotal + $drinkSubtotal;

        $foodServiceCharge = $foodSubtotal * 0.10;
        $drinkServiceCharge = $drinkSubtotal * 0.10;

        $serviceCharge =
            $foodServiceCharge + $drinkServiceCharge;

        $foodTaxable = $foodSubtotal + $foodServiceCharge;

        $foodCgst = $foodTaxable * 0.025;
        $foodSgst = $foodTaxable * 0.025;

        $tax = $foodCgst + $foodSgst;

        $rawTotal =
            $subtotal +
            $serviceCharge +
            $tax -
            $discount;

        $grandTotal = round($rawTotal);

        $roundOff = $grandTotal - $rawTotal;

        $order->subtotal = $subtotal;
        $order->service_charge = $serviceCharge;
        $order->tax = $tax;
        $order->tax_amount = $tax;
        $order->discount = $discount;
        $order->discount_amount = $discount;
        $order->round_off = $roundOff;
        $order->grand_total = $grandTotal;

        $order->save();
    }

    /*
    |--------------------------------------------------------------------------
    | ADD TO CART
    |--------------------------------------------------------------------------
    */
    public function addToCart(Request $request)
    {
        $request->validate([
            'section_id' => 'required',
            'table_id' => 'required',
            'item_id' => 'required',
            'qty' => 'required|numeric|min:1',
        ]);

        $order = $this->getOrCreateOrder(
            $request->section_id,
            $request->table_id,
            'Dine In'
        );

        $item = MenuItem::findOrFail($request->item_id);

        $addonIds = $request->addons ?? [];

        sort($addonIds);

        $note = $request->note ?? '';

        $isComplimentary =
            $request->complimentary ? 1 : 0;

        $discount = $request->discount ?? 0;

        /*
        |--------------------------------------------------------------------------
        | FIND SAME ITEM
        |--------------------------------------------------------------------------
        */
        $existing = OrderItem::where('order_id', $order->id)
            ->where('menu_item_id', $item->id)
            ->where('note', $note)
            ->where('is_complimentary', $isComplimentary)
            ->where('discount', $discount)
            ->where('is_kot_printed', 0)
            ->get()
            ->first(function ($row) use ($addonIds) {

                $old = $row->addons()
                    ->pluck('addon_id')
                    ->sort()
                    ->values()
                    ->toArray();

                return $old == $addonIds;
            });

        /*
        |--------------------------------------------------------------------------
        | UPDATE EXISTING
        |--------------------------------------------------------------------------
        */
        if ($existing) {

            $existing->quantity += $request->qty;

            $existing->line_total +=
                ($item->price * $request->qty);

            $existing->save();

            $this->calculateOrder($order->id);

            return ApiResponse::success(
                'Quantity updated',
                [
                    'order_id' => $order->id,
                    'cart_item_id' => $existing->id,
                    'quantity' => $existing->quantity
                ]
            );
        }

        /*
        |--------------------------------------------------------------------------
        | CREATE ITEM
        |--------------------------------------------------------------------------
        */
        $lineTotal = $item->price * $request->qty;

        $orderItem = OrderItem::create([
            'order_id' => $order->id,
            'menu_item_id' => $item->id,
            'item_name' => $item->name,
            'quantity' => $request->qty,
            'price' => $item->price,
            'tax' => $item->tax ?? 0,
            'discount' => $discount,
            'line_total' => $lineTotal,
            'is_complimentary' => $isComplimentary,
            'is_kot_printed' => 0,
            'note' => $note,
            'status' => 'pending'
        ]);

        /*
        |--------------------------------------------------------------------------
        | ADDONS
        |--------------------------------------------------------------------------
        */
        if (!empty($addonIds)) {

            $addons = Addon::whereIn('id', $addonIds)->get();

            foreach ($addons as $addon) {

                OrderItemAddon::create([
                    'order_item_id' => $orderItem->id,
                    'addon_id' => $addon->id,
                    'name' => $addon->name,
                    'price' => $addon->price,
                    'qty' => 1,
                    'total' => $addon->price
                ]);

                $orderItem->line_total += $addon->price;
            }

            $orderItem->save();
        }

        $this->calculateOrder($order->id);

        return ApiResponse::success(
            'Item added successfully',
            [
                'order_id' => $order->id,
                'cart_item_id' => $orderItem->id,
                'item_name' => $orderItem->item_name,
                'quantity' => $orderItem->quantity,
                'line_total' => $orderItem->line_total
            ]
        );
    }

    /*
    |--------------------------------------------------------------------------
    | GET CART
    |--------------------------------------------------------------------------
    */
    public function getCart(Request $request)
    {
        $order = Order::with([
            'items.addons',
            'table',
            'section'
        ])
        ->where('section_id', $request->section_id)
        ->where('table_id', $request->table_id)
        ->whereIn('status', ['draft', 'kot'])
        ->latest()
        ->first();

        return ApiResponse::success(
            'Cart fetched successfully',
            $order
        );
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE CART QTY
    |--------------------------------------------------------------------------
    */
    public function updateQty(Request $request)
    {
        $request->validate([
            'cart_item_id' => 'required',
            'type' => 'required|in:increase,decrease'
        ]);

        $item = OrderItem::findOrFail(
            $request->cart_item_id
        );

        if ($request->type == 'increase') {

            $item->quantity += 1;

        } else {

            if ($item->quantity > 1) {

                $item->quantity -= 1;

            } else {

                $item->addons()->delete();

                $item->delete();

                return ApiResponse::success(
                    'Cart item removed',
                    []
                );
            }
        }

        $item->line_total =
            $item->price * $item->quantity;

        $item->save();

        $this->calculateOrder($item->order_id);

        return ApiResponse::success(
            'Quantity updated successfully',
            [
                'cart_item_id' => $item->id,
                'quantity' => $item->quantity,
                'line_total' => $item->line_total
            ]
        );
    }

    /*
    |--------------------------------------------------------------------------
    | DELETE CART ITEM
    |--------------------------------------------------------------------------
    */
    public function deleteCartItem(Request $request)
    {
        $request->validate([
            'cart_item_id' => 'required'
        ]);

        $item = OrderItem::findOrFail(
            $request->cart_item_id
        );

        $orderId = $item->order_id;

        $item->addons()->delete();

        $item->delete();

        $this->calculateOrder($orderId);

        return ApiResponse::success(
            'Cart item deleted successfully',
            []
        );
    }
    
        /*
    |--------------------------------------------------------------------------
    | KOT SAVE
    |--------------------------------------------------------------------------
    */
    public function kotSave(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
        ]);

        $order = Order::findOrFail($request->order_id);

        $order->status = 'kot';

        $order->save();

        return ApiResponse::success(
            'KOT saved successfully',
            [
                'order_id' => $order->id,
                'status' => $order->status
            ]
        );
    }

    /*
    |--------------------------------------------------------------------------
    | KOT PRINT
    |--------------------------------------------------------------------------
    */
    public function kotPrint(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
        ]);

        $order = Order::with([
            'items.addons',
            'items.item.category',
            'table.section'
        ])->findOrFail($request->order_id);

        /*
        |--------------------------------------------------------------------------
        | ONLY NOT PRINTED ITEMS
        |--------------------------------------------------------------------------
        */
        $items = $order->items
            ->where('is_kot_printed', 0);

        /*
        |--------------------------------------------------------------------------
        | NO ITEMS
        |--------------------------------------------------------------------------
        */
        if ($items->count() == 0) {

            return ApiResponse::error(
                'No new items for printing'
            );
        }

        /*
        |--------------------------------------------------------------------------
        | FOOD & DRINK SEPARATE
        |--------------------------------------------------------------------------
        */
        $foodItems = collect();

        $drinkItems = collect();

        foreach ($items as $item) {

            $categoryGroup = strtolower(
                optional(
                    optional($item->item)->category
                )->category_group
            );

            /*
            |--------------------------------------------------------------------------
            | BAR ITEMS
            |--------------------------------------------------------------------------
            */
            if ($categoryGroup === 'bar menu') {

                $drinkItems->push($item);

            } else {

                $foodItems->push($item);
            }
        }

        /*
        |--------------------------------------------------------------------------
        | FOOD HTML
        |--------------------------------------------------------------------------
        */
        $foodHtml = '';

        if ($foodItems->count() > 0) {

            $foodHtml = view(
                'admin.pos.print.kot_bill',
                [
                    'order' => $order,
                    'foodItems' => $foodItems,
                    'drinkItems' => collect()
                ]
            )->render();
        }

        /*
        |--------------------------------------------------------------------------
        | DRINK HTML
        |--------------------------------------------------------------------------
        */
        $drinkHtml = '';

        if ($drinkItems->count() > 0) {

            $drinkHtml = view(
                'admin.pos.print.kot_bill',
                [
                    'order' => $order,
                    'foodItems' => collect(),
                    'drinkItems' => $drinkItems
                ]
            )->render();
        }

        /*
        |--------------------------------------------------------------------------
        | KITCHEN PRINT JOB
        |--------------------------------------------------------------------------
        */
        if ($foodHtml != '') {

            PrintJob::create([
                'order_id' => $order->id,
                'printer_name' => 'kitchen',
                'type' => 'kot',
                'html' => $foodHtml
            ]);
        }

        /*
        |--------------------------------------------------------------------------
        | BAR PRINT JOB
        |--------------------------------------------------------------------------
        */
        if ($drinkHtml != '') {

            PrintJob::create([
                'order_id' => $order->id,
                'printer_name' => 'bar',
                'type' => 'kot',
                'html' => $drinkHtml
            ]);
        }

        /*
        |--------------------------------------------------------------------------
        | UPDATE PRINT STATUS
        |--------------------------------------------------------------------------
        */
        OrderItem::where('order_id', $order->id)
            ->where('is_kot_printed', 0)
            ->update([
                'is_kot_printed' => 1,
                'kot_printed_at' => now()
            ]);

        /*
        |--------------------------------------------------------------------------
        | UPDATE ORDER STATUS
        |--------------------------------------------------------------------------
        */
        $order->status = 'kot';

        $order->save();

        return ApiResponse::success(
            'KOT printed successfully',
            [
                'order_id' => $order->id,
                'food_html' => $foodHtml,
                'drink_html' => $drinkHtml
            ]
        );
    }

    /*
    |--------------------------------------------------------------------------
    | MOVE TABLE
    |--------------------------------------------------------------------------
    */
    public function moveTable(Request $request)
    {
        $request->validate([
            'current_table_id' => 'required|exists:tables,id',
            'new_table_id' => 'required|exists:tables,id',
        ]);

        /*
        |--------------------------------------------------------------------------
        | SAME TABLE
        |--------------------------------------------------------------------------
        */
        if ($request->current_table_id ==
            $request->new_table_id) {

            return ApiResponse::error(
                'Please select another table'
            );
        }

        /*
        |--------------------------------------------------------------------------
        | CURRENT ORDER
        |--------------------------------------------------------------------------
        */
        $order = Order::where(
                'table_id',
                $request->current_table_id
            )
            ->whereIn('status', ['draft', 'kot'])
            ->latest()
            ->first();

        if (!$order) {

            return ApiResponse::error(
                'No active order found'
            );
        }

        /*
        |--------------------------------------------------------------------------
        | NEW TABLE
        |--------------------------------------------------------------------------
        */
        $newTable = Table::with('section')
            ->findOrFail($request->new_table_id);

        /*
        |--------------------------------------------------------------------------
        | CHECK TARGET TABLE
        |--------------------------------------------------------------------------
        */
        $existingOrder = Order::where(
                'table_id',
                $newTable->id
            )
            ->whereIn('status', ['draft', 'kot'])
            ->where('id', '!=', $order->id)
            ->exists();

        if ($existingOrder) {

            return ApiResponse::error(
                'Selected table already occupied'
            );
        }

        /*
        |--------------------------------------------------------------------------
        | MOVE TABLE
        |--------------------------------------------------------------------------
        */
        $order->table_id = $newTable->id;

        $order->section_id = $newTable->section_id;

        $order->save();

        return ApiResponse::success(
            'Table moved successfully',
            [
                'order_id' => $order->id,
                'new_table_id' => $newTable->id,
                'new_section_id' => $newTable->section_id,
            ]
        );
    }
    
        /*
    |--------------------------------------------------------------------------
    | AVAILABLE TABLES BY SECTION
    |--------------------------------------------------------------------------
    */
    public function availableTables(Request $request)
    {
        $restaurantId = auth()->user()->restaurant_id ?? 1;

        /*
        |--------------------------------------------------------------------------
        | GET OCCUPIED TABLE IDS
        |--------------------------------------------------------------------------
        */
        $occupiedTableIds = Order::whereIn(
                'status',
                ['draft', 'kot']
            )
            ->pluck('table_id')
            ->toArray();

        /*
        |--------------------------------------------------------------------------
        | GET SECTIONS WITH AVAILABLE TABLES
        |--------------------------------------------------------------------------
        */
        $sections = Section::with([
            'tables' => function ($query) use ($occupiedTableIds) {

                $query->where('status', 1)

                    ->whereNotIn(
                        'id',
                        $occupiedTableIds
                    )

                    ->orderBy('table_number');
            }
        ])
        ->where('restaurant_id', $restaurantId)
        ->where('is_active', 1)
        ->get()

        /*
        |--------------------------------------------------------------------------
        | REMOVE EMPTY SECTIONS
        |--------------------------------------------------------------------------
        */
        ->filter(function ($section) {

            return $section->tables->count() > 0;
        })

        ->values();

        return ApiResponse::success(
            'Available tables fetched successfully',
            $sections
        );
    }
}