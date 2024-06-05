<?php

namespace App\Http\Controllers;

use App\Models\Box;
use App\Models\Size;
use App\Models\Product;
use App\Models\RawProduct;
use Illuminate\Http\Request;
use Picqer\Barcode\BarcodeGeneratorPNG;
use Illuminate\Support\Facades\Response;

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


    public function generateBarcodeForm($productId)
    {
        $product = Product::findOrFail($productId);
        $box = Box::findOrFail($product->box_id);
        $totalProducts = $box->quantity * $product->stock;

        return view('products.generate-barcode-form', compact('product', 'totalProducts'));
    }

    public function generateBarcodes(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'start' => 'required|integer',
            'end' => 'required|integer|gte:start',
        ]);

        $product = Product::findOrFail($request->product_id);
        $barcodes = [];

        for ($i = $request->start; $i <= $request->end; $i++) {
            $barcodes[] = $this->generateBarcode($product->id . $i);
        }

        return view('products.generated-barcodes', compact('product', 'barcodes'));
    }

    private function generateBarcode($code)
    {
        $generator = new BarcodeGeneratorPNG();
        $barcode = $generator->getBarcode($code, $generator::TYPE_CODE_128);
        return 'data:image/png;base64,' . base64_encode($barcode);
    }
}
