<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Descriptions made by ChatGPT
        $products = [
            [
                'product_id' => 'Americano',
                'path' => 'https://images.unsplash.com/photo-1587985782608-20062892559d?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'
            ],
        ];

        $product = $products[array_rand($products)];

        return [
            'product_id' => $product['product_id'],
            'path' => $product['path'],
        ];
    }
}
