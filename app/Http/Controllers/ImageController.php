<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use GuzzleHttp\Client;

class ImageController extends Controller
{
    public function storeProductImage(Request $request)
    {
        // Validate the image input
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Save the uploaded image to the public path
        if ($request->file('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $imagePath = public_path('images/products');
            
            // Ensure the 'images/products' directory exists
            if (!File::exists($imagePath)) {
                File::makeDirectory($imagePath, 0755, true);
            }

            // Move the image to the 'images/products' directory
            $request->image->move($imagePath, $imageName);

            // Return the image path for storing in the database
            return 'images/products/' . $imageName;
        }

        return null;
    }
    
    public function searchImage(Request $request)
    {
        // Validate the image input
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        // Save the uploaded image to the public path
        if ($request->file('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $imagePath = public_path('images/search');
            
            // Ensure the 'images/search' directory exists
            if (!File::exists($imagePath)) {
                File::makeDirectory($imagePath, 0755, true);
            }
    
            // Move the image to the 'images/search' directory
            $request->image->move($imagePath, $imageName);
    
            // Get the full path of the image
            $imageFullPath = $imagePath . '/' . $imageName;
    
            // Send the image to the Roboflow API using Guzzle
            $response = $this->sendToRoboflow($imageFullPath);
    
            // Check if the response contains a top classification with confidence >= 0.9
            if (isset($response['top']) && $response['confidence'] >= 0.9) {
                // Redirect to the product search page with the classification as search term
                return redirect()->route('products.find', ['search' => $response['top']]);
            }
            
            $emptyProducts = new \Illuminate\Pagination\LengthAwarePaginator(
                collect(), 
                0,         
                20,       
                $request->input('page', 1), 
                ['path' => $request->url(), 'query' => $request->query()]
            );

            return view('products', ['products' => $emptyProducts]);
        }
    
        return redirect()->route('image')->with('error', 'Image upload failed.');
    }    

    private function sendToRoboflow($imagePath)
    {
        try {
            // Convert the image to base64
            $imageBase64 = base64_encode(file_get_contents($imagePath));
    
            // Prepare the GuzzleHttp client
            $client = new \GuzzleHttp\Client();
    
            // Make the POST request to Roboflow API
            $response = $client->post(env('ROBOFLOW_API_URL'), [
                'headers' => [
                    'Content-Type' => 'application/x-www-form-urlencoded',
                ],
                'query' => [
                    'api_key' => env('ROBOFLOW_API_KEY'),
                ],
                'body' => $imageBase64,
            ]);
    
            // Parse the response and return the JSON result
            return json_decode($response->getBody()->getContents(), true);
        } catch (\Exception $e) {
            // Handle errors
            return ['error' => $e->getMessage()];
        }
    }
    
}
