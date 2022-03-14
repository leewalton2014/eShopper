<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductFavouriteController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function store(Product $product, Request $request)
    {
        if ($product->favouriteBy($request->user())){
            return back();
        }

        $product->favourites()->create([
            'user_id' => $request->user()->id,
        ]);

        return back();
    }

    public function destroy(Product $product, Request $request)
    {
        //$request->user()->favourite()->where('product_id', $product->id)->delete();

        $product->favourites()->where('user_id', $request->user()->id)->delete();

        return back();
    }
}
