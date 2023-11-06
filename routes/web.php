<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SalesAdminController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('sales-admin')->group(function () {

    // dashboard
    Route::match(["GET", "POST"], '/dashboard', [SalesAdminController::class, "dashboard"]);
    Route::match(["GET", "POST"], '/', [SalesAdminController::class, "dashboard"]);

    // warehouse
    Route::match(["GET", "POST"], '/create-warehouse', [SalesAdminController::class, "create_warehouse"]);
    Route::match(["GET", "POST"], '/all-warehouse', [SalesAdminController::class, "all_warehouse"]);

     // product
     Route::match(["GET", "POST"], '/create-product', [SalesAdminController::class, "create_product"]);
     Route::match(["GET", "POST"], '/add-product', [SalesAdminController::class, "add_product"]);
     Route::match(["GET", "POST"], '/available-product', [SalesAdminController::class, "available_product"]);

     //product-items
     Route::match(["GET", "POST"], '/products/{product_number}/items', [SalesAdminController::class, "product_item"]);

    //  Add to cart
    Route::get('/cart',  [SalesAdminController::class, "index"]);
    Route::post('/cart/add', [SalesAdminController::class, "store"]);


});

