<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Electronics',
            'slug' => 'electronics',
        ]);

        Category::create([
            'name' => 'Furniture',
            'slug' => 'furniture',
        ]);

        Category::create([
            'name' => 'Clothing',
            'slug' => 'clothing',
        ]);

        Category::create([
            'name' => 'Books',
            'slug' => 'books',
        ]);
    }
}
