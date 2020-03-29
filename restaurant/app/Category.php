<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    public function Restaurant()
    {
        return $this->belongsTo('App\Restaurant', 'restaurant_id', 'id');
    }


        public function Dishes()
    {
       return $this->belongsToMany('App\Dishs', 'category_dishes', 'categories_id', 'dishs_id');
    }
}
