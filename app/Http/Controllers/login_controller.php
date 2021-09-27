<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class login_controller extends Controller
{
    public function login(Request $request){
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){ 
             $user = Auth::user(); 
             $success['token'] =  $user->createToken('MyApp')-> accessToken; 
             $success['name'] =  $user->name;
 
             $response = [
                 'success' => true,
                 'data'    => $success,
                 'message' => 'User login successfully.',
             ];
 
 
             return response()->json($response, 200);
         }else{
             $response = [
                 'success' => false,
                 'message' => 'Unauthorised.',
             ];
 
             return response()->json($response, 404);
         }
     }
}
