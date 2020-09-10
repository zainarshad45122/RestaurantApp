<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.index');
    }

      public function getBrands()
    {
         $brand =Brand::get();
         return response()->json(['brands' => $brand], 200);
    }
}
