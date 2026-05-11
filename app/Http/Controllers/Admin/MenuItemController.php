<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MenuCategory;
use App\Models\MenuItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenuItemController extends Controller
{
    protected $restaurantId = 1; // replace later with auth()->user()->restaurant_id

    public function index()
    {
        $items = MenuItem::with('category')
            ->where('restaurant_id', $this->restaurantId)
            ->latest()
            ->paginate(16);

        $categories = MenuCategory::where('restaurant_id', $this->restaurantId)
            ->where('status', 1)
            ->orderBy('name')
            ->get();

        return view('admin.items.index', compact('items', 'categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => ['required', 'exists:menu_categories,id'],
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'min:0'],
            'description' => ['nullable', 'string'],
            'dietary' => ['nullable', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        DB::transaction(function () use ($validated, $request) {
            $item = MenuItem::create([
                'restaurant_id' => $this->restaurantId,
                'category_id' => $validated['category_id'],
                'name' => $validated['name'],
                'online_display_name' => $validated['name'],
                'price' => $validated['price'],
                'description' => $validated['description'] ?? null,
                'dietary' => $validated['dietary'] ?? null,
                'status' => 1,
            ]);

            if ($request->hasFile('image')) {
                $item
                    ->addMediaFromRequest('image')
                    ->toMediaCollection('items');
            }
        });

        return back()->with('success', 'Item created successfully');
    }

    public function update(Request $request, MenuItem $item)
    {
        $validated = $request->validate([
            'category_id' => ['required', 'exists:menu_categories,id'],
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'min:0'],
            'description' => ['nullable', 'string'],
            'dietary' => ['nullable', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        DB::transaction(function () use ($validated, $request, $item) {
            $item->update([
                'category_id' => $validated['category_id'],
                'name' => $validated['name'],
                'online_display_name' => $validated['name'],
                'price' => $validated['price'],
                'description' => $validated['description'] ?? null,
                'dietary' => $validated['dietary'] ?? null,
            ]);

            if ($request->hasFile('image')) {
                $item->clearMediaCollection('items');

                $item
                    ->addMediaFromRequest('image')
                    ->toMediaCollection('items');
            }
        });

        return back()->with('success', 'Item updated successfully');
    }

    public function destroy(MenuItem $item)
    {
        $item->clearMediaCollection('items');
        $item->delete();

        return back()->with('success', 'Item deleted successfully');
    }

    public function hide(MenuItem $item)
    {
        $item->update([
            'status' => 0
        ]);

        return back()->with('success', 'Item hidden successfully');
    }

    public function show(MenuItem $item)
    {
        $item->update([
            'status' => 1
        ]);

        return back()->with('success', 'Item visible successfully');
    }
}