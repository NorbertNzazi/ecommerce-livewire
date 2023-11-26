<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $productNames = [
            'Beef',
            'Banana',
            'Guavas',
            'Grapes',
            'Beef Burger',
            'Mango',
            'Watermelon',
            'Apple',
            'Raisins',
            'Drumstick',
            'Fruit Juice',
            'Fruit Salad'
        ];

        for ($i = 0; $i < 12; $i++) {
            $product = [
                'name' => $productNames[$i],
                'qty' => fake()->numberBetween(0, 100),
                'price' => fake()->numberBetween(5, 100),
                'description' => fake()->sentence('10'),
                'image' => 'img/product/product-' . ($i + 1) . '.jpg'
            ];

            try {
                Product::create($product);
            } catch (\Throwable $th) {
                throw $th;
            }
        }
    }
}
