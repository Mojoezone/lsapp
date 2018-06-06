<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Pagescontroller extends Controller
{
    //to create a controller use -- php artisan make:controller NAME
    //call medthod, public so it can access global
    //link to the web.php 
    public function index(){
        $title = 'Welcome to Laravel!';
        // return view('pages.index', compact('title')); same as the below code, below good for multiple arrays
        return view('pages.index')->with('title',$title);
    }
    public function about(){
        $title = 'About Us!';
        return view('pages.about')->with('title', $title);
    }
    public function services(){
        // multile vars array pass to the page
        $data = array(
            'title' => 'Services',
            'services' => ['Web Design', 'Programming', 'SEO']
        );
        return view('pages.services')->with($data);
    }
}
