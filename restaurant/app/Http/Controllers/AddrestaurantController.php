<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurants;
use App\Category;

use Auth;

class AddrestaurantController extends Controller
{
        public function create()
    {
        return view('/restaurant/create');
    }



          public function store(Request $request)
	{

        request() ->validate(
      [    'name' => 'required',
      ]
    );
		 $Restaurants = new Restaurants(); 

	     $Restaurants ->id_user = Auth::user()->id;  
	     $Restaurants ->name = request("name");  
	     $Restaurants ->save();
         return redirect('/home');
    }


  		  public function show($restaurant)
    {
   
        $restaurant = Restaurants::find($restaurant);
        $category = Category::where("id_restaurant", $restaurant->id)->get();
        return view('restaurant.show', compact('restaurant', 'category'));
    }



        public function destroy(Restaurants $restaurant)
    {
        $restaurant->delete();
        return redirect('/home');
    }
}
