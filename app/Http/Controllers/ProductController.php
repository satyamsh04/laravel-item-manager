<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Manufacturer;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /** GET /products */
    public function index()
    {
        $products = Product::with('manufacturer')->orderBy('id')->paginate(10);
        return view('products.index', compact('products'));
    }

    /** GET /products/{id} */
    public function show($id)
    {
        $product = Product::with('manufacturer')->findOrFail($id); // 404 if missing
        return view('products.show', compact('product'));
    }

    /** GET /products/create */
    public function create()
    {
        $manufacturers = Manufacturer::orderBy('name')->pluck('name', 'id');
        return view('products.create', compact('manufacturers'));
    }

    /** POST /products */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'between:0,999999.99'],
            'manufacturer_id' => ['required', 'exists:manufacturers,id'],
        ]);

        Product::create($data);

        return redirect()->route('products.index')->with('ok', 'Product created');
    }

    /** GET /products/{id}/edit */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $manufacturers = Manufacturer::orderBy('name')->pluck('name', 'id');
        return view('products.edit', compact('product', 'manufacturers'));
    }

    /** PUT /products/{id} */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'between:0,999999.99'],
            'manufacturer_id' => ['required', 'exists:manufacturers,id'],
        ]);

        $product->update($data);

        return redirect()->route('products.show', $product)->with('ok', 'Product updated');
    }

    /** DELETE /products/{id} */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with('ok', 'Product deleted');
    }
}