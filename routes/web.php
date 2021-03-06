<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Illuminate\Support\Facades\File;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

      // fetch the data from Post model

      // this will solve n+1 problem. pass method name to get foreign key value
    $posts =  Post::latest()->with('category','author')->get();

    return view('posts',[
        "posts"=>$posts
    ]);
});


Route::get('post/{post}',function(Post $post){
    // fetch the data from Post model

    return view('post',[
        'post'=>$post
    ]);
});

Route::get('category/{category:slug}',function (Category $category){
    return view('posts',[
        "posts"=>$category->posts->load(['category','author'])
    ]);
});

Route::get('authors/{author:username}',function (User $author){
    return view('posts',[
        "posts"=>$author->posts->load(['category','author'])
    ]);
});