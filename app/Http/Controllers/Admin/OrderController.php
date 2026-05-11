<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\Table;
use App\Models\User;

class OrderController extends Controller
{
    /*public function index(Request $request)
    {
        // =========================
        // 📊 STATUS COUNTS
        // =========================

        $confirmed = DB::table('orders')->where('status', 'confirmed')->count();
        $pending = DB::table('orders')->where('status', 'pending')->count();
        $processing = DB::table('orders')->where('status', 'processing')->count();
        $outForDelivery = DB::table('orders')->where('status', 'out_for_delivery')->count();
        $delivered = DB::table('orders')->where('status', 'delivered')->count();
        $cancelled = DB::table('orders')->where('status', 'cancelled')->count();

        // =========================
        // 🔍 FILTER
        // =========================

        $query = DB::table('orders')
            ->leftJoin('tables', 'orders.table_id', '=', 'tables.id')
            ->select('orders.*', 'tables.table_number');

        if ($request->status) {
            $query->where('orders.status', $request->status);
        }

        if ($request->search) {
            $query->where('orders.id', 'like', '%' . $request->search . '%');
        }

        $orders = $query->orderByDesc('orders.id')->get();

        // =========================
        // 🍽 ORDER ITEMS
        // =========================

        $orderItems = DB::table('order_items')
            ->join('menu_items', 'menu_items.id', '=', 'order_items.menu_item_id')
            ->select(
                'order_items.*',
                'menu_items.name'
            )
            ->get()
            ->groupBy('order_id');

        return view('admin.orders.index', compact(
            'orders',
            'orderItems',
            'confirmed',
            'pending',
            'processing',
            'outForDelivery',
            'delivered',
            'cancelled'
        ));
    }*/

    public function index(Request $request)
    {
        $statusCounts = Order::selectRaw("
            COUNT(CASE WHEN status='billed' THEN 1 END) as confirmed,
            COUNT(CASE WHEN status='draft' THEN 1 END) as pending,
            COUNT(CASE WHEN status='kot' THEN 1 END) as processing,
            COUNT(CASE WHEN status='out_for_delivery' THEN 1 END) as out_for_delivery,
            COUNT(CASE WHEN status='delivered' THEN 1 END) as delivered,
            COUNT(CASE WHEN status='cancelled' THEN 1 END) as cancelled
        ")->first();

        $orders = Order::with([
                'table',
                'user',
                'items.item'
            ])
            ->when($request->status, function ($q) use ($request) {
                $q->where('status', $request->status);
            })
            ->when($request->search, function ($q) use ($request) {
                $q->where('id', 'like', "%{$request->search}%");
            })
            ->latest()
            ->paginate(20);

        return view('admin.orders.index', compact(
            'orders',
            'statusCounts'
        ));
    }

    public function details($id)
    {
        $order = Order::with([
            'table',
            'user',
            'items.item.addons'
        ])->findOrFail($id);

        return response()->json($order);
    }

    public function running_tables(Request $request)
    {
        return view('admin.orders.runnig-tables');
    }

    public function updateStatus(Request $request, $id)
    {
        DB::table('orders')
            ->where('id', $id)
            ->update([
                'status' => $request->status
            ]);

        return back()->with('success', 'Order updated');
    }

    public function all_orders(Request $request)
    {
        $query = Order::with([
            'table',
            'user',
            'items'
        ]);

        // Date filter
        if ($request->from_date) {
            $query->whereDate('created_at', '>=', $request->from_date);
        }

        if ($request->to_date) {
            $query->whereDate('created_at', '<=', $request->to_date);
        }

        // Order ID
        if ($request->order_id) {
            $query->where('id', $request->order_id);
        }

        // Customer
        if ($request->customer_name) {
            $query->where('customer_name', 'like', '%'.$request->customer_name.'%');
        }

        if ($request->customer_phone) {
            $query->where('customer_phone', 'like', '%'.$request->customer_phone.'%');
        }

        // Order type
        if ($request->order_type) {
            $query->where('order_type', $request->order_type);
        }

        // Status
        if ($request->status) {
            $query->where('status', $request->status);
        }

        // Payment
        if ($request->payment) {
            $query->where('payment', $request->payment);
        }

        // Table
        if ($request->table_id) {
            $query->where('table_id', $request->table_id);
        }

        // Captain
        if ($request->created_by) {
            $query->where('created_by', $request->created_by);
        }

        // Amount range
        if ($request->min_amount) {
            $query->where('grand_total', '>=', $request->min_amount);
        }

        if ($request->max_amount) {
            $query->where('grand_total', '<=', $request->max_amount);
        }

        $orders = $query->latest()->paginate(20);

        $tables = Table::orderBy('table_number')->get();
        $users  = User::orderBy('name')->get();

        return view('admin.all-orders.orders', compact(
            'orders',
            'tables',
            'users'
        ));
    }

    public function advance_orders(Request $request)
    {
        return view('admin.all-orders.advance-order');
    }

}