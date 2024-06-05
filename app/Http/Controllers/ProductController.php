<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\RawProduct;
use App\Models\Size;
use App\Models\Box;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(10);
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $rawProducts = RawProduct::all();
        return view('products.create', compact('rawProducts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'raw_product_id' => 'required|exists:raw_products,id',
            'size_id' => 'required|exists:sizes,id',
            'box_id' => 'required|exists:boxes,id',
            'stock' => 'required|integer',
        ]);

        Product::create($request->all());

        return redirect()->route('products.index')
                         ->with('success', 'Product created successfully.');
    }

    public function getSizesAndBoxes($rawProductId)
    {
        $sizes = Size::where('raw_product_id', $rawProductId)->get();
        $boxes = Box::where('raw_product_id', $rawProductId)->get();

        return response()->json(['sizes' => $sizes, 'boxes' => $boxes]);
    }
    
    public function generateBarcodeForm()
    {
        return view('products.generate-barcode-form');
    }

    public function generateBarcode(Request $request)
    {
        $start = $request->input('start');
        $end = $request->input('end');

        // Retrieve products within the specified range
        $products = Product::whereBetween('id', [$start, $end])->get();

        return view('products.generated-barcodes', compact('products'));
    }
}

