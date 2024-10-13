<x-main-layout>
    <section class="bg-white py-8 antialiased dark:bg-gray-900 md:py-16">
        <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
            <h2 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">Shopping Cart</h2>

            @if (session('success'))
                <div class="mb-4 p-4 bg-green-200 text-green-700">
                    {{ session('success') }}
                </div>
            @endif

            @if ($cartItems->isEmpty())
                <p class="mt-6 text-gray-900 dark:text-white">Your cart is empty.</p>
            @else
                <div class="mt-6 sm:mt-8 md:gap-6 lg:flex lg:items-start xl:gap-8">
                    <div class="mx-auto w-full flex-none lg:max-w-2xl xl:max-w-4xl">
                        <div class="space-y-6">
                            @foreach ($cartItems as $item)
                                <div
                                    class="rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 md:p-6">
                                    <div
                                        class="space-y-4 md:flex md:items-center md:justify-between md:gap-6 md:space-y-0">
                                        <a href="#" class="shrink-0 md:order-1">
                                            <img class="h-20 w-20 object-cover"
                                                src="{{ asset($item->product->picture_path) }}"
                                                alt="{{ $item->product->name }}">
                                        </a>

                                        <div class="w-full min-w-0 flex-1 space-y-4 md:order-2 md:max-w-md">
                                            <a href="#"
                                                class="text-base font-medium text-gray-900 hover:underline dark:text-white">
                                                {{ $item->product->name }}
                                            </a>
                                            <div class="flex items-center gap-4">
                                                <form action="{{ route('cart.update', $item->id) }}" method="POST"
                                                    class="flex items-center">
                                                    @csrf
                                                    @method('PATCH')
                                                    <input type="number" name="quantity" value="{{ $item->quantity }}"
                                                        min="1"
                                                        class="mx-2 w-16 p-2 text-center text-sm font-medium text-gray-900 bg-transparent border border-gray-300 rounded-lg dark:text-white dark:border-gray-600">
                                                    <button type="submit"
                                                        class="ml-2 px-4 py-2 bg-blue-500 text-white rounded">Update</button>
                                                </form>
                                                <form action="{{ route('cart.destroy', $item->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="inline-flex items-center text-sm font-medium text-red-600 hover:underline dark:text-red-500">
                                                        <svg class="me-1.5 h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                                            fill="none" viewBox="0 0 24 24">
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2"
                                                                d="M6 18 17.94 6M18 18 6.06 6" />
                                                        </svg>
                                                        Remove
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="text-end md:order-4 md:w-32">
                                            <p class="text-base font-bold text-gray-900 dark:text-white">
                                                Rp{{ number_format($item->product->price * $item->quantity, 0, ',', '.') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="mx-auto mt-6 max-w-4xl flex-1 space-y-6 lg:mt-0 lg:w-full">
                        <div
                            class="space-y-4 rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:p-6">
                            <p class="text-xl font-semibold text-gray-900 dark:text-white">Order summary</p>
                            <div class="space-y-4">
                                <dl
                                    class="flex items-center justify-between gap-4 border-t border-gray-200 pt-2 dark:border-gray-700">
                                    <dt class="text-base font-bold text-gray-900 dark:text-white">Total</dt>
                                    <dd class="text-base font-bold text-gray-900 dark:text-white">
                                        Rp{{ number_format($cartItems->sum(fn($item) => $item->product->price * $item->quantity), 0, ',', '.') }}
                                    </dd>
                                </dl>
                            </div>
                            <a href="#"
                                class="flex w-full items-center justify-center rounded-lg bg-primary-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-primary-800 focus:outline-none focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                Proceed to Checkout
                            </a>
                            <div class="flex items-center justify-center gap-2">
                                <span class="text-sm font-normal text-gray-500 dark:text-gray-400"> or </span>
                                <a href="/products" title=""
                                    class="inline-flex items-center gap-2 text-sm font-medium text-primary-700 underline hover:no-underline dark:text-primary-500">
                                    Continue Shopping
                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>
</x-main-layout>
