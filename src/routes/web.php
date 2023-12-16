<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ReviewController;

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

require __DIR__.'/auth.php';

Route::get('/', [ShopController::class, 'index'])->name('shop.index');
Route::get('/detail/{shop_id}', [ShopController::class, 'show'])->name('detail.show');


Route::middleware('verified')->group(function () {

    // mypage機能
    Route::get('/mypage', [BookController::class, 'show'])->name('mypage.show');
    Route::delete('/mypage/destroy', [BookController::class, 'destroy'])->name('mypage.destroy');

    // 予約機能
    Route::post('/book/store', [BookController::class, 'store'])->name('book.store');
    Route::get('/book/edit', [BookController::class, 'edit'])->name('book.edit');
    Route::post('/book/edit', [BookController::class, 'update'])->name('book.update');


    // いいね機能
    Route::post('/like/{shop_id}', [LikeController::class, 'store'])->name('like.store');
    Route::delete('/like/{shop_id}', [LikeController::class, 'destroy'])->name('like.destroy');

    // 評価機能
    Route::get('/review', [ReviewController::class, 'show'])->name('review.show');
    Route::post('/review/store', [ReviewController::class, 'store'])->name('review.store');

});