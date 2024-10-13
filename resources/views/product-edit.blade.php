<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('product.update', $product->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Product Name -->
                        <div class="mb-4">
                            <label for="name"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-200">Product Name</label>
                            <input type="text" name="name" id="name" value="{{ $product->name }}" required
                                class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>

                        <!-- Price -->
                        <div class="mb-4">
                            <label for="price"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-200">Price</label>
                            <input type="number" name="price" id="price" step="0.01"
                                value="{{ $product->price }}" required
                                class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>

                        <!-- Description -->
                        <div class="mb-4">
                            <label for="description"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-200">Description</label>
                            <textarea name="description" id="description" rows="4" required
                                class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{ $product->description }}</textarea>
                        </div>

                        <!-- Category -->
                        <div class="mb-4">
                            <label for="category_id"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-200">Category</label>
                            <select name="category_id" id="category_id" required
                                class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Image Upload -->
                        <div class="mb-4">
                            <label for="image"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-200">Product Image</label>
                            <input type="file" name="image" id="image"
                                class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>

                        <!-- Submit Button -->
                        <div>
                            <button type="submit"
                                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700">
                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
