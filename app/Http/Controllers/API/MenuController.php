<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MenuCategory;
use App\Models\MenuItem;
use App\Helpers\ApiResponse;

class MenuController extends Controller
{

    /**
     * ✅ Full Menu with Filters
     * /api/menu?search=pizza&category_id=1&type=veg&min_price=100&max_price=500
     */
    public function index(Request $request)
    {
        $query = MenuCategory::with(['items' => function ($q) use ($request) {

            $q->where('status', 1);

            // 🔍 Search
            if ($request->search) {
                $q->where('name', 'like', '%' . $request->search . '%');
            }

            // 🍗 Veg / Non-Veg Filter
            if ($request->type) {
                $q->where('type', $request->type);
            }

            // 💰 Price Filter
            if ($request->min_price) {
                $q->where('price', '>=', $request->min_price);
            }

            if ($request->max_price) {
                $q->where('price', '<=', $request->max_price);
            }

        }])->where('status', 1);

        // 📂 Category Filter
        if ($request->category_id) {
            $query->where('id', $request->category_id);
        }

        $menu = $query->get();

        return ApiResponse::success('Menu fetched successfully', $menu);
    }

    /**
     * 📂 Get All Categories
     */
    public function categories()
    {
        $categories = MenuCategory::where('status', 1)->get();

        return ApiResponse::success('Categories fetched', $categories);
    }

    /**
     * 🍽️ Category Wise Items
     * /api/menu/category/1
     */
    public function categoryItems($id)
    {
        $category = MenuCategory::with(['items' => function ($q) {
            $q->where('status', 1);
        }])->where('id', $id)->first();

        if (!$category) {
            return ApiResponse::error('Category not found');
        }

        return ApiResponse::success('Category items fetched', $category);
    }

    /**
     * 🔍 Search Items Only
     * /api/menu/search?keyword=pizza
     */
    public function search(Request $request)
    {
        $items = MenuItem::where('status', 1)
            ->when($request->keyword, function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->keyword . '%');
            })
            ->paginate(10);

        return ApiResponse::success('Search result', $items);
    }

    /**
     * 🍔 Single Item Details
     */
    public function itemDetails($id)
    {
        $item = MenuItem::with('category')->find($id);

        if (!$item) {
            return ApiResponse::error('Item not found');
        }

        return ApiResponse::success('Item details', $item);
    }

}