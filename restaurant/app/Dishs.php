<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dishs extends Model
{
    protected $table = 'dishs';

    public function Category()
    {
        return $this->belongsToMany('App\Category', 'category_dishes', 'categories_id', 'dishs_id')->withPivot('id', 'categories_id', 'dishs_id');;
    }
}
