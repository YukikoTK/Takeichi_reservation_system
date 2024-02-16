<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\ShopImport;
use Maatwebsite\Excel\Facades\Excel;

class CsvImportController extends Controller
{
    public function index()
  {
    return view('csv.index');
  }
    /**
     * CSVインポート
     */
    protected function importCsv(Request $request)
  {
    $file = request()->file('csvdata');

    if ($file->getClientOriginalExtension() !== 'csv') {
      return redirect(route('csv'))->withErrors('CSVファイルを選択してください');
    }
    try {
          Excel::import(new ShopImport, $request->file('csvdata'));
          $message = 'インポートに成功しました。';
          return view('csv.index', compact('message'));

        } catch (Exception $e) {
            logger()->error($e);
            return redirect(route('csv'))
              ->withErrors($e->getMessage());
        }
  }
}