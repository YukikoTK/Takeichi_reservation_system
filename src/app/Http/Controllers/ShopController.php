<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Like;
use App\Models\Book;
use App\Models\Area;
use App\Models\Genre;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function index()
    {
        $shops = Shop::with('area', 'genre')->get();
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

        return view('detail', compact('shop', 'bookRecords'));
    }


}
