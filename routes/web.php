<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

route::get('/redirect', [HomeController::class, 'redirect']);
route::get('/', [HomeController::class, 'index']);
route::get('/products', [AdminController::class, 'products']);
route::post('/upload_product', [AdminController::class, 'uploadProduct']);
route::get('/show_products', [AdminController::class, 'showProduct']);
route::get('/delete_product/{id}', [AdminController::class, 'deleteProduct']);
route::get('/update_product_show/{id}', [AdminController::class, 'updateProductShow']);
route::post('/update_product/{id}', [AdminController::class, 'updateProduct']);
route::get('/search', [HomeController::class, 'searchProduct']);
route::post('/add_cart/{id}', [HomeController::class, 'addToCart']);
