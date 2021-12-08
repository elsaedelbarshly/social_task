<?php

namespace App\Http\Controllers;

use App\Models\React;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Traits\NotificationTrait;
use Spatie\Permission\Models\Role;
use App\Http\Traits\ApiResponse;
use Spatie\Permission\Models\Permission;
use App\Http\Resources\ReactResource;

class ReactController extends Controller
{
    
public function addReact(Request $request)
{
    $user = auth()->user();
    if($user->can('add_react'))
    {
    $addreact = new React;
    if($request->post_id != null)
    {
        $addreact = React::create([
            'user_id'=>$request->user_id,
            'post_id'=>$request->post_id,
            'comment_id'=>null,
            'type_id'=>$request->type_id,
        ]);
    }elseif($request->comment_id != null)
    {
        $addreact = React::create([
            'user_id'=>$request->user_id,
            'comment_id'=>$request->comment_id,
            'post_id'=>$request->post_id,
            'type_id'=>$request->type_id,
        ]);
    }else {
        throw new \App\Exceptions\NotFoundException;
    }
    return response()->json($addreact, 200);
    // return $this->sendJson(new ReactResource($addreact));
}
    throw new \App\Exceptions\NotRoleException;
}

public function removeReact(Request $request)
{
    $user = auth()->user();
    if($user->can('remove_react'))
    {
        $removereact = React::find($request->id);
        if($removereact)
        {
            $removereact->delete();
            return "deleted succssfuly";
        }
        throw new \App\Exceptions\NotFoundException;
    }throw new \App\Exceptions\NotRoleException;
}
}
