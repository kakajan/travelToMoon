<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Media;
use App\Models\Post;
use App\Models\Video;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $posts = Post::all();
        foreach ($posts as $post) {
            $post->likeCount = $post->likes->count();
            //return $post->likes;
            if ($post->likes->where('id', $request->user()->id)->first()) {
                $liked = true;
            } else {
                $liked = false;
            }
            $post->liked = $liked;
        }
        return $posts;
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
        $newPost = new Post;
        $newPost->title = $request->title;
        $newPost->content = $request->content;
        $newPost->user_id = $request->user()->id;
        $newPost->save();
        // $path = $request->file('myfile')->store('public/covers');
        $image = new Image;
        $image->url = 'https://bocdn.ecotree.green/blog/0001/01/ad46dbb447cd0e9a6aeecd64cc2bd332b0cbcb79.jpeg?d=960x540';
        $newPost->image()->save($image);

        $video = new Media;
        $video->url = 'https://aspb3.asset.aparat.com/aparat-video/fedda2fc825a3d5dee2beb4c1649eccd5966603-360p.mp4?wmsAuthSign=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ0b2tlbiI6IjMyYWZlYmMxMDE0MTgxNjU4N2ZlYjk2OTRiNGRiOTY0IiwiZXhwIjoxNjc3MTc3OTkzLCJpc3MiOiJTYWJhIElkZWEgR1NJRyJ9.LF_BHDtkVuBBrhoUDkjKivq45x20nVK-xtB6ba4wKqE';
        $newPost->medias()->save($video);

        return $newPost;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $image = new Image;
        $image->url = 'https://bocdn.ecotree.green/blog/0001/01/ad46dbb447cd0e9a6aeecd64cc2bd332b0cbcb79.jpeg?d=960x540';
        $post->image()->save($image);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
