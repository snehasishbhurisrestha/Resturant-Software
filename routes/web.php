<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\{
    RolePermissionController,
    UserController,
    CategoryController,
    MenuItemController,
    OrderController,
    TableController,
    KitchenController,
    CustomerController,
    GstController,
    PosController,
};

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return redirect()->route('login');
});


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/roles', [RolePermissionController::class, 'index'])->name('roles.index');
    Route::post('/roles/store', [RolePermissionController::class, 'store'])->name('roles.store');
    Route::post('/roles/update', [RolePermissionController::class, 'update'])->name('roles.permissions.update');
    Route::delete('/roles/{id}', [RolePermissionController::class, 'destroy'])->name('roles.destroy');

    Route::get('/users', [UserController::class,'index'])->name('users.index');
    Route::post('/users', [UserController::class,'store'])->name('users.store');
    Route::post('/users/{id}', [UserController::class,'update'])->name('users.update');
    Route::delete('/users/{id}', [UserController::class,'destroy'])->name('users.delete');

    /*
    |--------------------------------------------------------------------------
    | Menu Management Main Page
    |--------------------------------------------------------------------------
    */
    Route::get('/menu-management', [CategoryController::class, 'manage_menu'])
        ->name('menu.management');


    /*
    |--------------------------------------------------------------------------
    | Category AJAX CRUD
    |--------------------------------------------------------------------------
    */
    Route::prefix('menu/categories')->group(function () {

        Route::get('/', [CategoryController::class, 'index'])
            ->name('categories.index');

        Route::post('/', [CategoryController::class, 'store'])
            ->name('categories.store');

        Route::put('/{category}', [CategoryController::class, 'update'])
            ->name('categories.update');

        Route::delete('/{category}', [CategoryController::class, 'destroy'])
            ->name('categories.delete');

    });


    /*
    |--------------------------------------------------------------------------
    | Menu Items AJAX CRUD
    |--------------------------------------------------------------------------
    */
    Route::prefix('menu/items')->group(function () {

        Route::get('/', [MenuItemController::class, 'index'])
            ->name('items.index');

        Route::post('/', [MenuItemController::class, 'store'])
            ->name('items.store');

        Route::put('/{item}', [MenuItemController::class, 'update'])
            ->name('items.update');

        Route::delete('/{item}', [MenuItemController::class, 'destroy'])
            ->name('items.delete');

        Route::post('/{item}/hide', [MenuItemController::class, 'hide'])
            ->name('items.hide');

        Route::post('/{item}/show', [MenuItemController::class, 'show'])
            ->name('items.show');

        /*
        | category wise items
        */
        Route::get('/category/{category}', [MenuItemController::class, 'categoryItems'])
            ->name('items.category');

    });


    /*
    |--------------------------------------------------------------------------
    | GST
    |--------------------------------------------------------------------------
    */
    Route::prefix('menu/gst')->group(function () {

        Route::get('/', [GstController::class, 'index'])
            ->name('gst.index');

        Route::post('/save', [GstController::class, 'save'])
            ->name('gst.save');

    });



    Route::get('/pos', [PosController::class,'index'])
        ->name('pos.index');
    
    Route::get('/pos/main/{section}/{table}', [PosController::class,'mainindex'])->name('pos.mainindex');

    Route::get('/pos/load-items/{category}', [PosController::class,'loadItems']);

    Route::post('/pos/item-detail', [PosController::class,'itemDetail']);
    Route::get('/pos/search-items', [PosController::class, 'searchItems'])->name('search.items');
    Route::post('/pos/update-price', [PosController::class, 'updatePrice'])->name('pos.update.price');
    Route::post('/pos/apply-discount', [PosController::class, 'applyDiscount'])->name('pos.apply.discount');
    Route::post('/pos/update-charges', [PosController::class, 'updateCharges'])->name('pos.update.charges');
    Route::post('/pos/add-cart', [PosController::class,'addCart']);

    Route::post('/pos/update-cart', [PosController::class,'updateCart']);

    Route::post('/pos/place-order', [PosController::class,'placeOrder']);

    Route::post('/pos/kot-print', [PosController::class,'kotPrint']);

    Route::post('/pos/bill-print', [PosController::class,'billPrint']);

    Route::post('/pos/tables',[PosController::class,'tables']);
    Route::post('/pos/cart',[PosController::class,'cart']);
    Route::post('/pos/remove-cart',[PosController::class,'removeCart']);
    Route::post('/pos/kot-save',[PosController::class,'kotSave']);

    Route::post('/pos/update-payment', [PosController::class, 'updatePayment'])->name('pos.update.payment');

    // Route::get('/categories', [CategoryController::class,'index'])->name('categories.index');
    // Route::post('/categories', [CategoryController::class,'store'])->name('categories.store');
    // Route::post('/categories/{id}', [CategoryController::class,'update'])->name('categories.update');
    // Route::delete('/categories/{id}', [CategoryController::class,'destroy'])->name('categories.delete');

    
    // Route::get('/menu-discount', [CategoryController::class,'index'])->name('categories.index');
    // Route::get('/manage/menu', [CategoryController::class,'manage_menu'])->name('categories.manage.menu');
    // Route::get('/manage/menu/item-lis', [CategoryController::class,'manage_menu_item_list'])->name('categories.manage.menu.list');
    // Route::get('/add/menu', [CategoryController::class,'add_menu'])->name('categories.add.menu');


    // Route::get('/items/category_list', [CategoryController::class,'items_category_list'])->name('items.category.list');
    // Route::get('/items/category/add', [CategoryController::class,'items_category_add'])->name('items.category.add');

    Route::get('/reports/day-end-summary', function () {
        return view('admin.reports.day-end-summary');
    });
    Route::get('/reports/delivery-management', function () {
        return view('admin.reports.delivery-management');
    });
    Route::get('/reports/other-reports', function () {
        return view('admin.reports.other-reports');
    });
    Route::get('/reports/report-notification', function () {
        return view('admin.reports.report-notification');
    });






    Route::get('/items', [MenuItemController::class,'index'])->name('items.index');
    Route::post('/items', [MenuItemController::class,'store'])->name('items.store');
    Route::post('/items/{id}', [MenuItemController::class,'update'])->name('items.update');
    Route::delete('/items/{id}', [MenuItemController::class,'destroy'])->name('items.delete');
    Route::post('/items/{id}/hide', [MenuItemController::class,'hide'])->name('items.hide');


    Route::get('/orders', [OrderController::class, 'index'])->name('admin.orders');
    Route::get('/orders/{id}/details', [OrderController::class, 'details'])->name('admin.orders.details');
    Route::get('/orders/running_tables/', [OrderController::class, 'running_tables'])->name('admin.orders.running_tables');
    Route::post('/orders/status/{id}', [OrderController::class, 'updateStatus'])->name('admin.orders.status');
    Route::get('/all-orders/orders', [OrderController::class, 'all_orders'])->name('admin.all.orders');
    Route::get('/advance/orders', [OrderController::class, 'advance_orders'])->name('admin.advance.orders');

    Route::resource('tables', TableController::class);
    Route::post('sections', [TableController::class, 'storeSection'])->name('sections.store');

    // Optional
    Route::get('tables-status/{id}', [TableController::class, 'changeStatus'])->name('tables.status');
    Route::get('tables-stats', [TableController::class, 'stats']);

    Route::get('/kitchen', [KitchenController::class, 'index'])->name('admin.kitchen');
    Route::post('/kitchen/status/{id}', [KitchenController::class, 'updateStatus'])->name('admin.kitchen.status');

    // Optional (AJAX)
    Route::get('/kitchen-live', [KitchenController::class, 'liveOrders']);

    Route::get('/customers', [CustomerController::class, 'index'])->name('admin.customers');
    Route::get('/customers/{id}', [CustomerController::class, 'show'])->name('admin.customers.show');
});

require __DIR__.'/auth.php';
