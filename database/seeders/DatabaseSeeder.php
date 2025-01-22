<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Factories\BookingFactory;
use Database\Factories\ProductFactory;
use App\Models\ProductVariant;
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

        Booking::factory(5)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
            'user_type' => 'admin',
        ]);

        $products = Product::factory(6)
            ->hasImages(3)
            ->create();

        foreach ($products as $product) {
            $sizes = ['S', 'M', 'L'];

            foreach ($sizes as $size) {
                ProductVariant::create([
                    'product_id' => $product->id, 
                    'size' => $size,      
                ]);
            }
        }
    }
}
