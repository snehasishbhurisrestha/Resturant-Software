<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Section;
use App\Models\Order;
use App\Helpers\ApiResponse;

class TableController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        // get sections with tables
        $sections = Section::with('tables')
            ->where('restaurant_id', $user->restaurant_id)
            ->get();

        $data = $sections->map(function ($section) {

            return [
                'section_id' => $section->id,
                'section_name' => $section->name,

                'tables' => $section->tables->map(function ($table) {

                    $activeOrder = Order::where('table_id', $table->id)
                        ->whereIn('status', ['pending','preparing','served'])
                        ->first();

                    return [
                        'id' => $table->id,
                        'table_number' => $table->table_number,
                        'capacity' => $table->capacity,
                        'status' => $activeOrder ? 'occupied' : 'available'
                    ];
                })
            ];
        });

        return ApiResponse::success(
            'Sections with tables fetched successfully',
            $data
        );
    }
}