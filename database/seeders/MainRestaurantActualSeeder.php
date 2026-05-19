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

class MainRestaurantActualSeeder extends Seeder
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
            $sectionsData = [
                'G Section' => ['G 1', 'G 2', 'G 3', 'G 4', 'G 5', 'G 6', 'G 7'],
                'L Section' => ['L 1', 'L 2', 'L 3', 'L 4', 'L 5'],
                'A Section' => ['A 1', 'A 2', 'A 3', 'A 4', 'A 5', 'A 6', 'A 7', 'A 8', 'A 9'],
                'B Section' => ['B 1', 'B 2'],

                'RA Section' => [
                    'RA 1', 'RA 2', 'RA 3', 'RA 4', 'RA 5',
                    'RA 6', 'RA 7', 'RA 8', 'RA 9', 'RA 10',
                    'RA 11', 'RA 12'
                ],

                'RB Section' => [
                    'RB 14', 'RB 15', 'RB 16', 'RB 17', 'RB 18',
                    'RB 19', 'RB 20', 'RB 21', 'RB 22', 'RB 23',
                    'RB 24', 'RB 25', 'RB 26', 'RB 27', 'RB 28'
                ],
            ];

            /*
            |--------------------------------------------------------------------------
            | Create Sections & Tables
            |--------------------------------------------------------------------------
            */
            foreach ($sectionsData as $sectionName => $tables) {

                $section = Section::create([
                    'restaurant_id' => $restaurantId,
                    'name' => $sectionName,
                    'is_active' => 1
                ]);

                foreach ($tables as $tableNo) {

                    Table::create([
                        'restaurant_id' => $restaurantId,
                        'section_id' => $section->id,
                        'table_number' => $tableNo,
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
            // $addonData = [
            //     ['Extra Cheese', 50],
            //     ['Butter', 25],
            //     ['Extra Spicy', 0],
            //     ['Mayonnaise', 30],
            //     ['Extra Sauce', 35],
            //     ['Cheese Dip', 45],
            //     ['Mint Sauce', 25],
            //     ['Garlic Dip', 30],
            //     ['Lemon Slice', 10],
            //     ['Extra Paneer', 80],
            //     ['Extra Chicken', 100],
            //     ['Extra Egg', 40],
            // ];

            $addons = [];

            // foreach ($addonData as $addon) {
            //     $addons[] = Addon::create([
            //         'restaurant_id' => $restaurantId,
            //         'name' => $addon[0],
            //         'price' => $addon[1],
            //         'status' => 1
            //     ]);
            // }

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
                'CLASSIC COCKTAIL',
                'TALL DRINK',
                'CLARIFIED COCKTAIL',
                'SHOOTERS',
                'SIGNATURE',
                'APERTIF',
                'SINGLE MALT',
                'BLENDED SCOTCH',
                'IRISH BOURBON TENESSEY, JAPANESE',
                'VODKA',
                'GIN',
                'RUM',
                'TEQUILA',
                'BRANDY & COGNAC',
                'LIQUERS',
                'RED WINE',
                'WHITE WINE',
                'CHAMPAGNE / SPARKLING WINE',
                'BREEZER',
                'ICED TEA',
                'DRAUGHT BEER',
                'MOCKTAIL',
                'SHAKES',
            ];

            $categories = [];

            foreach ($categoryData as $name) {
                $group = in_array($name, [
                    'CLASSIC COCKTAIL',
                    'TALL DRINK',
                    'CLARIFIED COCKTAIL',
                    'SHOOTERS',
                    'SIGNATURE',
                    'APERTIF',
                    'SINGLE MALT',
                    'BLENDED SCOTCH',
                    'IRISH BOURBON TENESSEY, JAPANESE',
                    'VODKA',
                    'GIN',
                    'RUM',
                    'TEQUILA',
                    'BRANDY & COGNAC',
                    'LIQUERS',
                    'RED WINE',
                    'WHITE WINE',
                    'CHAMPAGNE / SPARKLING WINE',
                    'BREEZER',
                    'ICED TEA',
                    'DRAUGHT BEER',
                    'MOCKTAIL',
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

                // $attach = collect($addons)->random(rand(1, 3))->pluck('id')->toArray();
                // $item->addons()->attach($attach);
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
    235,
    'Vegetables broth and seasonings served with crispy fried noodles',
    'Veg'
);

$createItem(
    'SOUP OF THE DAY',
    'Tom Yum Soup Chicken',
    320,
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
    'Manchow Soup Veg',
    235,
    'Vegetable broth with seasonings and crispy fried noodles',
    'Veg'
);

$createItem(
    'SOUP OF THE DAY',
    'Manchow Soup Chicken',
    310,
    'Chicken manchow soup with egg and crispy fried noodles',
    'Non Veg'
);


// EGG STARTERS
$createItem(
    'EGG STARTERS',
    'Masala Omelet',
    290,
    'Onion, tomato, green chilli, herbs and spices',
    'egg'
);

$createItem(
    'EGG STARTERS',
    'Egg Chilly',
    330,
    'Asian style boiled egg tossed in house special sauce',
    'egg'
);

$createItem(
    'EGG STARTERS',
    'Egg Bhurji',
    275,
    'Classic scrambled egg preparation',
    'egg'
);


// QUICK BITES
$createItem(
    'QUICK BITES',
    'Chili Cheese Garlic Bread',
    320,
    null,
    'Veg'
);

$createItem(
    'QUICK BITES',
    'Jhalapeno Cheese Dynabite',
    380,
    null,
    'Veg'
);

$createItem(
    'QUICK BITES',
    'Crispy Fried Corn Peri Peri',
    385,
    null,
    'Veg'
);

$createItem(
    'QUICK BITES',
    'Crispy Fried Corn Salt N Pepper',
    395,
    null,
    'Veg'
);

$createItem(
    'QUICK BITES',
    'Asian Spring Roll Chili Garlic Sauce',
    385,
    null,
    'Veg'
);

$createItem(
    'QUICK BITES',
    'Fully Loaded Nacho Veg',
    375,
    null,
    'Veg'
);

$createItem(
    'QUICK BITES',
    'Fully Loaded Nacho Chicken',
    535,
    null,
    'Non Veg'
);

$createItem(
    'QUICK BITES',
    'Paneer Pop Corn',
    415,
    null,
    'Veg'
);

$createItem(
    'QUICK BITES',
    'Masala Papad',
    330,
    null,
    'Veg'
);

$createItem(
    'QUICK BITES',
    'Peanut Masala',
    330,
    null,
    'Veg'
);





            // FRENCH FRIES
            $createItem('FRENCH FRIES', 'Salted Fries', 295, null, 'Veg');
            $createItem('FRENCH FRIES', 'Peri Peri Fries', 295, null, 'Veg');
            $createItem('FRENCH FRIES', 'Mexican Veggie Loaded Fries', 375, null, 'Veg');
            $createItem('FRENCH FRIES', 'Pulled Chicken And Cheese Loaded Fries', 520, null, 'Non Veg');
            $createItem('FRENCH FRIES', 'Potato Wedges', 390, null, 'Veg');

            // EUROPEAN DELIGHTS
            $createItem(
                'EUROPEAN DELIGHTS',
                'Bruschetta Veg',
                375,
                'Plum tomato, bocconcini cheese, pesto and balsamic reduction',
                'Veg'
            );

            $createItem(
                'EUROPEAN DELIGHTS',
                'Tangy 65 Wings',
                410,
                'Chicken wings marinated in spices and yogurt finished in tangy sauce',
                'Non Veg'
            );

            // AMERICAN EXPRESS
            $createItem(
                'AMERICAN EXPRESS',
                'Crispy Fried Wings Tossed In Choice Of Sauces And Seasonings',
                340,
                'winglets, drumettes bbq seasoning, baked, grilled finished in bbq sauce,peri peri, buffalo creamy sauce, bbq sauce, schezwan sauce, smokedchili sauce',
                'Non Veg'
            );

            // MEXICAN TOP
            $createItem(
                'MEXICAN TOP',
                'Cottage Cheese Quesadilla',
                345,
                'Flour tortilla stuffed with grilled cottage cheese mix, served with salsa and sour cream',
                'Veg'
            );

            $createItem(
                'MEXICAN TOP',
                'Chicken Quesadilla',
                395,
                'Flour tortilla stuffed with grilled chicken mix, served with salsa and sour cream',
                'Non Veg'
            );

            // BRITISH SPECIALS
            $createItem(
                'BRITISH SPECIALS',
                'Chicken Tender Honey Mustard and BBQ SAUCE',
                440,
                'chicken tender seasoned panko crumb fried,honey mustard,bbq sauce',
                'Non Veg'
            );

            $createItem(
                'BRITISH SPECIALS',
                'Fish Finger Jalapeno Tartar Sauce',
                520,
                'Fish Finger Seasoned, Panko Crumb Fried, Jalapeno Tartar Sauce',
                'Non Veg'
            );

            

            // PAN ASIAN
            $createItem('PAN ASIAN', 'Wok Tossed Chilli Paneer', 310, null, 'Veg');
            $createItem('PAN ASIAN', 'Crispy Fried Cauliflower', 295, null, 'Veg');
            $createItem('PAN ASIAN', 'Drums Of Heaven', 345, null, 'Non Veg');
            $createItem('PAN ASIAN', 'Panfried Chilly Fish', 390, null, 'Non Veg');
            $createItem('PAN ASIAN', 'Kung Pao Chicken', 325, null, 'Non Veg');
            $createItem('PAN ASIAN', 'Schezwan Prawns', 410, null, 'Non Veg');
            $createItem('PAN ASIAN', 'Butter Garlic Prawns', 540, null, 'Non Veg');

            // QUICK BITES
$createItem(
    'QUICK BITES',
    'Spinach & Corn Dim Sum',
    375,
    null,
    'Veg'
);

$createItem(
    'QUICK BITES',
    'Veg Crystal Dim Sum',
    385,
    null,
    'Veg'
);

$createItem(
    'QUICK BITES',
    'Veg Momos',
    320,
    null,
    'Veg'
);

$createItem(
    'QUICK BITES',
    'Chicken Gyoza',
    395,
    null,
    'Non Veg'
);

$createItem(
    'QUICK BITES',
    'Poach Chicken Dim Sum',
    435,
    null,
    'Non Veg'
);

$createItem(
    'QUICK BITES',
    'Coriander Chicken Dim Sum',
    430,
    null,
    'Non Veg'
);

$createItem(
    'QUICK BITES',
    'Prawn Hargao',
    490,
    null,
    'Non Veg'
);

$createItem(
    'QUICK BITES',
    'Chicken Momos',
    390,
    null,
    'Non Veg'
);


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
$createItem(
    'REGIONAL DELIGHTS',
    'Baby Corn Pepper Fry',
    285,
    'Tender baby corn crispy fried tossed in karavali style pepper sauce',
    'Veg'
);

$createItem(
    'REGIONAL DELIGHTS',
    'Mushroom Pepper Fry',
    295,
    'Mushrooms, bell peppers, curry leaves, fresh ground black pepper',
    'Veg'
);

$createItem(
    'REGIONAL DELIGHTS',
    'BLR Chicken Kebab',
    340,
    'South special & popular road side country style chicken kebab',
    'Non Veg'
);

$createItem(
    'REGIONAL DELIGHTS',
    'Coorg Chicken Roast',
    285,
    'Unique spices and herbs blend chicken roast preparation of coorg',
    'Non Veg'
);

$createItem(
    'REGIONAL DELIGHTS',
    'Ghee Roast Paneer',
    395,
    'Mushrooms, bell peppers, curry leaves, fresh ground black pepper',
    'Veg'
);

$createItem(
    'REGIONAL DELIGHTS',
    'Ghee Roast Chicken',
    440,
    'Mushrooms, bell peppers, curry leaves, fresh ground black pepper',
    'Non Veg'
);

$createItem(
    'REGIONAL DELIGHTS',
    'Ghee Roast Prawn',
    480,
    'Mushrooms, bell peppers, curry leaves, fresh ground black pepper',
    'Non Veg'
);

$createItem(
    'REGIONAL DELIGHTS',
    'Chicken Chettinad Dry',
    440,
    'Chettinad is a place in tamil nadu, it has his own uniqueness, must try',
    'Non Veg'
);

$createItem(
    'REGIONAL DELIGHTS',
    'Guntur Chicken Dry',
    435,
    'Tender chicken chunks slow cooked and dry roasted',
    'Non Veg'
);



$createItem(
    'REGIONAL DELIGHTS',
    'Pepper Chicken Dry',
    430,
    'Chicken cooked with curry leaves, crushed pepper, coconut oil, ginger garlic paste, salt, turmeric, coriander seeds',
    'Non Veg'
);

$createItem(
    'REGIONAL DELIGHTS',
    'Andhra Chilli Chicken',
    445,
    'Chicken with bone, spiced with green chilly, garlic and vinegar',
    'Non Veg'
);

$createItem(
    'REGIONAL DELIGHTS',
    'Chicken Sukka',
    455,
    'Chicken freshly ground sukkah masala and coconut',
    'Non Veg'
);

$createItem(
    'REGIONAL DELIGHTS',
    'Mutton Sukka',
    520,
    'Mutton freshly ground sukkah masala and coconut',
    'Non Veg'
);

$createItem(
    'REGIONAL DELIGHTS',
    'Shavige With Chicken',
    480,
    'Chicken curry with rice vermicelli',
    'Non Veg'
);


// TANDOOR ALL TIME FAVOURITE
$createItem(
    'TANDOOR ALL TIME FAVOURITE',
    'Paneer Peri Peri Tikka',
    410,
    'Paneer chunks marinated in yoghurt and peri peri spices',
    'Veg'
);

$createItem(
    'TANDOOR ALL TIME FAVOURITE',
    'Hara Bhara Kebab',
    430,
    'Minced vegetable, spices, herbs, patty shallow tawafried',
    'Veg'
);

$createItem(
    'TANDOOR ALL TIME FAVOURITE',
    'Stuffed Mushrooms Clay Oven Baked',
    440,
    'Cheese, paneer, spices mix stuffed mushroom, melts in mouth',
    'Veg'
);

$createItem(
    'TANDOOR ALL TIME FAVOURITE',
    'Peri Peri Dusted Malai Broccoli',
    425,
    'Broccoli marinated with cheese and hung curd, spices cooked with clay pot, melts in mouth',
    'Veg'
);




           
$createItem(
    'TANDOOR ALL TIME FAVOURITE',
    'Chicken Tikka',
    475,
    'Chicken tender chunks, kashmiri chili and spices marinated, clay oven finished',
    'Non Veg'
);

$createItem(
    'TANDOOR ALL TIME FAVOURITE',
    'Tandoori Chicken Half',
    520,
    'Whole tandoori bird marinated in tandoori spices overnight, finished in tandoor',
    'Non Veg'
);

$createItem(
    'TANDOOR ALL TIME FAVOURITE',
    'Tandoori Chicken Full',
    880,
    'Whole tandoori bird marinated in tandoori spices overnight, finished in tandoor',
    'Non Veg'
);

$createItem(
    'TANDOOR ALL TIME FAVOURITE',
    'Tandoori Wings',
    460,
    null,
    'Non Veg'
);

$createItem(
    'TANDOOR ALL TIME FAVOURITE',
    'Ajwain Fish Tikka',
    580,
    'Fish cubes tandoori marinated hint of ajwain clay oven cooked',
    'Non Veg'
);

$createItem(
    'TANDOOR ALL TIME FAVOURITE',
    'Afghani Chicken Tangadi Kabab',
    585,
    'Chicken curry with rice vermicelli',
    'Non Veg'
);


// SALAD
$createItem(
    'SALAD',
    'Caesar Salad Veg',
    340,
    'The century old salad with crisp romaine lettuce, parmesan cheese shaved, savory caesar dressing crunchy croutons in a timeless ensemble',
    'Veg'
);

$createItem(
    'SALAD',
    'Caesar Salad Chicken',
    380,
    'The century old salad with crisp romaine lettuce, parmesan cheese shaved, savory caesar dressing crunchy croutons in a timeless ensemble',
    'Non Veg'
);

$createItem(
    'SALAD',
    'Greek Salad Veg',
    295,
    'Juicy tomato, cucumber, red onion tossed in lemon vinaigrette with feta cheese, green olive and black olive',
    'Veg'
);

$createItem(
    'SALAD',
    'Exotic Fruits And Creamy Salad',
    340,
    'Green & red apple, pineapple, guava, mint yogurt dressing and roasted nuts',
    'Veg'
);

$createItem(
    'SALAD',
    'Green Salad',
    265,
    'Cucumber, tomato, carrot, onion & greens',
    'Veg'
);

$createItem(
    'SALAD',
    'Kosambari Salad',
    320,
    'Cucumber, shredded carrot, raw mango, soaked moong dal, curry leaves, grated coconut, lime juice salt & pepper',
    'Veg'
);



$createItem(
    'SALAD',
    'Diet Salad Veg',
    295,
    'Shredded lettuce, red apple, dice tomato, dice onion with guest choice dressing and guest choices topping',
    'Veg'
);

$createItem(
    'SALAD',
    'Diet Salad Chicken',
    320,
    'Shredded lettuce, red apple, dice tomato, dice onion with guest choice dressing and guest choices topping',
    'Non Veg'
);

$createItem(
    'SALAD',
    'Diet Salad Paneer',
    220,
    'Shredded lettuce, red apple, dice tomato, dice onion with guest choice dressing and guest choices topping',
    'Veg'
);



            // PIZZERIA
            $createItem('PIZZERIA 10 INCH PIZZA', 'Classic Margherita Pizza', 510, null, 'Veg');
            $createItem('PIZZERIA 10 INCH PIZZA', 'Pesto Veg Pizza', 540, null, 'Veg');
            $createItem('PIZZERIA 10 INCH PIZZA', 'Pesto Chicken Pizza', 620, null, 'Non Veg');
            $createItem('PIZZERIA 10 INCH PIZZA', 'BBQ Chicken Pizza', 620, null, 'Non Veg');
            $createItem('PIZZERIA 10 INCH PIZZA', 'BLR Peri Peri Paneer Pizza', 610, null, 'Veg');
            $createItem('PIZZERIA 10 INCH PIZZA', 'BLR Spicy Peri Peri Chicken Pizza', 640, null, 'Non Veg');
            $createItem('PIZZERIA 10 INCH PIZZA', 'Fresh Exotic Veg Pizza', 640, null, 'Veg');
            $createItem('PIZZERIA 10 INCH PIZZA', 'Chicken Pepperoni Pizza', 640, null, 'Non Veg');

            // Split regional special pizza
            $createItem('PIZZERIA 10 INCH PIZZA', 'Chettinad Paneer Pizza', 580, null, 'Veg');
            $createItem('PIZZERIA 10 INCH PIZZA', 'Chettinad Chicken Pizza', 640, null, 'Non Veg');
            $createItem('PIZZERIA 10 INCH PIZZA', 'Ghee Roast Paneer Pizza', 580, null, 'Veg');
            $createItem('PIZZERIA 10 INCH PIZZA', 'Ghee Roast Chicken Pizza', 640, null, 'Non Veg');
            $createItem('PIZZERIA 10 INCH PIZZA', 'Guntur Paneer Pizza', 580, null, 'Veg');
            $createItem('PIZZERIA 10 INCH PIZZA', 'Guntur Chicken Pizza', 640, null, 'Non Veg');
            $createItem('PIZZERIA 10 INCH PIZZA', 'Chicken Tikka Pizza', 640, null, 'Non Veg');

            // BURGER, PASTA, SANDWICH
            $createItem('BURGER, PASTA, SANDWICH', 'Grilled Chicken Sandwich', 340, null, 'Non Veg');
            $createItem('BURGER, PASTA, SANDWICH', 'Grilled Chicken Burger', 380, null, 'Non Veg');
            $createItem('BURGER, PASTA, SANDWICH', 'Fried Veg Burger', 380, null, 'Veg');

            // Pasta variants
            $createItem('BURGER, PASTA, SANDWICH', 'Veg Pasta', 380, null, 'Veg');
            $createItem('BURGER, PASTA, SANDWICH', 'Chicken Pasta', 480, null, 'Non Veg');
            $createItem('BURGER, PASTA, SANDWICH', 'Prawn Pasta', 520, null, 'Non Veg');

            // MAIN COURSE
            $createItem('MAIN COURSE', 'Fresh Herb Grilled Chicken Steak', 485, null, 'Non Veg');
            $createItem('MAIN COURSE', 'Grilled Fish With Lemon Butter Sauce', 560, null, 'Non Veg');
            $createItem('MAIN COURSE', 'Peri Peri Grilled Paneer', 520, null, 'Veg');
            $createItem('MAIN COURSE', 'Fish & Chips', 595, null, 'Non Veg');

            // INDIAN MAIN COURSE
            $createItem('INDIAN MAIN COURSE', 'Kadai Paneer', 395, null, 'Veg');
            $createItem('INDIAN MAIN COURSE', 'Kadai Vegetable', 395, null, 'Veg');
            $createItem('INDIAN MAIN COURSE', 'Subzi Punjabi', 395, null, 'Veg');
            $createItem('INDIAN MAIN COURSE', 'Palak Paneer', 395, null, 'Veg');
            $createItem('INDIAN MAIN COURSE', 'Mix Veg Jaypuri', 395, null, 'Veg');
            $createItem('INDIAN MAIN COURSE', 'Dingri Mutter', 395, null, 'Veg');

            $createItem('INDIAN MAIN COURSE', 'Dal Bukhara', 360, null, 'Veg');
            $createItem('INDIAN MAIN COURSE', 'Dal Tadka', 390, null, 'Veg');
            $createItem('INDIAN MAIN COURSE', 'Dal Fry', 365, null, 'Veg');

            $createItem('INDIAN MAIN COURSE', 'Murgh Tikka Lababdar', 460, null, 'Non Veg');
            $createItem('INDIAN MAIN COURSE', 'Chicken Panjabi Raan', 460, null, 'Non Veg');
            $createItem('INDIAN MAIN COURSE', 'Murgh Kuncharan', 460, null, 'Non Veg');
            $createItem('INDIAN MAIN COURSE', 'Chicken Tava Masala', 460, null, 'Non Veg');

            $createItem('INDIAN MAIN COURSE', 'Mutton Rogan Josh', 655, null, 'Non Veg');
            $createItem('INDIAN MAIN COURSE', 'Mutton Bhuna Ghosh', 655, null, 'Non Veg');

            $createItem('INDIAN MAIN COURSE', 'Vegetable Dum Biryani', 430, null, 'Veg');
            $createItem('INDIAN MAIN COURSE', 'Chicken Dum Biryani', 510, null, 'Non Veg');
            $createItem('INDIAN MAIN COURSE', 'Chicken Donne Biryani', 430, null, 'Non Veg');
            $createItem('INDIAN MAIN COURSE', 'Mutton Donne Biryani', 510, null, 'Non Veg');

            $createItem('INDIAN MAIN COURSE', 'Steam Rice', 240, null, 'Veg');
            $createItem('INDIAN MAIN COURSE', 'Dal Khichdi', 320, null, 'Veg');
            $createItem('INDIAN MAIN COURSE', 'Curd Rice', 265, null, 'Veg');
            $createItem('INDIAN MAIN COURSE', 'Extra Curd', 40, null, 'Veg');
            $createItem('INDIAN MAIN COURSE', 'Raita', 40, null, 'Veg');
            $createItem('INDIAN MAIN COURSE', 'Salan', 40, null, 'Veg');
            $createItem('INDIAN MAIN COURSE', 'Kachumber', 40, null, 'Veg');
            $createItem('INDIAN MAIN COURSE', 'Roti', 90, null, 'Veg');
            $createItem('INDIAN MAIN COURSE', 'Naan', 95, null, 'Veg');
            $createItem('INDIAN MAIN COURSE', 'Butter Naan', 105, null, 'Veg');
            $createItem('INDIAN MAIN COURSE', 'Garlic Naan', 110, null, 'Veg');

            // PAN ASIAN MAIN COURSE
            $createItem('PAN ASIAN MAIN COURSE', 'Asian Fried Rice Veg', 315, null, 'Veg');
            $createItem('PAN ASIAN MAIN COURSE', 'Asian Fried Rice Egg', 335, null, 'egg');
            $createItem('PAN ASIAN MAIN COURSE', 'Asian Fried Rice Chicken', 385, null, 'Non Veg');
            $createItem('PAN ASIAN MAIN COURSE', 'Asian Fried Rice Prawns', 385, null, 'Non Veg');

            $createItem('PAN ASIAN MAIN COURSE', 'Hakka Noodles Veg', 315, null, 'Veg');
            $createItem('PAN ASIAN MAIN COURSE', 'Hakka Noodles Egg', 335, null, 'egg');
            $createItem('PAN ASIAN MAIN COURSE', 'Hakka Noodles Chicken', 385, null, 'Non Veg');
            $createItem('PAN ASIAN MAIN COURSE', 'Hakka Noodles Prawns', 385, null, 'Non Veg');

            $createItem('PAN ASIAN MAIN COURSE', 'Thai Red Curry Veg With Jasmine Rice', 355, null, 'Veg');
            $createItem('PAN ASIAN MAIN COURSE', 'Thai Red Curry Chicken With Jasmine Rice', 480, null, 'Non Veg');
            $createItem('PAN ASIAN MAIN COURSE', 'Thai Red Curry Prawns With Jasmine Rice', 580, null, 'Non Veg');

            $createItem('PAN ASIAN MAIN COURSE', 'Thai Green Curry Veg With Jasmine Rice', 450, null, 'Veg');
            $createItem('PAN ASIAN MAIN COURSE', 'Thai Green Curry Chicken With Jasmine Rice', 550, null, 'Non Veg');
            $createItem('PAN ASIAN MAIN COURSE', 'Thai Green Curry Prawns With Jasmine Rice', 620, null, 'Non Veg');

            $createItem('PAN ASIAN MAIN COURSE', 'Steam Jasmine Rice', 310, null, 'Veg');

            // DESSERT MENU
            $createItem('DESSERT MENU', 'Walnut Brownie', 240, null, 'Veg');
            $createItem('DESSERT MENU', 'Walnut Sizzling Brownie', 350, null, 'Veg');
            $createItem('DESSERT MENU', 'Molten Lava Cake With Ice Cream And Chocolate Sauce', 410, null, 'Veg');
            $createItem('DESSERT MENU', 'Tres Leches', 460, null, 'Veg');

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
                'CLASSIC COCKTAIL' => [
    ['Whisky Sour', 599],
    ['Old Fashioned', 599],
    ['Manhattan', 599],
    ['Penicillin', 599],
    ['Whisky Smash', 599],
    ['Cosmopolitan', 499],
    ['Sex On The Beach', 499],
    ['Bloody Mary', 499],
    ['White Russian', 499],
    ['Sea Breeze', 499],
    ['Martini', 499],
    ['Bramble', 499],
    ['Gimlet', 499],
    ['Negroni', 699],
    ['Bees Knees', 699],
    ['Daiquiry', 499],
    ['Mojito', 699],
    ['Mai Tai', 699],
    ['Pinacolada', 499],
    ['Hot Toddy (Served Hot)', 399],
    ['Side Car', 399],
    ['Margarita', 699],
    ['Tequila Sunrise', 699],
    ['Picante', 699],
    ['Paloma', 699],
    ['Sangria Red', 549],
    ['Sangria White', 549],
    ['Bellini', 549],
    ['French 75', 499],
    ['Mimosa', 549],
],

'TALL DRINK' => [
    ['Long Island Iced Tea', 799],
    ['Bull Frog', 799],
    ['Long Beach Iced Tea', 799],
    ['Texas Tea', 799],
    ['Yellow Gold', 799],
    ['Green View', 799],
    ['Midnight Gossip', 799],
],

'CLARIFIED COCKTAIL' => [
    ['Pinacolada', 599],
    ['Mango Tajin', 599],
],

'SHOOTERS' => [
    ['Kamakaze', 499],
    ['Jager Bomb', 799],
    ['B52', 799],
    ['Alien Brain Haemorrage', 699],
    ['CSW', 499],
    ['Blowjob', 699],
],

'SIGNATURE' => [
    ['Yin Yang', 699],
    ['Tipsy Sparrow', 699],
    ['Blue Welkin', 699],
    ['Merry Berry', 699],
    ['Smokey Panther', 699],
    ['Meow Jito', 699],
    ['My Guilty Pleasure', 699],
    ['Spice On The Rocks', 699],
    ['Mexican Vampire', 699],
    ['Dark Knight', 699],
],

'APERTIF' => [
    ['Campari', 275],
    ['Martini Bianco', 275],
    ['Maritni Extra Dry', 275],
    ['Martini Rosso', 275],
],

'SINGLE MALT' => [
    ['Glenlivet 12YO', 799],
    ['Glenfiddich 12YO', 799],
    ['Laphroaig 10YO', 799],
    ['Talisker 10YO', 799],
    ['Amrut Fusion', 499],
    ['Amrut Amalgam', 499],
    ['Paul John Nirvana', 399],
    ['Singleton', 799],
    
],

'BLENDED SCOTCH' => [
    ['Monkey Shoulder', 699],
    ['Chivas Regal 12YO', 699],
    ['Hibiki', 899],
    ['Ballantines Finest', 399],
    ['JW Blue Label', 1999],
    ['JW Gold Label', 699],
    ['JW Double Black', 799],
    ['JW Black Label', 699],
    ['JW Red Label', 499],
    ['Teachers 50', 399],
    ['Teachers Highland Cream', 399],
    ['Dewars White Label', 399],
    ['Black & White', 349],
    ['100 Pipers', 349],
    ['Black Dog 8YO', 399],
],

'IRISH BOURBON TENESSEY, JAPANESE' => [
    ['Jameson Irish', 549],
    ['Jim Beam White', 449],
    ['Jack Daniel No 7', 649],
    ['Makers Mark', 649],
    ['Gentleman Jack', 649],
    ['Toki', 699],
],

'VODKA' => [
    ['Beluga', 899],
    ['Roberto Cavalli', 799],
    ['Titos', 699],
    ['Grey Goose', 699],
    ['Ciroc', 699],
    ['Belvedre', 699],
    ['Uluvka', 699],
    ['Absolut', 499],
    ['Ketel One', 499],
    ['Skyy', 499],
    ['Stolichnaya Salted/Caramel', 499],
    ['Smirnoff', 299],
],

'GIN' => [
    ['Hendricks', 450],
    ['Monkey 47', 899],
    ['Malfy', 699],
    ['Roku', 699],
    ['Bombay Sapphire', 399],
    ['Bull Dog', 399],
    ['Beef Eater Pink', 399],
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
    ['Don Angel', 499],
],

'BRANDY & COGNAC' => [
    ['Henessey VS', 799],
    ['Morpheus', 249],
    ['Mansion House', 179],
],

'LIQUERS' => [
    ['Baileys', 499],
    ['Kalhua', 499],
    ['Jagermeister', 699],
    ['Fireball', 199],
    ['Absinthe', 699],
    ['Sambuca', 499],
],

'RED WINE' => [
    ['Two Ocean', 3199],
    ['Jacobs Creek', 3199],
    ['Sula', 549],
    ['Sula By Glass', 2399],
],

'WHITE WINE' => [
    ['Two Ocean', 3199],
    ['Jacobs Creek', 3199],
    ['Sula', 549],
    ['Sula By Glass', 2399]
],

'CHAMPAGNE / SPARKLING WINE' => [
    ['Moet & Chandon', 8999],
    ['Sula Brut', 2999],
],

'BREEZER' => [
    ['Cranberry', 319],
    ['Jamaican Passion', 319],
    ['Orange', 319],
],
'DRAUGHT BEER' => [
    ['Budweiser Premium 330ml', 269],
    ['Budweiser Premium 500ml', 419],
    ['Budweiser Premium 1500ml', 1209],

    ['Kingfisher Premium 330ml', 229],
    ['Kingfisher Premium 500ml', 359],
    ['Kingfisher Premium 1500ml', 1029],

    ['Kingfisher Ultra 330ml', 299],
    ['Kingfisher Ultra 500ml', 459],
    ['Kingfisher Ultra 1500ml', 1329],

    ['Toit Basmati 330ml', 339],
    ['Toit Basmati 500ml', 529],
    ['Toit Basmati 1500ml', 1449],

    ['Toit Hefeweizen 330ml', 339],
    ['Toit Hefeweizen 500ml', 529],
    ['Toit Hefeweizen 1500ml', 1449],

    ['Toit Tint In Wit 330ml', 339],
    ['Toit Tint In Wit 500ml', 529],
    ['Toit Tint In Wit 1500ml', 1449],

    ['Geist 330ml', 359],
    ['Geist 500ml', 549],
    ['Geist 1500ml', 1579],
],
'MOCKTAIL' => [
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

'ICED TEA' => [
    ['Peach, Lemon, Rosemerry', 275],
]
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