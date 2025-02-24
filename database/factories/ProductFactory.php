<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    protected static $counter = 0;

    public function definition(): array
    {
        // Define a list of products with specific attributes
        $products = [
            [
                'name' => 'Cappuccino',
                'description' => 'A delicious espresso-based coffee with steamed milk and foam.',
                'price' => 8_50,
                'image' => 'https://falafel-xpress.co.uk/wp-content/uploads/2017/12/amricano.jpg',
            ],
            [
                'name' => 'Espresso',
                'description' => 'Strong and rich coffee brewed by forcing hot water under pressure through finely ground coffee beans.',
                'price' => 5_00,
                'image' => 'https://designscafe.co.uk/cdn/shop/products/015_600x.jpg?v=1592118960',
            ],
            [
                'name' => 'Americano',
                'description' => 'A simple black coffee made by diluting espresso with hot water.',
                'price' => 6_50,
                'image' => 'https://designscafe.co.uk/cdn/shop/products/016_600x.jpg?v=1592119465',
            ],
            [
                'name' => 'Mocha',
                'description' => 'A delicious blend of espresso, steamed milk, and chocolate syrup.',
                'price' => 7_00,
                'image' => 'https://i.pinimg.com/736x/94/47/44/944744fafc801a5f2de37158c009a2c3.jpg',
            ],
            [
                'name' => 'Macchiato',
                'description' => 'A coffee drink consisting of espresso with a small amount of steamed milk.',
                'price' => 6_00,
                'image' => 'https://cooktoria.com/wp-content/uploads/2016/02/starbucks-caramel-macchiato-7.jpg',
            ],
            [
                'name' => 'Latte',
                'description' => 'A delicious espresso-based coffee with steamed milk and foam.',
                'price' => 8_50,
                'image' => 'https://houseofcoffee.co.in/wp-content/uploads/2024/10/hot-latte-600x600.jpg',
            ],
        ];

        // Pick the product based on the counter index and update the counter
        $product = $products[self::$counter];
        
        // Update the counter and reset it if it exceeds the number of products
        self::$counter = (self::$counter + 1) % count($products);

        return [
            'name' => $product['name'],
            'description' => $product['description'],
            'price' => $product['price'],
            'image' => $product['image'],
        ];
    }
}