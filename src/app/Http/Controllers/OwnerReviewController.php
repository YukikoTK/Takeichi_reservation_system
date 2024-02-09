<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\User;

class OwnerReviewController extends Controller
{
    public function index()
  {
    $usersWithReviews = User::has('reviews')->paginate(10);

    return view('ownerReview', compact('usersWithReviews'));
  }

  public function show($user_id)
  {
    $reviewRecords = Review::with('shop')->where('user_id', $user_id)->paginate(10);

    return view('ownerReviewDelete', compact('reviewRecords'));
  }

    public function destroy(Request $request)
  {
    $reviewId = $request->input('id');
    Review::find($reviewId)->delete();

    return back()->with('success', '口コミが削除されました。');
  }
}
