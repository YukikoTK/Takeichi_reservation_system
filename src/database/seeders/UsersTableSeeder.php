<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'テスト太郎',
            'email' => 'taro@test.com',
            'password'  => Hash::make('password')
        ]);

        User::create([
            'name' => 'テスト花子',
            'email' => 'hanako@test.com',
            'password'  => Hash::make('password')
        ]);

        User::create([
            'name' => 'テスト五郎',
            'email' => 'goro@test.com',
            'password'  => Hash::make('password')
        ]);

        User::create([
            'name' => 'テスト桃子',
            'email' => 'momoko@test.com',
            'password'  => Hash::make('password')
        ]);
    }
}
