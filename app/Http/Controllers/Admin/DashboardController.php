<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Table;
use App\Models\Section;
use App\Models\User;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $from = $request->from
            ? Carbon::parse($request->from)->startOfDay()
            : Carbon::today()->startOfDay();

        $to = $request->to
            ? Carbon::parse($request->to)->endOfDay()
            : Carbon::today()->endOfDay();

        /*
        |--------------------------------------------------------------------------
        | MAIN ORDER QUERY
        |--------------------------------------------------------------------------
        */
        $orders = Order::whereBetween('created_at', [$from, $to]);

        /*
        |--------------------------------------------------------------------------
        | SALES
        |--------------------------------------------------------------------------
        */
        $totalSales = (clone $orders)->sum('grand_total');

        $totalOrders = (clone $orders)->count();

        $completedOrders = (clone $orders)
            ->where('status', 'billed')
            ->count();

        $runningOrders = (clone $orders)
            ->whereIn('status', ['draft', 'kot'])
            ->count();

        $cancelledOrders = (clone $orders)
            ->where('status', 'cancelled')
            ->count();

        /*
        |--------------------------------------------------------------------------
        | ORDER TYPES
        |--------------------------------------------------------------------------
        */
        $dineInSales = (clone $orders)
            ->where('order_type', 'Dine In')
            ->sum('grand_total');

        $dineInOrders = (clone $orders)
            ->where('order_type', 'Dine In')
            ->count();

        $pickupSales = (clone $orders)
            ->where('order_type', 'Pick Up')
            ->sum('grand_total');

        $pickupOrders = (clone $orders)
            ->where('order_type', 'Pick Up')
            ->count();

        $deliverySales = (clone $orders)
            ->where('order_type', 'Delivery')
            ->sum('grand_total');

        $deliveryOrders = (clone $orders)
            ->where('order_type', 'Delivery')
            ->count();

        /*
        |--------------------------------------------------------------------------
        | LIVE TABLES
        |--------------------------------------------------------------------------
        */
        $occupiedTables = Order::whereIn('status', ['draft', 'kot'])
            ->distinct('table_id')
            ->count('table_id');

        $totalTables = Table::count();

        $availableTables = $totalTables - $occupiedTables;

        /*
        |--------------------------------------------------------------------------
        | PAYMENT BIFURCATION
        |--------------------------------------------------------------------------
        */
        $cashSales = (clone $orders)->sum('cash_amount');

        $cardSales = (clone $orders)->sum('card_amount');

        $upiSales = (clone $orders)->sum('upi_amount');

        $otherSales = (clone $orders)->sum('other_amount');

        /*
        |--------------------------------------------------------------------------
        | TOP SELLING ITEMS
        |--------------------------------------------------------------------------
        */
        $topItems = OrderItem::select(
                'item_name',
                DB::raw('SUM(quantity) as total_qty')
            )
            ->groupBy('item_name')
            ->orderByDesc('total_qty')
            ->limit(10)
            ->get();

        /*
        |--------------------------------------------------------------------------
        | TOP CAPTAINS / BILLERS
        |--------------------------------------------------------------------------
        */
        $topUsers = Order::join('users', 'users.id', '=', 'orders.created_by')
            ->select(
                'users.name',
                DB::raw('COUNT(orders.id) as total_orders'),
                DB::raw('SUM(orders.grand_total) as total_sales')
            )
            ->groupBy('users.name')
            ->orderByDesc('total_sales')
            ->limit(5)
            ->get();

        /*
        |--------------------------------------------------------------------------
        | SALES CHART (7 DAYS)
        |--------------------------------------------------------------------------
        */
        $salesChart = Order::selectRaw("
                DATE(created_at) as date,
                SUM(grand_total) as total
            ")
            ->whereDate(
                'created_at',
                '>=',
                Carbon::today()->subDays(6)
            )
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        /*
        |--------------------------------------------------------------------------
        | RECENT ORDERS
        |--------------------------------------------------------------------------
        */
        $recentOrders = Order::with([
                'table',
                'user'
            ])
            ->latest()
            ->limit(10)
            ->get();

        /*
        |--------------------------------------------------------------------------
        | KOT ANALYTICS
        |--------------------------------------------------------------------------
        */
        $kotOrders = Order::where('status', 'kot')->count();

        $draftOrders = Order::where('status', 'draft')->count();

        /*
        |--------------------------------------------------------------------------
        | AVERAGE BILL VALUE
        |--------------------------------------------------------------------------
        */
        $avgBill = $totalOrders > 0
            ? $totalSales / $totalOrders
            : 0;

        /*
        |--------------------------------------------------------------------------
        | TAX / DISCOUNT / SERVICE
        |--------------------------------------------------------------------------
        */
        $totalTax = (clone $orders)->sum('tax');

        $totalDiscount = (clone $orders)->sum('discount_amount');

        $serviceCharge = (clone $orders)->sum('service_charge');

        /*
        |--------------------------------------------------------------------------
        | RETURN VIEW
        |--------------------------------------------------------------------------
        */
        return view('dashboard', compact(
            'totalSales',
            'totalOrders',
            'completedOrders',
            'runningOrders',
            'cancelledOrders',

            'dineInSales',
            'dineInOrders',

            'pickupSales',
            'pickupOrders',

            'deliverySales',
            'deliveryOrders',

            'occupiedTables',
            'availableTables',
            'totalTables',

            'cashSales',
            'cardSales',
            'upiSales',
            'otherSales',

            'topItems',
            'topUsers',

            'salesChart',

            'recentOrders',

            'kotOrders',
            'draftOrders',

            'avgBill',

            'totalTax',
            'totalDiscount',
            'serviceCharge'
        ));
    }
}