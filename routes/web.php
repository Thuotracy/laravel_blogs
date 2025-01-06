<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UsermodelController;

Route::get('/', function () {

    // getting all users posts with relationship
    $posts = [];

    if (auth()->
     check()){
        $posts = auth()->user()->usersPosts()->latest()->get();
    }
    return view('home', ['posts' => $posts]);
    


    // getting all users posts without relationship 
    // $posts =  Post::where('user_id', auth()->id())->get();


    return view('home', ['posts' => $posts]);
});

Route::post('/register', [UsermodelController::class, 'register']);
Route::post('/logout', [UsermodelController::class, 'logout']);
Route::post('/login', [UsermodelController::class, 'login']);




Route::post('/create-post', [PostController::class, 'createPost']);
Route::get('/edit-post/{post}', [PostController::class, 'showEditScreen']);
Route::put('/edit-post/{post}', [PostController::class, 'editPost']);
Route::delete('/delete-post/{post}', [PostController::class, 'deletePost']);