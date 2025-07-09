<!doctype html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <div class="container mx-auto p-4">
            <h1 class="text-3xl font-bold mb-6 text-center">Products</h1>
            <div class="flex justify-center sm:justify-end mb-4">
                <a href="{{ route('products.manage') }}"
                   class="bg-gray-800 text-white px-4 py-2 rounded hover:bg-gray-700 transition">
                    ⚙️ Product Management
                </a>
            </div>            
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ($products as $product)
                    <x-product-card :product="$product" :showBuyButton="true" />
                @endforeach
            </div>
        </div>
    </body>
</html>
