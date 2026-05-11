<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MenuCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    protected $restaurantId = 1; // replace later with auth()->user()->restaurant_id

    public function index()
    {
        $categories = MenuCategory::withCount('items')
            ->where('restaurant_id', $this->restaurantId)
            ->latest()
            ->get();

        return view('admin.menu-discount.categories.list', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'online_display_name' => ['nullable', 'string', 'max:255'],
            'category_group' => ['nullable', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        DB::transaction(function () use ($validated, $request) {
            $category = MenuCategory::create([
                'restaurant_id' => 1,
                'name' => $validated['name'],
                'online_display_name' => $validated['online_display_name'] ?? null,
                'category_group' => $validated['category_group'] ?? null,
                'status' => 1,
            ]);

            if ($request->hasFile('image')) {
                $category
                    ->addMediaFromRequest('image')
                    ->toMediaCollection('categories');
            }
        });

        return back()->with('success', 'Category created successfully');
    }

    public function update(Request $request, MenuCategory $category)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'online_display_name' => ['nullable', 'string', 'max:255'],
            'category_group' => ['nullable', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        DB::transaction(function () use ($validated, $request, $category) {
            $category->update([
                'name' => $validated['name'],
                'online_display_name' => $validated['online_display_name'] ?? null,
                'category_group' => $validated['category_group'] ?? null,
            ]);

            if ($request->hasFile('image')) {
                $category->clearMediaCollection('categories');

                $category
                    ->addMediaFromRequest('image')
                    ->toMediaCollection('categories');
            }
        });

        return back()->with('success', 'Category updated successfully');
    }

    public function destroy(MenuCategory $category)
    {
        $category->clearMediaCollection('categories');
        $category->delete();

        return back()->with('success', 'Category deleted successfully');
    }
}