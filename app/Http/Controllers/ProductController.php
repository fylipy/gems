<?php

namespace App\Http\Controllers;

use App\Category;
use App\Image;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
            'category_id'   => 'exists:categories,id',
            'image'         => 'max:5000'
        ]);

        $product = Product::create($request->all());  // Creating the product

        if ($request->image)
        {
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
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::pluck('name', 'id');
        return view('products.edit', compact('product', 'categories'));
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
        $this->validate($request, [
            'title'         => 'required|max:255|unique:products,id,'.$product->id,
            'content'       => 'required',
            'price'         => 'required|numeric',
            'visible'       => 'boolean',
            'category_id'   => 'exists:categories,id'
        ]);

        $product->update($request->all());
        if (!$request->visible)
        {
            $product->visible = 0;
            $product->save();
        }

        if ($request->image)
        {
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
        }

        return redirect('products')->with('success', 'Producto editado correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json(['ok'=> true], 200);
    }
}
