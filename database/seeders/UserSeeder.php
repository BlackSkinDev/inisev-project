<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = User::create([
            'name'=>'Afeez Azeez',
            'email'=>'azeezafeez212@gmail.com',
            'password'=>Hash::make('password')
        ]);

        $user2 = User::create([
            'name'=>'Alex Mahone',
            'email'=>'alex@gmail.com',
            'password'=>Hash::make('password')
        ]);

        $user3 = User::create([
            'name'=>'Lincoln Burrows',
            'email'=>'lincoln@gmail.com',
            'password'=>Hash::make('password')
        ]);
    }
}
