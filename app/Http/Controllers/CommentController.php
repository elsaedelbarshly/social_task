<?php

namespace App\Http\Controllers;

use App\Http\Resources\CommentResource;
use App\Http\Traits\ApiResponse;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;



use function PHPUnit\Framework\throwException;

class CommentController extends Controller
{
    use ApiResponse;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //get all data with json
    public function index()
    {
        $comment=Comment::get();
        return $this->sendJson(CommentResource::collection($comment));
    }

    

   

 
    public function show(Request $request)
    {
        $comment=Comment::find($request->id);
        return $this->sendJson(new CommentResource($comment));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
    //    $user= User::find($request->user_id);
        $user = auth()->user();
        if ($user->can('update_comment')) {
            $comment=Comment::find($request->id);
            if($comment)
            $comment->update([
                "user_id"=>$request->user_id,
                "body"=>$request->body,
                "post_id"=>$request->post_id,
                "parent_id"=>$request->parent_id,
            ]);
        return $this->sendJson(new CommentResource($comment));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        $user = auth()->user();

        // $role=Role::where('name','role1')->first();
        if ($user->can('delete_comment')) {
            $comment=Comment::find($request->id);
            if($comment){
                $comment->delete();
                return 'deleted succssfuly';
            }
            throw new \App\Exceptions\NotFoundException;
        }
        throw new \App\Exceptions\NotAuthorizedException;

    }
    public function add_comment(Request $request){
        $request->validate([
            "body"=>"required",
        ]);
        $comment=Comment::create([
            "user_id"=>$request->user_id,
            "body"=>$request->body,
            "post_id"=>$request->post_id,
            "parent_id"=>$request->parent_id,
        ]);
        if ($comment) {
            return $this->sendJson(new CommentResource($comment));
        }
        throw new \App\Exceptions\FailedCreateException;
    }
}
