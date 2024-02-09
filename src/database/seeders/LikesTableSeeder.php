<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Like;

class LikesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Like::create([
            'user_id' => '5',
            'shop_id' => '2',
        ]);

        Like::create([
            'user_id' => '5',
            'shop_id' => '4',
        ]);

        Like::create([
            'user_id' => '5',
            'shop_id' => '6',
        ]);

        Like::create([
            'user_id' => '5',
            'shop_id' => '8',
        ]);

        Like::create([
            'user_id' => '5',
            'shop_id' => '10',
        ]);
    }
}
