<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function store(Request $request) {
        $userId = Auth::id();
        $shopId = $request->input('shop_id');

        $like = Like::create([
            'user_id' => $userId,
            'shop_id' => $shopId,
        ]);

        return back();
    }

    public function destroy(Request $request){
        $userId = Auth::id();
        $shopId = $request->input('shop_id');

        $likeRecord = Like::where('user_id', $userId)
                    ->where('shop_id', $shopId)
                    ->first();

        if ($likeRecord) {
            $likeRecord->delete();
        }

        return back();
    }
}
