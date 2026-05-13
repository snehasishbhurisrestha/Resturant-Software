<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Order;
use App\Models\OrderItem;

use Carbon\Carbon;
use DB;

class ReportController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | DATE FILTER
    |--------------------------------------------------------------------------
    */
    protected function filterDates($request)
    {
        $from = $request->from
            ? Carbon::parse($request->from)->startOfDay()
            : Carbon::today()->startOfDay();

        $to = $request->to
            ? Carbon::parse($request->to)->endOfDay()
            : Carbon::today()->endOfDay();

        return [$from, $to];
    }

    /*
    |--------------------------------------------------------------------------
    | SALES SUMMARY
    |--------------------------------------------------------------------------
    */
    public function salesSummary(Request $request)
    {
        [$from, $to] = $this->filterDates($request);

        $orders = Order::whereBetween(
            'created_at',
            [$from, $to]
        );

        $data = [

            'total_sales' =>
                (clone $orders)->sum('grand_total'),

            'total_orders' =>
                (clone $orders)->count(),

            'total_tax' =>
                (clone $orders)->sum('tax'),

            'discount' =>
                (clone $orders)->sum('discount_amount'),

            'tips' =>
                (clone $orders)->sum('tip'),

            'service_charge' =>
                (clone $orders)->sum('service_charge'),

            'cash_sales' =>
                (clone $orders)->sum('cash_amount'),

            'card_sales' =>
                (clone $orders)->sum('card_amount'),

            'upi_sales' =>
                (clone $orders)->sum('upi_amount'),

            'other_sales' =>
                (clone $orders)->sum('other_amount'),
        ];

        return view(
            'admin.reports.sales_summary',
            compact(
                'data',
                'from',
                'to'
            )
        );
    }

    /*
    |--------------------------------------------------------------------------
    | CATEGORY SUMMARY
    |--------------------------------------------------------------------------
    */
    public function categorySummary(Request $request)
    {
        [$from, $to] = $this->filterDates($request);

        $categories = OrderItem::join(
                'menu_items',
                'menu_items.id',
                '=',
                'order_items.menu_item_id'
            )
            ->join(
                'menu_categories',
                'menu_categories.id',
                '=',
                'menu_items.category_id'
            )
            ->select(
                'menu_categories.name as category_name',

                DB::raw('SUM(order_items.quantity) as qty'),

                DB::raw('SUM(order_items.line_total) as total')
            )
            ->whereBetween(
                'order_items.created_at',
                [$from, $to]
            )
            ->groupBy('menu_categories.name')
            ->orderByDesc('total')
            ->get();

        return view(
            'admin.reports.category_summary',
            compact(
                'categories',
                'from',
                'to'
            )
        );
    }

    /*
    |--------------------------------------------------------------------------
    | ITEM SUMMARY
    |--------------------------------------------------------------------------
    */
    public function itemSummary(Request $request)
    {
        [$from, $to] = $this->filterDates($request);

        $items = OrderItem::select(
                'item_name',

                DB::raw('SUM(quantity) as qty'),

                DB::raw('SUM(line_total) as total')
            )
            ->whereBetween(
                'created_at',
                [$from, $to]
            )
            ->groupBy('item_name')
            ->orderByDesc('qty')
            ->get();

        return view(
            'admin.reports.item_summary',
            compact(
                'items',
                'from',
                'to'
            )
        );
    }

    /*
    |--------------------------------------------------------------------------
    | ORDER SUMMARY
    |--------------------------------------------------------------------------
    */
    public function orderSummary(Request $request)
    {
        [$from, $to] = $this->filterDates($request);

        $orders = Order::with([
                'table',
                'user',
                'section'
            ])
            ->whereBetween(
                'created_at',
                [$from, $to]
            )
            ->latest()
            ->get();

        return view(
            'admin.reports.order_summary',
            compact(
                'orders',
                'from',
                'to'
            )
        );
    }

    /*
    |--------------------------------------------------------------------------
    | EXECUTIVE SALES SUMMARY
    |--------------------------------------------------------------------------
    */
    public function executiveSalesSummary(Request $request)
    {
        [$from, $to] = $this->filterDates($request);

        $executives = Order::join(
                'users',
                'users.id',
                '=',
                'orders.created_by'
            )
            ->select(
                'users.name',

                DB::raw('COUNT(orders.id) as total_orders'),

                DB::raw('SUM(orders.grand_total) as total_sales'),

                DB::raw('SUM(orders.tip) as total_tip'),

                DB::raw('AVG(orders.grand_total) as avg_bill')
            )
            ->whereBetween(
                'orders.created_at',
                [$from, $to]
            )
            ->groupBy('users.name')
            ->orderByDesc('total_sales')
            ->get();

        return view(
            'admin.reports.executive_summary',
            compact(
                'executives',
                'from',
                'to'
            )
        );
    }

    /*
    |--------------------------------------------------------------------------
    | TIP SUMMARY
    |--------------------------------------------------------------------------
    */
    public function tipSummary(Request $request)
    {
        [$from, $to] = $this->filterDates($request);

        $tips = Order::join(
                'users',
                'users.id',
                '=',
                'orders.created_by'
            )
            ->select(
                'users.name',

                DB::raw('COUNT(orders.id) as total_orders'),

                DB::raw('SUM(orders.tip) as total_tip')
            )
            ->whereBetween(
                'orders.created_at',
                [$from, $to]
            )
            ->groupBy('users.name')
            ->orderByDesc('total_tip')
            ->get();

        return view(
            'admin.reports.tip_summary',
            compact(
                'tips',
                'from',
                'to'
            )
        );
    }

    /*
    |--------------------------------------------------------------------------
    | EMPLOYEE SUMMARY
    |--------------------------------------------------------------------------
    */
    public function employeeSummary(Request $request)
    {
        [$from, $to] = $this->filterDates($request);

        $employees = Order::join(
                'users',
                'users.id',
                '=',
                'orders.created_by'
            )
            ->select(
                'users.name',

                DB::raw('COUNT(orders.id) as total_orders'),

                DB::raw('SUM(orders.grand_total) as total_sales'),

                DB::raw('SUM(orders.tip) as total_tip'),

                DB::raw('SUM(orders.discount_amount) as total_discount')
            )
            ->whereBetween(
                'orders.created_at',
                [$from, $to]
            )
            ->groupBy('users.name')
            ->orderByDesc('total_sales')
            ->get();

        return view(
            'admin.reports.employee_summary',
            compact(
                'employees',
                'from',
                'to'
            )
        );
    }

    /*
    |--------------------------------------------------------------------------
    | NC ITEM SUMMARY
    |--------------------------------------------------------------------------
    */
    public function ncItemSummary(Request $request)
    {
        [$from, $to] = $this->filterDates($request);

        $items = OrderItem::with([
                'order.user'
            ])
            ->where('line_total', 0)
            ->whereBetween(
                'created_at',
                [$from, $to]
            )
            ->latest()
            ->get();

        return view(
            'admin.reports.nc_summary',
            compact(
                'items',
                'from',
                'to'
            )
        );
    }
}