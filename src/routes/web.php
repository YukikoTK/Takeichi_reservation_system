<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\OwnerPrivateController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\ManagerShopController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\QrCodeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\OwnerReviewController;
use App\Http\Controllers\CsvImportController;

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

// ログイン不要
Route::get('/', [ShopController::class, 'index'])->name('shop.index');
Route::get('/detail/{shop_id}', [ShopController::class, 'show'])->name('detail.show');


Route::middleware('verified')->group(function () {
    // 予約機能
    Route::post('/book/store', [BookController::class, 'store'])->name('book.store');

    Route::get('/book/edit', [BookController::class, 'edit'])->name('book.edit');

    Route::post('/book/update', [BookController::class, 'update'])->name('book.update');

    // mypage機能
    Route::get('/mypage', [BookController::class, 'show'])->name('mypage.show');

    Route::delete('/mypage/destroy', [BookController::class, 'destroy'])->name('mypage.destroy');

    // いいね機能
    Route::post('/like/store', [LikeController::class, 'store'])->name('like.store');

    Route::delete('/like/destroy', [LikeController::class, 'destroy'])->name('like.destroy');

    // 評価機能
    Route::get('/review', [ReviewController::class, 'show'])->name('review.show');

    Route::post('/review/store', [ReviewController::class, 'store'])->name('review.store');

    Route::get('/review/edit', [ReviewController::class, 'edit'])->name('review.edit');

    Route::post('/review/update', [ReviewController::class, 'update'])->name('review.update');

    Route::delete('/review/destroy', [ReviewController::class, 'destroy'])->name('review.destroy');

    Route::get('/review/all', [ReviewController::class, 'index'])->name('review.index');

    // QRコード表示
    Route::get('/qrcode', [QrCodeController::class, 'index'])->name('qrcode.index');

    Route::get('/qrcode/book', [QrCodeController::class, 'show'])->name('qrcode.show');

    // stripe決済
    Route::post('/pay', [PaymentController::class, 'pay'])->name('stripe.pay');

});

// 管理者、店舗代表者の画面
Route::middleware(['auth', 'admin_auth:owner'])->group(function () {

    Route::get('/owner', [OwnerPrivateController::class, 'index'])->name('owner.index');

    Route::get('/owner/create', [OwnerPrivateController::class, 'create'])->name('owner.create');

    Route::post('/owner/confirm', [OwnerPrivateController::class, 'confirm'])->name('owner.confirm');

    Route::post('/owner/store', [OwnerPrivateController::class, 'store'])->name('owner.store');

    Route::get('/owner/review', [OwnerReviewController::class, 'index'])->name('owner.review');

    Route::get('/owner/review/{user_id}', [OwnerReviewController::class, 'show'])->name('owner.reviewShow');

    Route::delete('/owner/review/destroy', [OwnerReviewController::class, 'destroy'])->name('owner.reviewDestroy');

    Route::get('csv', [CsvImportController::class, 'index'])->name('csv');

    Route::post('csv/upload', [CsvImportController::class, 'importCsv'])->name('csv.upload');

});

Route::middleware(['auth', 'admin_auth:manager'])->group(function () {

    Route::get('/manager', [ManagerController::class, 'index'])->name('manager.index');

    Route::get('/manager/shop', [ManagerShopController::class, 'index'])->name('manager.shop');

    Route::get('/manager/show/{shop_id}', [ManagerShopController::class, 'show'])->name('manager.show');

    Route::get('/manager/create', [ManagerShopController::class, 'create'])->name('manager.create');

    Route::post('/manager/store', [ManagerShopController::class, 'store'])->name('manager.store');

    Route::get('/manager/edit', [ManagerShopController::class, 'edit'])->name('manager.edit');

    Route::post('/manager/update', [ManagerShopController::class, 'update'])->name('manager.update');

    Route::get('/manager/mail', [MailController::class, 'showForm'])->name('mail.show');

    Route::post('/manager/mail/send', [MailController::class, 'sendMail'])->name('mail.send');
});