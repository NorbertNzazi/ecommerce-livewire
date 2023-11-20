<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $itemName = [
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
            $item = [
                'name' => $itemName[$i],
                'price' => fake()->numberBetween(5, 100),
                'description' => fake()->sentence('10'),
                'image' => 'img/product/product-' . ($i + 1) . '.jpg'
            ];

            try {
                Item::create($item);
            } catch (\Throwable $th) {
                throw $th;
            }
        }
    }
}
