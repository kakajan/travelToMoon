<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class DashController extends Controller
{
    public function initData (Request $request) {
        return ['postMeta' => ['postCount' => Post::all()->count()], 'usersList'=>User::all()->where('id','!=', $request->user()->id)];
    }
}
