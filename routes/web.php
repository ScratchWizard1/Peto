<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;

Route::get('/', function (){
  return view('home');
})->name('home');


Route::group(['prefix'=>'blog'],function(){
  Route::get('/',[BlogController::class,'getBlog'])->name('blog.index');
  Route::get('post/{id}',[BlogController::class,'getBlogPost'])->name('blog.post');
  Route::get('add',[BlogController::class,'addBlogPost'])->name('blog.add');
  Route::post('save',[BlogController::class,'saveBlogPost'])->name('blog.save');
});