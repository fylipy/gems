<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = ['title', 'content', 'price', 'visible', 'color', 'category_id'];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function images()
    {
        return $this->hasMany('App\Image');
    }

    public function getFirstImage()
    {
        $image = Image::where('product_id', $this->id)->first();
        if ($image)
            return $image;
        return '';
    }
}
