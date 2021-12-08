<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use App\Models\User;
use GrahamCampbell\ResultType\Success;
use Illuminate\Support\Facades\Auth;

class GoogleController extends Controller
{

    public function redirectToGoogle()

    {
        return Socialite::driver('google')->redirect();
    }


    public function handleGoogleCallback()

    {
        try {

            $user = Socialite::driver('google')->user();

            $finduser = User::where('google_id', $user->id)->first();

            if($finduser){

               $loggen_in = Auth::login($finduser);

               $user = auth()->user();

               $success['token'] =  $user->createToken('auth_token')->plainTextToken;
               return $success['token'];
            }else{

                $newUser = User::create([

                    'name' => $user->name,

                    'email' => $user->email,

                    'google_id'=> $user->id,

                    'password' => encrypt('123456dummy')

                ]);

                $loggen_in =  Auth::login($newUser);
                $user = auth()->user();

                $success['token'] =  $user->createToken('auth_token')->plainTextToken;
                return $success['token'];
            }

        } catch (Exception $e) {

            dd($e->getMessage());

        }

    }

}
