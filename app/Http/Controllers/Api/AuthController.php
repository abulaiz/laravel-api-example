<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Validator;
use App\User;

class AuthController extends Controller
{
    
    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|exists:users',
        ]);        

        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all(), 'status' => 'failed'], 401);
        }

        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){ 
            $user = Auth::user();
            return response()->json([
                'status' => 'success',
                'token' =>  $user->createToken('TestToken')->accessToken,
            ], 200); 
        } 
        else{ 
            return response()->json(['status'=>'failed', 'errors' => 'Password mismatch.'], 401); 
        }     	
    }

    public function register(Request $request){

	    $validator = Validator::make($request->all(), [
	        'name' => 'required|string|max:255',
	        'email' => 'required|string|email|max:255|unique:users',
	        'password' => 'required|string|min:6|confirmed',
	    ]);

	    if ($validator->fails())
	    {
	        return response()->json(['errors'=>$validator->errors()->all(), 'status' => 'failed'], 401);
	    }

	    $request['password'] = bcrypt( $request['password'] );
	    $user = User::create($request->toArray());

	    $token = $user->createToken('TestToken')->accessToken;

	    return response(['token' => $token, 'status' => 'success'], 200);    	
    }

}
