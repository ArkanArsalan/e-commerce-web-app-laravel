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
        // Electronics
        Product::create([
            'name' => 'iPhone 15 Pro Max',
            'slug' => 'iphone-15-pro-max',
            'price' => '25000000',
            'description' => 'Latest iPhone model with advanced features.',
            'category_id' => 1, // Electronics
        ]);

        Product::create([
            'name' => 'Samsung Galaxy S23',
            'slug' => 'samsung-galaxy-s23',
            'price' => '20000000',
            'description' => 'Samsung\'s flagship phone with great performance.',
            'category_id' => 1, // Electronics
        ]);

        Product::create([
            'name' => 'Sony Bravia 55" TV',
            'slug' => 'sony-bravia-tv',
            'price' => '15000000',
            'description' => 'High-quality 4K LED TV with smart features.',
            'category_id' => 1, // Electronics
        ]);

        Product::create([
            'name' => 'Apple MacBook Pro 16"',
            'slug' => 'macbook-pro-16',
            'price' => '35000000',
            'description' => 'Powerful laptop with M1 chip for professionals.',
            'category_id' => 1, // Electronics
        ]);

        // Furniture
        Product::create([
            'name' => 'Modern Sofa',
            'slug' => 'modern-sofa',
            'price' => '7000000',
            'description' => 'Comfortable and stylish modern sofa.',
            'category_id' => 2, // Furniture
        ]);

        Product::create([
            'name' => 'Wooden Dining Table',
            'slug' => 'wooden-dining-table',
            'price' => '12000000',
            'description' => 'Solid wood dining table for 6 people.',
            'category_id' => 2, // Furniture
        ]);

        Product::create([
            'name' => 'Office Chair',
            'slug' => 'office-chair',
            'price' => '3000000',
            'description' => 'Ergonomic office chair for long working hours.',
            'category_id' => 2, // Furniture
        ]);

        Product::create([
            'name' => 'King Size Bed',
            'slug' => 'king-size-bed',
            'price' => '20000000',
            'description' => 'Luxurious king-size bed with memory foam mattress.',
            'category_id' => 2, // Furniture
        ]);

        // Clothing
        Product::create([
            'name' => 'Leather Jacket',
            'slug' => 'leather-jacket',
            'price' => '2500000',
            'description' => 'Stylish leather jacket for men.',
            'category_id' => 3, // Clothing
        ]);

        Product::create([
            'name' => 'Jeans',
            'slug' => 'jeans',
            'price' => '800000',
            'description' => 'Comfortable denim jeans for everyday wear.',
            'category_id' => 3, // Clothing
        ]);

        Product::create([
            'name' => 'Cotton T-shirt',
            'slug' => 'cotton-t-shirt',
            'price' => '500000',
            'description' => 'Soft and breathable cotton T-shirt.',
            'category_id' => 3, // Clothing
        ]);

        Product::create([
            'name' => 'Sneakers',
            'slug' => 'sneakers',
            'price' => '1500000',
            'description' => 'Comfortable and stylish sneakers for casual wear.',
            'category_id' => 3, // Clothing
        ]);

        // Books
        Product::create([
            'name' => 'The Great Gatsby',
            'slug' => 'the-great-gatsby',
            'price' => '200000',
            'description' => 'Classic novel by F. Scott Fitzgerald.',
            'category_id' => 4, // Books
        ]);

        Product::create([
            'name' => '1984 by George Orwell',
            'slug' => '1984-george-orwell',
            'price' => '180000',
            'description' => 'Dystopian novel about a totalitarian regime.',
            'category_id' => 4, // Books
        ]);

        Product::create([
            'name' => 'To Kill a Mockingbird',
            'slug' => 'to-kill-a-mockingbird',
            'price' => '220000',
            'description' => 'Pulitzer Prize-winning novel by Harper Lee.',
            'category_id' => 4, // Books
        ]);

        Product::create([
            'name' => 'Harry Potter and the Philosopher\'s Stone',
            'slug' => 'harry-potter-philosopher-stone',
            'price' => '250000',
            'description' => 'First book in the Harry Potter series.',
            'category_id' => 4, // Books
        ]);

    }
    
}
