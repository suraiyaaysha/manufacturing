<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <h2 class="text-xl font-semibold text-gray-900">Generated Barcodes for {{ $product->name }}</h2>
                    
                    @foreach ($barcodes as $barcode)
                        <div class="p-4 bg-gray-200 mb-4 max-w-xs rounded-sm">
                            <img src="{{ $barcode }}" alt="Barcode">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
