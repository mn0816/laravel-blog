<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Auth::routes();

Route::group(['middleware'=>'auth'], function (){
    Route::get('/', [PostController::class, 'index'])->name('index');
    Route::get('/post',[PostController::class,'create'])->name('post.create');
    Route::post('/store',[PostController::class,'store'])->name('post.store');
    Route::get('/posts/edit/{id}',[PostController::class,'edit'])->name('post.edit');
    Route::patch('/update/{id}',[PostController::class,'update'])->name('post.update');
    Route::get('/show/{id}',[PostController::class,'show'])->name('post.show');
    Route::delete('/delete/{id}',[PostController::class,'destroy'])->name('post.destroy');


    #comment
    Route::post('/comment/store/{id}',[CommentController::class,'store'])->name('comment.store');
    Route::delete('/comment/delete/{id}',[CommentController::class,'destroy'])->name('comment.destroy');
    
    #profile
    Route::get('/profile/{id}', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/edit/{id}', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/update/{id}',[ProfileController::class,'update'])->name('profile.update');
    Route::get('/profile/{id}', [ProfileController::class, 'show'])->name('profile');

});

