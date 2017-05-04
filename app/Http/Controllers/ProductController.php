<?php

namespace App\Http\Controllers;

use App\Category;
use App\Image;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id');
        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'         => 'required|unique:products|max:255',
            'content'       => 'required',
            'price'         => 'required|numeric',
            'visible'       => 'boolean',
            'category_id'   => 'exists:categories,id'
        ]);

        $product = Product::create($request->all());  // Creating the product

        foreach ($request->image as $i){
            $destinationPath = 'images';
            $filename = $i->getClientOriginalName();
            $i->move($destinationPath, $filename);  // Saving the images into the folder

            $extension = $i->getClientOriginalExtension();
            $image = new Image();   // Saving the images into the database
            $image->mime = $i->getClientMimeType();
            $image->original_name = $filename;
            $image->name = $i->getFilename().'.'.$extension;
            $image->product_id = $product->id;
            $image->save();
        }

        return redirect('products')->with('success', 'Producto creado correctamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return 'editing';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        return 'deleting';
    }
}
