<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Review;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Review::create([
            'user_id' => '5',
            'shop_id' => '2',
            'star' => '5',
            'comment' => '美味しい！',
        ]);
    }
}
