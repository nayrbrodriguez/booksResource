<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Auth;
use Validator;
use App\User;

class UserController extends Controller
{
    public function index(Request $request){
    	$validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->fails()) { 
            return $validator->errors();
        }

        if(Auth::attempt([
        	'email' => request('email'), 
        	'password' => request('password')
        ]))
        {
            $user = Auth::user();
            $success['token'] =  $user->createToken('')->accessToken;
            return $success;
        }
        else{
            return with('Unauthorized');
        }
    }

}
