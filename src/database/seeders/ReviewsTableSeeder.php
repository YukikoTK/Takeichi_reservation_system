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

        Review::create([
            'user_id' => '6',
            'shop_id' => '2',
            'star' => '5',
            'comment' => '美味しかったです。',
        ]);

        Review::create([
            'user_id' => '7',
            'shop_id' => '2',
            'star' => '5',
            'comment' => 'また行きたいです！',
        ]);

        Review::create([
            'user_id' => '5',
            'shop_id' => '6',
            'star' => '4',
            'comment' => '美味しい！',
        ]);

        Review::create([
            'user_id' => '6',
            'shop_id' => '6',
            'star' => '5',
            'comment' => 'また行きたいです！',
        ]);

        Review::create([
            'user_id' => '7',
            'shop_id' => '6',
            'star' => '4',
            'comment' => '美味しい！',
        ]);

        Review::create([
            'user_id' => '5',
            'shop_id' => '8',
            'star' => '4',
            'comment' => 'よかったです！',
        ]);

        Review::create([
            'user_id' => '6',
            'shop_id' => '8',
            'star' => '3',
            'comment' => '高いです。',
        ]);

        Review::create([
            'user_id' => '7',
            'shop_id' => '8',
            'star' => '3',
            'comment' => '高いです。',
        ]);

        Review::create([
            'user_id' => '5',
            'shop_id' => '10',
            'star' => '3',
            'comment' => '普通です。',
        ]);

        Review::create([
            'user_id' => '6',
            'shop_id' => '10',
            'star' => '3',
            'comment' => '普通です。',
        ]);

        Review::create([
            'user_id' => '7',
            'shop_id' => '10',
            'star' => '3',
            'comment' => '普通です。',
        ]);

        Review::create([
            'user_id' => '5',
            'shop_id' => '4',
            'star' => '5',
            'comment' => '美味しいです。',
        ]);

        Review::create([
            'user_id' => '6',
            'shop_id' => '4',
            'star' => '3',
            'comment' => '普通です。',
        ]);

        Review::create([
            'user_id' => '7',
            'shop_id' => '4',
            'star' => '4',
            'comment' => '普通です。',
        ]);

        Review::create([
            'user_id' => '5',
            'shop_id' => '12',
            'star' => '2',
            'comment' => '高いです。',
        ]);

        Review::create([
            'user_id' => '6',
            'shop_id' => '12',
            'star' => '4',
            'comment' => 'よかったです。',
        ]);

        Review::create([
            'user_id' => '7',
            'shop_id' => '12',
            'star' => '3',
            'comment' => '普通です。',
        ]);
    }
}
