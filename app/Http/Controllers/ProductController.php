<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
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
        $products = $query->paginate(20);

        return view('products', compact('products'));
    }

    public function index()
    {
        $products = Product::with('category')->paginate(10);

        return view('dashboard', compact('products'));
    }

    public function showDetailProduct($slug)
    {
        // Find the product by slug
        $product = Product::where('slug', $slug)->firstOrFail();

        // Return the view with the product data
        return view('product-detail', compact('product'));
    }

    public function add()
    {   
        return view('product-add');
    }

    public function store(Request $request, ImageController $imageController)
    {
        // Validate the product data
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'stock' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Create slug
        $slug = Str::slug($request->name, '-');

        // Call the ImageController to store the image
        $imagePath = $imageController->storeProductImage($request);

        // Store product details in the database
        Product::create([
            'name' => $request->name,
            'slug' => $slug,
            'price' => $request->price,
            'description' => $request->description,
            'stock' => $request->stock,
            'picture_path' => $imagePath,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('dashboard')->with('success', 'Product uploaded successfully.');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        
        return view('product-edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        // Validate the product data
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'stock' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
        ]);

        // If a new image is uploaded, handle the image upload
        if ($request->hasFile('image')) {
            $imagePath = (new ImageController)->storeProductImage($request);
            $product->picture_path = $imagePath;
        }

        // Update the product
        $product->update($request->only('name', 'price', 'description', 'stock', 'category_id'));

        return redirect()->route('dashboard')->with('success', 'Product updated successfully.');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('dashboard')->with('success', 'Product deleted successfully.');
    }
}
