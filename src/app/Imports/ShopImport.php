<?php

namespace App\Imports;

use App\Models\Shop;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class ShopImport implements ToCollection, WithStartRow
{
    /**
    * @param Collection $collection
    */
    public static $startRow = 2;

    public function collection(Collection $rows)
    {
        if ($rows->isEmpty()) {
            $validator = Validator::make([], [
                '*.0' => ['required'],
                '*.1' => ['required'],
                '*.2' => ['required'],
                '*.3' => ['required'],
                '*.4' => ['required'],
            ]);

            $validator->after(function ($validator) {
                $validator->errors()->add('empty', 'CSVファイルにデータがありません。');
            });

            throw new \Illuminate\Validation\ValidationException($validator);
        }

        Validator::make($rows->toArray(), [
            '*.0' => ['required','numeric'],
            '*.1' => ['required','numeric'],
            '*.2' => ['required','string','max:50'],
            '*.3' => ['required','string','max:400'],
            '*.4' => ['required','string','regex:/\.(jpg|png)$/i'],
        ], [], [
            '*.0' => 'area_id',
            '*.1' => 'genre_id',
            '*.2' => 'shop',
            '*.3' => 'detail',
            '*.4' => 'img',
        ])->validate();

        foreach ($rows as $row) {
            $imageUrl = $row[4];
            $contents = Http::get($imageUrl)->body();
            $fileName = basename($imageUrl);
            $imagePath = 'public/image/' . $fileName;
            Storage::put($imagePath, $contents);

            Shop::create([
                'area_id' => $row[0],
                'genre_id' => $row[1],
                'shop' => $row[2],
                'detail' => $row[3],
                'img' => $imagePath,
            ]);
        }
    }

    /**
     * @return int
     */
    public function startRow(): int
    {
        return self::$startRow;
    }
}
