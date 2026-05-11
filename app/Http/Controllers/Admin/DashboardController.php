<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CustomerSession;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // 📅 Date Filter (optional)
        $from = $request->from ?? Carbon::today()->startOfDay();
        $to = $request->to ?? Carbon::today()->endOfDay();

        // ================================
        // 💰 BUSINESS (MONEY SECTION)
        // ================================

        $totalCollection = CustomerSession::whereBetween('created_at', [$from, $to])
            ->sum('entry_fee');

        $coverAmount = CustomerSession::whereBetween('created_at', [$from, $to])
            ->sum('entry_fee');

        $usedAmount = CustomerSession::whereBetween('created_at', [$from, $to])
            ->sum('used_amount');

        $remainingAmount = CustomerSession::whereBetween('created_at', [$from, $to])
            ->sum('remaining_amount');

        $dueAmount = CustomerSession::whereBetween('created_at', [$from, $to])
            ->sum('remaining_amount');

        // ================================
        // 👥 LIVE OPERATIONS
        // ================================

        $totalSessions = CustomerSession::count();

        $activeSessions = CustomerSession::where('status', 'active')->count();

        $closedSessions = CustomerSession::where('status', 'closed')->count();

        $occupiedTables = CustomerSession::where('status', 'active')
            ->whereNotNull('table_id')
            ->count();

        // ================================
        // 🚶 WALKIN vs QR / ONLINE
        // ================================

        $walkin = CustomerSession::whereNull('qr_code')->count();

        $qrOrders = CustomerSession::whereNotNull('qr_code')->count();

        // ================================
        // 👤 CUSTOMER ANALYTICS
        // ================================

        $totalPax = CustomerSession::count(); // if column exists

        $totalGroup = CustomerSession::distinct('customer_phone')->count('customer_phone');

        // ================================
        // 📊 TOP SELLING ITEMS (from order_items)
        // ================================

        $topItems = DB::table('order_items')
            ->join('menu_items', 'menu_items.id', '=', 'order_items.menu_item_id')
            ->select(
                'menu_items.name',
                DB::raw('SUM(order_items.quantity) as total_orders')
            )
            ->groupBy('menu_items.name')
            ->orderByDesc('total_orders')
            ->limit(5)
            ->get();

        $topItem = $topItems->first();

        // ================================
        // 📈 REVENUE CHART (LAST 7 DAYS)
        // ================================

        $revenueChart = CustomerSession::selectRaw('DATE(created_at) as date, SUM(entry_fee) as total')
            ->groupBy('date')
            ->orderBy('date', 'ASC')
            ->limit(7)
            ->get();

        // ================================
        // 🟢 LIVE ACTIVE CUSTOMERS
        // ================================

        $activeCustomers = CustomerSession::where('status', 'active')
            ->latest()
            ->limit(5)
            ->get();

        // ================================
        // 🧾 RECENT TRANSACTIONS
        // ================================

        $transactions = CustomerSession::latest()
            ->limit(5)
            ->get();

        // ================================
        // 📊 GROWTH ANALYTICS (TODAY vs YESTERDAY)
        // ================================

        $todayCollection = CustomerSession::whereDate('created_at', Carbon::today())
            ->sum('entry_fee');

        $yesterdayCollection = CustomerSession::whereDate('created_at', Carbon::yesterday())
            ->sum('entry_fee');

        $growth = $yesterdayCollection > 0
            ? (($todayCollection - $yesterdayCollection) / $yesterdayCollection) * 100
            : 0;

        // ================================
        // RETURN VIEW
        // ================================

        return view('dashboard', compact(
            'totalCollection',
            'coverAmount',
            'usedAmount',
            'remainingAmount',
            'dueAmount',
            'totalSessions',
            'activeSessions',
            'closedSessions',
            'occupiedTables',
            'walkin',
            'qrOrders',
            'totalPax',
            'totalGroup',
            'topItems',
            'topItem',
            'revenueChart',
            'activeCustomers',
            'transactions',
            'todayCollection',
            'yesterdayCollection',
            'growth'
        ));
    }
}