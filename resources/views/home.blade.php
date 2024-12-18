<x-main-layout>
    <section class="bg-gray-50 pt-8 antialiased dark:bg-gray-900 md:pt-16">
        <div class="mx-auto grid max-w-screen-xl px-4 pb-8 md:grid-cols-12 lg:gap-12 lg:pb-16 xl:gap-0">
            <!-- Left Content Section -->
            <div class="content-center justify-self-start md:col-span-7 md:text-start">
                <h1
                    class="mb-4 text-4xl font-extrabold leading-none tracking-tight dark:text-white md:max-w-2xl md:text-5xl xl:text-6xl">
                    Discover Top-Quality Gadgets!</h1>
                <p class="mb-4 max-w-2xl text-gray-500 dark:text-gray-400 md:mb-12 md:text-lg lg:mb-5 lg:text-xl">
                    Shop now and grab your favorite gadgets at unbeatable prices. Stocks are running out fast!</p>
                <div class="flex gap-4">
                    <a href="/products"
                        class="inline-block rounded-lg bg-primary-700 px-6 py-3.5 text-center font-medium text-white hover:bg-primary-800 focus:outline-none focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                        All Products
                    </a>
                    <a href="#footer"
                        class="inline-block rounded-lg border border-primary-700 px-6 py-3.5 text-center font-medium text-primary-700 hover:bg-primary-700 hover:text-white focus:outline-none focus:ring-4 focus:ring-primary-300 dark:border-primary-600 dark:text-primary-600 dark:hover:bg-primary-600 dark:hover:text-white dark:focus:ring-primary-800">
                        About Us
                    </a>
                </div>
            </div>

            <!-- Right Image Section -->
            <div class="hidden md:col-span-5 md:mt-0 md:flex">
                <img class="dark:hidden rounded-lg shadow-lg" src="{{ asset('/images/homepageimage.png') }}""
                    alt="Excited customer shopping illustration" />
            </div>
        </div>

        <div class="mx-auto mt-8 max-w-screen-xl px-4 py-8">
            <!-- Featured Products Section -->
            <section class="pt-8 mb-8">
                <h2
                    class="mb-6 text-2xl font-bold leading-none tracking-tight text-gray-900 dark:text-white md:text-3xl">
                    Featured Products
                </h2>
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                    @forelse ($products as $product)
                        <div
                            class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                            <div
                                class="group flex items-center justify-center rounded-lg border p-4 hover:shadow-md dark:border-gray-700">
                                <a href="/product/{{ $product->slug }}"
                                    class="flex items-center justify-center w-full h-full">
                                    <img class="w-32 h-40 object-contain" src="{{ asset($product->picture_path) }}"
                                        loading="lazy" alt="" />
                                </a>
                            </div>
                            <div class="pt-6">
                                <div class="mb-4 flex items-center justify-between gap-4">
                                    <span
                                        class="me-2 rounded bg-primary-100 px-2.5 py-0.5 text-xs font-medium text-primary-800 dark:bg-primary-900 dark:text-primary-300">
                                        {{ $product->category->name }} </span>

                                    <div class="flex items-center justify-end gap-1">
                                        <button type="button" data-tooltip-target="tooltip-add-to-favorites"
                                            class="rounded-lg p-2 text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                            <span class="sr-only"> Add to Favorites </span>
                                            <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M12 6C6.5 1 1 8 5.8 13l6.2 7 6.2-7C23 8 17.5 1 12 6Z" />
                                            </svg>
                                        </button>
                                        <div id="tooltip-add-to-favorites" role="tooltip"
                                            class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700"
                                            data-popper-placement="top">
                                            Add to favorites
                                            <div class="tooltip-arrow" data-popper-arrow=""></div>
                                        </div>
                                    </div>
                                </div>

                                <a href="/product/{{ $product->slug }}"
                                    class="text-lg font-semibold leading-tight text-gray-900 hover:underline dark:text-white">{{ $product->name }}</a>

                                <div class="mt-2 flex items-center gap-2">
                                    <div class="flex items-center">
                                        <svg class="h-4 w-4 text-yellow-400" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                                        </svg>

                                        <svg class="h-4 w-4 text-yellow-400" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                                        </svg>

                                        <svg class="h-4 w-4 text-yellow-400" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                                        </svg>

                                        <svg class="h-4 w-4 text-yellow-400" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                                        </svg>

                                        <svg class="h-4 w-4 text-yellow-400" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                                        </svg>
                                    </div>

                                    <p class="text-sm font-medium text-gray-900 dark:text-white">5.0</p>
                                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">(455)</p>
                                </div>

                                <ul class="mt-2 flex items-center gap-4">
                                    <li class="flex items-center gap-2">
                                        <svg class="h-4 w-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M13 7h6l2 4m-8-4v8m0-8V6a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v9h2m8 0H9m4 0h2m4 0h2v-4m0 0h-5m3.5 5.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Zm-10 0a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Z" />
                                        </svg>
                                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Fast
                                            Delivery
                                        </p>
                                    </li>

                                    <li class="flex items-center gap-2">
                                        <svg class="h-4 w-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                                d="M8 7V6c0-.6.4-1 1-1h11c.6 0 1 .4 1 1v7c0 .6-.4 1-1 1h-1M3 18v-7c0-.6.4-1 1-1h11c.6 0 1 .4 1 1v7c0 .6-.4 1-1 1H4a1 1 0 0 1-1-1Zm8-3.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" />
                                        </svg>
                                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Best Price
                                        </p>
                                    </li>
                                </ul>

                                <p class="text-2xl py-3 font-extrabold leading-tight text-gray-900 dark:text-white">
                                    Rp{{ number_format($product->price, 0, ',', '.') }}
                                </p>

                                <form action="{{ route('cart.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <button type="submit"
                                        class="inline-flex items-center rounded-lg bg-primary-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-primary-800 focus:outline-none focus:ring-4  focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                        <svg class="-ms-2 me-2 h-5 w-5" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="M4 4h1.5L8 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm.75-3H7.5M11 7H6.312M17 4v6m-3-3h6" />
                                        </svg>
                                        Add to cart
                                    </button>
                                </form>

                            </div>
                        </div>
                    @empty
                        <div>
                            <p class="font-semibold text-xl my-4">Products not found!</p>
                            <a href="/products" class="block text-blue-600 hover:underline">&laquo; Back to All
                                Categories</a>
                        </div>
                    @endforelse
                </div>

                <div class="mt-6 text-center">
                    <a href="/products"
                        class="rounded-md bg-primary-700 px-6 py-2 text-sm font-medium text-white hover:bg-primary-800">
                        Show More
                    </a>
                </div>
            </section>

            <!-- Gadget Categories Section -->
            <section class="pb-8">
                <h2
                    class="mb-6 text-2xl font-bold leading-none tracking-tight text-gray-900 dark:text-white md:text-3xl">
                    Categories
                </h2>
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-4">
                    @foreach ($categories as $category)
                        <a href="/products?category={{ $category->slug }}"
                            class="group block rounded-lg border p-4 text-center hover:shadow-md bg-white dark:border-gray-700">
                            <div class="mb-4 flex justify-center">
                                @if ($category->name == 'Phone')
                                    <svg class="rounded-lg" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd"
                                            d="M5 4a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v16a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V4Zm12 12V5H7v11h10Zm-5 1a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2H12Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                @elseif ($category->name == 'Tablet')
                                    <svg class="rounded-lg" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M11 18h2M5.875 3h12.25c.483 0 .875.448.875 1v16c0 .552-.392 1-.875 1H5.875C5.392 21 5 20.552 5 20V4c0-.552.392-1 .875-1Z" />
                                    </svg>
                                @elseif ($category->name == 'Laptop')
                                    <svg class="rounded-lg" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M9 16H5a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v1M9 12H4m8 8V9h8v11h-8Zm0 0H9m8-4a1 1 0 1 0-2 0 1 1 0 0 0 2 0Z" />
                                    </svg>
                                @elseif ($category->name == 'Television')
                                    <svg class="rounded-lg" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M12 15v5m-3 0h6M4 11h16M5 15h14a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v9a1 1 0 0 0 1 1Z" />
                                    </svg>
                                @else
                                    <span class="text-sm text-gray-500 dark:text-gray-300">(No Icon)</span>
                                @endif
                            </div>
                            <h3
                                class="text-lg font-semibold text-gray-900 dark:text-white group-hover:text-primary-700">
                                {{ $category->name }}
                            </h3>
                        </a>
                    @endforeach
                </div>
            </section>

            <!-- Brands Section -->
            <section class="pb-8">
                <h2
                    class="mb-6 text-2xl font-bold leading-none tracking-tight text-gray-900 dark:text-white md:text-3xl">
                    Brands
                </h2>
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-4">
                    @foreach (['Samsung', 'Apple', 'LG', 'Sony', 'Xiaomi', 'Oppo', 'TCL', 'Vivo'] as $brand)
                        <a href="/products?search={{ $brand }}&category="
                            class="group flex items-center justify-center rounded-lg border p-4 bg-white hover:shadow-md dark:border-gray-700">
                            <div class="flex items-center justify-center w-full h-full">
                                <img src="{{ asset('images/logo/' . $brand . '.png') }}"
                                    class="w-24 h-24 object-contain" alt="{{ $brand }}">
                            </div>
                        </a>
                    @endforeach
                </div>
            </section>
        </div>

        <!-- Footer Section -->
        <footer id="footer" class="bg-gray-800 text-white py-6">
            <div class="mx-auto max-w-screen-xl px-4">
                <div class="flex flex-col md:flex-row justify-between">
                    <div class="mb-4 md:mb-0">
                        <h3 class="text-lg font-semibold">About Us</h3>
                        <p class="text-sm">We are an e-commerce platform specializing in top-quality gadgets, utilizing
                            AI technology for image-based search.</p>
                    </div>
                    <div class="mb-4 md:mb-0">
                        <h3 class="text-lg font-semibold">Quick Links</h3>
                        <ul class="space-y-2">
                            <li><a href="/products" class="hover:underline">Products</a></li>
                            <li><a href="/about" class="hover:underline">About Us</a></li>
                            <li><a href="/contact" class="hover:underline">Contact Us</a></li>
                            <li><a href="/privacy" class="hover:underline">Privacy Policy</a></li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold">Follow Us</h3>
                        <ul class="flex space-x-4">
                            <li><a href="#" class="hover:underline">Facebook</a></li>
                            <li><a href="#" class="hover:underline">Twitter</a></li>
                            <li><a href="#" class="hover:underline">Instagram</a></li>
                        </ul>
                    </div>
                </div>
                <div class="mt-6 border-t border-gray-700 pt-4 text-center">
                    <p class="text-sm">© 2024 Detecth</p>
                    <p class="text-xs mt-2">Disclaimer: This is a test project and not a real e-commerce website.</p>
                </div>
            </div>
        </footer>
    </section>
</x-main-layout>
