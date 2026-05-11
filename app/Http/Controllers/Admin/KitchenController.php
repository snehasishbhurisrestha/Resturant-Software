<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Table;
use App\Models\User;
use Carbon\Carbon;

class KitchenController extends Controller
{
    /*public function index(Request $request)
    {
        $query = Order::with(['items.item', 'table']);
        if ($request->search) {
            $query->where('id', 'like', '%' . $request->search . '%');
        }
        $query->whereIn('status', ['pending', 'processing', 'ready']);
        $orders = $query->latest()->get();
        $newOrders = Order::where('status', 'pending')->count();
        $inKitchen = Order::where('status', 'processing')->count();
        $completed = Order::where('status', 'ready')->count();
        $delayed = Order::where('status', 'processing')->where('created_at', '<', Carbon::now()->subMinutes(30))->count();
        foreach ($orders as $order) {
            $order->minutes = Carbon::parse($order->created_at)->diffInMinutes(now());
            if ($order->status == 'pending') {
                $order->progress = 10;
            } elseif ($order->status == 'processing') {
                $order->progress = min(80, $order->minutes * 2);
            } else {
                $order->progress = 100;
            }
            $order->is_delayed = $order->minutes > 30 ? true : false;
        }
        return view('admin.kitchen.index', compact(
            'orders',
            'newOrders',
            'inKitchen',
            'completed',
            'delayed'
        ));
    }*/

    /*public function index(Request $request)
    {
        $total = OrderItem::count();
        $pending = OrderItem::where('status','pending')->count();
        $preparing = OrderItem::where('status','preparing')->count();
        $ready = OrderItem::where('status','ready')->count();
        $served = OrderItem::where('status','served')->count();

        $query = OrderItem::with([
            'order.table.section',
            'order.user',
            'addons'
        ]);

        // date
        if ($request->from_date) {
            $query->whereDate('created_at','>=',$request->from_date);
        }

        if ($request->to_date) {
            $query->whereDate('created_at','<=',$request->to_date);
        }

        // order no
        if ($request->order_no) {
            $query->whereHas('order', function($q) use ($request){
                $q->where('order_no','like','%'.$request->order_no.'%');
            });
        }

        // table
        if ($request->table_id) {
            $query->whereHas('order', function($q) use ($request){
                $q->where('table_id',$request->table_id);
            });
        }

        // captain
        if ($request->created_by) {
            $query->whereHas('order', function($q) use ($request){
                $q->where('created_by',$request->created_by);
            });
        }

        // item
        if ($request->item_name) {
            $query->where('item_name','like','%'.$request->item_name.'%');
        }

        // status
        if ($request->status) {
            $query->where('status',$request->status);
        }

        // complimentary
        if ($request->filled('is_complimentary')) {
            $query->where('is_complimentary',$request->is_complimentary);
        }

        $items = $query->latest()->get()->groupBy('order_id');

        $tables = Table::orderBy('table_number')->get();
        $users = User::orderBy('name')->get();

        return view('admin.kitchen.index', compact(
            'items',
            'tables',
            'users',
            'total',
            'pending',
            'preparing',
            'ready',
            'served'
        ));
    }*/

    public function index(Request $request)
    {
        $query = Order::with([
            'items.item',
            'user',
            'table',
            'section'
        ])
        ->whereHas('items', function ($q) {
            $q->whereIn('status', ['pending', 'preparing', 'ready']);
        });

        /*
        |--------------------------------------------------------------------------
        | Filters
        |--------------------------------------------------------------------------
        */

        // Start date
        if ($request->filled('from_date')) {
            $query->whereDate('created_at', '>=', $request->from_date);
        }

        // End date
        if ($request->filled('to_date')) {
            $query->whereDate('created_at', '<=', $request->to_date);
        }

        // KOT ID / Order ID
        if ($request->filled('kot_id')) {
            $query->where('id', $request->kot_id);
        }

        // Customer name
        if ($request->filled('customer_name')) {
            $query->where('customer_name', 'like', '%' . $request->customer_name . '%');
        }

        // Customer phone
        if ($request->filled('customer_phone')) {
            $query->where('customer_phone', 'like', '%' . $request->customer_phone . '%');
        }

        // Table
        if ($request->filled('table_id')) {
            $query->where('table_id', $request->table_id);
        }

        // Order type
        if ($request->filled('order_type')) {
            $query->where('order_type', $request->order_type);
        }

        // Item status
        if ($request->filled('status')) {
            $status = $request->status;

            $query->whereHas('items', function ($q) use ($status) {
                $q->where('status', $status);
            });
        }

        // Complimentary filter
        if ($request->filled('filter')) {

            if ($request->filter == 'complimentary') {
                $query->whereHas('items', function ($q) {
                    $q->where('is_complimentary', 1);
                });
            }

            if ($request->filter == 'normal') {
                $query->whereHas('items', function ($q) {
                    $q->where('is_complimentary', 0);
                });
            }
        }

        /*
        |--------------------------------------------------------------------------
        | Get orders
        |--------------------------------------------------------------------------
        */
        $orders = $query->latest()->paginate(20)->withQueryString();

        /*
        |--------------------------------------------------------------------------
        | Filter dropdown data
        |--------------------------------------------------------------------------
        */
        $tables = Table::orderBy('table_number')->get();

        /*
        |--------------------------------------------------------------------------
        | Counts
        |--------------------------------------------------------------------------
        */
        $total = OrderItem::whereIn('status', ['pending','preparing','ready'])->count();
        $pending = OrderItem::where('status', 'pending')->count();
        $preparing = OrderItem::where('status', 'preparing')->count();
        $ready = OrderItem::where('status', 'ready')->count();

        return view('admin.kitchen.index', compact(
            'orders',
            'tables',
            'total',
            'pending',
            'preparing',
            'ready'
        ));
    }

    public function updateStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $request->validate([
            'status' => 'required'
        ]);

        $order->status = $request->status;

        // ⏱ Optional: track cooking start/end
        if ($request->status == 'processing') {
            $order->cooking_started_at = now();
        }

        if ($request->status == 'ready') {
            $order->cooking_completed_at = now();
        }

        $order->save();

        return back()->with('success', 'Order updated successfully');
    }

    /**
     * 🔍 SINGLE ORDER VIEW (OPTIONAL)
     */
    public function show($id)
    {
        $order = Order::with(['items.menuItem', 'table'])->findOrFail($id);

        return view('admin.kitchen.show', compact('order'));
    }

    /**
     * 🔔 API FOR LIVE REFRESH (OPTIONAL - AJAX)
     */
    public function liveOrders()
    {
        $orders = Order::with(['items.menuItem'])
            ->whereIn('status', ['pending', 'processing'])
            ->latest()
            ->get();

        return response()->json($orders);
    }
}