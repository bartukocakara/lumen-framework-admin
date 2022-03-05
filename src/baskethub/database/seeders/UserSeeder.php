<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "name" => "bartu",
            "surname" => "kocakara",
            "birthday" => "06/06/2022",
            "email" => "baskethub-test@gmail.com",
            "password" => Hash::make("baskethub"),
            "remember_token" => Str::random(10)
        ]);
        User::factory()
            ->times(10)
            ->create();
    }
}
