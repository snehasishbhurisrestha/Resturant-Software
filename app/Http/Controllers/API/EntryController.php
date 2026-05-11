<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CustomerSession;
use App\Helpers\ApiResponse;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\Payment;
use App\Models\Customer;

class EntryController extends Controller
{

    // 🔥 CREATE ENTRY
    public function create(Request $request)
    {
        $request->validate([
            'customer_name' => 'required',
            'customer_phone' => 'required',
            'entry_fee' => 'required|numeric'
        ]);

        $user = auth()->user();

        $customer = Customer::firstOrCreate(
            ['phone' => $request->customer_phone], // 🔍 check existing
            [
                'restaurant_id' => $user->restaurant_id ?? 1,
                'name' => $request->customer_name,
                'phone' => $request->customer_phone,
            ]
        );

        $session = CustomerSession::create([
            'customer_id' => $customer->id,
            'restaurant_id' => $user->restaurant_id ?? 1,
            'customer_name' => $request->customer_name,
            'customer_phone' => $request->customer_phone,
            'entry_fee' => $request->entry_fee,
            'used_amount' => 0,
            'remaining_amount' => $request->entry_fee,
            'status' => 'active',
            'created_by' => $user->id
        ]);

        // 🔥 Generate QR (simple unique code)
        $qr = 'SESSION-' . $session->id . '-' . Str::random(5);

        $session->update([
            'qr_code' => $qr
        ]);

        return ApiResponse::success('Entry created successfully', [
            'session_id' => $session->id,
            'customer_name' => $session->customer_name,
            'phone' => $session->customer_phone,
            'entry_fee' => $session->entry_fee,
            'qr_code' => $qr
        ]);
    }

    public function dashboard()
    {
        $user = auth()->user();

        $today = Carbon::today();

        // 📊 TOTAL ENTRIES TODAY
        $totalEntries = CustomerSession::where('restaurant_id',$user->restaurant_id)
            ->whereDate('created_at',$today)
            ->count();

        // 🟢 ACTIVE CUSTOMERS (INSIDE)
        $activeCustomers = CustomerSession::where('restaurant_id',$user->restaurant_id)
            ->where('status','active')
            ->count();

        // 💰 TOTAL ENTRY COLLECTION TODAY
        $entryCollection = CustomerSession::where('restaurant_id',$user->restaurant_id)
            ->whereDate('created_at',$today)
            ->sum('entry_fee');

        // 💸 EXTRA COLLECTION (PAYMENTS)
        $extraCollection = Payment::whereDate('created_at',$today)
            ->sum('amount');

        // 📋 RECENT ENTRIES (LAST 10)
        $recentEntries = CustomerSession::where('restaurant_id',$user->restaurant_id)
            ->latest()
            ->take(10)
            ->get([
                'id',
                'customer_name',
                'customer_phone',
                'entry_fee',
                'remaining_amount',
                'status',
                'created_at'
            ]);

        // 🟡 ACTIVE SESSIONS (LIVE USERS)
        $activeSessions = CustomerSession::where('restaurant_id',$user->restaurant_id)
            ->where('status','active')
            ->get([
                'id',
                'customer_name',
                'customer_phone',
                'entry_fee',
                'used_amount',
                'remaining_amount',
                'table_id'
            ]);

        return ApiResponse::success('Dashboard data',[
            'summary' => [
                'total_entries_today' => $totalEntries,
                'active_customers' => $activeCustomers,
                'entry_collection_today' => $entryCollection,
                'extra_collection_today' => $extraCollection
            ],
            'recent_entries' => $recentEntries,
            'active_sessions' => $activeSessions
        ]);
    }

}