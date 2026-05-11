<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\CustomerSession;
use App\Models\MenuItem;
use App\Helpers\ApiResponse;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * 🍽️ CREATE / ADD ITEMS TO ORDER
     */
    public function create(Request $request)
    {
        $user = auth()->user();

        DB::beginTransaction();

        try {

            $session = CustomerSession::findOrFail($request->session_id);

            // 🔍 Find existing active order
            $order = Order::where('session_id', $session->id)
                ->whereIn('status', ['pending', 'preparing'])
                ->first();

            if (!$order) {
                $order = Order::create([
                    'restaurant_id' => $user->restaurant_id,
                    'table_id' => $request->table_id,
                    'session_id' => $session->id,
                    'created_by' => $user->id,
                    'status' => 'pending',
                    'total' => 0
                ]);
            }

            // ➕ Add Items
            foreach ($request->items as $item) {

                $menu = MenuItem::findOrFail($item['menu_item_id']);

                OrderItem::create([
                    'order_id' => $order->id,
                    'menu_item_id' => $menu->id,
                    'quantity' => $item['quantity'],
                    'price' => $menu->price,
                    'status' => 'pending'
                ]);
            }

            // 🔥 Recalculate total
            $this->recalculateOrder($order, $session);

            DB::commit();

            return ApiResponse::success('Order updated', [
                'order' => $order->load('items'),
                'remaining' => $session->remaining_amount
            ]);

        } catch (\Exception $e) {
            DB::rollback();
            return ApiResponse::error($e->getMessage());
        }
    }

    /**
     * 🔄 UPDATE ITEM (quantity / cancel)
     */
    public function updateItem(Request $request)
    {
        DB::beginTransaction();

        try {

            $item = OrderItem::findOrFail($request->item_id);
            $order = Order::findOrFail($item->order_id);
            $session = CustomerSession::findOrFail($order->session_id);

            // ❌ Cancel item
            if ($request->action == 'cancel') {
                $item->status = 'cancelled';
            }

            // 🔁 Update quantity
            if ($request->action == 'update') {
                $item->quantity = $request->quantity;
            }

            $item->save();

            // 🔥 Recalculate total
            $this->recalculateOrder($order, $session);

            DB::commit();

            return ApiResponse::success('Item updated', [
                'order' => $order->load('items'),
                'remaining' => $session->remaining_amount
            ]);

        } catch (\Exception $e) {
            DB::rollback();
            return ApiResponse::error($e->getMessage());
        }
    }

    /**
     * 🔥 RECALCULATE ORDER + WALLET
     */
    private function recalculateOrder($order, $session)
    {
        // 💰 Calculate total (ignore cancelled)
        $total = OrderItem::where('order_id', $order->id)
            ->where('status', '!=', 'cancelled')
            ->sum(DB::raw('quantity * price'));

        // Update order total
        $order->update([
            'total' => $total
        ]);

        // 💰 Update session wallet
        $session->used_amount = $total;
        $session->remaining_amount = $session->entry_fee - $total;

        if ($session->remaining_amount < 0) {
            $session->remaining_amount = 0;
        }

        $session->save();
    }

    /**
     * 📄 GET ORDER DETAILS
     */
    public function show($id)
    {
        $order = Order::with(['items.item', 'table'])->findOrFail($id);

        return ApiResponse::success('Order details', $order);
    }

    /**
     * ❌ DELETE ORDER (OPTIONAL)
     */
    public function destroy($id)
    {
        $order = Order::findOrFail($id);

        $order->delete();

        return ApiResponse::success('Order deleted');
    }
}