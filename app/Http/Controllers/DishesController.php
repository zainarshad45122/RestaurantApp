<?php

namespace App\Http\Controllers;

use App\Chef;
use App\User;
use App\DishImage;
use App\Dish;
use Illuminate\Http\Request;
use Auth; 
Use DB;
use Illuminate\Support\Facades\URL;
class DishesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $dishes = Dish::all();
        return response()->json(['dishes' => $dishes], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = $request->user();
      
        $this->validate($request, [
            'name' => 'required|min:3',
            'price' =>'required|integer',
            'serving_size' => 'required',
            'cuisine_type' => 'required' ,
            'dietary_information' => 'required|min:8',
            'course_type' => 'required',
            'description' => 'required|min:8',
            'ingredients' => 'required|array',
            'serving_time' => 'required',

        ]);
       
        $dish = Dish::create([
            'name' => $request->name,
            'price' => $request->price,
            'serving_size' => $request->serving_size,
            'cuisine_type' => $request->cuisine_type,
            'dietary_information'=> $request->dietary_information,
            'course_type' => $request->course_type,
            'description' => $request->description,
            'serving_time' => $request->serving_time,
            'restaurant_id' => $user->id,
        ]);
        $ingredient = $request->ingredients;
        for($x=0; $x< count($ingredient); $x++)
        {
            $ingredients = $dish->ingredients()->create(['ingredients' => $ingredient[$x] , ]);
        }
    
        
        $dish->save();
        return response()->json(['message' => "Dish Added Successfully"], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $user = $request->user();
        $dish_find =DB::table('dishes')->where('id', '=', $user->id)->get();
        for($x=0; $x< count($dish_find); $x++)
        {
            $dish_id = $dish_find[$x]->id;
            $dish = Dish::findOrFail($dish_id);
            $ingredient= DB::table('ingredients')->select('ingredients')->where('dish_id',$dish_id)->get();
            $dish_find[$x]->ingredients= $ingredient;
        }
        
        return response()->json([ 'dish' => $dish_find], 200);
    }

    public function priceFilter(Request $request)
    {
        $this->validate($request, [
            'min' => 'required|integer',
            'max' =>'required|integer',
        ]);

        $min = $request->min;
        $max = $request->max;
        
         $dishes = DB::table('dishes')
            ->whereBetween('price', [(int)$min,(int)$max])->get();
        return response()->json([ 'dishes' => $dishes], 200);
    }

     public function getdish(Request $request, $id)
    {
        $user = Auth::user();
        $chef = $user->chef;
        $chef_id = $chef->id;
        $dish= DB::table('dishes')->where('id',$id)->get();
        $dish_chef_id = $dish[0]->chef_id;
        if($chef_id == $dish_chef_id)
        {
            $ingredients= DB::table('ingredients')->select('ingredients')->where('dish_id',$id)->get();
            $servingtime= DB::table('serving_timings')->select('servingtime')->where('dish_id',$id)->get();
            $dishimage= DB::table('dish_images')->select(array('id','dishimages'))->where('dish_id',$id)->get();
            $reviews= DB::table('dish_reviews')->select(array('rating','comments'))->where('dish_id',$id)->get();
            return response()->json([ 
                                      'dish' => $dish, 
                                      'ingredients' => $ingredients,
                                      'dish_images' => $dishimage,
                                      'reviews' => $reviews,
                                    ], 200);
        }
        else 
        {
            return response()->json([
                'message' => 'Record could not Found'
            ], 500);
        }
        
    }

     public function getDishByCuisine(Request $request)
    {
        $cuisine = $request->cuisine_type;
        $dish= DB::table('dishes')->where('cuisine_type',$cuisine)->get();
        
            return response()->json(['dish' => $dish]);
    }
    public function getDishByCuisine1($cuisine)
    {
        $dish= DB::table('dishes')->where('cuisine_type',$cuisine)->get();
        
            return response()->json(['dish' => $dish]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function edit(Dish $dish)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dish $dish)
    {      
        $user = $request->user();
        
        $dish_id = $request->id;
        $dish = Dish::findOrFail($dish_id);
        $dish_restaurant_id = $dish->restaurant_id;
        if($user->id == $dish_restaurant_id)
        {
        $this->validate($request, [
            'name' => 'required|min:3',
            'price' =>'required|integer',
            'serving_size' => 'required',
            'cuisine_type' => 'required' ,
            'dietary_information' => 'required|min:8',
            'course_type' => 'required',
            'description' => 'required|min:8',
            'serving_time' => 'required|array',
     
        ]);
     
        $dishes = $dish->update([
            'name' => $request->name,
            'price' => $request->price,
            'serving_size' => $request->serving_size,
            'cuisine_type' => $request->cuisine_type,
            'dietary_information'=> $request->dietary_information,
            'course_type' => $request->course_type,
            'description' => $request->description,
            'serving_time' => $request->serving_time,
        ]);
        $ingredientD = DB::table('ingredients')->where('dish_id',$dish_id)->delete();
        $ingredient = $request->ingredients;
        for($x=0; $x< count($ingredient); $x++)
        {
            $ingredients = $dish->ingredients()->create(['ingredients' => $ingredient[$x] , ]);
        }

        return response()->json(['dish' => $dish], 200);
        }
         else 
        {
            return response()->json([
                'message' => 'Record could not Updated'
            ], 500);
        }
    }
    public function updateImage(Request $request)
    {
        $this->validate($request, [
            'dishimages' => 'required',  
        ]);
       
        $image_id= $request->id;  
        $dishimage = DishImage::findOrFail($image_id);   
       
        if($file = $request->file('dishimages'))
        {
            $name = $file->getClientOriginalName();
            $file->move('img/dishes',$name);
            $image = URL::asset('img/dishes/').'/'.$name;
        }

        $dishes = $dishimage->update([
            'dishimages' => $image,      
        ]);

        return response()->json(['dish' => 'Image updated Successfully'], 200);

    }

    public function dishdelete($id)
    {
       $dishD = DB::table('dishes')->where('id',$id)->delete();
       $ingredientD = DB::table('ingredients')->where('dish_id',$id)->delete();
       return response()->json(['dish' => 'Dish Delete Successfully'],200);
        
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dish $dish)
    {
        //
    }
}
