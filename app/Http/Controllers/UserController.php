<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;

class UserController extends BaseController
{

    public function register(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();


        return response()->json([
            'success' => true,
            'data' => $user
        ], 200);
    }


    //
    public function login(Request $request){

        try{
            $input = $request->only(['email','password']);
            $jwtToken = null;

            if(! ($jwtToken = \JWTAuth::attempt($input))){
                return response()->json([
                    'success' => false,
                    'message' => 'Invalid Email or Password',
                ], 401);
            }

            return response()->json([
                'success' => true,
                'token' => $jwtToken,
            ]);

        }catch (JWTException $exception){

        }
    }
}
