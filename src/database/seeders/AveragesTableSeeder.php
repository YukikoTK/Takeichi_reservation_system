<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Average;

class AveragesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Average::create([
            'shop_id' => '2',
            'average' => '5.00',
        ]);

        Average::create([
            'shop_id' => '6',
            'average' => '4.33',
        ]);

        Average::create([
            'shop_id' => '8',
            'average' => '5.00',
        ]);

        Average::create([
            'shop_id' => '10',
            'average' => '3.00',
        ]);

        Average::create([
            'shop_id' => '4',
            'average' => '4.00',
        ]);

        Average::create([
            'shop_id' => '12',
            'average' => '3.00',
        ]);
    }
}
