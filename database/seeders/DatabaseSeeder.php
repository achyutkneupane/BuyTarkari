<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'name' => 'BuyTarkari.Com',
            'email' => 'info@buytarkari.com',
            'password' => Hash::make('BuyTarkari@123'),
            'role' => 'admin',
            'email_verified_at' => now(),
            'verify_token' => sha1(sha1(time())),
        ]);
    }
}
