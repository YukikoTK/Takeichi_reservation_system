<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Review;
use App\Models\Shop;
use App\Models\Average;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ReviewRequest;

class ReviewController extends Controller
{
    public function show(Request $request)
  {
    $userId = Auth::id();
    $dateToday = now()->toDateString();
    $shopId = $request->input('id');
    $existingReview = Review::where('user_id', $userId)
                            ->where('shop_id', $shopId)
                            ->first();

    if ($existingReview) {
        // ユーザーが既にレビューを投稿している場合は、投稿内容を表示する
        return view('showReview', compact('existingReview', 'shopId'));
    }

    $bookRecords = Book::with('shop')
                        ->where('user_id', $userId)
                        ->where('shop_id', $shopId)
                        ->get();

    $canPostReview = false;
    $visitedShop = null;

    foreach ($bookRecords as $bookRecord) {
        if ($bookRecord->date < $dateToday) {
            // 予約の来店日が過去の場合、口コミ投稿を許可
            $canPostReview = true;
            $visitedShop = $bookRecord->shop;
            break; // 一つでも来店後の予約があればループを抜ける
        }
    }

    if ($canPostReview) {
    // 口コミ投稿可能な場合の処理

      $shopInfo = Shop::with('area', 'genre')
                      ->where('id', $shopId)
                      ->first();

      return view('review', compact('visitedShop', 'shopInfo'));

    } else {
    // 口コミ投稿不可の場合の処理

        return view('reviewWaiting', compact('shopId'));
    }
  }

    public function store(ReviewRequest $request)
  {
    $userId = Auth::id();
    $reviewData = $request->all();
    $imgPath = null;

    // 画像が送信されているか確認
    if ($request->hasFile('img')) {
        $dir = 'review_image';
        $file_name = $request->file('img')->getClientOriginalName();
        $imgPath = $request->file('img')->storeAs('public/' . $dir, $file_name);
    }

    Review::create([
      'user_id' => $userId,
      'shop_id' => $reviewData['shop_id'],
      'star' => $reviewData['rate'],
      'comment' => $reviewData['comment'],
      'img_review' => $imgPath
    ]);

    $shopId = $request->input('shop_id');
    // 評価の平均値を取得
    $averageRating = Review::where('shop_id', $shopId)->avg('star');

    // 該当店舗の平均評価をaverageモデルに保存
    Average::updateOrCreate(
        ['shop_id' => $shopId],
        ['average' => $averageRating]
    );

    return redirect()->route('detail.show', ['shop_id' => $reviewData['shop_id']]);
  }

    public function edit(Request $request)
  {
    $reviewEdit = Review::find($request->id);
    $shopId = $reviewEdit->shop_id;
    $shopInfo = Shop::with('area', 'genre')
                    ->where('id', $shopId)
                    ->first();

    return view('reviewEdit', compact('reviewEdit', 'shopInfo'));
  }

  public function update(ReviewRequest $request) {

    $userId = Auth::id();
    $reviewData = $request->all();
    $imgPath = null;

    // 画像が送信されているか確認
    if ($request->hasFile('img')) {
        $dir = 'review_image';
        $file_name = $request->file('img')->getClientOriginalName();
        $imgPath = $request->file('img')->storeAs('public/' . $dir, $file_name);
    }

    Review::where('user_id', $userId)
          ->where('id', $reviewData['review_id'])
          ->where('shop_id', $reviewData['shop_id'])
          ->update([
            'star' => $reviewData['rate'],
            'comment' => $reviewData['comment'],
            'img_review' => $imgPath
          ]);

    return redirect()->route('detail.show', ['shop_id' => $reviewData['shop_id']]);
  }

  public function destroy(Request $request) {

    Review::find($request->id)->delete();

    return back();
  }

  public function index(Request $request) {

    $shopId = $request->input('id');
    $shop = Shop::findOrFail($shopId);
    $shopName = $shop->shop;
    $allReviews = Review::where('shop_id', $shopId)->paginate(20);

    return view('reviewAll', compact('shopName', 'allReviews', 'shopId'));
  }
}
