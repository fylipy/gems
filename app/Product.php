<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = ['title', 'content', ];

    public function category()
    {
        return $this->belongsTo('App\Product');
    }

    public function images()
    {
        return $this->belongsToMany('App\Image');
    }
}
