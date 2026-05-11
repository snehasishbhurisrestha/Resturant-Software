<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Models\Section;
use App\Models\Table;
use App\Models\MenuCategory;
use App\Models\MenuItem;
use App\Models\Addon;

class RestaurantDemoSeeder extends Seeder
{
    public function run(): void
    {
        DB::beginTransaction();

        try {

            $restaurantId = 1;

            /*
            |--------------------------------------------------------------------------
            | clean old
            |--------------------------------------------------------------------------
            */
            Addon::where('restaurant_id', $restaurantId)->delete();
            MenuItem::where('restaurant_id', $restaurantId)->delete();
            MenuCategory::where('restaurant_id', $restaurantId)->delete();
            Table::where('restaurant_id', $restaurantId)->delete();
            Section::where('restaurant_id', $restaurantId)->delete();


            /*
            |--------------------------------------------------------------------------
            | sections
            |--------------------------------------------------------------------------
            */
            $sections = [];

            foreach ([
                'Ground Floor',
                'Family Hall',
                'AC Dining',
                'Rooftop',
                'VIP Lounge'
            ] as $name) {

                $sections[] = Section::create([
                    'restaurant_id' => $restaurantId,
                    'name' => $name,
                    'is_active' => 1
                ]);
            }


            /*
            |--------------------------------------------------------------------------
            | tables
            |--------------------------------------------------------------------------
            */
            foreach ($sections as $section) {

                for ($i = 1; $i <= 12; $i++) {

                    Table::create([
                        'restaurant_id' => $restaurantId,
                        'section_id' => $section->id,
                        'table_number' => $section->name . '-' . $i,
                        'capacity' => rand(2, 8),
                        'status' => 1
                    ]);
                }
            }


            /*
            |--------------------------------------------------------------------------
            | addons
            |--------------------------------------------------------------------------
            */
            $addons = [];

            foreach ([
                ['Extra Cheese', 30],
                ['Butter', 20],
                ['Extra Spicy', 0],
                ['Mayonnaise', 15],
                ['Extra Sauce', 25],
                ['Cream', 20],
                ['Extra Shot', 40],
                ['Lemon', 10],
                ['Ice Cream Scoop', 50],
                ['Extra Paneer', 60],
            ] as $addon) {

                $addons[] = Addon::create([
                    'restaurant_id' => $restaurantId,
                    'name' => $addon[0],
                    'price' => $addon[1],
                    'status' => 1
                ]);
            }


            /*
            |--------------------------------------------------------------------------
            | categories
            |--------------------------------------------------------------------------
            */
            $categoryData = [
                'Starter',
                'Main Course',
                'Rice & Biryani',
                'Bread',
                'Soup',
                'Salad',
                'Fast Food',
                'Dessert',
                'Tea / Coffee',
                'Beverage'
            ];

            $categories = [];

            foreach ($categoryData as $name) {

                $categories[$name] = MenuCategory::create([
                    'restaurant_id' => $restaurantId,
                    'name' => $name,
                    'online_display_name' => $name,
                    'category_group' => 'Food Menu',
                    'status' => 1
                ]);
            }


            /*
            |--------------------------------------------------------------------------
            | items
            |--------------------------------------------------------------------------
            */
            $items = [

                'Starter' => [
                    ['Paneer Tikka', 220, 'veg'],
                    ['Chicken Tikka', 260, 'nonveg'],
                    ['Fish Finger', 240, 'nonveg'],
                    ['Crispy Corn', 180, 'veg'],
                    ['Veg Manchurian', 170, 'veg'],
                ],

                'Main Course' => [
                    ['Paneer Butter Masala', 260, 'veg'],
                    ['Kadai Paneer', 250, 'veg'],
                    ['Butter Chicken', 320, 'nonveg'],
                    ['Chicken Kosha', 310, 'nonveg'],
                    ['Mutton Curry', 390, 'nonveg'],
                ],

                'Rice & Biryani' => [
                    ['Veg Biryani', 220, 'veg'],
                    ['Chicken Biryani', 280, 'nonveg'],
                    ['Mutton Biryani', 360, 'nonveg'],
                    ['Jeera Rice', 120, 'veg'],
                ],

                'Bread' => [
                    ['Butter Naan', 45, 'veg'],
                    ['Garlic Naan', 55, 'veg'],
                    ['Tandoori Roti', 25, 'veg'],
                    ['Lachha Paratha', 60, 'veg'],
                ],

                'Soup' => [
                    ['Sweet Corn Soup', 110, 'veg'],
                    ['Hot & Sour Soup', 120, 'veg'],
                    ['Chicken Clear Soup', 140, 'nonveg'],
                ],

                'Salad' => [
                    ['Green Salad', 90, 'veg'],
                    ['Russian Salad', 140, 'veg'],
                ],

                'Fast Food' => [
                    ['Veg Burger', 120, 'veg'],
                    ['Chicken Burger', 160, 'nonveg'],
                    ['French Fries', 100, 'veg'],
                    ['Pizza Slice', 150, 'veg'],
                ],

                'Dessert' => [
                    ['Gulab Jamun', 60, 'veg'],
                    ['Ice Cream', 90, 'veg'],
                    ['Brownie', 130, 'veg'],
                ],

                'Tea / Coffee' => [
                    ['Masala Tea', 30, 'veg'],
                    ['Black Coffee', 70, 'veg'],
                    ['Cold Coffee', 120, 'veg'],
                ],

                'Beverage' => [
                    ['Coke', 50, 'veg'],
                    ['Sprite', 50, 'veg'],
                    ['Mineral Water', 30, 'veg'],
                    ['Fresh Lime Soda', 70, 'veg'],
                ],
            ];


            foreach ($items as $categoryName => $menuItems) {

                $category = $categories[$categoryName];

                foreach ($menuItems as $row) {

                    $item = MenuItem::create([
                        'restaurant_id' => $restaurantId,
                        'category_id' => $category->id,
                        'name' => $row[0],
                        'online_display_name' => $row[0],
                        'price' => $row[1],
                        // 'tax' => 5,
                        // 'type' => $row[2],
                        'status' => 1
                    ]);

                    /*
                    | attach random addons
                    */
                    $attach = collect($addons)
                        ->random(rand(2, 5))
                        ->pluck('id')
                        ->toArray();

                    $item->addons()->attach($attach);
                }
            }

            DB::commit();

            $this->command->info('Restaurant demo seeded successfully');

        } catch (\Throwable $e) {

            DB::rollBack();

            throw $e;
        }
    }
}