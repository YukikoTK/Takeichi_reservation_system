<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Shop;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function store($shop_id) {
        $userId = Auth::id();
        $shop = Shop::findOrFail($shop_id);

        $like = Like::create([
            'user_id' => $userId,
            'shop_id' => $shop->id,
        ]);

        return back();
    }

    public function destroy($shop_id){
        $userId = Auth::id();
        $shop = Shop::findOrFail($shop_id);

        $likeRecord = Like::where('user_id', $userId)
                          ->where('shop_id', $shop->id)
                          ->first();

        $likeRecord->delete();

        return back();
    }
}
