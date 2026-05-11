<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MenuCategory;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{

    public function index()
    {

        $categories = MenuCategory::withCount('items')
                        ->where('restaurant_id',1)
                        ->latest()
                        ->get();

        return view('admin.menu-discount.categories.list',compact('categories'));

    }



    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required'
        ]);


        $category = MenuCategory::create([

            'restaurant_id' => 1,
            'name' => $request->name,
            'status' => 1

        ]);


        if($request->hasFile('image')){

            $category->addMediaFromRequest('image')
                     ->toMediaCollection('categories');

        }


        return back()->with('success','Category created successfully');

    }



    public function update(Request $request,$id)
    {

        $category = MenuCategory::findOrFail($id);

        $category->update([

            'name' => $request->name

        ]);


        if($request->hasFile('image')){

            $category->clearMediaCollection('categories');

            $category->addMediaFromRequest('image')
                     ->toMediaCollection('categories');

        }


        return back()->with('success','Category updated successfully');

    }



    public function destroy($id)
    {

        $category = MenuCategory::findOrFail($id);

        $category->delete();

        return back()->with('success','Category deleted successfully');

    }


    public function manage_menu()
    {
        return view('admin.menu-discount.manage_menu');

    }

    public function manage_menu_item_list()
    {
        return view('admin.menu-discount.manage_menu_item_list');
    }

    public function add_menu()
    {
        return view('admin.menu-discount.add_menu');
    }

    // Categories

    public function items_category_list()
    {
        return view('admin.menu-discount.categories.list');
    }

    public function items_category_add()
    {
        return view('admin.menu-discount.categories.add');
    }

}