<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use GuzzleHttp\Client;

class ImageController extends Controller
{
    public function upload(Request $request)
    {
        // Validate the image input
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Save the uploaded image to the public path
        if ($request->file('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);

            // Get the image path
            $imagePath = public_path('images/' . $imageName);

            // Send the image to the Roboflow API using Guzzle
            $response = $this->sendToRoboflow($imagePath);

            // Return the response data to the view
            return view('image-upload', [
                'imagePath' => 'images/' . $imageName,
                'response' => $response,
            ]);
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
            $response = $client->post('https://classify.roboflow.com/electronic-detection-zusro/1', [
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
