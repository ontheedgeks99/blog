<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentsController;


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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/post', [PostController::class,'index']);
Route::get('/post/{post}', [PostController::class,'show'])->where('post', '[0-9]+');
Route::get('/post/create', [PostController::class,'create']);
Route::post('/post', [PostController::class,'store']);
Route::get('/post/{post}/edit', [PostController::class,'edit']);
Route::patch('/post/{post}', [PostController::class,'update']);
Route::delete('/post/{post}', [PostController::class,'destroy']);
Route::post('/post/{post}/comments', [CommentsController::class,'store']);
Route::delete('/post/{post}/comments/{comment}', [CommentsController::class,'destroy']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

