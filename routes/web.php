<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\FrontBlogController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\AdminPortfolioController;


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

Route::get('/', [FrontBlogController::class,'index'])->name('front_index');
Route::get('/index_other', [FrontBlogController::class,'index_other'])->name('front_index_other');

Route::prefix('profile')->group(function() {

Route::get('/index', [FrontBlogController::class,'profile'])->name('front_profile');
Route::get('/', [AdminProfileController::class,'index'])->name('profile_index');
Route::get('/form', [AdminProfileController::class,'form'])->name('profile_form');
Route::post('/post', [AdminProfileController::class,'post'])->name('profile_post');
Route::get('{profile?}/edit', [AdminProfileController::class,'edit'])->name('profile_edit');
Route::patch('/{profile?}', [AdminProfileController::class,'update'])->name('profile_update');
Route::delete('//{profile?}', [AdminProfileController::class,'delete'])->name('profile_delete');

});

Route::get('portfolio/form', [AdminPortfolioController::class,'form'])->name('portfolio_form');
Route::post('portfolio/post', [AdminPortfolioController::class,'post'])->name('portfolio_post');
Route::get('portfolio/index', [FrontBlogController::class,'portfolio'])->name('front_portfolio');

Route::prefix('post')->group(function() {
    
    Route::get('/list', [PostController::class,'index']);
    Route::get('/{post}', [PostController::class,'show'])->where('post', '[0-9]+');
    Route::get('/create', [PostController::class,'create']);
    Route::post('/', [PostController::class,'store']);
    Route::get('/{post}/edit', [PostController::class,'edit']);
    Route::patch('/{post}', [PostController::class,'update']);
    Route::delete('/{post}', [PostController::class,'destroy']);
    Route::post('/{post}/comments', [CommentsController::class,'store']);
    Route::delete('/{post}/comments/{comment}', [CommentsController::class,'destroy']);

    Route::get('/category', [PostController::class,'category'])->name('post_category');
    Route::get('/category/create', [PostController::class,'categoryCreate']);
    Route::post('/category', [PostController::class,'categoryStore']);
    Route::get('/category/{category}/edit', [PostController::class,'editCategory'])->name('post_category_edit');
    Route::patch('/category/{category}', [PostController::class,'editUpdate'])->name('update_category_edit');
    Route::delete('/category/{category}', [PostController::class,'deleteCategory'])->name('post_category_delete');

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


