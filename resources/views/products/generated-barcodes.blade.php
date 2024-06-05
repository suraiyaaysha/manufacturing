<x-app-layout>
    @foreach ($products as $product)
    <div>
        <p>{{ $product->name }} - Barcode: <img src="{{ $product->generateBarcode() }}" alt="Barcode"></p>
        <p>Price: ${{ number_format($product->size->price, 2) }}</p>
    </div>
@endforeach

</x-app-layout>
