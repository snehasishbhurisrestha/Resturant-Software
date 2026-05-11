<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use Carbon\Carbon;

class KitchenController extends Controller
{

    /**
     * 🍳 FULL DASHBOARD API
     */
    public function dashboard(Request $request)
    {
        $now = now();

        // =========================
        // 📊 STATS
        // =========================
        $pending = OrderItem::where('status', 'pending')->count();
        $preparing = OrderItem::where('status', 'preparing')->count();
        $ready = OrderItem::where('status', 'served')->count();

        // ⏱ delayed (>20 min)
        $delayed = OrderItem::where('status', 'preparing')
            ->where('created_at', '<', $now->subMinutes(20))
            ->count();

        // =========================
        // 🍽️ ORDERS WITH ITEMS
        // =========================
        $orders = Order::with([
                'table',
                'items' => function ($q) {
                    $q->where('status', '!=', 'cancelled');
                },
                'items.item'
            ])
            // ->whereIn('status', ['pending', 'preparing'])
            ->latest()
            ->get();

        // =========================
        // 🔥 FORMAT DATA
        // =========================
        $orderData = $orders->map(function ($order) {

            $minutes = $order->created_at->diffInMinutes(now());

            return [
                'order_id' => $order->id,
                'table' => $order->table->table_number ?? 'Bar',
                'time' => $order->created_at->format('h:i A'),
                'minutes' => $minutes,
                'is_delayed' => $minutes > 20,

                'items' => $order->items->map(function ($item) {
                    return [
                        'item_id' => $item->id,
                        'name' => $item->item->name,
                        'qty' => $item->quantity,
                        'status' => $item->status,
                        'note' => $item->note
                    ];
                })
            ];
        });

        return ApiResponse::success('Kitchen dashboard', [
            'stats' => [
                'pending' => $pending,
                'preparing' => $preparing,
                'ready' => $ready,
                'delayed' => $delayed
            ],
            'orders' => $orderData
        ]);
    }

    /**
     * 🔄 UPDATE ITEM STATUS
     */
    public function updateItemStatus(Request $request)
    {
        $request->validate([
            'item_id' => 'required',
            'status' => 'required|in:pending,preparing,served'
        ]);

        $item = OrderItem::findOrFail($request->item_id);

        $item->update([
            'status' => $request->status
        ]);

        return ApiResponse::success('Item status updated');
    }

    /**
     * 📊 ONLY STATS (FAST API)
     */
    public function stats()
    {
        return ApiResponse::success('Kitchen stats', [
            'pending' => OrderItem::where('status', 'pending')->count(),
            'preparing' => OrderItem::where('status', 'preparing')->count(),
            'ready' => OrderItem::where('status', 'served')->count(),
        ]);
    }

    /**
     * 📦 ONLY ORDERS (LIGHT VERSION)
     */
    public function orders()
    {
        $orders = Order::with([
                'table',
                'items' => function ($q) {
                    $q->where('status', '!=', 'cancelled');
                },
                'items.item'
            ])
            // ->whereIn('status', ['pending', 'preparing'])
            ->latest()
            ->get();

        return ApiResponse::success('Kitchen orders', $orders);
    }
}