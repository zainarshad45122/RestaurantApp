<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\User;
use App\Brand;
use App\RestaurantTable;
use App\Dish;
use DB;
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

use Kreait\Firebase\Database;


class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
          $user = $request->user();
          $restaurant = User::where('id', $user->id)->get();
          $restaurant_id = $restaurant[0]->id;
          $orders = Order::where('restaurant_id', $restaurant_id)->get();
            for($x=0; $x< count($orders); $x++)
            { 
                 $table= RestaurantTable::where('id', $orders[$x]->table_id)->get();
                 $table_number= $table[0]->table_number;
                 $orders[$x]->table_number= $table_number;

            } 

          return response()->json(['orders' => $orders], 200);
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
      
        $this->validate($request, [
            'table_id' => 'required|integer',
            'restaurant_id' =>'required|integer',
            'total_price' => 'required|integer',
            'order_status' => 'required' ,
            'dish_id' => 'required|array',
        ]);
       
        $order = Order::create([
            'table_id' =>  $request->table_id,
            'restaurant_id' => $request->restaurant_id,
            'total_price' =>  $request->total_price,
            'order_status' =>  $request->order_status,
        ]);

        $dish_id = $request->dish_id;
        for($x=0; $x< count($dish_id); $x++)
        {
            $dishes =  DB::table('ordered_dishes')->insert([
                'order_id' => $order->id,
                'dish_id' => $dish_id[$x], 
             ]);
        }
        $factory = (new Factory)->withServiceAccount(__DIR__.'/FirebaseKey.json');

        $database = $factory->createDatabase();
        $int = (int)$request->restaurant_id;

         $data = [
           'id' => $order->id,
           'total_price' => $request->total_price,
           'table_number' => '7',
           'status' => $request->order_status,
           'restaurant_id' => $int
        ];
        $createPost    =  $database->getReference('restaurant/'.$order->id)->set($data);

         return response()->json(['message' => 'Order created successfully'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
                 $dishes[$x] = $dish[0];


            } 
           return response()->json(['order' => $order, '$dishes' => $dishes], 200);

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
         $factory = (new Factory)->withServiceAccount(__DIR__.'/FirebaseKey.json');

         $database = $factory->createDatabase();

        $createPost    =   $database->getReference('restaurant/'.$request->order_id)->update(array('status' => $request->order_status));
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
