<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use PHPUnit\Runner\Hook;

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
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::get("/",[HomeController::class,"index"]);
Route::get("/ProductView",[AdminController::class,"ProductView"]);
Route::get("/CategoryView",[AdminController::class,"CategoryView"]);
Route::get("/addProduct",[AdminController::class,"addProduct"])->name("addProduct");
Route::get("/showProduct",[AdminController::class,"show_product"])->name("showProduct");
Route::DELETE("/DeleteProduct/{id}",[AdminController::class,"DeleteProduct"])->name("DeleteProduct");
Route::Post("/add_cart/{id}",[HomeController::class,"add_cart"])->name("add_cart");
Route::get("/show_cart",[HomeController::class,'show_cart'])->name("show_cart");
Route::get("/remove_cart/{id}",[HomeController::class,"remove_cart"])->name("remove_cart");
Route::get("/cash_order",[HomeController::class,"cash_order"])->name("cash_order");
Route::get("/Show_Order",[AdminController::class,"Show_Order"])->name("Show_Order");
Route::get("/delete_order/{id}",[AdminController::class,"delete_order"])->name("delete_order");
Route::PUT("/UpdateProduct/{id}",[AdminController::class,"UpdateProduct"])->name("UpdateProduct");
Route::get("/EditProduct/{id}",[AdminController::class,"EditProduct"])->name("EditProduct");
Route::get("/strip/{totlalprice}",[HomeController::class,"strip"])->name("strip");
Route::post('/post/{totlalprice}', [HomeController::class,"post"])->name('post');
Route::get("/Delivered/{id}",[AdminController::class,"Delivered"])->name("Delivered");
Route::get("/printpdf/{id}",[AdminController::class,'printpdf'])->name("printpdf");
Route::POST("/search",[AdminController::class,"search"])->name("search");
Route::get("/AllOrder",[HomeController::class,"AllOrder"])->name("AllOrder");
Route::get("/remove_order/{id}",[HomeController::class,"remove_order"])->name("remove_order");
Route::POST("/insertComment",[HomeController::class,"insertComment"])->name("insertComment");
Route::get("/allProduct",[HomeController::class,"allProduct"])->name("allProduct");
Route::get("/blog",[HomeController::class,"blog"])->name("blog");
Route::get("/contact",[HomeController::class,"contact"])->name("contact");
Route::get("/Dashboard",[AdminController::class,"Dashboard"])->name("Dashboard");
Route::Post("/addContact",[HomeController::class,"addContact"])->name("addContact");

Route::get("/product_detail/{id}",[HomeController::class,"product_detail"])->name("product_detail");
Route::resource("/addCat",AdminController::class);



Route::get("/redirect",[HomeController::class,"Redicret"])->middleware("auth","verified");
// Route::get("/home",[HomeController::class]);