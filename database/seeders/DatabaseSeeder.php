<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
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
        User::create([
            'name' => 'Achyut Neupane',
            'email' => 'achyutkneupane@gmail.com',
            'password' => Hash::make('Ghost0vperditi0n'),
            'role' => 'customer',
            'email_verified_at' => now(),
            'verify_token' => sha1(sha1(time())),
        ]);
        if(config('app.env') == 'local') {
            for($i=1;$i<=5;$i++){
                Category::create([
                    'title' => 'Category'.$i,
                    'slug' => 'category'.$i,
                    'priority' => $i
                ]);
            }
            for($i=1;$i<=5;$i++){
                Brand::create([
                    'title' => 'Brand'.$i,
                    'slug' => 'brand'.$i,
                    'priority' => $i
                ]);
            }
            Product::factory()->count(200)->create();
        }
    }
}
