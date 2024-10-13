<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add New Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Product Upload Form -->
                    <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data" class="mb-8">
                        @csrf

                        <!-- Product Name -->
                        <div class="mb-4">
                            <label for="name"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-200">Product Name</label>
                            <input type="text" name="name" id="name" required
                                class="mt-1 block w-full px-4 py-2 shadow-sm sm:text-sm border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        <!-- Price -->
                        <div class="mb-4">
                            <label for="price"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-200">Price</label>
                            <input type="number" name="price" id="price" step="0.01" required
                                class="mt-1 block w-full px-4 py-2 shadow-sm sm:text-sm border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        <!-- Description -->
                        <div class="mb-4">
                            <label for="description"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-200">Description</label>
                            <textarea name="description" id="description" rows="4" required
                                class="mt-1 block w-full px-4 py-2 shadow-sm sm:text-sm border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"></textarea>
                        </div>

                        <!-- Category -->
                        <div class="mb-4">
                            <label for="category_id"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-200">Category</label>
                            <select name="category_id" id="category_id" required
                                class="mt-1 block w-full px-4 py-2 shadow-sm sm:text-sm border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Image Upload -->
                        <div class="mb-4">
                            <label for="image"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-200">Product Image</label>
                            <input type="file" name="image" id="image" required
                                class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>

                        <!-- Submit Button -->
                        <div class="flex justify-end">
                            <button type="submit"
                                class="inline-flex items-center justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
