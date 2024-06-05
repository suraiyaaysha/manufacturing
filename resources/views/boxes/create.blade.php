<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Box') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('boxes.store') }}">
                        @csrf

                        <div class="mt-4">
                            <label for="raw_product_id" class="block text-sm font-medium text-gray-700">Raw Product</label>
                            <select id="raw_product_id" name="raw_product_id" class="block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                                <option value="">Select Raw Product</option>
                                @foreach ($rawProducts as $rawProduct)
                                    <option value="{{ $rawProduct->id }}">{{ $rawProduct->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mt-4">
                            <label for="size_id" class="block text-sm font-medium text-gray-700">Size</label>
                            <select id="size_id" name="size_id" class="block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                                <option value="">Select Size</option>
                            </select>
                        </div>

                        <div class="mt-4">
                            <label for="quantity" class="block text-sm font-medium text-gray-700">Quantity</label>
                            <input type="number" id="quantity" name="quantity" class="block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                        </div>

                        <div class="mt-4">
                            <label for="weight" class="block text-sm font-medium text-gray-700">Weight (Grams)</label>
                            <input type="number" id="weight" name="weight" class="block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                {{ __('Create') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('raw_product_id').addEventListener('change', function () {
            var rawProductId = this.value;
            var sizeSelect = document.getElementById('size_id');

            sizeSelect.innerHTML = '<option value="">Select Size</option>'; // Clear current options

            if (rawProductId) {
                fetch(`/boxes/sizes/${rawProductId}`)
                    .then(response => response.json())
                    .then(data => {
                        data.forEach(size => {
                            var option = document.createElement('option');
                            option.value = size.id;
                            option.textContent = size.size;
                            sizeSelect.appendChild(option);
                        });
                    });
            }
        });
    </script>
</x-app-layout>
