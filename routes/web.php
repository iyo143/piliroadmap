<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\LocationTagController;
use App\Http\Controllers\ArticleController;
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

Route::get('/',[PagesController::class, 'homePage']);
Route::get('/articles', [PagesController::class, 'mainArticle'])->name('mainArticle');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home/mapping', [App\Http\Controllers\HomeController::class, 'mapping'])->name('home.mapping');
Route::get('/home/articles', [App\Http\Controllers\HomeController::class, 'articles'])->name('home.articles');

Route::POST('/home/mapping/store-tag',[App\Http\Controllers\LocationTagController::class, 'store'])->name('map.store');

Route::POST('/home/articles/store',[App\Http\Controllers\ArticleController::class, 'store'])->name('articles.store');