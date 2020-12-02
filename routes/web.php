<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\AdminController;
use App\Models\Item;

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
Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('user', [AdminController::class, 'users'])->middleware('status');
Route::delete('user/{id}', [AdminController::class, 'delete_user'])->middleware('status');
Route::get('user/{id}', [AdminController::class, 'detail_user'])->middleware('status');
Route::get('item', [AdminController::class, 'items'])->middleware('status');
Route::get('item/add', [AdminController::class, 'add_item'])->middleware('status');
Route::post('item/add', [AdminController::class, 'create_item'])->middleware('status');
Route::get('item/detail/{id}', [AdminController::class, 'detail_item'])->middleware('status');
Route::post('item/detail/{id}', [AdminController::class, 'edit_item'])->middleware('status');

Route::get('order/{id}', [OrderController::class, 'index']);
Route::post('order/{id}', [OrderController::class, 'order']);
Route::get('check-out', [OrderController::class, 'check_out']);
Route::delete('check-out/{id}',[OrderController::class, 'delete']);
Route::get('check-out/confirm', [OrderController::class, 'confirm']);

Route::get('profile', [ProfileController::class, 'index']);
Route::post('profile', [ProfileController::class, 'edit']);

Route::get('history', [HistoryController::class, 'index']);
Route::get('history/{id}', [HistoryController::class, 'detail']);
