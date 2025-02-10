<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductVariant>
 */
class ProductVariantFactory extends Factory
{
    private static $sizeIndex = 0;
    private static $sizes = ['L', 'M', 'S'];
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $size = self::$sizes[self::$sizeIndex];
        self::$sizeIndex = (self::$sizeIndex + 1) % count(self::$sizes);

        return [
            'size' => $size,
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