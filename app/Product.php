<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';

    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id', 'id');
    }

    public function product_slider()
    {
        return $this->hasMany('App\Product_slider');
    }

    public function farm()
    {
        return $this->belongsTo('App\Farm');
    }
}
