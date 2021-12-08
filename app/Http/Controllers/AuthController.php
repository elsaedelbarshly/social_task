<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Http\Traits\ApiResponse;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
    use ApiResponse;



    public function login(Request $request)
    {   
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password]))
        {
            $user = User::where('email',$request->email)->first();
            $token = $user->createToken('authToken')->plainTextToken;
            $user->assignRole('User');
            // return response()->json($user->name,$token, 200);
            return response()->json(['message' => 'Hi '.$user->name.', welcome to home','access_token' => $token, 'token_type' => 'Bearer', ]);
        }else {
            return response()->json(['Message' => 'Unauthorized'],401);
        }
    }



    public function register(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name'=>'required|string|max:255',
            'email'=>'required|string|email|unique:users|max:255',
            'password'=>'required|string|min:8'
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'gender'=>$request->gender,
            // 'is_active'=>$request->is_active,
            // 'is_admin'=>$request->is_admin,
            // 'type_id'=>$request->type_id,
            // 'profile_image_id'=>$request->profile_image_id,
            // 'cover_image_id'=>$request->cover_image_id
         ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        // $user['sms']=send_sms($user);

        // return $this->sendJson($user);

        return response()
            ->json(['data' => $user,'access_token' => $token, 'token_type' => 'Bearer', ]);
    }




    public function logout()
    {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'You have successfully logged out and the token was successfully deleted'
        ];
    }
}
