<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    @foreach ($products as $product)
                        <div class="p-4 bg-gray-200 mb-4 max-w-xs rounded-sm">
                            <p>{{ $product->name }} - Barcode: <img src="{{ $product->generateBarcode() }}"
                                    alt="Barcode"></p>
                            <p>Price: ${{ number_format($product->size->price, 2) }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
