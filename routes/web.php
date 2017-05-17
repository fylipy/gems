<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function (\Illuminate\Http\Request $request) {
//    $products = \App\Product::where('title', 'like', '%'.$request->get('search').'%' )->get();
//    $categories = \App\Category::all();
//    return view('welcome', compact('products', 'categories'));
//})->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/', 'HomeController@welcome')->name('welcome');

Route::resource('products', 'ProductController');

/**
 * Routes of the web app.
 *
 */
Route::get('/categories/{id}', 'WebController@showProductsOfCategory')->name('categories.showProducts');
Route::get('/product/{id}', 'WebController@showProduct')->name('showProduct');
