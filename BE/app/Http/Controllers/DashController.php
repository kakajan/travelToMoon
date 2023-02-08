<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class DashController extends Controller
{
    public function initData () {
        return ['postMeta' => ['postCount' => Post::all()->count()]];
    }
}
