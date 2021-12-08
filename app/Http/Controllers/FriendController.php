<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Friend;
use App\Models\User;
use App\Http\Traits\ApiResponse;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use App\Http\Resources\FriendResource;



class FriendController extends Controller
{
    use ApiResponse;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $friend = Friend::get($request->id);
        $user = auth()->user();
        if($user->hasRole('User')){
            $friend = Friend::get();
            if($friend)
            {
                return $this->sendJson(FriendResource::collection($friend));
            }
            throw new \App\Exceptions\NotFoundException;
        }
        throw new \App\Exceptions\NotRoleException;
    }


    public function close_friend( Request $request){
        $friends=Friends::find($request->user_id);
        if ($friends->is_close==0) {
            $friends->update([
                "is_close"=>1,
            ]);
            return $this->sendJson($friends);
        }
        // throw new \App\Exceptions\FailedCreateException;
    }

    
    public function delete_close_friend(Request $request)
    {
        $user = auth()->user();
        if($user->can('delete close friend')){
        $friend = Friends::find($request->friends_id);
        if($friend->is_close == 1){
        $friend->update(['is_close' => 0]);
        return $this->sendJson($friend);
    }
    throw new \App\Exceptions\NotFoundException;
        }
        throw new \App\Exceptions\NotAuthorizedException;
    }






}
