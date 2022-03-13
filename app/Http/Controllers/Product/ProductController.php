<?php

namespace App\Http\Controllers\Product;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->only(['store', 'destroy', 'create_product']);
    }

    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->with('user')->paginate(8);

        return view('products.index', [
            'products' => $products,
        ]);
    }

    public function create_product()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        //validate data
        $this->validate($request, [
            'product_name' => 'required',
            'description' => 'required',
            'category' => 'required',
            'price' => 'required',
            'image' => 'required',
        ]);

        //add to db
        $request->user()->products()->create($request->only('product_name', 'description', 'category', 'price', 'image'));

        //redirect
        return redirect()->route('products');
    }

    public function destroy(Product $product)
    {
        //check policy

        //delete item
        $product->delete();

        //redirect
        return back();
    }
}
