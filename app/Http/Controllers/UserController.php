<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function roles(Request $request){
        $user=User::find($request->user_id);
        $roles=Role::where('name','user')->first();
        $user->assignRole($roles);
        return true;
    }
    public function destroy(Request $request)
    {
        $user = auth()->user();
        if($user->hasRole('User')){
        $user = User::find($request->id);
        if($user)
        {
            $user->delete();
        }
        throw new \App\Exceptions\NotFoundException;
    }
    throw new \App\Exceptions\NotRoleException;
    }
    public function restore(Request $request)
    {
        $user = auth()->user();
        if($user->hasRole('User')){
        $user = User::withTrashed()->where('id',$request->id)->first();
        if($user)
        {
            $user->restore();
        }
        throw new \App\Exceptions\NotFoundException;
    }
    throw new \App\Exceptions\NotRoleException;
    }

    public function role_user(Request $request){

        $user = User::find($request->user_id);
        $role = Role::where('name','user')->first();
        // dd($role);
        $user->assignRole($role);
       return true;
    }
 

   
}
