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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// ログイン後
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// 商品一覧
Route::get('/home', [App\Http\Controllers\ProductController::class, 'index'])->name('index');

Route::prefix('products')->group(function () {
    // 商品詳細
    Route::get('/show', [App\Http\Controllers\ProductController::class, 'show'])->name('show');

    // 商品新規追加フォーム
    Route::get('/create', [App\Http\Controllers\ProductController::class, 'create'])->name('create');

    // 商品追加処理
    Route::post('/store', [App\Http\Controllers\ProductController::class, 'store'])->name('store');

    // 商品編集
    Route::get('/edit', [App\Http\Controllers\ProductController::class, 'edit'])->name('edit');

    // 商品削除
    Route::post('/destroy', [App\Http\Controllers\ProductController::class, 'destroy'])->name('destroy');
});
