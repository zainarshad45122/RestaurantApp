<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\User;
use App\Brand;
use App\RestaurantTable;
use App\Dish;
use DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $sales_sum = Order::all()->sum('total_price');
         $total_orders = count(Order::all());
         $total_restaurants = count(User::all());
         $restaurants = User::where('status', 'pending')->get();
         
         $brands = Brand::all();
         for($x=0; $x< count($restaurants); $x++)
         { 
             $brand= DB::table('brands')->where('id', $restaurants[$x]->brand_id)->get();
             $brand_name= $brand[0]->brand_name;
             $restaurants[$x]->brand_name= $brand_name;

         } 
         return view('admin.index', compact('sales_sum', 'total_orders', 'total_restaurants', 'restaurants', 'brands'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $restaurants = User::where('id', $id)->get();
          $brands = Brand::all();
         for($x=0; $x< count($restaurants); $x++)
         { 
             $brand= DB::table('brands')->where('id', $restaurants[$x]->brand_id)->get();
             $brand = $brand[0];
             $restaurants[$x]->brand= $brand;

         } 
         $restaurant = $restaurants[0];
         return view('admin.details', compact('restaurant','brands'));

     
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function brandRestaurants($id)
    {
          $restaurants = User::where('brand_id', $id)->get();
          $brand = Brand::where('id', $id)->get();
          $brand_name= $brand[0]->brand_name;
          $brands = Brand::all();
          return view('admin.brand_restaurants', compact('restaurants', 'brands', 'brand_name'));
    }
     public function approvedRestaurants()
    {
          $restaurants = User::where('status', "Approved")->get();
           for($x=0; $x< count($restaurants); $x++)
            { 
                 $brand= Brand::where('id', $restaurants[$x]->brand_id)->get();
                 $restaurants[$x]->brand= $brand[0];
            } 
          $brands = Brand::all();
          return view('admin.approved_restaurants', compact('restaurants', 'brands'));
    }
     public function blockedRestaurants()
    {
          $restaurants = User::where('status', "Blocked")->get();
           for($x=0; $x< count($restaurants); $x++)
            { 
                 $brand= Brand::where('id', $restaurants[$x]->brand_id)->get();
                 $restaurants[$x]->brand= $brand[0];
            } 
          $brands = Brand::all();
          return view('admin.blocked_restaurants', compact('restaurants', 'brands'));
    }
     public function inprocessingRestaurants()
    {
          $restaurants = User::where('status', "In Processing")->get();
           for($x=0; $x< count($restaurants); $x++)
            { 
                 $brand= Brand::where('id', $restaurants[$x]->brand_id)->get();
                 $restaurants[$x]->brand= $brand[0];
            } 
          $brands = Brand::all();
          return view('admin.inprocessing_restaurants', compact('restaurants', 'brands'));
    }
     public function pendingRestaurants()
    {
          $restaurants = User::where('status', "Pending")->get();
           for($x=0; $x< count($restaurants); $x++)
            { 
                 $brand= Brand::where('id', $restaurants[$x]->brand_id)->get();
                 $restaurants[$x]->brand= $brand[0];
            } 
          $brands = Brand::all();
          return view('admin.pending_restaurants', compact('restaurants', 'brands'));
    }
     public function orders($id)
    {
          $restaurant = User::where('id', $id)->get();
          $branch_name = $restaurant[0]->branch_name;
          $restaurant_id = $restaurant[0]->id;
          $orders = Order::where('restaurant_id', $restaurant_id)->get();
            for($x=0; $x< count($orders); $x++)
            { 
                 $table= RestaurantTable::where('id', $orders[$x]->table_id)->get();
                 $table_number= $table[0]->table_number;
                 $orders[$x]->table_number= $table_number;

            } 
          $brands = Brand::all();
          return view('admin.orders', compact('orders', 'brands', 'branch_name'));
          
    }
     public function orderDetails($id)
    {
          
          $order = Order::where('id', $id)->get();
          $order=$order[0];
          $table= RestaurantTable::where('id', $order->table_id)->get();
          $restaurant = User::where('id', $order->restaurant_id)->get();
          $branch_name = $restaurant[0]->branch_name;
          $table_number = $table[0]->table_number;
          $dishes= DB::table('ordered_dishes')->where('order_id', $order->id)->get();
          for($x=0; $x< count($dishes); $x++)
            { 
                 $dish= Dish::where('id', $dishes[$x]->dish_id)->get();
                 $dishes[$x]->dish= $dish[0];

            } 

          $brands = Brand::all();
          return view('admin.order_details', compact('order','table_number', 'dishes', 'branch_name', 'brands' ));
        
          
    }
     public function allBrands()
     {
         $brands = Brand::all();
         return view('admin.all_brands', compact('brands'));
     }
      public function editBrand($id)
     {
         $brands = Brand::all();
         $brand= Brand::where('id', $id)->first();
         return view('admin.update_brand', compact('brands', 'brand'));
     }
      public function updateBrand(Request $request, $id)
     {
         
          $this->validate($request, [
            'brand_name' => 'required|unique:brands',
        ]);

          Brand::where('id', $id)->update([
            'brand_name' => $request->brand_name,
             ]);

          $brands = Brand::all();
         return redirect('/all/brands'); 
     }
     public function addBrand()
     {
         $brands = Brand::all();
         return view('admin.add_brand', compact('brands'));
     }
     public function createBrand(Request $request)
     {
        $this->validate($request, [
            'brand_name' => 'required|unique:brands',
        ]);
            

        $user = Brand::create([
            'brand_name' => $request->brand_name,
        ]);

         return redirect('all/brands/'); 
     }

     public function addRestaurant()
     {
         $brands = Brand::all();
         return view('admin.add_restaurant', compact('brands'));
     }

     public function createRestaurant(Request $request)
        {
         $this->validate($request, [
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'chef_first_name' => 'required|min:3', 
            'chef_last_name' => 'required|min:3', 
            'branch_name' => 'required|min:3', 
            'branch_address' => 'required|min:3', 
            'branch_code'=> 'required|min:4',
            'branch_phone_number' => 'required', 
            'chef_phone_number'=> 'required',
            'brand_id'=> 'required' 
        ]);
          
            $user = User::create([
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'chef_first_name' => $request->chef_first_name,
            'chef_last_name' => $request->chef_last_name,
            'branch_name' => $request->branch_name,
            'branch_address' => $request->branch_address,
            'branch_code' => $request->branch_code,
            'branch_phone_number' => $request->branch_phone_number,
            'chef_phone_number' => $request->chef_phone_number,
            'brand_id' => $request->brand_id,
            'role' => 2
             ]);

         
          return redirect('restaurant/details/'.$user->id);        
         }

     public function updateRestaurant(Request $request, $id)
    {
          
          User::where('id', $id)->update([
            'chef_first_name' => $request->chef_first_name,
            'chef_last_name' => $request->chef_last_name,
            'branch_name' => $request->branch_name,
            'branch_address' => $request->branch_address,
            'branch_code' => $request->branch_code,
            'branch_phone_number' => $request->branch_phone_number,
            'chef_phone_number' => $request->chef_phone_number,
            'brand_id' => $request->brand_id,
             ]);

          $brands = Brand::all();
          return redirect('restaurant/details/'.$id);        
    }

     public function statusApproved($id)
    {
      $user = User::where('id', $id)->first();
      $user->status=  "Approved";
      $user->save();
      return redirect('restaurant/details/'.$id);
    }
     public function statusBlocked($id)
    {
      $user = User::where('id', $id)->first();
      $user->status=  "Blocked";
      $user->save();
      return redirect('restaurant/details/'.$id);
    }
    public function statusInProcessing($id)
    {
      $user = User::where('id', $id)->first();
      $user->status=  "In Processing";
      $user->save();
      return redirect('restaurant/details/'.$id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
    public function updateOrderStatus(Request $request)
    {
        $this->validate($request, [
            'order_id' => 'required',
            'order_status' => 'required',
           
        ]);
        Order::where('id', $request->order_id)->update(['order_status' => $request->order_status ]);
         return response()->json(['message' => 'Order status updated successfully'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
