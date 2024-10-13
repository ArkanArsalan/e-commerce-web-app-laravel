<x-main-layout>
    <div class="container mx-auto py-12">
        <h1 class="text-3xl mb-6">Shopping Cart</h1>

        @if (session('success'))
            <div class="mb-4 p-4 bg-green-200 text-green-700">
                {{ session('success') }}
            </div>
        @endif

        @if ($cartItems->isEmpty())
            <p>Your cart is empty.</p>
        @else
            <table class="w-full text-left">
                <thead>
                    <tr>
                        <th class="p-4">Product</th>
                        <th class="p-4">Quantity</th>
                        <th class="p-4">Price</th>
                        <th class="p-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cartItems as $item)
                        <tr>
                            <td class="p-4">
                                <img src="{{ asset($item->product->picture_path) }}" alt="{{ $item->product->name }}"
                                    class="w-16 h-16 object-cover">
                                <p>{{ $item->product->name }}</p>
                            </td>
                            <td class="p-4">
                                <form action="{{ route('cart.update', $item->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <input type="number" name="quantity" value="{{ $item->quantity }}" min="1"
                                        class="border rounded p-2 w-16">
                                    <button type="submit"
                                        class="ml-2 px-4 py-2 bg-blue-500 text-white rounded">Update</button>
                                </form>
                            </td>
                            <td class="p-4">
                                Rp{{ number_format($item->product->price * $item->quantity, 0, ',', '.') }}</td>
                            <td class="p-4">
                                <form action="{{ route('cart.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="px-4 py-2 bg-red-500 text-white rounded">Remove</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-8">
                <p class="text-xl font-semibold">Total:
                    Rp{{ number_format($cartItems->sum(fn($item) => $item->product->price * $item->quantity), 0, ',', '.') }}
                </p>
            </div>
        @endif
    </div>
    <a href="#" title=""
        class="mb-2 me-2 inline-flex w-full items-center justify-center rounded-lg bg-primary-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-primary-800 focus:outline-none focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
        role="button"> Proceed to Checkout </a>
</x-main-layout>
