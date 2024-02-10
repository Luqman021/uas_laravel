<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Models\Categories;
use App\Models\Products;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductsController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/', function () {
    return view('auths.login');
});

Route::get('/login', [AuthController::class, 'login']);
Route::post('/postlogin', [AuthController::class, 'postlogin']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/dashboard', [DashboardController::class, 'index']);

Route::get('/categories', [CategoriesController::class, 'index']);
Route::get('/categories/create', [CategoriesController::class, 'create']);
Route::post('/categories/store', [CategoriesController::class, 'store']);
Route::get('/categories/{id}/edit', [CategoriesController::class, 'edit']);
Route::put('/categories/{id}', [CategoriesController::class, 'update']);
Route::delete('/categories/{id}', [CategoriesController::class, 'destroy']);

Route::get('/products', [ProductsController::class, 'index2']);
Route::get('/products/create', [ProductsController::class, 'create']);
Route::post('/products/store', [ProductsController::class, 'store']);
Route::get('/products/{id}/edit', [ProductsController::class, 'edit']);
Route::put('/products/{id}', [ProductsController::class, 'update']);
Route::delete('/products/{id}', [productsController::class, 'destroy']);
