<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Kreait\Firebase;

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

use Kreait\Firebase\Database;
use Auth;


class FirebaseController extends Controller
{
    // -------------------- [ Insert Data ] ------------------
    public function index() {


        $factory = (new Factory)->withServiceAccount(__DIR__.'/FirebaseKey.json');

        $database = $factory->createDatabase();

      /*  $createPost    =   $database

        ->getReference('blog')
        ->push([
            'title' =>  'Hello ',
            'body'  =>  'This is really a cool database that is managed in real time.'

        ]);*/
        $data = [
           'id' => '3',
           'total_price' => '50',
           'table_number' => '7',
           'status' => 'InProcessing'
        ];
        $createPost    =  $database->getReference('restaurant/3')->set($data);

            
        echo '<pre>';
        print_r($createPost->getvalue());
        echo '</pre>';

    }

    // --------------- [ Listing Data ] ------------------
    public function getData() {

        $userId = Auth::user()->id;
        $branch_name = Auth::user()->branch_name;
     
        return view('orders_screen', compact('userId', 'branch_name'));
    }

      public function updateData() {
     
         $factory = (new Factory)->withServiceAccount(__DIR__.'/FirebaseKey.json');

        $database = $factory->createDatabase();

        $createPost    =   $database->getReference('restaurant/1')->update(array('status' => 'Completed'));

        return true;
            
      
    }
}
