<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurants;
use App\Category;
use App\Dishs;
use Illuminate\Database\Eloquent\Collection;
class CategoryController extends Controller
{


        public function index($category)
    {
    	$category = Category::find($category);

    	$category_name = Category::where("id", $category->id)->get();
    	$category_menu = Category::where("id_restaurant", $category->id_restaurant)->get();

//->where('category_id','id'
       $dish_by_category = Category::with('dishes')->Where("id",$category->id)->get();
        return view('/category/index', compact('category', 'category_menu', 'category_name','dish_by_category'));
    }


        public function create($restaurant)
    {
    	$restaurant = Restaurants::find($restaurant);
    	$category = Category::where("id_restaurant", $restaurant->id)->get();
        return view('/category/create', compact('restaurant', 'category'));
    }

   public function store(Request $request, $restaurant)
	{

        request() ->validate(
      [    'name' => 'required',
      ]
    );

        $restaurant = Restaurants::find($restaurant);
		 $Category = new Category(); 
	     $Category ->id_restaurant = $restaurant ->id;  
	     $Category ->name = request("name");  

	      $Category ->icon = request("icon");  
	     $Category ->save();
         return back();
         return redirect('/home');
    }


        public function destroy(Category $category)
    {
        $category->delete();
         return back();
    }
}
