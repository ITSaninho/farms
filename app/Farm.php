<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Farm extends Model
{
    protected $table = 'farm';

    public function products()
    {
        return $this->hasMany('App\Product', 'farm_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
