<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * 📋 Customer List
     */
    public function index()
    {
        $customers = Customer::latest()->paginate(10);

        return view('admin.customers.index', compact('customers'));
    }

    /**
     * 👤 Customer Profile
     */
    public function show($id)
    {
        $customer = Customer::with(['sessions.table'])->findOrFail($id);

        // 📊 Summary
        $totalSpent = $customer->total_spent;
        $totalVisits = $customer->total_visits;
        $totalCover = $customer->total_cover;

        // 📈 Event Count
        $eventCounts = $customer->sessions()
            ->selectRaw('event_name, COUNT(*) as total')
            ->groupBy('event_name')
            ->get();

        // ⭐ Most visited event
        $mostVisitedEvent = $eventCounts->sortByDesc('total')->first();

        // 📅 History
        $history = $customer->sessions()->latest()->get();

        return view('admin.customers.show', compact(
            'customer',
            'totalSpent',
            'totalVisits',
            'totalCover',
            'eventCounts',
            'mostVisitedEvent',
            'history'
        ));
    }
}