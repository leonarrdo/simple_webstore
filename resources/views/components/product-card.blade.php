@props([
    'product',
    'showBuyButton' => false,
    'showToggleButton' => false,
    'showStatus' => false,
])

<div class="bg-white rounded-lg shadow-md p-4 flex flex-col">
    <div class="flex-grow">
        <h2 class="text-xl font-semibold mb-2 text-center">{{ $product->name }}</h2>

        @if (!empty($product->main_image_url))
            <div class="flex justify-center mb-4">
                <img src="{{ $product->main_image_url }}" alt="Product Image" class="w-32 h-32 object-cover rounded" />
            </div>
        @endif

        <div>
            <h3 class="font-semibold mb-1">Attributes:</h3>
            <ul class="text-black text-sm space-y-1">
                @foreach ($product->attributes as $attribute)
                    <li>
                        <span class="font-semibold">{{ $attribute->attributeType->name ?? $attribute->name }}:</span>
                        {{ $attribute->value }}
                    </li>
                @endforeach
            </ul>
        </div>

        <p class="text-green-600 font-bold my-2 text-center">
            USD ${{ number_format($product->price, 2, ',', '.') }}
        </p>

        @if($showStatus)
            <p class="text-center text-sm font-semibold {{ $product->is_active ? 'text-green-700' : 'text-red-600' }}">
                Status: {{ $product->is_active ? 'Active' : 'Inactive' }}
            </p>
        @endif
    </div>

    @if($showBuyButton)
        <div class="mt-4">
            <button class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition">
                Add to cart
            </button>
        </div>
    @endif

    @if($showToggleButton)
        <div class="mt-4">
            <form method="POST" action="{{ route('products.toggle', $product->id) }}">
                @csrf
                @method('PATCH')
                <button type="submit"
                        class="w-full {{ $product->is_active ? 'bg-red-600 hover:bg-red-700' : 'bg-blue-600 hover:bg-blue-700' }} text-white py-2 rounded transition">
                    {{ $product->is_active ? 'Deactivate' : 'Activate' }}
                </button>
            </form>
        </div>
    @endif
</div>
