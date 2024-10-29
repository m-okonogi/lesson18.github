<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostsController;

Auth::routes();

Route::get('/', function () {
  return view('auth/login');
});

Route::get('/index', [PostsController::class, 'index'])->name('posts.index');

Route::get('/create-form', [PostsController::class, 'createForm']);

Route::post('/post/create', [PostsController::class, 'create']);

Route::get('/post/{id}/update-form', [PostsController::class, 'updateForm']);

Route::post('/post/{id}/update', [PostsController::class, 'update']);

Route::get('/post/{id}/delete', [PostsController::class, 'delete']);
