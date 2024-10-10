<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Upload</title>
</head>

<body>
    <h1>Upload Image</h1>

    <form action="{{ route('image.upload') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="image" required>
        <button type="submit">Upload</button>
    </form>

    @if (isset($imagePath))
        <h2>Uploaded Image:</h2>
        <img src="{{ asset($imagePath) }}" alt="Uploaded Image" style="max-width: 300px;">

        @if (isset($response))
            <h3>Detected Products:</h3>
            @if (isset($response['error']))
                <p>{{ $response['error'] }}</p>
            @else
                <pre>{{ json_encode($response, JSON_PRETTY_PRINT) }}</pre>
            @endif
        @endif
    @endif
</body>

</html>
