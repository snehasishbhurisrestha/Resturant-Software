<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Table;
use App\Models\Section;

class TableController extends Controller
{
    /**
     * 📋 SECTION BASED VIEW
     */
    public function index()
    {
        $sections = Section::with(['tables.activeSession'])
            ->where('restaurant_id', auth()->user()->restaurant_id ?? 1)
            ->get();

        return view('admin.tables.index', compact('sections'));
    }

    /**
     * ➕ STORE SECTION
     */
    public function storeSection(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        Section::create([
            'restaurant_id' => auth()->user()->restaurant_id ?? 1,
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return back()->with('success', 'Section created');
    }

    /**
     * ➕ STORE TABLE (SECTION BASED)
     */
    public function store(Request $request)
    {
        $request->validate([
            'table_number' => 'required',
            'capacity' => 'required|integer|min:1',
            'section_id' => 'required'
        ]);

        Table::create([
            'restaurant_id' => auth()->user()->restaurant_id ?? 1,
            'section_id' => $request->section_id,
            'table_number' => $request->table_number,
            'capacity' => $request->capacity,
            'status' => 'available',
        ]);

        return back()->with('success', 'Table added');
    }

    public function update(Request $request, $id)
    {
        $table = Table::findOrFail($id);

        $request->validate([
            'table_number' => 'required',
            'capacity' => 'required|integer|min:1',
        ]);

        $table->update($request->only('table_number','capacity'));

        return back()->with('success', 'Updated');
    }

    public function destroy($id)
    {
        $table = Table::findOrFail($id);

        if ($table->activeSession) {
            return back()->with('error', 'Table occupied!');
        }

        $table->delete();

        return back()->with('success', 'Deleted');
    }
}