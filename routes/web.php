<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('user', [AdminController::class, 'users'])->middleware('status')->name('users');
Route::post('user/status/{id}', [AdminController::class, 'status'])->middleware('status');
Route::delete('user/{id}', [AdminController::class, 'delete_user'])->middleware('status');
Route::get('user/{id}', [AdminController::class, 'detail_user'])->middleware('status')->name('user');
Route::get('item', [AdminController::class, 'items'])->middleware('status')->name('items');
Route::get('item/add', [AdminController::class, 'add_item'])->middleware('status')->name('add');
Route::post('item/add', [AdminController::class, 'create_item'])->middleware('status');
Route::get('item/detail/{id}', [AdminController::class, 'detail_item'])->middleware('status')->name('item');
Route::post('item/detail/{id}', [AdminController::class, 'edit_item'])->middleware('status');

Route::get('order/{id}', [OrderController::class, 'index'])->name('order');
Route::post('order/{id}', [OrderController::class, 'order']);
Route::get('check-out', [OrderController::class, 'check_out'])->name('check_out');
Route::delete('check-out/{id}',[OrderController::class, 'delete']);
Route::get('check-out/confirm', [OrderController::class, 'confirm']);

Route::get('profile', [ProfileController::class, 'index'])->name('profile');
Route::post('profile', [ProfileController::class, 'edit']);

Route::get('history', [HistoryController::class, 'index'])->name('history');
Route::get('history/{id}', [HistoryController::class, 'detail']);
