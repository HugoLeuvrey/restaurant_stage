<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurants;
use App\Category;
use App\category_dish;
use App\Dishs;
use Carbon\Carbon;
use App\ImageModel;
use Image;
class DishController extends Controller
{
          public function index($restaurant)
    {
        $restaurant = Restaurants::find($restaurant);
        $category = Category::where("id_restaurant", $restaurant->id)->get();

        $dish = Dishs::Where("id_restaurant", $restaurant->id)->get();
        return view('dish.index', compact('restaurant', 'category', 'dish'));
    }

              public function create($restaurant)
    {
    	$restaurant = Restaurants::find($restaurant);
        $categorylist = Category::where("id_restaurant", $restaurant->id)->get();

        $category = Category::where("id_restaurant", $restaurant->id)->get();
        return view('dish.create', compact('restaurant', 'category', 'categorylist'));
    }

              public function store(Request $request, $restaurant)
    {


        $restaurant = Restaurants::find($restaurant);

		 $Dishs = new Dishs(); 
	     $Dishs ->id_restaurant = $restaurant ->id;  
	     $Dishs ->name = request("name");  
	     $Dishs ->price = request("price");  
	     $Dishs ->description = request("description");  
	     $Dishs ->image = request("description");  



        if($request->file('image')){

        	   $originalImage= $request->file('image');
          $thumbnailImage = Image::make($originalImage);
          $thumbnailPath = public_path().'/images/';
                $thumbnailImage->resize(600, null, function ($constraint) {
    	   $constraint->aspectRatio();
     	       });
           $rand = rand(1,100000);
     	     $thumbnailImage->save($thumbnailPath.$rand.$originalImage->getClientOriginalName()); 

      
      $Dishs->image = $rand.$originalImage->getClientOriginalName();
      }
	    	     $Dishs ->save();


foreach(request("categorybox") as $category_id)
{
    $category_dish = new category_dish();
    $category_dish->categories_id = $category_id;
    $category_dish->dishs_id = $Dishs->id;
    $category_dish->save();

}
    return back();

	     }



     	
     public function destroy(Dishs $dish)
    {
        $dish->delete();
         return back();
    }



}
