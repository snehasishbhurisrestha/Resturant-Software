<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Table;
use App\Models\Order;
use App\Models\CustomerSession;
use App\Helpers\ApiResponse;

class WaiterController extends Controller
{

    public function dashboard()
    {
        $user = auth()->user();

        // 📊 TABLES
        $tables = Table::where('restaurant_id',$user->restaurant_id)->get();

        $availableTables = 0;
        $occupiedTables = 0;

        $tableData = $tables->map(function ($table) use (&$availableTables,&$occupiedTables) {

            $activeSession = CustomerSession::where('table_id',$table->id)
                ->where('status','active')
                ->first();

            if($activeSession){
                $occupiedTables++;
            } else {
                $availableTables++;
            }

            return [
                'table_id' => $table->id,
                'table_number' => $table->table_number,
                'capacity' => $table->capacity,
                'status' => $activeSession ? 'occupied' : 'available',
                'session_id' => $activeSession?->id
            ];
        });

        // 📦 ACTIVE ORDERS
        $activeOrders = Order::with('items.item')
            ->whereIn('status',['pending','preparing'])
            ->get();

        // 🟢 ACTIVE CUSTOMERS (SESSIONS)
        $activeSessions = CustomerSession::where('restaurant_id',$user->restaurant_id)
            ->where('status','active')
            ->get([
                'id',
                'customer_name',
                'customer_phone',
                'table_id',
                'remaining_amount'
            ]);

        return ApiResponse::success('Waiter dashboard',[
            'summary' => [
                'total_tables' => $tables->count(),
                'available_tables' => $availableTables,
                'occupied_tables' => $occupiedTables,
                'active_orders' => $activeOrders->count()
            ],
            'tables' => $tableData,
            'active_sessions' => $activeSessions,
            'active_orders' => $activeOrders
        ]);
    }
}