<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Book::create([
            'user_id' => '5',
            'shop_id' => '2',
            'date' => '2023-12-10',
            'time' => '12:00:00',
            'number' => '2'
        ]);

        Book::create([
            'user_id' => '5',
            'shop_id' => '7',
            'date' => '2023-12-15',
            'time' => '17:00:00',
            'number' => '5'
        ]);

        Book::create([
            'user_id' => '5',
            'shop_id' => '3',
            'date' => '2024-1-5',
            'time' => '18:00:00',
            'number' => '2'
        ]);

        Book::create([
            'user_id' => '5',
            'shop_id' => '4',
            'date' => '2024-1-26',
            'time' => '18:00:00',
            'number' => '5'
        ]);

    }
}
