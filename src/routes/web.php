<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BookController;

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

Route::get('/', [HomeController::class, 'index']);
Route::get('/table', [HomeController::class, 'table']);
Route::get('/data-table', [HomeController::class, 'dataTable']);
Route::get('/register', [AuthController::class, 'register']);
Route::get('/welcome', [AuthController::class, 'welcome']);

// Route::get('/master', function() {
//   return view('layout.master');
// });

Route::get('/category', [CategoryController::class, 'index']);

Route::get('/category/create', [CategoryController::class, 'create']);
Route::post('/category', [CategoryController::class, 'store']);

Route::get('/category/{id}', [CategoryController::class, 'show']);

Route::get('/category/{id}/edit', [CategoryController::class, 'edit']);
Route::put('/category/{id}', [CategoryController::class, 'update']);

Route::delete('/category/{id}', [CategoryController::class, 'destroy']);

Route::resource('/book', BookController::class);
