<?php

namespace App\Http\Controllers;

use App\Models\Size;
use App\Models\RawProduct;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    public function index()
    {
        // $sizes = Size::all();
        $sizes = Size::with('rawProduct')->latest()->paginate(10); 
        return view('sizes.index', compact('sizes'));
    }

    public function create()
    {
        $rawProducts = RawProduct::all();
        return view('sizes.create', compact('rawProducts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'raw_product_id' => 'required|exists:raw_products,id',
            'size' => 'required|string|max:255',
            'price' => 'required|numeric',
        ]);

        // Calculate price for 1000 pieces
        $pricePerPiece = $request->price / 1000;

        Size::create([
            'raw_product_id' => $request->raw_product_id,
            'size' => $request->size,
            'price' => $pricePerPiece,
        ]);

        return redirect()->route('sizes.index')
                         ->with('success', 'Size created successfully.');
    }
}

