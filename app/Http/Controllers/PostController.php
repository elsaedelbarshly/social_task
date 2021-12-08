<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Traits\ApiResponse;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PostController extends Controller
{
    use ApiResponse;


    public function index(Request $request)
    {
        $user = auth()->user();

        if($user->can('list posts')){

            $post = Post::get();

            if($post){
            return $this->sendJson(PostResource::collection($post));
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
         'body' =>  'required',
         'image_id' => 'numeric',
         'creator_id' => 'required|numeric',
         'friend_id' => 'numeric',
         'group_id' => 'numeric',
         'shared_id' => 'numeric',
        ]);


          $post = Post::create($request->all());

          if($post){
             return $this->sendJson(new PostResource($post));
          }
          throw new \App\Exceptions\FailedCreateException;
        }
        throw new \App\Exceptions\NotAuthorizedException;
    }


    public function show( Request $request)
    {
        $user = auth()->user();

        if($user->can('list posts')){

        $post = Post::find($request->post_id);

        if($post){
        return $this->sendJson(new PostResource($post));
        }
        throw new \App\Exceptions\NotFoundException;
    }
    throw new \App\Exceptions\NotAuthorizedException;
}


    public function update(Request $request)
    {
        $user = auth()->user();

        if($user->can('update post')){
            $post = Post::find($request->post_id);
            if($post){
                $post->update($request->all());
                return $this->sendJson(new PostResource($post));
            }
            throw new \App\Exceptions\FailedUpdateException;
        }
        throw new \App\Exceptions\NotAuthorizedException;
        }



    public function destroy(Request $request)
    {
        $user = auth()->user();
        if($user->can('delete post')){
        $post = Post::find($request->post_id);
        if($post){
            $post->delete();
            return $this->sendJson(new PostResource($post));
        }

         throw new \App\Exceptions\FailedDeleteException;
        }
        throw new \App\Exceptions\NotAuthorizedException;
    }




}
