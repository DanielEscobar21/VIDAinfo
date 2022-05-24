<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\StoreProduct;
use App\Models\Ailment;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create(){
        $ailments = Ailment::all();
        return view('products.create', compact('ailments'));
    }

    public function store(Storeproduct $request){
        $product = new Product();
        $product->name_product = $request->name_product;
        $product->presentation_product = $request->presentation_product;
        $product->content_product = $request->content_product;
        $product->dose_product = $request->dose_product;
        $product->save();
        $product->ailments()->attach($request->ailments);
        return redirect()->route('products.show', $product);
    }

    public function show(Product $product){
        $ailments = Ailment::all();
        return view('products.show', compact('product', 'ailments'));
    }

    public function edit(Product $product){

        $ailments = Ailment::all()->sortBy('name_ailment');
        return view('products.edit', compact('product', 'ailments'));
    }

    public function update(Request $request, Product $product){
        $product->name_product = $request->name_product;
        $product->presentation_product = $request->presentation_product;
        $product->content_product = $request->content_product;
        $product->dose_product = $request->dose_product;
        $product->save();
        return redirect()->route('products.show', $product);
    }

    public function destroy(Product $product){
        $product->delete();
        return redirect()->route('products.index');
    }
}
