<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginRequest;
use App\Http\Requests\Api\SignupRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    
    public function signup(SignupRequest $request) {
         $credential = $request->validated();
        /** @var User $user */
        $user = User::create(
            [
                "name" => $credential["name"], 
                "email" => $credential["email"],
                "password" => bcrypt($credential["password"])
            ]
            );

    //    $token =  $user->createToken("user")->planeTextToken;
       return response(
        [
            "user" => $user,
            // "token" => $token
        ]);
    }

    public function login(LoginRequest $request)
    {
        $credential = $request->validated();

        if(!Auth::attempt($credential)){
            return response(
                [
                    "message" => "either email or password invalid"
                ]
                );
        }
        /** @var User $user */
        $user = Auth::user();
        $token =  $user->createToken("user")->planeTextToken;
        return response(
            [
                "user" => $user,
                "token" => $token
            ]
        );
    }


    public function logout(Request $request) {
        /** @var User $user */
        $user = $request->user();
        $user->currentAccessToken()->delete();
        return response("", 204);
    }

}
