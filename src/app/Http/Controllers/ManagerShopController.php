<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ShopRequest;
use App\Models\Shop;
use App\Models\Book;
use App\Models\Area;
use App\Models\Genre;

class ManagerShopController extends Controller
{
    public function index()
    {
        $shops = Shop::with('area', 'genre')->paginate(10);

        return view('managerBook', compact('shops'));
    }

    public function show($shop_id) {
        $shop = Shop::with('area', 'genre')->find($shop_id);

        $bookRecords = Book::where('shop_id', $shop_id)->get();


        return view('managerShow', compact('shop', 'bookRecords'));
    }

    public function create() {
        $areas = Area::pluck('area', 'id')->toArray();
        $genres = Genre::pluck('genre', 'id')->toArray();

        return view('managerCreate', compact('areas', 'genres'));

    }

    public function store(ShopRequest $request)
    {
        $data = $request->all();
        $area = $data['area'];
        $genre = $data['genre'];
        $areaId = Area::where('area', $area)->value('id');
        $genreId = Genre::where('genre', $genre)->value('id');

        $dir = 'image';
        $file_name = $request->file('img')->getClientOriginalName();
        $imgPath = $request->file('img')->storeAs('public/' . $dir, $file_name);

        Shop::create([
            'area_id' => $areaId,
            'genre_id' => $genreId,
            'shop' => $data['shop'],
            'detail' => $data['detail'],
            'img' => $imgPath,
        ]);

        return view('managerThanks');
    }

    public function edit(Request $request) {
        $shop = Shop::find($request->id);

        $areas = Area::pluck('area', 'id')->toArray();
        $genres = Genre::pluck('genre', 'id')->toArray();

        return view('managerEdit', compact('shop','areas', 'genres'));
    }

    public function update(ShopRequest $request)
    {
        $data = $request->all();

        $area = $data['area'];
        $genre = $data['genre'];
        $areaId = Area::where('area', $area)->value('id');
        $genreId = Genre::where('genre', $genre)->value('id');

        $dir = 'image';
        $file_name = $request->file('img')->getClientOriginalName();
        $imgPath = $request->file('img')->storeAs('public/' . $dir, $file_name);

        Shop::find($request->id)
        ->update([
            'area_id' => $areaId,
            'genre_id' => $genreId,
            'shop' => $data['shop'],
            'detail' => $data['detail'],
            'img' => $imgPath,
        ]);

        return view('managerThanks');
    }
}