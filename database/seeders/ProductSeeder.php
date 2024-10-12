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
        // Phone Category
        Product::create([
            'name' => 'iPhone 15 Pro Max',
            'slug' => 'iphone-15-pro-max',
            'price' => '25000000',
            'description' => 'Latest iPhone model with advanced features.',
            'category_id' => 1,
        ]);

        Product::create([
            'name' => 'Samsung Galaxy S23',
            'slug' => 'samsung-galaxy-s23',
            'price' => '20000000',
            'description' => 'Samsung\'s flagship phone with great performance.',
            'category_id' => 1,
        ]);

        Product::create([
            'name' => 'Oppo Reno 10 Pro+',
            'slug' => 'oppo-reno-10-pro-plus',
            'price' => '23000000',
            'description' => 'Oppo\'s flagship phone with excellent camera capabilities.',
            'category_id' => 1,
        ]);
            
        Product::create([
            'name' => 'Xiaomi 13 Pro',
            'slug' => 'xiaomi-13-pro',
            'price' => '18000000',
            'description' => 'High-performance Xiaomi phone with advanced features.',
            'category_id' => 1,
        ]);
        
        Product::create([
            'name' => 'Google Pixel 8 Pro',
            'slug' => 'google-pixel-8-pro',
            'price' => '24000000',
            'description' => 'Google\'s latest flagship phone with pure Android experience.',
            'category_id' => 1,
        ]);
        
        Product::create([
            'name' => 'OnePlus 11',
            'slug' => 'oneplus-11',
            'price' => '19000000',
            'description' => 'OnePlus flagship phone known for its smooth performance.',
            'category_id' => 1,
        ]);
        
        Product::create([
            'name' => 'Vivo X90 Pro+',
            'slug' => 'vivo-x90-pro-plus',
            'price' => '22000000',
            'description' => 'Vivo\'s flagship phone with advanced camera technology.',
            'category_id' => 1,
        ]);

        // Tablet Category
        Product::create([
            'name' => 'iPad Pro 12.9"',
            'slug' => 'ipad-pro-12-9',
            'price' => '18000000',
            'description' => 'Powerful tablet with M2 chip for high-end tasks.',
            'category_id' => 2,
        ]);

        Product::create([
            'name' => 'Samsung Galaxy Tab S9',
            'slug' => 'galaxy-tab-s9',
            'price' => '15000000',
            'description' => 'Samsung\'s premium tablet with AMOLED display.',
            'category_id' => 2,
        ]);

        Product::create([
            'name' => 'Xiaomi Pad 6 Pro',
            'slug' => 'xiaomi-pad-6-pro',
            'price' => '12000000',
            'description' => 'Xiaomi\'s high-performance tablet with excellent value.',
            'category_id' => 2,
        ]);
        
        Product::create([
            'name' => 'Lenovo Tab P11 Pro Gen 2',
            'slug' => 'lenovo-tab-p11-pro-gen-2',
            'price' => '14000000',
            'description' => 'Lenovo\'s premium tablet with great performance and display.',
            'category_id' => 2,
        ]);
        
        Product::create([
            'name' => 'Huawei MatePad Pro 11',
            'slug' => 'huawei-matepad-pro-11',
            'price' => '13000000',
            'description' => 'Huawei\'s high-end tablet with powerful features.',
            'category_id' => 2,
        ]);
        
        Product::create([
            'name' => 'Oppo Pad Air',
            'slug' => 'oppo-pad-air',
            'price' => '8000000',
            'description' => 'Oppo\'s affordable tablet with good performance.',
            'category_id' => 2,
        ]);
        
        Product::create([
            'name' => 'Realme Pad 2',
            'slug' => 'realme-pad-2',
            'price' => '9000000',
            'description' => 'Realme\'s budget-friendly tablet with decent specs.',
            'category_id' => 2,
        ]);

        // Laptop Category
        Product::create([
            'name' => 'Apple MacBook Pro 16"',
            'slug' => 'macbook-pro-16',
            'price' => '35000000',
            'description' => 'Powerful laptop with M1 chip for professionals.',
            'category_id' => 3,
        ]);

        Product::create([
            'name' => 'Dell XPS 13',
            'slug' => 'dell-xps-13',
            'price' => '18000000',
            'description' => 'Slim and powerful laptop with great performance.',
            'category_id' => 3,
        ]);

        Product::create([
            'name' => 'HP Spectre x360',
            'slug' => 'hp-spectre-x360',
            'price' => '22000000',
            'description' => 'Versatile 2-in-1 laptop with premium design.',
            'category_id' => 3,
        ]);
        
        Product::create([
            'name' => 'Lenovo ThinkPad X1 Carbon',
            'slug' => 'lenovo-thinkpad-x1-carbon',
            'price' => '20000000',
            'description' => 'Durable and reliable business laptop with great performance.',
            'category_id' => 3,
        ]);
        
        Product::create([
            'name' => 'Acer Swift X',
            'slug' => 'acer-swift-x',
            'price' => '15000000',
            'description' => 'Slim and lightweight laptop with good performance and value.',
            'category_id' => 3,
        ]);
        
        Product::create([
            'name' => 'Asus ZenBook S 13',
            'slug' => 'asus-zenbook-s-13',
            'price' => '18000000',
            'description' => 'Stylish and powerful laptop with OLED display.',
            'category_id' => 3,
        ]);
        
        Product::create([
            'name' => 'Microsoft Surface Laptop Studio',
            'slug' => 'microsoft-surface-laptop-studio',
            'price' => '25000000',
            'description' => '2-in-1 laptop with versatile design and powerful performance.',
            'category_id' => 3,
        ]);

        // Television Category
        Product::create([
            'name' => 'Sony Bravia 55" TV',
            'slug' => 'sony-bravia-tv',
            'price' => '15000000',
            'description' => 'High-quality 4K LED TV with smart features.',
            'category_id' => 4,
        ]);

        Product::create([
            'name' => 'Samsung QLED 65" TV',
            'slug' => 'samsung-qled-tv',
            'price' => '25000000',
            'description' => 'Large screen QLED TV with quantum dot technology.',
            'category_id' => 4,
        ]);

        Product::create([
            'name' => 'LG OLED 4K TV',
            'slug' => 'lg-oled-4k-tv',
            'price' => '20000000',
            'description' => 'High-quality OLED TV with excellent picture quality.',
            'category_id' => 4,
        ]);
        
        Product::create([
            'name' => 'TCL 55" 4K UHD TV',
            'slug' => 'tcl-55-4k-uhd-tv',
            'price' => '10000000',
            'description' => 'Affordable 4K TV with good picture quality.',
            'category_id' => 4,
        ]);
        
        Product::create([
            'name' => 'Hisense 65" ULED 4K TV',
            'slug' => 'hisense-65-uled-4k-tv',
            'price' => '18000000',
            'description' => 'High-end ULED TV with excellent picture quality.',
            'category_id' => 4,
        ]);
        
        Product::create([
            'name' => 'Philips Ambilight 55" TV',
            'slug' => 'philips-ambilight-55-tv',
            'price' => '16000000',
            'description' => '4K TV with ambient lighting for immersive viewing.',
            'category_id' => 4,
        ]);
        
        Product::create([
            'name' => 'Panasonic 4K OLED TV',
            'slug' => 'panasonic-4k-oled-tv',
            'price' => '18000000',
            'description' => 'High-quality OLED TV with good performance and features.',
            'category_id' => 4,
        ]);
    }
    
}
