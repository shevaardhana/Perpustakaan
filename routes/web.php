<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [App\Http\Controllers\DashBoardController::class, 'index'])->middleware('auth')->name('DashBoard');

Auth::routes();

Route::resource('kategori', 'KategoriController');

Route::resource('buku', 'BukuController');

Route::get('peminjaman/{id}/set-status', 'TransactionController@setStatus')
            ->name('peminjaman.status');

Route::resource('peminjaman', 'TransactionController');


