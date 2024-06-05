<x-app-layout>
    <form action="/generate-barcode" method="post">
        @csrf
        <label for="start">Start:</label>
        <input type="number" id="start" name="start" required>
        <label for="end">End:</label>
        <input type="number" id="end" name="end" required>
        <button type="submit">Generate Barcodes</button>
    </form>
    
</x-app-layout>
