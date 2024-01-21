<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class QrCodeController extends Controller
{

public function index(Request $request)
{
    $bookId = $request->input('id');
    $bookRecord = Book::with('shop', 'user')->find($bookId);

    return view('qrcode', compact('bookRecord'));
}

public function show(Request $request)
{
    $bookId = $request->input('id');
    $bookRecord = Book::with('shop', 'user')->find($bookId);

    return view('qrcodeBook', compact('bookRecord'));
}

}
