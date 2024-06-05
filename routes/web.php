<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BoxController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RawProductController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/raw-products', [RawProductController::class, 'index'])->name('raw-products.index');
Route::get('/raw-products/create', [RawProductController::class, 'create'])->name('raw-products.create');
Route::post('/raw-products/store',[ RawProductController::class, 'store'])->name('raw-products.store');

Route::get('/sizes', [SizeController::class, 'index'])->name('sizes.index');
Route::get('/sizes/create', [SizeController::class, 'create'])->name('sizes.create');
Route::post('/sizes/store', [SizeController::class, 'store'])->name('sizes.store');

Route::get('/boxes', [BoxController::class, 'index'])->name('boxes.index');
Route::get('/boxes/create', [BoxController::class, 'create'])->name('boxes.create');
Route::post('/boxes/store', [BoxController::class, 'store'])->name('boxes.store');
Route::get('boxes/sizes/{rawProduct}', [BoxController::class, 'getSizes']);

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products/store', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/sizes-and-boxes/{rawProductId}', [ProductController::class, 'getSizesAndBoxes']);

Route::get('/generate-barcode', [ProductController::class, 'generateBarcodeForm'])->name('products.generateBarcodeForm');
Route::post('/generate-barcode', [ProductController::class, 'generateBarcode'])->name('products.generateBarcode');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
