<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlockController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FriendController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\smsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReactController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('/login', [AuthController::class, 'login'])->name('login');





Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);


   Route::post('register', [AuthController::class,'register']);
   Route::post('login', [AuthController::class,'login']);
   Route::post('logout', [AuthController::class,'logout'])->middleware('auth:sanctum');


//elsaed tassk 1
    Route::group(['middelware'=>['auth:sanctum']],function(){

      Route::get('friend-list',[FriendController::class,'index']);
      Route::post('delete-close-friend', [FriendController::class,"delete_close_friend"]);
      Route::get('is-close',[FriendController::class,'close_friend']);

      Route::post('add-react',[ReactController::class,'addReact']);
      Route::post('remove-react',[ReactController::class,'removeReact']);

      Route::post('soft-delete',[UserController::class,'destroy']);
      Route::post('restore',[UserController::class,'restore']);
      Route::post('roles',[UserController::class,'roles']);
      Route::post('role-user' , [UserController::class , 'role_user']);

      Route::post('all-posts', [PostController::class,"index"]);
      Route::post('create-post', [PostController::class,"store"]);
      Route::post('show-post', [PostController::class,"show"]);
      Route::post('update-post', [PostController::class,"update"]);
      Route::post('delete-post', [PostController::class,"destroy"]);

      

      Route::get('show-comment',[CommentController::class,'index']);
      Route::post('add-comment',[CommentController::class,'add_comment']);
      Route::post('show-one',[CommentController::class,'show']);
      Route::post('update',[CommentController::class,'update']);
      Route::post('delete',[CommentController::class,'destroy']);

      Route::post('all-groups',[GroupController::class,'index']);
      Route::post('show-group',[GroupController::class,'show']);
      Route::post('create-group',[GroupController::class,'store']);
      Route::post('update-group',[GroupController::class,'update']);
      Route::post('delete-group',[GroupController::class,'destroy']);
      Route::post('add-friend-group',[GroupController::class,'addFriendToGroup']);
      Route::post('remove-friend-group',[GroupController::class,'removeFriendToGroup']);

 });


    Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);

    Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);





