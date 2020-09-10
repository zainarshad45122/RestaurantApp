<?php
 
namespace App\Http\Controllers;
 
use App\User;
use App\RestaurantTable;
use Illuminate\Http\Request;
 
class PassportController extends Controller
{
    /**
     * Handles Registration Request
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
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
 
    //    $token = $user->createToken('TutsForWeb')->accessToken;
 
        return response()->json(['message' => "Your data has been successfully submitted to us, please wait for Admin Approval."], 200);
    }
    public function createTable(Request $request)
    {
        $this->validate($request, [
            'table_number' => 'required',
            'restaurant_id' => 'required',
        ]);
 
        $user = RestaurantTable::create([
            'table_number' => $request->table_number,
             'user_id' => $request->restaurant_id,
        ]);
 
       
 
        return response()->json(['message' => "Table created Successfully"], 200);
    }
 
    /**
     * Handles Login Request
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];
 
        if (auth()->attempt($credentials) ) {
             $user = User::where('email', $request->email)->get();
             if($user[0]->status=="Approved")
             {
                 $token = auth()->user()->createToken('TutsForWeb')->accessToken;
                 return response()->json(['token' => $token], 200);
             }
             else {
                return response()->json(['message' => 'Your account is'.' '.$user[0]->status], 401);
             }
            
           
        } else {
            return response()->json(['error' => 'Your email or password is incorrect'], 401);
        }
    }
 
    /**
     * Returns Authenticated User Details
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function details()
    {
        return response()->json(['user' => auth()->user()], 200);
    }
}