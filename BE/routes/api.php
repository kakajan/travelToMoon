<?php

use App\Http\Controllers\DashController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('register', function (Request $request) {
    $pass = rand(1111, 9999);
    //Mail::to($request->email)->send(new SendPassword($pass));
    $user = new User;
    $user->name = $request->Kertop;
    $user->email = $request->email;
    $user->password = Hash::make($pass);
    $user->save();
    return $pass;
});
Route::middleware('auth:api')->resource('posts', PostController::class);
Route::middleware('auth:api')->resource('likes', LikeController::class);
Route::middleware('auth:api')->get('/init', [DashController::class, 'initData']);
Route::middleware('auth:api')->get('/follow/{id}', function ($id) {
    $user = auth()->user(); // get the authenticated user
    $otherUser = User::find($id); // get the user to follow
    $user->follow($otherUser);
});
