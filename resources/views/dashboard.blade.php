<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Display success message -->
                    @if (session('success'))
                        <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                            {{ session('success') }}
                        </div>
                    @endif
                    <!-- Product List -->
                    <h3 class="font-semibold text-lg mb-6 text-gray-800 dark:text-gray-200">Product List</h3>

                    <table class="min-w-full bg-white dark:bg-gray-800 shadow-sm rounded-lg">
                        <thead>
                            <tr
                                class="bg-gray-50 dark:bg-gray-700 text-gray-600 dark:text-gray-200 uppercase text-sm leading-normal">
                                <th class="px-6 py-3 text-left">Name</th>
                                <th class="px-6 py-3 text-left">Price</th>
                                <th class="px-6 py-3 text-left">Category</th>
                                <th class="px-4 py-2">Stock</th>
                                <th class="px-6 py-3 text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700 dark:text-gray-300 text-sm">
                            @foreach ($products as $product)
                                <tr
                                    class="border-b border-gray-200 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600">
                                    <td class="px-6 py-4">{{ $product->name }}</td>
                                    <td class="px-6 py-4">{{ $product->price }}</td>
                                    <td class="px-6 py-4">{{ $product->category->name }}</td>
                                    <td class="border px-4 py-2">{{ $product->stock }}</td>
                                    <td class="px-6 py-4 text-center">
                                        <a href="{{ route('product.edit', $product->id) }}"
                                            class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-500">Edit</a>
                                        |
                                        <form action="{{ route('product.destroy', $product->id) }}" method="POST"
                                            style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-500"
                                                onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Pagination links -->
                    <div class="mt-4">
                        {{ $products->links('pagination::tailwind') }}
                    </div>

                    <!-- Add product button -->
                    <div class="flex justify-end mt-4">
                        <a href="{{ route('product.add') }}"
                            class="inline-flex items-center justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Add New Product
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
