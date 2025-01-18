<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Factories\BookingFactory;
use Database\Factories\ProductFactory;
use Illuminate\Database\Seeder;
use App\Models\Product;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         User::factory(10)->create();

         Booking::factory(40)->create();

         User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
             'user_type' => 'admin',
        ]);


        Product::factory(6)
            ->hasVariants(3)
            ->hasImages(3)
            ->create();
    }
}
