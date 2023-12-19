<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ReviewRequest;

class ReviewController extends Controller
{
    public function show(Request $request)
  {
    $userId = Auth::id();
    $dateToday = now()->toDateString();
    $bookId = $request->input('id');
    $bookShopRecord = Book::where('user_id', $userId)
    ->where('id', $bookId)
    ->first();
    $bookShopId = $bookShopRecord->shop_id;

    $existingReview = Review::where('user_id', $userId)
                            ->where('shop_id', $bookShopId)
                            ->first();

    if ($existingReview) {
        // ユーザーが既にレビューを投稿している場合は、投稿内容を表示する
        return view('showReview', compact('existingReview'));
    }

    $bookRecords = Book::with('shop')
                ->where('user_id', $userId)
                ->where('date', '<', $dateToday)
                ->get();

    return view('review', compact('bookRecords'));
  }
  
    public function store(ReviewRequest $request)
  {
    $userId = Auth::id();
    $reviewData = $request->all();
    Review::create([
      'user_id' => $userId,
      'shop_id' => $reviewData['shop_id'],
      'star' => $reviewData['rate'],
      'comment' => $reviewData['comment']
    ]);

    return view('confirmReview');
  }
}
