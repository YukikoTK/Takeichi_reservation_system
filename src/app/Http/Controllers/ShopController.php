<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Like;
use App\Models\Book;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        // セレクトボックスから送信された並び替え方法を取得
        $sortMethod = $request->query('sort');

        if ($sortMethod === 'random') {
            $shops = Shop::with('average')->inRandomOrder()->get();
        } elseif ($sortMethod === 'high_to_low') {
            $shops = Shop::leftJoin('averages', 'shops.id', '=', 'averages.shop_id')
            ->select('shops.*', 'averages.average')
            ->orderByDesc('averages.average')
            ->get();
        } elseif ($sortMethod === 'low_to_high') {
            $shops = Shop::leftJoin('averages', 'shops.id', '=', 'averages.shop_id')
            ->select('shops.*', 'averages.average')
            ->orderBy('averages.average')
            ->get();
        } else {
            $shops = Shop::with('average')->get();
        }

        $userId = Auth::id();

        // ログインユーザーがいいねをしたショップのIDを取得
        $likedShopIds = Like::where('user_id', $userId)
                            ->pluck('shop_id')
                            ->toArray();

        $areas = Area::pluck('area', 'id')->toArray();
        $genres = Genre::pluck('genre', 'id')->toArray();

        return view('index', compact('shops', 'likedShopIds', 'areas', 'genres'));
    }

    public function show($shop_id)
    {
        $shop = Shop::with('area', 'genre')->find($shop_id);
        $userId = Auth::id();
        $bookRecords = Book::where('shop_id', $shop->id)
                            ->where('user_id', $userId)
                            ->get();

        $myReview = Review::where('user_id', $userId)
                            ->where('shop_id', $shop_id)
                            ->first();

        return view('detail', compact('shop', 'bookRecords', 'myReview'));
    }
}
