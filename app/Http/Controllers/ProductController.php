<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function find(Request $request)
    {
        $searchTerm = $request->input('search');
        $categorySlug = $request->input('category');

        // Query to get products with optional search and category filters
        $query = Product::query();

        // Filter by category if a category is selected
        if ($categorySlug) {
            $query->whereHas('category', function ($q) use ($categorySlug) {
                $q->where('slug', $categorySlug);
            });
        }

        // Filter by search term if provided
        if ($searchTerm) {
            $query->where('name', 'like', '%' . $searchTerm . '%')->orWhere('description', 'like', '%' . $searchTerm . '%');
        }

        // Paginate results
        $products = $query->paginate(8);

        return view('products', compact('products'));
    }

}
