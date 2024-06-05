{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('products.store') }}">
                        @csrf

                        <div class="mt-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                            <input id="name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" type="text" name="name" required autofocus />
                        </div>

                        <div class="mt-4">
                            <label for="raw_product_id" class="block text-sm font-medium text-gray-700">Raw Product</
                                label>
                                <select id="raw_product_id" name="raw_product_id" autocomplete="raw_product_id"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    <option>Select Raw Product</option>
                                    @foreach ($rawProducts as $rawProduct)
                                        <option value="{{ $rawProduct->id }}">{{ $rawProduct->name }}</option>
                                    @endforeach
                                </select>
                            </div>
    
                            <div class="mt-4">
                                <label for="size_id" class="block text-sm font-medium text-gray-700">Size</label>
                                <select id="size_id" name="size_id" autocomplete="size_id"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    <option>Select Size</option>
                                    @foreach ($sizes as $size)
                                        <option value="{{ $size->id }}">{{ $size->size }}</option>
                                    @endforeach
                                </select>
                            </div>
    
                            <div class="mt-4">
                                <label for="box_id" class="block text-sm font-medium text-gray-700">Box</label>
                                <select id="box_id" name="box_id" autocomplete="box_id"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    <option>Select Box</option>
                                    @foreach ($boxes as $box)
                                        <option value="{{ $box->id }}">{{ $box->id }}</option>
                                    @endforeach
                                </select>
                            </div>
    
                            <div class="mt-4">
                                <label for="stock" class="block text-sm font-medium text-gray-700">Stock (box
                                    quantity)</label>
                                <input id="stock" name="stock" type="number" min="0"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
    
                            <div class="flex items-center justify-end mt-4">
                                <button type="submit"
                                    class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                    {{ __('Create') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
     --}}


     <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Create Product') }}
            </h2>
        </x-slot>
    
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                        <form method="POST" action="{{ route('products.store') }}">
                            @csrf
    
                            <div class="mt-4">
                                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                                <input id="name" name="name" type="text" required autofocus
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
    
                            <div class="mt-4">
                                <label for="raw_product_id" class="block text-sm font-medium text-gray-700">Raw Product</label>
                                <select id="raw_product_id" name="raw_product_id"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    <option value="">Select Raw Product</option>
                                    @foreach ($rawProducts as $rawProduct)
                                        <option value="{{ $rawProduct->id }}">{{ $rawProduct->name }}</option>
                                    @endforeach
                                </select>
                            </div>
    
                            <div class="mt-4">
                                <label for="size_id" class="block text-sm font-medium text-gray-700">Size</label>
                                <select id="size_id" name="size_id"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    <option value="">Select Size</option>
                                </select>
                            </div>
    
                            <div class="mt-4">
                                <label for="box_id" class="block text-sm font-medium text-gray-700">Box</label>
                                <select id="box_id" name="box_id"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    <option value="">Select Box</option>
                                </select>
                            </div>
    
                            <div class="mt-4">
                                <label for="stock" class="block text-sm font-medium text-gray-700">Stock (box quantity)</label>
                                <input id="stock" name="stock" type="number" min="0"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
    
                            <div class="flex items-center justify-end mt-4">
                                <button type="submit"
                                    class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
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
                if (rawProductId) {
                    fetch(`/products/sizes-and-boxes/${rawProductId}`)
                        .then(response => response.json())
                        .then(data => {
                            var sizeSelect = document.getElementById('size_id');
                            var boxSelect = document.getElementById('box_id');
    
                            sizeSelect.innerHTML = '<option value="">Select Size</option>';
                            boxSelect.innerHTML = '<option value="">Select Box</option>';
    
                            data.sizes.forEach(size => {
                                sizeSelect.innerHTML += `<option value="${size.id}">${size.size}</option>`;
                            });
    
                            data.boxes.forEach(box => {
                                boxSelect.innerHTML += `<option value="${box.id}">${box.id}</option>`;
                            });
                        })
                        .catch(error => console.error('Error fetching sizes and boxes:', error));
                } else {
                    document.getElementById('size_id').innerHTML = '<option value="">Select Size</option>';
                    document.getElementById('box_id').innerHTML = '<option value="">Select Box</option>';
                }
            });
        </script>
    </x-app-layout>
    
