<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Carbon\Carbon;
use App\Models\News;
use App\Models\Admin;
use App\Models\DeliveryMan;
use App\Models\Seller;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'user@gmail.com',
            'phone' => Hash::make('123'),
            'password' => Hash::make('123'),
        ]);
        Seller::create([
            'name' => 'Test Seller',
            'email' => 'seller@gmail.com',
            'password' => Hash::make('123'),
            'phone' => Hash::make('123'),
            'email_verified_at' => Carbon::now(),
            'sellerCode' => Str::uuid()
        ]);
        Admin::create([
            'name' => 'komor',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123')
        ]);
        DeliveryMan::create([
            'name' => 'delivery',
            'email' => 'delivery@gmail.com',
            'password' => Hash::make('123')
        ]);

        DB::table('news_category')->insert([
            'name' => "Non Categorized",
            'created_at' => Carbon::now(),
        ]);
    }
}