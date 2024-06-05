<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Size') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('sizes.store') }}">
                        @csrf

                        <div class="mt-4">
                            <label for="raw_product_id" class="block text-sm font-medium text-gray-700">Raw Product</label>
                            <select id="raw_product_id" name="raw_product_id" class="block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                @foreach ($rawProducts as $rawProduct)
                                    <option value="{{ $rawProduct->id }}">{{ $rawProduct->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mt-4">
                            <label for="size" class="block text-sm font-medium text-gray-700">Size</label>
                            <input id="size" class="block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" type="text" name="size" required autofocus />
                        </div>
                        
                        <div class="mt-4">
                            <label for="price" class="block text-sm font-medium text-gray-700">Price (for 1000 pieces)</label>
                            <input id="price" class="block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" type="number" name="price" required />
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
</x-app-layout>
