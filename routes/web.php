<?php

use App\Http\Controller\FrontController;
use Illuminate\Support\Facades\Route;

Route::get('/',[FrontController::class, 'index'])->name('front.index'); 
Route::get('/details/{arcticle_news:slug}',  [FrontController::class, 'details'])->name('front.details'); 
Route::get('/category/{category:slug}',   [FrontController::class, 'category'])->name('front.category'); 
Route::get('/author/{author:slug}',   [FrontController::class, 'author'])->name('front.author'); 
Route::get('/search',    [FrontController::class, 'search'])->name('front.search');

Route::get('/', function () {
    return view('welcome');
});
