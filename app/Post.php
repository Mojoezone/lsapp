<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
/*
----- add post with tinker -----
$ php artisan tinker
Psy Shell v0.9.5 (PHP 7.1.8 — cli) by Justin Hileman
>>> App\Post::count()
=> 0
>>> $post = new App\Post();
=> App\Post {#2328}
>>> $post->title = 'Post One';
=> "Post One"
>>> $post->body = 'This is the body';
=> "This is the body"
>>> $post->save();
=> true

*/
class Post extends Model
{
    //same as page controller php artisan make:model Post -m ====== post is the model controller accesing the database and -m is database migration

    //cahnged table name---= protected $table = 'posts';

    //change Primary key --= public $primaryKey = 'id';

    //Timestamp public $timestamps = true;
}
