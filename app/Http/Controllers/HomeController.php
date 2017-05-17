<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'welcome']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function welcome(Request $request)
    {
        $products = Product::where('title', 'like', '%'.$request->get('search').'%' )->where('visible', 1)->get();
        $categories = Category::all();
        return view('welcome', compact('products', 'categories'));
    }
}
