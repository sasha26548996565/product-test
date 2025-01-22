<x-app-layout>
    <x-slot name="header">
        <h1 class="text-2xl font-semibold">{{ isset($product) && $product->id ? 'Edit' : 'Create' }} Product</h1>

        <div class="container mt-4">
            <form
                action="{{ isset($product) && $product->id ? route('product.update', $product->id) : route('product.store') }}"
                method="POST">
                @csrf
                @if (isset($product) && $product->id)
                    @method('PUT')
                @endif
                <div class="mb-4">
                    <label for="article" class="block text-sm font-medium text-gray-700">Article</label>
                    <input type="text" id="article" name="article"
                        value="{{ old('article', $product->article ?? '') }}"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        required
                        @disabled(((isset($product) && $product->id) ? (checkAdminRole() == false) : false))>
                    @error('article')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $product->name ?? '') }}"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        required>
                    @error('name')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                    <select id="status" name="status"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="1"
                            {{ old('status', $product?->status?->label() ?? '') == 'available' ? 'selected' : '' }}>Available
                        </option>
                        <option value="2"
                            {{ old('status', $product?->status?->label() ?? '') == 'unavailable' ? 'selected' : '' }}>Unavailable
                        </option>
                    </select>
                    @error('status')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="data" class="block text-sm font-medium text-gray-700">Data</label>
                    <div id="json-data-list">
                        @foreach ($data as $key => $value)
                            <div class="json-item flex items-center mb-2">
                                <input type="text" name="data[{{ $key }}]" value="{{ $key }}"
                                    class="mt-1 block w-1/3 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm mr-2"
                                    placeholder="Key" required>
                                <input type="text" name="data[{{ $key }}][]" value="{{ $value }}"
                                    class="mt-1 block w-1/3 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                    placeholder="Value" required>
                                <button type="button" class="ml-2 text-red-500 remove-json-item">Remove</button>
                            </div>
                        @endforeach

                    </div>
                    <button type="button" id="add-json-item"
                        class="bg-green-500 text-white px-4 py-2 rounded-md shadow-sm hover:bg-green-600 focus:outline-none">Add
                        data</button>
                    @error('data')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <div class="flex justify-end mt-6">
                    <button type="submit"
                        class="bg-blue-600 text-white px-4 py-2 rounded-md shadow-sm hover:bg-blue-700 focus:outline-none">Save</button>
                </div>
            </form>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                let dataIndex = {{ isset($data) ? count($data) : 0 }};

                document.getElementById('add-json-item').addEventListener('click', function() {
                    const newItem = document.createElement('div');
                    newItem.classList.add('json-item', 'flex', 'items-center', 'mb-2');

                    newItem.innerHTML = `
            <input type="text" name="data[new_${dataIndex}][key]" class="mt-1 block w-1/3 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Key" required>
            <input type="text" name="data[new_${dataIndex}][value]" class="mt-1 block w-1/3 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Value" required>
            <button type="button" class="ml-2 text-red-500 remove-json-item">Remove</button>
        `;

                    document.getElementById('json-data-list').appendChild(newItem);
                    dataIndex++;
                });

                document.addEventListener('click', function(e) {
                    if (e.target && e.target.classList.contains('remove-json-item')) {
                        e.target.closest('.json-item').remove();
                    }
                });
            });
        </script>
    </x-slot>
</x-app-layout>
