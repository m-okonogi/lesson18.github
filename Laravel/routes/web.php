<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\PostsController;

Auth::routes();

Route::get('/', function () {
  return view('auth/login');
});

Route::get('/index', [PostsController::class, 'index']);

Route::get('/create-form', [PostsController::class, 'createForm']);

Route::post('/post/create', [PostsController::class, 'create']);

Route::get('/post/{id}/update-form', [PostsController::class, 'updateForm']);

Route::post('/post/{id}/update', [PostsController::class, 'update']);

Route::get('/post/{id}/delete', [PostsController::class, 'delete']);
