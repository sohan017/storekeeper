<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('admin/product/index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin/product/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $validate = $request->validate([
            "name" => "required|string|max:255",
            "price" => "required|between:0,99.99",
            "quantity" => "required",
        ]);


//        dd($validate);

        $product = Product::create($validate);

        return redirect()->route("product.index", compact('product'))
                        ->withSuccess("Product successfully created.");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('admin/product/edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validate = $request->validate([
            "name" => "required|string|max:255",
            "price" => "required|between:0,99.99",
            "quantity" => "required",
        ]);


//        dd($validate);

        $product->update($validate);

        return redirect()->route("product.index", compact('product'))
            ->withSuccess("Product successfully updated.");
    }

    //sell
    public function sell($productId, $quantity)
        {
            $product = Product::findOrFail($productId);

            if ($product->quantity >= $quantity) {
                Sale::create([
                    'product_id' => $product->id,
                    'quantity_sold' => $quantity,
                ]);

                $product->decrement('quantity', $quantity);

                return redirect()->route('product.index')->with('success', 'Product sold successfully.');
            }

            return redirect()->route('product.index')->with('error', 'Insufficient stock.');
        }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route("product.index")->withSuccess("Product delete success.");
    
    }
}
