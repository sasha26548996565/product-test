<x-app-layout>
    <x-slot name="header">
        <div class="container mt-4">
            <h1 class="text-2xl font-semibold">products</h1>
            <h3 class="text-xl font-semibold">
                <a href="{{ route('product.form') }}"class="text-blue-600 hover:text-blue-800">Create</a>
            </h3>
            @if ($products->isEmpty())
                <p>no products available</p>
            @else
                <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 border-b">ID</th>
                            <th class="px-4 py-2 border-b">Article</th>
                            <th class="px-4 py-2 border-b">Name</th>
                            <th class="px-4 py-2 border-b">Status</th>
                            <th class="px-4 py-2 border-b">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td class="px-4 py-2 border-b"><a
                                        href="{{ route('product.show', $product->id) }}">{{ $product->id }}</a></td>
                                <td class="px-4 py-2 border-b"><a
                                        href="{{ route('product.show', $product->id) }}">{{ $product->article }}</a>
                                </td>
                                <td class="px-4 py-2 border-b"><a
                                        href="{{ route('product.show', $product->id) }}">{{ $product->name }}</a></td>
                                <td class="px-4 py-2 border-b">
                                    <span
                                        class="text-sm {{ $product->status->label() === 'available' ? 'text-green-500' : 'text-red-500' }}">
                                        {{ $product->status->label() }}
                                    </span>
                                </td>
                                <td class="px-4 py-2 border-b">
                                    <a href="{{ route('product.form', $product->id) }}"
                                        class="text-blue-600 hover:text-blue-800">Edit</a>

                                    <form action="{{ route('product.destroy', $product->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-800">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>

    </x-slot>
</x-app-layout>
