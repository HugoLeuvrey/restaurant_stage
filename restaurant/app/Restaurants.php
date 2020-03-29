<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurants extends Model
{
       protected $table = 'restaurants';

    public function Categories()
    {
        return $this->BelongToMany('App\Category', 'restaurant_id', 'id');
    }
}
