<x-app-layout>
    <x-slot name="header">
        <h1 class="text-2xl font-semibold">Product Details</h1>

        <div class="container mt-4">
            <div class="mb-4">
                <h2 class="text-lg font-medium">Product Image</h2>
                <img src="https://placehold.co/300x300" alt="Product Placeholder" class="rounded-md shadow-md">
            </div>

            <div class="mb-4">
                <h2 class="text-lg font-medium">Product Information</h2>
                <p><strong>Name:</strong> {{ $product->name }}</p>
                <p><strong>Article:</strong> {{ $product->article }}</p>
                <p><strong>Status:</strong> {{ $product->status->label() }}</p>
            </div>

            <div class="mb-4">
                <h2 class="text-lg font-medium">Data</h2>
                @php
                    $data = json_decode($product->data, true);
                @endphp
                @if ($data && is_array($data))
                    <ul class="list-disc list-inside">
                        @foreach ($data as $key => $value)
                            <li>
                                <strong>{{ $key }}:</strong> {{ $value }}
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p>no data available</p>
                @endif
            </div>

            <div class="mt-6">
                <a href="{{ route('product.form', $product->id) }}" class="bg-blue-600 text-white px-4 py-2 rounded-md shadow-sm hover:bg-blue-700 focus:outline-none">Edit</a>
                <a href="{{ route('product.index') }}" class="ml-2 bg-gray-600 text-white px-4 py-2 rounded-md shadow-sm hover:bg-gray-700 focus:outline-none">Back to List</a>
            </div>
        </div>
    </x-slot>
</x-app-layout>
