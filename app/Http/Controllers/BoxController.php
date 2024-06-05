<?php

namespace App\Http\Controllers;

use App\Models\Box;
use App\Models\RawProduct;
use App\Models\Size;
use Illuminate\Http\Request;

class BoxController extends Controller
{
    public function index()
    {
        $boxes = Box::latest()->paginate(10);
        return view('boxes.index', compact('boxes'));
    }

    public function create()
    {
        $rawProducts = RawProduct::all();
        return view('boxes.create', compact('rawProducts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'raw_product_id' => 'required|exists:raw_products,id',
            'size_id' => 'required|exists:sizes,id',
            'quantity' => 'required|integer',
            'weight' => 'required|numeric',
        ]);

        Box::create($request->all());

        return redirect()->route('boxes.index')
                         ->with('success', 'Box created successfully.');
    }

    public function getSizes(RawProduct $rawProduct)
    {
        $sizes = Size::where('raw_product_id', $rawProduct->id)->get();
        return response()->json($sizes);
    }
}

