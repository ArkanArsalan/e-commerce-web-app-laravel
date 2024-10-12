<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use GuzzleHttp\Client;

class ImageController extends Controller
{
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
    
            // Check if the response contains a top classification
            if (isset($response['top'])) {
                // Redirect to the product search page with the classification as search term
                return redirect()->route('products.find', ['search' => $response['top']]);
            }
    
            return redirect()->route('image')->with('error', 'No classification found.');
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
