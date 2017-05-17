<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function showProductsOfCategory ($id){
        $categories = Category::all();
        $products = Product::where('category_id', $id)
            ->where('visible', 1)
            ->get();
        if ($products)
            return view('welcome', compact('products', 'categories'));
        return redirect('/');
    }

    public function showProduct ($id){
        $product = Product::findOrFail($id);
        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('visible', 1)
            ->limit(4)
            ->get();
        if ($product)
            return view('web.product', compact('product', 'relatedProducts'));
        return redirect('/');
    }
}
