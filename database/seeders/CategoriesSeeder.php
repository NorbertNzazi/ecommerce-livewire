<?php

namespace Database\Seeders;

use App\Models\Categories;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $categories = [
            'Electronics',
            'Fashion',
            'Home and Living',
            'Beauty and Personal Care',
            'Toys and Games',
            'Sports and Outdoors',
            'Books and Stationery',
            'Health and Wellness',
            'Automotive',
            'Pet Supplies',
            'Jewelry and Watches',
            'Electrical Appliances',
            'Art and Collectibles',
            'Office Supplies',
            'Food and Beverages',
            'Gardening and Outdoor Living',
            'Craft Supplies',
            'Tech Gadgets',
        ];

        foreach ($categories as $category) {
            Categories::create([
                'name' => $category
            ]);
        }
    }
}
