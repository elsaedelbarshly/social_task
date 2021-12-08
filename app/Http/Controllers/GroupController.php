<?php

namespace App\Http\Controllers;

use App\Http\Resources\GroupResource;
use App\Models\Group;
use App\Models\User;
use App\Models\GroupUser;
use Illuminate\Http\Request;
use App\Http\Traits\ApiResponse;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class GroupController extends Controller
{
    use ApiResponse;


    public function index()
    {
       $user = auth()->user();
       if($user->hasRole('User')){
           $groups = Group::get();
           if($groups){
             return $this->sendJson(GroupResource::collection($groups));
           }
           throw new \App\Exceptions\NotFoundException;
       }
       throw new \App\Exceptions\NotAuthorizedException;
    }

    public function show(Request $request)
    {
        $user = auth()->user();
        if($user->hasRole('User')){
        $group = Group::find($request->group_id);
        if($group){
            return $this->sendJson(new GroupResource($group));
        }
        throw new \App\Exceptions\NotFoundException;
    }
    throw new \App\Exceptions\NotAuthorizedException;
    }


    public function store(Request $request)
    {
        $user = auth()->user();
        if($user->hasRole('User')){
             $request->validate([

        "creator_id"=>"numeric",
        "image_id"=>"numeric",
        "name"=>"required",
        "description"=>"required",
       ]);

     $NewGroup = Group::create($request->all());
     if($NewGroup){
    return $this->sendJson(new GroupResource($NewGroup));
       }

    throw new \App\Exceptions\NotFoundException;
    }
    throw new \App\Exceptions\NotAuthorizedException;
    }



    public function update(Request $request)
    {
        $user = auth()->user();
        if($user->hasRole('User')){
        $group = Group::find($request->group_id);
        if($group){
            $group->update($request->all());
            return $this->sendJson(new GroupResource($group));
        }
        throw new \App\Exceptions\NotFoundException;
    }
    throw new \App\Exceptions\NotAuthorizedException;
    }




    public function destroy(Request $request)
    {
        $user = auth()->user();
        if($user->hasRole('User')){
        $group = Group::find($request->group_id);
        if($group->delete()){
            return 'deleted succssfuly';
        }
        throw new \App\Exceptions\NotFoundException;
    }
    throw new \App\Exceptions\NotAuthorizedException;
    }




    public function addFriendToGroup(Request $request)
    {
     $user = auth()->user();
        if($user->can('add_friend_to_groupe'))
        {
            $addfrind = GroupUser::create([
                'user_id'=>$request->user_id,
                'group_id'=>$request->user_id,
            ]);
            return response()->json($addfrind, 200);
        
            throw new \App\Exceptions\NotFoundException;
        }
        throw new \App\Exceptions\NotRoleException;
    }



    public function removeFriendToGroup(Request $request)
    {
        $user = $user = auth()->user();
        if($user->hasRole('User'))
        {
            $removefrind = GroupUser::find($request->id);
            if($removefrind)
            {
                $removefrind->delete();
                return "deleted succssfuly";
            }
            throw new \App\Exceptions\NotFoundException;
        }
        throw new \App\Exceptions\NotRoleException;
    }
}



