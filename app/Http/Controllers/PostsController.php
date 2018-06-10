<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//bring in the store image file path
use Illuminate\Support\Facades\Storage;
//get the App\Post from namespace App from Post.php
use App\Post;
//use DB; can use the DB to access the database

class PostsController extends Controller
{
      /**
     * Create a new controller instance. keep non users or guest out off the user create and edit post
     * ['except' => ['index', 'show']] each of Post 
     * 
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

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
        //image files, or no image, size
        $this->validate($request, [
            'title' => 'required',
            'body'  => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);
        //Handle file upload php artisan storage:link to create the folder in the terminal
        if($request->hasFile('cover_image')){
            //get filename with extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            //get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();

            //filename to store, get the file name, add the timestamp with unique time, and its extension
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //upload image, create an folder name cover_images in the storage->app->pulic to store image upload in post
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }
        
        //create post brought in on top Post, save the post in DB
        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->cover_image = $fileNameToStore;
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
        $post = Post::find($id);
        //check for correct user
        if(auth()->user()->id !== $post->user_id){
            return redirect('/posts')->with('error', 'Unauthorized Page');
        }

        return view('posts.edit')->with('post', $post);
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
          $this->validate($request, [
            'title' => 'required',
            'body'  => 'required'
        ]);
        
         //Handle file upload php artisan storage:link to create the folder in the terminal
         if($request->hasFile('cover_image')){
            //get filename with extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            //get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();

            //filename to store, get the file name, add the timestamp with unique time, and its extension
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //upload image, create an folder name cover_images in the storage->app->pulic to store image upload in post
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        }
        
        //create post brought in on top Post, save the post in DB
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        if($request->hasFile('cover_image')){
            $post->cover_image = $fileNameToStore;
        }
        $post->save();

        return redirect('/posts')->with('success', 'Post Updated');
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
        $post = Post::find($id);
         //check for correct user
         if(auth()->user()->id !== $post->user_id){
            return redirect('/posts')->with('error', 'Unauthorized Page');
        }

        if($post->cover_image != 'noimage.jpg'){
            //Delete Image
            Storage::delete('public/cover_images/'.$post->cover_image);
        }

        $post->delete();
        return redirect('/posts')->with('success', 'Post Removed');
    }
}
