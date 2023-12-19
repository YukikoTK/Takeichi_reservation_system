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
            'name' => '管理者太郎',
            'email' => 'taro@test.com',
            'email_verified_at' => '2023-12-01 10:00:00',
            'password'  => Hash::make('password'),
            'role' => 'owner'
        ]);

        User::create([
            'name' => '管理者次郎',
            'email' => 'jiro@test.com',
            'password'  => Hash::make('password'),
            'role' => 'owner'
        ]);

        User::create([
            'name' => '代表花子',
            'email' => 'hanako@test.com',
            'email_verified_at' => '2023-12-01 10:00:00',
            'password'  => Hash::make('password'),
            'role' => 'manager'
        ]);

        User::create([
            'name' => '代表春子',
            'email' => 'haruko@test.com',
            'password'  => Hash::make('password'),
            'role' => 'manager'
        ]);

        User::create([
            'name' => '利用者五郎',
            'email' => 'goro@test.com',
            'email_verified_at' => '2023-12-01 10:00:00',
            'password'  => Hash::make('password'),
            'role' => 'customer'
        ]);

        User::create([
            'name' => '利用者桃子',
            'email' => 'momoko@test.com',
            'password'  => Hash::make('password'),
            'role' => 'customer'
        ]);

        User::create([
            'name' => '利用者七子',
            'email' => 'nanako@test.com',
            'password'  => Hash::make('password'),
            'role' => 'customer'
        ]);
    }
}
