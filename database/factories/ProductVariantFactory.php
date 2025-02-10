<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductVariant>
 */
class ProductVariantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'size' => $this->faker->unique(3)->randomElement(['S', 'M', 'L']),
        ];
    }
}


/*foreach ($products as $product) {
            $sizes = ['S', 'M', 'L'];

            foreach ($sizes as $size) {
                ProductVariant::create([
                    'product_id' => $product->id, 
                    'size' => $size,      
                ]);