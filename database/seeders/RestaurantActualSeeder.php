<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Section;
use App\Models\Table;
use App\Models\MenuCategory;
use App\Models\MenuItem;
use App\Models\Addon;

class RestaurantActualSeeder extends Seeder
{
    public function run(): void
    {
        DB::beginTransaction();

        try {
            $restaurantId = 1;

            /*
            |--------------------------------------------------------------------------
            | Clean old data
            |--------------------------------------------------------------------------
            */
            Addon::where('restaurant_id', $restaurantId)->delete();
            MenuItem::where('restaurant_id', $restaurantId)->delete();
            MenuCategory::where('restaurant_id', $restaurantId)->delete();
            Table::where('restaurant_id', $restaurantId)->delete();
            Section::where('restaurant_id', $restaurantId)->delete();

            /*
            |--------------------------------------------------------------------------
            | Sections
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
            | Tables
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
            | Addons
            |--------------------------------------------------------------------------
            */
            $addonData = [
                ['Extra Cheese', 50],
                ['Butter', 25],
                ['Extra Spicy', 0],
                ['Mayonnaise', 30],
                ['Extra Sauce', 35],
                ['Cheese Dip', 45],
                ['Mint Sauce', 25],
                ['Garlic Dip', 30],
                ['Lemon Slice', 10],
                ['Extra Paneer', 80],
                ['Extra Chicken', 100],
                ['Extra Egg', 40],
            ];

            $addons = [];

            foreach ($addonData as $addon) {
                $addons[] = Addon::create([
                    'restaurant_id' => $restaurantId,
                    'name' => $addon[0],
                    'price' => $addon[1],
                    'status' => 1
                ]);
            }

            /*
            |--------------------------------------------------------------------------
            | Categories
            |--------------------------------------------------------------------------
            */
            $categoryData = [
                'SOUP OF THE DAY',
                'EGG STARTERS',
                'QUICK BITES',
                'FRENCH FRIES',
                'EUROPEAN DELIGHTS',
                'AMERICAN EXPRESS',
                'MEXICAN TOP',
                'BRITISH SPECIALS',
                'PAN ASIAN',
                'DIM SUM / MOMOS',
                'REGIONAL DELIGHTS',
                'TANDOOR ALL TIME FAVOURITE',
                'SALAD',
                'PIZZERIA 10 INCH PIZZA',
                'BURGER, PASTA, SANDWICH',
                'MAIN COURSE',
                'INDIAN MAIN COURSE',
                'PAN ASIAN MAIN COURSE',
                'DESSERT MENU',
                'ICE CREAM / SUNDAES',

                // Drinks
                'CLASSIC COCKTAILS',
                'LONG DRINKS',
                'CLARIFIED DRINKS',
                'SHOOTERS',
                'SIGNATURE COCKTAILS',
                'APERITIF',
                'SINGLE MALT',
                'BLENDED SCOTCH',
                'VODKA',
                'GIN',
                'RUM',
                'TEQUILA',
                'BRANDY & COGNAC',
                'LEQUERES',
                'RED WINE',
                'WHITE WINE',
                'CHAMPAGNE & SPARKLING',
                'BREEZER',
                'ICED TEA',
                'DRAUGHT BEER',
                'MOCKTAILS',
                'SHAKES',
            ];

            $categories = [];

            foreach ($categoryData as $name) {
                $group = in_array($name, [
                    'CLASSIC COCKTAILS',
                    'LONG DRINKS',
                    'CLARIFIED DRINKS',
                    'SHOOTERS',
                    'SIGNATURE COCKTAILS',
                    'APERITIF',
                    'SINGLE MALT',
                    'BLENDED SCOTCH',
                    'VODKA',
                    'GIN',
                    'RUM',
                    'TEQUILA',
                    'BRANDY & COGNAC',
                    'LEQUERES',
                    'RED WINE',
                    'WHITE WINE',
                    'CHAMPAGNE & SPARKLING',
                    'BREEZER',
                    'ICED TEA',
                    'DRAUGHT BEER',
                    'MOCKTAILS',
                    'SHAKES',
                ]) ? 'Bar Menu' : 'Food Menu';

                $categories[$name] = MenuCategory::create([
                    'restaurant_id' => $restaurantId,
                    'name' => $name,
                    'online_display_name' => $name,
                    'category_group' => $group,
                    'status' => 1
                ]);
            }

            /*
            |--------------------------------------------------------------------------
            | Helper
            |--------------------------------------------------------------------------
            */
            $code = 1;

            $createItem = function (
                $category,
                $name,
                $price,
                $description = null,
                $dietary = 'Veg'
            ) use (
                &$code,
                $restaurantId,
                $categories,
                $addons
            ) {
                $item = MenuItem::create([
                    'restaurant_id' => $restaurantId,
                    'category_id' => $categories[$category]->id,
                    'name' => $name,
                    'short_code' => 'ITM' . str_pad($code++, 4, '0', STR_PAD_LEFT),
                    'online_display_name' => $name,
                    'price' => $price,
                    'description' => $description,
                    'dietary' => $dietary,
                    'status' => 1,
                ]);

                $attach = collect($addons)->random(rand(1, 3))->pluck('id')->toArray();
                $item->addons()->attach($attach);
            };

            /*
            |--------------------------------------------------------------------------
            | FOOD ITEMS - PART 1
            |--------------------------------------------------------------------------
            */

            // SOUP OF THE DAY
            $createItem(
                'SOUP OF THE DAY',
                'Tom Yum Soup Veg',
                205,
                'Vegetables broth and seasonings served with crispy fried noodles',
                'Veg'
            );

            $createItem(
                'SOUP OF THE DAY',
                'Tom Yum Chicken',
                235,
                'Vegetables, chicken, eggs and seasonings served with crispy fried noodles',
                'Non Veg'
            );

            $createItem(
                'SOUP OF THE DAY',
                'Oven Roasted Tomato Soup',
                205,
                'Creamy roasted tomato soup topped with green harissa and cottage cheese croutons',
                'Veg'
            );

            $createItem(
                'SOUP OF THE DAY',
                'Manchow Soup',
                205,
                'Vegetable broth with seasonings and crispy fried noodles',
                'Veg'
            );

            $createItem(
                'SOUP OF THE DAY',
                'Manchow Soup Chicken',
                235,
                'Chicken manchow soup with egg and crispy fried noodles',
                'Non Veg'
            );

            // EGG STARTERS
            $createItem(
                'EGG STARTERS',
                'Masala Omelet',
                195,
                'Onion, tomato, green chilli, herbs and spices',
                'egg'
            );

            $createItem(
                'EGG STARTERS',
                'Egg Chilly',
                225,
                'Asian style boiled egg tossed in house special sauce',
                'egg'
            );

            $createItem(
                'EGG STARTERS',
                'Egg Bhurji',
                195,
                'Classic scrambled egg preparation',
                'egg'
            );

            // QUICK BITES
            $createItem('QUICK BITES', 'Chili Cheese Garlic Bread', 235, null, 'Veg');
            $createItem('QUICK BITES', 'Jhalapeno Cheese Dynabite', 245, null, 'Veg');
            $createItem('QUICK BITES', 'Crispy Fried Corn Peri Peri', 245, null, 'Veg');
            $createItem('QUICK BITES', 'Crispy Fried Corn Salt N Pepper', 245, null, 'Veg');
            $createItem('QUICK BITES', 'Asian Spring Roll Chili Garlic Sauce', 245, null, 'Veg');
            $createItem('QUICK BITES', 'Fully Loaded Nacho Veg', 295, null, 'Veg');
            $createItem('QUICK BITES', 'Fully Loaded Nacho Chicken', 325, null, 'Non Veg');
            $createItem('QUICK BITES', 'Paneer Pop Corn', 325, null, 'Veg');
            $createItem('QUICK BITES', 'Masala Papad', 275, null, 'Veg');
            $createItem('QUICK BITES', 'Peanut Masala', 275, null, 'Veg');

            // FRENCH FRIES
            $createItem('FRENCH FRIES', 'Salted Fries', 265, null, 'Veg');
            $createItem('FRENCH FRIES', 'Peri Peri Fries', 275, null, 'Veg');
            $createItem('FRENCH FRIES', 'Mexican Veggie Loaded Fries', 325, null, 'Veg');
            $createItem('FRENCH FRIES', 'Pulled Chicken And Cheese Loaded Fries', 345, null, 'Non Veg');
            $createItem('FRENCH FRIES', 'Potato Wedges', 265, null, 'Veg');

            // EUROPEAN DELIGHTS
            $createItem(
                'EUROPEAN DELIGHTS',
                'Bruschetta Veg',
                245,
                'Plum tomato, bocconcini cheese, pesto and balsamic reduction',
                'Veg'
            );

            $createItem(
                'EUROPEAN DELIGHTS',
                'Tangy 65 Wings',
                325,
                'Chicken wings marinated in spices and yogurt finished in tangy sauce',
                'Non Veg'
            );

            // AMERICAN EXPRESS
            $createItem(
                'AMERICAN EXPRESS',
                'Crispy Fried Wings BBQ',
                345,
                'Winglets and drumettes finished in BBQ sauce',
                'Non Veg'
            );

            $createItem(
                'AMERICAN EXPRESS',
                'Crispy Fried Wings Peri Peri',
                345,
                'Winglets and drumettes finished in peri peri seasoning',
                'Non Veg'
            );

            $createItem(
                'AMERICAN EXPRESS',
                'Crispy Fried Wings Buffalo Creamy',
                345,
                'Winglets and drumettes finished in buffalo creamy sauce',
                'Non Veg'
            );

            // MEXICAN TOP
            $createItem(
                'MEXICAN TOP',
                'Cottage Cheese Quesadilla',
                325,
                'Flour tortilla stuffed with grilled cottage cheese mix',
                'Veg'
            );

            $createItem(
                'MEXICAN TOP',
                'Chicken Quesadilla',
                345,
                'Flour tortilla stuffed with grilled chicken mix',
                'Non Veg'
            );

            // BRITISH SPECIALS
            $createItem(
                'BRITISH SPECIALS',
                'Chicken Tender Honey Mustard BBQ',
                285,
                'Panko crumb fried chicken tenders with honey mustard and BBQ',
                'Non Veg'
            );

            $createItem(
                'BRITISH SPECIALS',
                'Fish Finger Jalapeno Tartar Sauce',
                325,
                'Crispy fish finger with jalapeno tartar',
                'Non Veg'
            );

            // PAN ASIAN
            $createItem('PAN ASIAN', 'Wok Tossed Chilli Paneer', 295, null, 'Veg');
            $createItem('PAN ASIAN', 'Crispy Fried Cauliflower', 275, null, 'Veg');
            $createItem('PAN ASIAN', 'Drums Of Heaven', 345, null, 'Non Veg');
            $createItem('PAN ASIAN', 'Panfried Chilly Fish', 325, null, 'Non Veg');
            $createItem('PAN ASIAN', 'Kung Pao Chicken', 325, null, 'Non Veg');
            $createItem('PAN ASIAN', 'Schezwan Prawns', 395, null, 'Non Veg');
            $createItem('PAN ASIAN', 'Butter Garlic Prawns', 395, null, 'Non Veg');

            // DIM SUM / MOMOS
            $createItem('DIM SUM / MOMOS', 'Spinach & Corn Dim Sum', 325, null, 'Veg');
            $createItem('DIM SUM / MOMOS', 'Veg Crystal Dim Sum', 325, null, 'Veg');
            $createItem('DIM SUM / MOMOS', 'Veg Momos', 275, null, 'Veg');
            $createItem('DIM SUM / MOMOS', 'Chicken Gyoza', 365, null, 'Non Veg');
            $createItem('DIM SUM / MOMOS', 'Poach Chicken Dim Sum', 365, null, 'Non Veg');
            $createItem('DIM SUM / MOMOS', 'Coriander Chicken Dim Sum', 365, null, 'Non Veg');
            $createItem('DIM SUM / MOMOS', 'Prawn Hargao', 455, null, 'Non Veg');
            $createItem('DIM SUM / MOMOS', 'Chicken Momos', 325, null, 'Non Veg');

            // REGIONAL DELIGHTS
            $createItem('REGIONAL DELIGHTS', 'Baby Corn Pepper Fry', 285, null, 'Veg');
            $createItem('REGIONAL DELIGHTS', 'Mushroom Pepper Fry', 295, null, 'Veg');
            $createItem('REGIONAL DELIGHTS', 'BLR Chicken Kebab', 285, null, 'Non Veg');
            $createItem('REGIONAL DELIGHTS', 'Coorg Chicken Roast', 295, null, 'Non Veg');

            // Split combo item
            $createItem('REGIONAL DELIGHTS', 'Ghee Roast Paneer', 295, null, 'Veg');
            $createItem('REGIONAL DELIGHTS', 'Ghee Roast Chicken', 315, null, 'Non Veg');
            $createItem('REGIONAL DELIGHTS', 'Ghee Roast Prawn', 365, null, 'Non Veg');

            $createItem('REGIONAL DELIGHTS', 'Chicken Chettinad Dry', 315, null, 'Non Veg');
            $createItem('REGIONAL DELIGHTS', 'Guntur Chicken Dry', 315, null, 'Non Veg');
            $createItem('REGIONAL DELIGHTS', 'Pepper Chicken Dry', 315, null, 'Non Veg');
            $createItem('REGIONAL DELIGHTS', 'Andhra Chilli Chicken', 315, null, 'Non Veg');
            $createItem('REGIONAL DELIGHTS', 'Chicken Sukka', 315, null, 'Non Veg');
            $createItem('REGIONAL DELIGHTS', 'Mutton Sukka', 499, null, 'Non Veg');
            $createItem('REGIONAL DELIGHTS', 'Shavige With Chicken', 365, null, 'Non Veg');

            // TANDOOR ALL TIME FAVOURITE
            $createItem('TANDOOR ALL TIME FAVOURITE', 'Paneer Peri Peri Tikka', 325, null, 'Veg');
            $createItem('TANDOOR ALL TIME FAVOURITE', 'Hara Bhara Kebab', 265, null, 'Veg');
            $createItem('TANDOOR ALL TIME FAVOURITE', 'Stuffed Mushrooms Clay Oven Baked', 325, null, 'Veg');
            $createItem('TANDOOR ALL TIME FAVOURITE', 'Peri Peri Dusted Malai Broccoli', 325, null, 'Veg');
            $createItem('TANDOOR ALL TIME FAVOURITE', 'Chicken Tikka', 345, null, 'Non Veg');

            // Split half/full
            $createItem('TANDOOR ALL TIME FAVOURITE', 'Tandoori Chicken Half', 375, null, 'Non Veg');
            $createItem('TANDOOR ALL TIME FAVOURITE', 'Tandoori Chicken Full', 645, null, 'Non Veg');

            $createItem('TANDOOR ALL TIME FAVOURITE', 'Tandoori Wings', 325, null, 'Non Veg');
            $createItem('TANDOOR ALL TIME FAVOURITE', 'Ajwain Fish Tikka', 345, null, 'Non Veg');
            $createItem('TANDOOR ALL TIME FAVOURITE', 'Afghani Chicken Tangadi Kabab', 395, null, 'Non Veg');

            // SALAD
            $createItem('SALAD', 'Caesar Veg Salad', 295, null, 'Veg');
            $createItem('SALAD', 'Caesar Chicken Salad', 325, null, 'Non Veg');
            $createItem('SALAD', 'Greek Salad Veg', 295, null, 'Veg');
            $createItem('SALAD', 'Exotic Fruits And Creamy Salad', 295, null, 'Veg');
            $createItem('SALAD', 'Green Salad', 225, null, 'Veg');
            $createItem('SALAD', 'Kosambari Salad', 255, null, 'Veg');

            // Split diet salad
            $createItem('SALAD', 'Diet Salad Veg', 235, null, 'Veg');
            $createItem('SALAD', 'Diet Salad Chicken', 255, null, 'Non Veg');
            $createItem('SALAD', 'Diet Salad Paneer', 275, null, 'Veg');

            // PIZZERIA
            $createItem('PIZZERIA 10 INCH PIZZA', 'Classic Margherita Pizza', 395, null, 'Veg');
            $createItem('PIZZERIA 10 INCH PIZZA', 'Pesto Veg Pizza', 389, null, 'Veg');
            $createItem('PIZZERIA 10 INCH PIZZA', 'Pesto Chicken Pizza', 445, null, 'Non Veg');
            $createItem('PIZZERIA 10 INCH PIZZA', 'BBQ Chicken Pizza', 425, null, 'Non Veg');
            $createItem('PIZZERIA 10 INCH PIZZA', 'BLR Peri Peri Paneer Pizza', 389, null, 'Veg');
            $createItem('PIZZERIA 10 INCH PIZZA', 'BLR Spicy Peri Peri Chicken Pizza', 445, null, 'Non Veg');
            $createItem('PIZZERIA 10 INCH PIZZA', 'Fresh Exotic Veg Pizza', 389, null, 'Veg');
            $createItem('PIZZERIA 10 INCH PIZZA', 'Chicken Pepperoni Pizza', 445, null, 'Non Veg');

            // Split regional special pizza
            $createItem('PIZZERIA 10 INCH PIZZA', 'Chettinad Paneer Pizza', 425, null, 'Veg');
            $createItem('PIZZERIA 10 INCH PIZZA', 'Chettinad Chicken Pizza', 465, null, 'Non Veg');
            $createItem('PIZZERIA 10 INCH PIZZA', 'Ghee Roast Paneer Pizza', 425, null, 'Veg');
            $createItem('PIZZERIA 10 INCH PIZZA', 'Ghee Roast Chicken Pizza', 465, null, 'Non Veg');
            $createItem('PIZZERIA 10 INCH PIZZA', 'Guntur Paneer Pizza', 425, null, 'Veg');
            $createItem('PIZZERIA 10 INCH PIZZA', 'Guntur Chicken Pizza', 465, null, 'Non Veg');
            $createItem('PIZZERIA 10 INCH PIZZA', 'Chicken Tikka Pizza', 465, null, 'Non Veg');

            // BURGER, PASTA, SANDWICH
            $createItem('BURGER, PASTA, SANDWICH', 'Grilled Chicken Sandwich', 265, null, 'Non Veg');
            $createItem('BURGER, PASTA, SANDWICH', 'Grilled Chicken Burger', 345, null, 'Non Veg');
            $createItem('BURGER, PASTA, SANDWICH', 'Fried Veg Burger', 325, null, 'Veg');

            // Pasta variants
            $createItem('BURGER, PASTA, SANDWICH', 'Veg Pasta', 365, null, 'Veg');
            $createItem('BURGER, PASTA, SANDWICH', 'Chicken Pasta', 389, null, 'Non Veg');
            $createItem('BURGER, PASTA, SANDWICH', 'Prawn Pasta', 445, null, 'Non Veg');

            // MAIN COURSE
            $createItem('MAIN COURSE', 'Fresh Herb Grilled Chicken Steak', 425, null, 'Non Veg');
            $createItem('MAIN COURSE', 'Grilled Fish With Lemon Butter Sauce', 475, null, 'Non Veg');
            $createItem('MAIN COURSE', 'Peri Peri Grilled Paneer', 405, null, 'Veg');
            $createItem('MAIN COURSE', 'Fish & Chips', 425, null, 'Non Veg');

            // INDIAN MAIN COURSE
            $createItem('INDIAN MAIN COURSE', 'Kadai Paneer', 325, null, 'Veg');
            $createItem('INDIAN MAIN COURSE', 'Kadai Vegetable', 325, null, 'Veg');
            $createItem('INDIAN MAIN COURSE', 'Subzi Punjabi', 325, null, 'Veg');
            $createItem('INDIAN MAIN COURSE', 'Palak Paneer', 325, null, 'Veg');
            $createItem('INDIAN MAIN COURSE', 'Mix Veg Jaypuri', 325, null, 'Veg');
            $createItem('INDIAN MAIN COURSE', 'Dingri Mutter', 325, null, 'Veg');

            $createItem('INDIAN MAIN COURSE', 'Dal Bukhara', 275, null, 'Veg');
            $createItem('INDIAN MAIN COURSE', 'Dal Tadka', 255, null, 'Veg');
            $createItem('INDIAN MAIN COURSE', 'Dal Fry', 255, null, 'Veg');

            $createItem('INDIAN MAIN COURSE', 'Murgh Tikka Lababdar', 365, null, 'Non Veg');
            $createItem('INDIAN MAIN COURSE', 'Chicken Panjabi Raan', 365, null, 'Non Veg');
            $createItem('INDIAN MAIN COURSE', 'Murgh Kuncharan', 365, null, 'Non Veg');
            $createItem('INDIAN MAIN COURSE', 'Chicken Tava Masala', 365, null, 'Non Veg');

            $createItem('INDIAN MAIN COURSE', 'Mutton Rogan Josh', 499, null, 'Non Veg');
            $createItem('INDIAN MAIN COURSE', 'Mutton Bhuna Ghosh', 499, null, 'Non Veg');

            $createItem('INDIAN MAIN COURSE', 'Vegetable Dum Biryani', 365, null, 'Veg');
            $createItem('INDIAN MAIN COURSE', 'Chicken Dum Biryani', 385, null, 'Non Veg');
            $createItem('INDIAN MAIN COURSE', 'Chicken Donne Biryani', 385, null, 'Non Veg');
            $createItem('INDIAN MAIN COURSE', 'Mutton Donne Biryani', 445, null, 'Non Veg');

            $createItem('INDIAN MAIN COURSE', 'Steam Rice', 199, null, 'Veg');
            $createItem('INDIAN MAIN COURSE', 'Dal Khichdi', 265, null, 'Veg');
            $createItem('INDIAN MAIN COURSE', 'Curd Rice', 265, null, 'Veg');
            $createItem('INDIAN MAIN COURSE', 'Extra Curd', 40, null, 'Veg');
            $createItem('INDIAN MAIN COURSE', 'Raita', 40, null, 'Veg');
            $createItem('INDIAN MAIN COURSE', 'Salan', 40, null, 'Veg');
            $createItem('INDIAN MAIN COURSE', 'Kachumber', 40, null, 'Veg');
            $createItem('INDIAN MAIN COURSE', 'Roti', 45, null, 'Veg');
            $createItem('INDIAN MAIN COURSE', 'Naan', 45, null, 'Veg');
            $createItem('INDIAN MAIN COURSE', 'Butter Naan', 45, null, 'Veg');
            $createItem('INDIAN MAIN COURSE', 'Garlic Naan', 45, null, 'Veg');

            // PAN ASIAN MAIN COURSE
            $createItem('PAN ASIAN MAIN COURSE', 'Asian Fried Rice Veg', 285, null, 'Veg');
            $createItem('PAN ASIAN MAIN COURSE', 'Asian Fried Rice Egg', 315, null, 'egg');
            $createItem('PAN ASIAN MAIN COURSE', 'Asian Fried Rice Chicken', 335, null, 'Non Veg');
            $createItem('PAN ASIAN MAIN COURSE', 'Asian Fried Rice Prawns', 385, null, 'Non Veg');

            $createItem('PAN ASIAN MAIN COURSE', 'Hakka Noodles Veg', 285, null, 'Veg');
            $createItem('PAN ASIAN MAIN COURSE', 'Hakka Noodles Egg', 315, null, 'egg');
            $createItem('PAN ASIAN MAIN COURSE', 'Hakka Noodles Chicken', 335, null, 'Non Veg');
            $createItem('PAN ASIAN MAIN COURSE', 'Hakka Noodles Prawns', 385, null, 'Non Veg');

            $createItem('PAN ASIAN MAIN COURSE', 'Thai Red Curry Veg With Jasmine Rice', 355, null, 'Veg');
            $createItem('PAN ASIAN MAIN COURSE', 'Thai Red Curry Chicken With Jasmine Rice', 395, null, 'Non Veg');
            $createItem('PAN ASIAN MAIN COURSE', 'Thai Red Curry Prawns With Jasmine Rice', 455, null, 'Non Veg');

            $createItem('PAN ASIAN MAIN COURSE', 'Thai Green Curry Veg With Jasmine Rice', 355, null, 'Veg');
            $createItem('PAN ASIAN MAIN COURSE', 'Thai Green Curry Chicken With Jasmine Rice', 395, null, 'Non Veg');
            $createItem('PAN ASIAN MAIN COURSE', 'Thai Green Curry Prawns With Jasmine Rice', 455, null, 'Non Veg');

            $createItem('PAN ASIAN MAIN COURSE', 'Steam Jasmine Rice', 205, null, 'Veg');

            // DESSERT MENU
            $createItem('DESSERT MENU', 'Walnut Brownie', 195, null, 'Veg');
            $createItem('DESSERT MENU', 'Walnut Sizzling Brownie', 255, null, 'Veg');
            $createItem('DESSERT MENU', 'Molten Lava Cake With Ice Cream And Chocolate Sauce', 225, null, 'Veg');
            $createItem('DESSERT MENU', 'Tres Leches', 225, null, 'Veg');

            // ICE CREAM / SUNDAES
            $createItem('ICE CREAM / SUNDAES', 'Vanilla Ice Cream (2 Scoops)', 195, null, 'Veg');
            $createItem('ICE CREAM / SUNDAES', 'Chocolate Ice Cream (2 Scoops)', 195, null, 'Veg');
            $createItem('ICE CREAM / SUNDAES', 'Strawberry Ice Cream (2 Scoops)', 195, null, 'Veg');
            $createItem('ICE CREAM / SUNDAES', 'Mango Ice Cream (2 Scoops)', 195, null, 'Veg');
            $createItem('ICE CREAM / SUNDAES', 'Butter Scotch Ice Cream (2 Scoops)', 195, null, 'Veg');

            /*
            |--------------------------------------------------------------------------
            | DRINKS (New Menu Price used)
            |--------------------------------------------------------------------------
            */
            $drinkItems = [

                'CLASSIC COCKTAILS' => [
                    ['Whiskey Sour', 599],
                    ['Old Fashioned', 599],
                    ['Manhattan', 599],
                    ['Penicillin', 599],
                    ['Whiskey Smash', 599],
                    ['Cosmopolitan', 499],
                    ['Sex On The Beach', 499],
                    ['Bloody Mary', 499],
                    ['White Russian', 499],
                    ['Sea Breeze', 499],
                    ['Margarita', 699],
                    ['Tequila Sunrise', 699],
                    ['Picante', 699],
                    ['Paloma', 699],
                    ['French 75', 499],
                    ['Martini', 499],
                    ['Bramble', 499],
                    ['Gimlet', 499],
                    ['Negroni', 699],
                    ['Bees Knees', 699],
                    ['Daiquiry', 499],
                    ['Mojito', 699],
                    ['Mai Tai', 699],
                    ['Pina Colada', 499],
                    ['Hot Toddy', 399],
                    ['Side Car', 399],
                    ['Sangria Red', 549],
                    ['Sangria White', 549],
                    ['Bellini', 549],
                    ['Mimosa', 549],
                ],

                'LONG DRINKS' => [
                    ['LIIT', 799],
                    ['Bull Frog', 799],
                    ['Long Beach Ice Tea', 799],
                    ['Texas Tea', 799],
                    ['Yellow Gold', 799],
                    ['Green View', 799],
                    ['Midnight Gossip', 799],
                ],

                'CLARIFIED DRINKS' => [
                    ['Clarified Pina Colada', 599],
                    ['Mango Tajin', 599],
                ],

                'SHOOTERS' => [
                    ['Kamakaze', 499],
                    ['Jager Bomb', 499],
                    ['B52', 799],
                    ['Alien Brain Haemorage', 699],
                    ['CSW', 499],
                    ['Blow Job', 699],
                ],

                'SIGNATURE COCKTAILS' => [
                    ['Yin Yang', 499],
                    ['Tipssy Sparrow', 499],
                    ['Blue Welkin', 499],
                    ['Merry Berry', 499],
                    ['Smokey Panther', 499],
                    ['Meow Jito', 499],
                    ['My Guilty Pleasure', 499],
                    ['Spice On The Rocks', 499],
                    ['Mexican Vampire', 499],
                    ['Dark Knight', 499],
                ],

                'APERITIF' => [
                    ['Campari', 275],
                    ['Martini Bianco', 275],
                    ['Martini Extra Dry', 275],
                    ['Martini Rosso', 275],
                ],

                'SINGLE MALT' => [
                    ['Glenlivet 12Yrs', 799],
                    ['Glenfiddich 12Yr', 799],
                    ['Laphroaig 10Yr', 799],
                    ['Talisker 10Yr', 799],
                    ['Amrut Fusion', 499],
                    ['Amrut Amalgam', 499],
                    ['Paul John Nirvana', 399],
                    ['Singleton', 799],
                ],

                'BLENDED SCOTCH' => [
                    ['Hibiki', 899],
                    ['Monkey Shoulder', 699],
                    ['Chivas Regal 12Yr', 699],
                    ['Ballantine Finest', 399],
                    ['JW Blue Label', 1999],
                    ['JW Gold Label', 699],
                    ['JW Double Black', 799],
                    ['JW Black Label', 699],
                    ['JW Red Label', 499],
                    ['Teacher 50', 399],
                    ['Teacher Highland', 399],
                    ['Dewars White Label', 399],
                    ['Black & White', 349],
                    ['100 Pipers Deluxe', 349],
                    ['Black Dog Reserve', 399],
                    ['Jameson Irish', 549],
                    ['Jim Beam White', 449],
                    ['Jack Daniels Old No 7', 649],
                    ['Makers Mark', 649],
                    ['Gentleman Jack', 649],
                    ['Toki', 699],
                ],

                'VODKA' => [
                    ['Beluga Noble', 899],
                    ['Roberto Cavalli', 799],
                    ['Titos', 699],
                    ['Grey Goose', 699],
                    ['Ciroc', 699],
                    ['Belvedere', 699],
                    ['U Luvka', 699],
                    ['Absolute', 499],
                    ['Ketel One', 499],
                    ['Skyy', 499],
                    ['Smirnoff', 299],
                    ['Stoli Salted Caramel', 499],
                ],

                'GIN' => [
                    ['Hendricks', 450],
                    ['Monkey47', 899],
                    ['Malfy', 699],
                    ['Roku', 699],
                    ['Bombay Sapphire', 399],
                    ['Bull Dog', 399],
                    ['Beefeater Pink', 399],
                    ['Tanqueray', 399],
                ],

                'RUM' => [
                    ['Captain Morgan', 299],
                    ['Bacardi Carta Blanca', 299],
                    ['Bacardi Black', 349],
                    ['Old Monk', 149],
                ],

                'TEQUILA' => [
                    ['Patron', 699],
                    ['Don Julio', 699],
                    ['Camino', 499],
                    ['Don Angle', 499],
                ],

                'BRANDY & COGNAC' => [
                    ['Henessey VS', 799],
                    ['Morpheus XO', 249],
                    ['Mansion House', 179],
                ],

                'LEQUERES' => [
                    ['Baileys', 499],
                    ['Kahlua', 449],
                    ['Jagermeister', 699],
                    ['Fireball', 199],
                    ['Absinthe', 699],
                    ['Sambuca', 499],
                ],

                'RED WINE' => [
                    ['Two Ocean Pinotage', 3199],
                    ['Jacob Creek Shiraz', 3199],
                    ['Sula Shiraz Cabernet', 2399],
                ],

                'WHITE WINE' => [
                    ['Two Ocean Sauvignon Blanc', 3199],
                    ['Jacob Creek Chardonnay', 3199],
                    ['Sula Chenin', 2399],
                ],

                'CHAMPAGNE & SPARKLING' => [
                    ['Moet Chandon', 8999],
                    ['Sula Brut', 2999],
                ],

                'BREEZER' => [
                    ['Cranberry', 319],
                    ['Jamaican Passion', 319],
                    ['Orange', 319],
                ],

                'ICED TEA' => [
                    ['Peach', 275],
                    ['Lemon', 275],
                    ['Rosemerry', 275],
                ],

                'DRAUGHT BEER' => [
                    ['Bud Premium', 329],
                    ['KF Premium', 329],
                    ['KF Ultra', 359],
                    ['Toit Basmati', 329],
                    ['Toit Hefeweizen', 229],
                    ['Toit Tint In Wit', 229],
                    ['Geist', 329],
                ],

                'MOCKTAILS' => [
                    ['Virgin Mojito', 299],
                    ['Virgin Pina Colada', 299],
                    ['Orange Farry', 299],
                    ['Black Mamba', 299],
                    ['Guava Merry', 299],
                ],

                'SHAKES' => [
                    ['Oreo Shake', 319],
                    ['Kit Kat Shake', 319],
                    ['Mango Shake', 319],
                    ['Cold Coffee', 319],
                ],
            ];

            foreach ($drinkItems as $category => $rows) {
                foreach ($rows as $drink) {
                    $createItem(
                        $category,
                        $drink[0],
                        $drink[1],
                        null,
                        'Drink'
                    );
                }
            }

            DB::commit();

            $this->command->info('RestaurantActualSeeder imported successfully');

        } catch (\Throwable $e) {
            DB::rollBack();
            throw $e;
        }
    }
}