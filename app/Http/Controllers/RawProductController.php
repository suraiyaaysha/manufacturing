<?php

namespace App\Http\Controllers;

use App\Models\RawProduct;
use Illuminate\Http\Request;

class RawProductController extends Controller
{
    public function index()
    {
        $rawProducts = RawProduct::latest()->paginate(10);
        return view('raw-products.index', compact('rawProducts'));
    }

    public function create()
    {
        return view('raw-products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'prefix' => 'required|string|max:255',
        ]);

        RawProduct::create($request->all());

        return redirect()->route('raw-products.index')
                         ->with('success', 'Raw Product created successfully.');
    }
}
