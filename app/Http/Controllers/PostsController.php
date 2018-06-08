<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//get the App\Post from namespace App from Post.php
use App\Post;
//use DB; can use the DB to access the database

class PostsController extends Controller
{
    /**
     * Display a listing of the resource. use == php artisan make:controller PostsController --resource == --resource to create all the function that need to control the posts
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //if ---- return Post::all() ---- the browser will return the array of the table
        //orderBy('title', 'desc')->get() === if need use the classes use get() at the end
        //$post = Post::where('title', 'Post Two')->get(); to get a specific post
        //$posts = DB::select('SELECT * FROM posts'); use this to access the database

        // take( number ) === limit the post show
        //$posts = Post::orderBy('title', 'desc')->take(1)->get();
        //$posts = Post::orderBy('title', 'desc')->get();

        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('posts.create');
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
        $this->validate($request, [
            'title' => 'required',
            'body'  => 'required'
        ]);
        
        
        //create post brought in on top Post, save the post in DB
        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->save();

        return redirect('/posts')->with('success', 'Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return Post controller find the post by id show with the array
        $post = Post::find($id);
        // return view with posts.show with the sing post the matchs the post id
        return view('posts.show')->with('post', $post);
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
    public function destroy($id)
    {
        //
    }
}
