<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Section;
use App\Models\Table;
use App\Models\MenuCategory;
use App\Models\MenuItem;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\OrderItemAddon;
use App\Models\Addon;

use Illuminate\Support\Facades\Hash;

use App\Services\PrinterService;

class PosController extends Controller
{
    protected $restaurantId = 1;
    protected $printer;

    public function __construct(PrinterService $printer)
    {
        $this->printer = $printer;
    }

    public function index(){
        $sections = Section::with([
                'tables.orders' => function ($query) {
                    $query->whereIn('status', ['draft', 'kot']);
                }
            ])
            ->where('restaurant_id', auth()->user()->restaurant_id ?? 1)
            ->get();
        return view(
            'admin.pos.tables',
            compact('sections')
        );
    }

    /*public function mainindex(String $sectionId, String $tableId)
    {
        // $sections = Section::where('restaurant_id', $this->restaurantId)
        //     ->where('is_active', 1)
        //     ->get();

        $categories = MenuCategory::withCount('items')
            ->where('restaurant_id', $this->restaurantId)
            ->where('status', 1)
            ->orderBy('category_group')
            ->orderBy('name')
            ->get();

        $firstCategory = $categories->first();

        $items = [];

        if ($firstCategory) {
            $items = MenuItem::where('category_id', $firstCategory->id)
                ->where('status', 1)
                ->get();
        }

        return view(
            'admin.pos.index',
            compact('sectionId', 'tableId', 'categories', 'items')
        );
    }*/

    public function mainindex(String $sectionId, String $tableId)
    {
        $categories = MenuCategory::withCount('items')
            ->where('restaurant_id', $this->restaurantId)
            ->where('status', 1)
            ->orderBy('category_group')
            ->orderBy('name')
            ->get();

        $firstCategory = $categories->first();

        $items = [];

        if ($firstCategory) {
            $items = MenuItem::where('category_id', $firstCategory->id)
                ->where('status', 1)
                ->get();
        }

        // Current section & table
        $currentSection = Section::find($sectionId);

        $currentTable = Table::find($tableId);

        // All sections with tables for movement
        $sections = Section::with('tables')
            ->where('restaurant_id', $this->restaurantId)
            ->where('is_active', 1)
            ->get();

        return view(
            'admin.pos.index',
            compact(
                'sectionId',
                'tableId',
                'categories',
                'items',
                'currentSection',
                'currentTable',
                'sections'
            )
        );
    }


    public function tables(Request $request)
    {
        $tables = Table::where('section_id', $request->section_id)
            ->where('status', 1)
            ->orderBy('table_number')
            ->get();

        return response()->json($tables);
    }


    public function loadItems($categoryId)
    {
        $items = MenuItem::where('category_id', $categoryId)
            ->where('status', 1)
            ->get();

        return response()->json($items);
    }

    public function searchItems(Request $request)
    {
        $search = $request->search;

        $items = MenuItem::where('status', 1)
            ->where('name', 'LIKE', "%{$search}%")
            ->limit(10)
            ->get();

        return response()->json($items);
    }


    public function itemDetail(Request $request)
    {
        $item = MenuItem::with('addons')
            ->findOrFail($request->item_id);

        return response()->json($item);
    }


    public function getOrCreateOrder($sectionId, $tableId,$order_type)
    {
        $order = Order::where('section_id', $sectionId)
            ->where('table_id', $tableId)
            ->whereIn('status', ['draft', 'kot'])
            ->latest()
            ->first();

        if (!$order) {
            $order = Order::create([
                'restaurant_id' => $this->restaurantId,
                'section_id' => $sectionId,
                'table_id' => $tableId,
                'order_type' => $order_type,
                'created_by' => auth()->id(),
                'status' => 'draft',
                'order_no' => 'ORD' . now()->format('YmdHis'),
            ]);
        }

        return $order;
    }


    public function addCart(Request $request)
    {
        // DB::beginTransaction();

        // try {

            $order = $this->getOrCreateOrder(
                $request->section_id,
                $request->table_id,
                'Dine In'
            );

            $item = MenuItem::findOrFail($request->item_id);

            $addonIds = $request->addons ?? [];
            sort($addonIds);

            $note = $request->note ?? '';
            $isComplimentary = $request->complimentary ? 1 : 0;
            $discount = $request->discount ?? 0;

            /*
            |--------------------------------------------------------------------------
            | find existing same config item
            |--------------------------------------------------------------------------
            */
            $existing = OrderItem::where('order_id', $order->id)
                    ->where('menu_item_id', $item->id)
                    ->where('note', $note)
                    ->where('is_complimentary', $isComplimentary)
                    ->where('discount', $discount)

                    // IMPORTANT
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

            if ($existing) {
                $existing->quantity += $request->qty;
                $existing->line_total += ($item->price * $request->qty);
                $existing->save();

                // DB::commit();

                return response()->json([
                    'status' => true,
                    'message' => 'Quantity updated',
                    'order_id' => $order->id
                ]);
            }

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
            | addons
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

            // DB::commit();

            return response()->json([
                'status' => true,
                'message' => 'Item added',
                'order_id' => $order->id
            ]);

        // } catch (\Exception $e) {

        //     DB::rollBack();

        //     return response()->json([
        //         'status' => false,
        //         'message' => $e->getMessage()
        //     ], 500);
        // }
    }


    /*public function calculateOrder($orderId)
    {
        $order = Order::with('items')->find($orderId);
        $subtotal = 0;
        $tax = 0;
        $discount = 0;

        foreach ($order->items as $row) {

            if ($row->is_complimentary) {
                continue;
            }

            $subtotal += $row->line_total;
            $tax += $row->tax;
            $discount += $row->discount;
        }

        $grand = $subtotal + $tax - $discount;

        $order->subtotal = $subtotal;
        $order->tax_amount = $tax;
        $order->discount_amount = $discount;
        $order->grand_total = $grand;
        $order->my_amount = $subtotal;
        $order->tax = $tax;
        $order->discount = $discount;

        $order->update();
    }*/

    public function calculateOrder($orderId)
    {
        $order = Order::with('items.item')->find($orderId);

        if (!$order) {
            return;
        }

        $foodSubtotal = 0;
        $drinkSubtotal = 0;
        $discount = 0;
        $qty = 0;

        foreach ($order->items as $row) {

            // complimentary item skip
            if ($row->is_complimentary) {
                continue;
            }

            $qty += $row->quantity;
            $discount += $row->discount;

            $dietary = strtolower(optional($row->item)->dietary);

            if ($dietary === 'drink') {
                $drinkSubtotal += $row->line_total;
            } else {
                $foodSubtotal += $row->line_total;
            }
        }

        /*
        |--------------------------------------------------------------------------
        | subtotal
        |--------------------------------------------------------------------------
        */
        $subtotal = $foodSubtotal + $drinkSubtotal;

        /*
        |--------------------------------------------------------------------------
        | service charge on BOTH food & drink
        |--------------------------------------------------------------------------
        */
        $foodServiceCharge = $foodSubtotal * 0.10;
        $drinkServiceCharge = $drinkSubtotal * 0.10;

        $serviceCharge = $foodServiceCharge + $drinkServiceCharge;

        /*
        |--------------------------------------------------------------------------
        | GST ONLY on FOOD
        |--------------------------------------------------------------------------
        */
        $foodTaxable = $foodSubtotal + $foodServiceCharge;

        /*
        |--------------------------------------------------------------------------
        | GST (2.5 + 2.5)
        |--------------------------------------------------------------------------
        */
        $foodCgst = $foodTaxable * 0.025;
        $foodSgst = $foodTaxable * 0.025;

        $foodTax = $foodCgst + $foodSgst;

        /*
        |--------------------------------------------------------------------------
        | no GST on drinks
        |--------------------------------------------------------------------------
        */
        $drinkTax = 0;

        /*
        |--------------------------------------------------------------------------
        | total tax
        |--------------------------------------------------------------------------
        */
        $tax = $foodTax + $drinkTax;

        /*
        |--------------------------------------------------------------------------
        | raw total
        |--------------------------------------------------------------------------
        */
        $rawTotal = $subtotal + $serviceCharge + $tax - $discount;

        /*
        |--------------------------------------------------------------------------
        | round
        |--------------------------------------------------------------------------
        */
        $grandTotal = round($rawTotal);
        $roundOff = $grandTotal - $rawTotal;

        /*
        |--------------------------------------------------------------------------
        | save
        |--------------------------------------------------------------------------
        */

        $order->my_amount = $subtotal;
        $order->subtotal = $subtotal;
        $order->service_charge = $serviceCharge;
        $order->tax = $tax;
        $order->tax_amount = $tax;
        $order->discount = $discount;
        $order->discount_amount = $discount;
        $order->round_off = $roundOff;
        $order->grand_total = $grandTotal;

        $order->update();
    }


    public function cart(Request $request)
    {
        $order = Order::with([
            'items',
            'items.addons'
        ])
        ->where('section_id', $request->section_id)
        ->where('table_id', $request->table_id)
        ->where('created_by',auth()->id())
        ->whereIn('status', ['draft', 'kot'])
        ->latest()
        ->first();

        return response()->json($order);
    }


    public function updateCart(Request $request)
    {
        $item = OrderItem::findOrFail($request->id);

        $item->quantity = $request->qty;
        $item->line_total = $item->price * $request->qty;
        $item->save();

        $this->calculateOrder($item->order_id);

        return response()->json([
            'status' => true
        ]);
    }


    public function removeCart(Request $request)
    {
        $item = OrderItem::findOrFail($request->id);

        $orderId = $item->order_id;

        $item->addons()->delete();
        $item->delete();

        $this->calculateOrder($orderId);

        return response()->json([
            'status' => true
        ]);
    }


    public function placeOrder(Request $request)
    {
        $order = Order::findOrFail($request->order_id);

        $order->status = 'billed';
        $order->save();

        return response()->json([
            'status' => true,
            'message' => 'Order placed'
        ]);
    }

    public function kotSave(Request $request)
    {
        $order = Order::findOrFail($request->order_id);
        $order->status = 'kot';
        $order->save();

        return response()->json([
            'status' => true,
            'message' => 'KOT Saved'
        ]);
    }


    /*public function kotPrint(Request $request)
    {
        $order = Order::with([
            'items.addons',
            'table.section'
        ])->findOrFail($request->order_id);

        $this->printer->print('kot', function($p) use ($order){

            $p->setJustification(1);
            $p->setTextSize(2,2);
            $p->text("KITCHEN ORDER\n");
            $p->setTextSize(1,1);
            $p->text("------------------------------\n");

            $p->setJustification(0);
            $p->text("Order : ".$order->order_no."\n");
            $p->text("Section : ".$order->table->section->name."\n");
            $p->text("Table : ".$order->table->table_number."\n");
            $p->text("Time : ".now()->format('d-m-Y h:i A')."\n");

            $p->text("------------------------------\n");

            foreach($order->items as $item){

                $p->setEmphasis(true);
                $p->text($item->quantity." x ".$item->item_name."\n");
                $p->setEmphasis(false);

                if($item->addons->count()){
                    foreach($item->addons as $addon){
                        $p->text("   + ".$addon->name."\n");
                    }
                }

                if($item->note){
                    $p->text("   Note: ".$item->note."\n");
                }

                $p->text("\n");
            }

            $p->text("------------------------------\n");
            $p->feed(2);
        });

        $order->update([
            'status'=>'kot',
            'kot_printed'=>1
        ]);

        return response()->json([
            'status'=>true,
            'message'=>'KOT Printed'
        ]);
    }*/
    
    /*public function kotPrint(Request $request)
    {
        $order = Order::with([
            'items.addons',
            'table.section'
        ])->findOrFail($request->order_id);

        $html = view('admin.pos.print.kot_bill', compact('order'))->render();

        return response()->json([
            'status' => true,
            'html' => $html
        ]);
    }*/

    public function kotPrint(Request $request)
    {
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
        | NO ITEMS TO PRINT
        |--------------------------------------------------------------------------
        */
        if ($items->count() == 0) {

            return response()->json([
                'status' => false,
                'message' => 'No new items for printing'
            ]);
        }

        /*
        |--------------------------------------------------------------------------
        | Separate Food / Bar Items
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
            | BAR MENU / BEVERAGE
            |--------------------------------------------------------------------------
            */
            if (
                $categoryGroup === 'bar menu'
            ) {

                $drinkItems->push($item);

            } else {

                /*
                |--------------------------------------------------------------------------
                | FOOD MENU
                |--------------------------------------------------------------------------
                */
                $foodItems->push($item);
            }
        }
        

        /*
        |--------------------------------------------------------------------------
        | Kitchen Printer HTML
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
        | Bar Printer HTML
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
        | UPDATE PRINT STATUS
        |--------------------------------------------------------------------------
        */
        OrderItem::where('order_id', $order->id)
            ->where('is_kot_printed', 0)
            ->update([
                'is_kot_printed' => 1,
                'kot_printed_at' => now()
            ]);

        return response()->json([
            'status' => true,
            'food_html' => $foodHtml,
            'drink_html' => $drinkHtml
        ]);
    }


    /*public function billPrint(Request $request)
    {
        $order = Order::with([
            'items.addons',
            'table.section'
        ])->findOrFail($request->order_id);

        $this->printer->print('bill', function($p) use ($order){

            $p->setJustification(1);
            $p->setTextSize(2,2);
            $p->text("TAX INVOICE\n");
            $p->setTextSize(1,1);

            $p->text("My Restaurant\n");
            $p->text("------------------------------\n");

            $p->setJustification(0);
            $p->text("Bill No : ".$order->bill_no."\n");
            $p->text("Order No : ".$order->order_no."\n");
            $p->text("Section : ".$order->table->section->name."\n");
            $p->text("Table : ".$order->table->table_number."\n");
            $p->text("------------------------------\n");

            foreach($order->items as $item){

                $line = $item->item_name;
                $qty = $item->quantity;
                $amt = number_format($item->line_total,2);

                $p->text("$qty x $line\n");
                $p->text("₹$amt\n");

                foreach($item->addons as $addon){
                    $p->text("   + ".$addon->name."\n");
                }
            }

            $p->text("------------------------------\n");
            $p->text("Subtotal : ".$order->subtotal."\n");
            $p->text("Tax      : ".$order->tax_amount."\n");
            $p->text("Discount : ".$order->discount_amount."\n");

            $p->setEmphasis(true);
            $p->text("TOTAL    : ".$order->grand_total."\n");
            $p->setEmphasis(false);

            $p->text("------------------------------\n");

            $p->setJustification(1);
            $p->text("Thank You\n");
            $p->feed(3);
        });

        $order->update([
            'bill_printed'=>1
        ]);

        return response()->json([
            'status'=>true,
            'message'=>'Bill Printed'
        ]);
    }*/
    
    /*public function billPrint(Request $request)
    {
        $order = Order::with([
            'items.addons',
            'table.section',
            'user'
        ])->findOrFail($request->order_id);
    
        $width = 50;
    
        $center = function ($text) use ($width) {
            $len = strlen($text);
    
            if ($len >= $width) {
                return substr($text, 0, $width) . "\n";
            }
    
            $space = floor(($width - $len) / 2);
    
            return str_repeat(' ', $space) . $text . "\n";
        };
    
        $line = str_repeat('-', $width) . "\n";
    
        $money = function ($label, $amount) {
            return str_pad($label, 22) .
                   str_pad(number_format($amount, 2), 10, ' ', STR_PAD_LEFT) . "\n";
        };
    
        $text = "";
        $text .= "\x1B\x40";
    

        $text .= "\x1B\x45\x01"; // bold
        $text .= $center("FILTER PUB & CLUB");
        $text .= "\x1B\x45\x00";
        $text .= $center(".");
        $text .= $line;
    
        $text .= "Name: ________________________\n";
        $text .= $line;
    
        $text .= "Date: ".now()->format('d/m/y')."\n";
        $text .= "Time: ".now()->format('H:i')."\n";
        $text .= "Dine In: ".$order->table->table_number."\n";
        $text .= "Cashier: ".($order->user->name ?? 'Admin')."\n";
        $text .= "Bill No: ".($order->bill_no ?: $order->id)."\n";
    
        $text .= $line;
    

        $text .= sprintf("%-16s %3s %5s %7s\n", "Item", "Qty", "Rate", "Amt");
        $text .= $line;
    
        $qty = 0;
    
        foreach ($order->items as $item) {
    
            $qty += $item->quantity;
    
            $rows = explode("\n", wordwrap($item->item_name, 16, "\n", true));
    
            foreach ($rows as $k => $row) {
    
                if ($k == 0) {
                    $text .= sprintf(
                        "%-16s %3d %5.0f %7.2f\n",
                        $row,
                        $item->quantity,
                        $item->price,
                        $item->line_total
                    );
                } else {
                    $text .= $row . "\n";
                }
            }
    
            foreach ($item->addons as $addon) {
                $text .= "  + ".$addon->name."\n";
            }
    
            if ($item->note) {
                $text .= "  * ".$item->note."\n";
            }
        }
    
        $text .= $line;
    

        $service = 39.90;
        $cgst = 9.98;
        $sgst = 9.98;
        $round = round($order->grand_total) - $order->grand_total;
    
        $text .= "Total Qty: ".$qty."\n";
        $text .= $money("Sub Total", $order->subtotal);
        $text .= $money("Service Charge", $service);
        $text .= $money("CGST @2.5%", $cgst);
        $text .= $money("SGST @2.5%", $sgst);
        $text .= $money("Round Off", $round);
    
        $text .= $line;

        $text .= "\x1B\x45\x01";
        $text .= $center("GRAND TOTAL");
        $text .= $center("Rs ".number_format(round($order->grand_total),2));
        $text .= "\x1B\x45\x00";
    
        $text .= $line;
        $text .= $center("THANK YOU");
        $text .= "\n\n\n";
        $text .= "\x1D\x56\x00";
    
        return response()->json([
            'status' => true,
            'print_data' => $text
        ]);
    }*/
    
    /*public function billPrint(Request $request)
    {
        $order = Order::with([
            'items.addons',
            'table.section',
            'user'
        ])->findOrFail($request->order_id);
    
        $html = view('admin.pos.print.bill', compact('order'))->render();
    
        return response()->json([
            'status' => true,
            'html' => $html
        ]);
    }*/

    public function billPrint(Request $request)
    {
        $order = Order::with([
            'table.section',
            'user'
        ])->findOrFail($request->order_id);
    
        /*
        |--------------------------------------------------------------------------
        | GROUP SAME ITEMS
        |--------------------------------------------------------------------------
        */
        $items = OrderItem::select(
                'menu_item_id',
                'item_name',
                'price',
                'note',
                DB::raw('SUM(quantity) as quantity'),
                DB::raw('SUM(line_total) as line_total')
            )
            ->where('order_id', $order->id)
            ->groupBy(
                'menu_item_id',
                'item_name',
                'price',
                'note'
            )
            ->get();
            
    
        $html = view(
            'admin.pos.print.bill',
            compact(
                'order',
                'items'
            )
        )->render();
    
        return response()->json([
            'status' => true,
            'html' => $html
        ]);
    }






    ///////////////////////

    public function updatePrice(Request $request)
    {
        $request->validate([
            'nc_order_id' => 'required|exists:order_items,id',
            'password'    => 'required',
            'price'       => 'required|numeric|min:0',
            'reason'      => 'required|string'
        ]);

        /*
        |--------------------------------------------------------------------------
        | CHECK PASSWORD
        |--------------------------------------------------------------------------
        */
        // Example static password
        // You can also check admin password from database

        if (!Hash::check($request->password, auth()->user()->password)) {
            return response()->json([
                'status'  => false,
                'message' => 'Invalid password'
            ], 401);
        }

        /*
        |--------------------------------------------------------------------------
        | FIND ORDER ITEM
        |--------------------------------------------------------------------------
        */
        $item = OrderItem::findOrFail($request->nc_order_id);

        /*
        |--------------------------------------------------------------------------
        | UPDATE PRICE
        |--------------------------------------------------------------------------
        */
        $item->price = $request->price;
        $item->line_total = $request->price * $item->quantity;

        // optional fields if available in DB
        $item->price_update_reason = $request->reason;
        $item->price_updated_by = auth()->id();

        $item->save();

        /*
        |--------------------------------------------------------------------------
        | RECALCULATE ORDER
        |--------------------------------------------------------------------------
        */
        $this->calculateOrder($item->order_id);

        return response()->json([
            'status'  => true,
            'message' => 'Price updated successfully'
        ]);
    }

    public function applyDiscount(Request $request)
    {
        $request->validate([
            'order_id'       => 'required|exists:orders,id',
            'password'       => 'required',
            'discount_type'  => 'required|in:fixed,percentage',
            'discount_value' => 'required|numeric|min:0',
        ]);

        /*
        |--------------------------------------------------------------------------
        | CHECK USER PASSWORD
        |--------------------------------------------------------------------------
        */
        if (!Hash::check($request->password, auth()->user()->password)) {

            return response()->json([
                'status'  => false,
                'message' => 'Invalid password'
            ], 401);
        }

        /*
        |--------------------------------------------------------------------------
        | FIND ORDER
        |--------------------------------------------------------------------------
        */
        $order = Order::findOrFail($request->order_id);

        $discountAmount = 0;

        /*
        |--------------------------------------------------------------------------
        | FIXED DISCOUNT
        |--------------------------------------------------------------------------
        */
        if ($request->discount_type == 'fixed') {

            $discountAmount = $request->discount_value;
        }

        /*
        |--------------------------------------------------------------------------
        | PERCENTAGE DISCOUNT
        |--------------------------------------------------------------------------
        */
        if ($request->discount_type == 'percentage') {

            $discountAmount =
                ($order->subtotal * $request->discount_value) / 100;
        }

        /*
        |--------------------------------------------------------------------------
        | SAVE
        |--------------------------------------------------------------------------
        */
        $order->discount = $request->discount_value;
        $order->discount_amount = $discountAmount;

        /*
        |--------------------------------------------------------------------------
        | RECALCULATE GRAND TOTAL
        |--------------------------------------------------------------------------
        */
        $rawTotal =
            $order->subtotal +
            $order->service_charge +
            $order->tax -
            $discountAmount;

        $grandTotal = round($rawTotal);
        $roundOff = $grandTotal - $rawTotal;

        $order->round_off = $roundOff;
        $order->grand_total = $grandTotal;

        $order->save();

        return response()->json([
            'status'  => true,
            'message' => 'Discount applied successfully'
        ]);
    }

    public function updateCharges(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'service_charge' => 'nullable|numeric|min:0',
            'tip' => 'nullable|numeric|min:0',
        ]);

        $order = Order::findOrFail($request->order_id);

        $serviceCharge = $request->service_charge ?? 0;
        $tip = $request->tip ?? 0;

        /*
        |--------------------------------------------------------------------------
        | CALCULATE TOTAL
        |--------------------------------------------------------------------------
        */
        $rawTotal =
            $order->subtotal +
            $serviceCharge +
            $order->tax -
            $order->discount_amount +
            $tip;

        $grandTotal = round($rawTotal);

        $roundOff = $grandTotal - $rawTotal;

        /*
        |--------------------------------------------------------------------------
        | SAVE
        |--------------------------------------------------------------------------
        */
        $order->service_charge = $serviceCharge;
        $order->tip = $tip;
        $order->round_off = $roundOff;
        $order->grand_total = $grandTotal;

        $order->save();

        return response()->json([
            'status' => true,
            'message' => 'Charges updated'
        ]);
    }

    public function updatePayment(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
        ]);

        $order = Order::findOrFail($request->order_id);

        /*
        |--------------------------------------------------------------------------
        | PAYMENT TYPE
        |--------------------------------------------------------------------------
        */
        $order->payment_method = $request->payment_method;

        /*
        |--------------------------------------------------------------------------
        | SPLIT PAYMENT
        |--------------------------------------------------------------------------
        */
        $order->cash_amount = $request->cash_amount ?? 0;
        $order->card_amount = $request->card_amount ?? 0;
        $order->upi_amount = $request->upi_amount ?? 0;
        $order->other_amount = $request->other_amount ?? 0;

        /*
        |--------------------------------------------------------------------------
        | OTHER PAYMENT
        |--------------------------------------------------------------------------
        */
        $order->other_payment_method = $request->other_payment_method;
        $order->payment_note = $request->payment_note;

        $order->save();

        return response()->json([
            'status' => true,
            'message' => 'Payment updated'
        ]);
    }

    public function moveTable(Request $request)
    {
        $request->validate([
            'current_table_id' => 'required|exists:tables,id',
            'new_table_id'     => 'required|exists:tables,id',
        ]);

        /*
        |--------------------------------------------------------------------------
        | SAME TABLE CHECK
        |--------------------------------------------------------------------------
        */
        if ($request->current_table_id == $request->new_table_id) {

            return back()->with([
                'error' => 'Please select another table'
            ]);
        }

        /*
        |--------------------------------------------------------------------------
        | CURRENT RUNNING ORDER
        |--------------------------------------------------------------------------
        */
        $order = Order::where('table_id', $request->current_table_id)
            ->whereIn('status', ['draft', 'kot'])
            ->latest()
            ->first();

        if (!$order) {

            return back()->with([
                'error' => 'No active order found'
            ]);
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
        | CHECK TARGET TABLE ALREADY OCCUPIED
        |--------------------------------------------------------------------------
        */
        $existingOrder = Order::where('table_id', $newTable->id)
            ->whereIn('status', ['draft', 'kot'])
            ->where('id', '!=', $order->id)
            ->exists();

        if ($existingOrder) {

            return back()->with([
                'error' => 'Selected table already has running order'
            ]);
        }

        /*
        |--------------------------------------------------------------------------
        | MOVE TABLE
        |--------------------------------------------------------------------------
        */
        $order->table_id = $newTable->id;
        $order->section_id = $newTable->section_id;

        $order->save();

        /*
        |--------------------------------------------------------------------------
        | REDIRECT TO NEW TABLE SCREEN
        |--------------------------------------------------------------------------
        */
        return redirect()->route(
            'pos.mainindex',
            [
                $newTable->section_id,
                $newTable->id
            ]
        )->with([
            'success' => 'Table moved successfully'
        ]);
    }
}