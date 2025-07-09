<!doctype html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6 text-center">New Product</h1>

        <div class="flex justify-center sm:justify-center mb-4">
            <a href="{{ route('products.index') }}"
                class="bg-gray-800 text-white px-4 py-2 rounded hover:bg-gray-700 transition">
                📋 Product Listing
            </a>
        </div>
            
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 rounded mb-4  text-center">
                <strong>Form errors:</strong>
                <ul class="mt-2 list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data" class="bg-white p-6 rounded shadow-md space-y-4 max-w-xl mx-auto">
            @csrf

            <div>
                <label for="name" class="block font-semibold mb-1">Product Name:</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" class="w-full border border-gray-300 rounded px-4 py-2" required>
            </div>

            <div>
                <label for="price" class="block font-semibold mb-1">Price (USD):</label>
                <input type="number" name="price" id="price" value="{{ old('price') }}" step="0.01" class="w-full border border-gray-300 rounded px-4 py-2" required>
            </div>

            <div>
                <label class="block font-semibold mb-1">Color:</label>
                <input type="text" name="color" value="{{ old('color') }}"  class="w-full border border-gray-300 rounded px-4 py-2" required>
            </div>

            <div>
                <label class="block font-semibold mb-1">Size:</label>
                <input type="text" name="size" value="{{ old('size') }}"  class="w-full border border-gray-300 rounded px-4 py-2" required>
            </div>

            <div>
                <label class="block font-semibold mb-1">Material:</label>
                <input type="text" name="material" value="{{ old('material') }}"  class="w-full border border-gray-300 rounded px-4 py-2" required>
            </div>

            <div>
                <label class="block font-semibold mb-1">Brand:</label>
                <input type="text" name="brand" value="{{ old('brand') }}" class="w-full border border-gray-300 rounded px-4 py-2" required>
            </div>

            <div>
                <label class="block font-semibold mb-1">Weight:</label>
                <input type="text" name="weight" value="{{ old('weight') }}"  class="w-full border border-gray-300 rounded px-4 py-2" required>
            </div>

            <div>
                <label for="image" class="block font-semibold mb-1">Product Image:</label>
                <input type="file" name="image" id="image" value="{{ old('image') }}" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-600 file:text-white hover:file:bg-blue-700 transition" required>
            </div>

            <div class="text-center">
                <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700 transition">
                    Insert Product
                </button>
            </div>
        </form>
    </div>
</body>
</html>
