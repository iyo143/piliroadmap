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
Route::get('/main-articles', [PagesController::class, 'mainArticle'])->name('mainArticle');
Route::get('/about', [PagesController::class, 'mainAbout'])->name('mainAbout');
Route::get('/main-articles/article/{id}', [ArticleController::class, 'show'])->name('subArticle');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home/mapping', [App\Http\Controllers\HomeController::class, 'mapping'])->name('home.mapping');
Route::get('/home/articles', [App\Http\Controllers\HomeController::class, 'articles'])->name('home.articles');
Route::get('/home/archives', [App\Http\Controllers\HomeController::class, 'archives'])->name('home.archive');
Route::get('/home/gallery', [App\Http\Controllers\HomeController::class, 'gallery'])->name('home.gallery');
Route::get('/home/about', [App\Http\Controllers\HomeController::class, 'about'])->name('home.about');
Route::get('/home/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('home.contact');

Route::POST('/home/mapping/store-tag',[App\Http\Controllers\LocationTagController::class, 'store'])->name('map.store');
Route::POST('/home/articles/store',[App\Http\Controllers\ArticleController::class, 'store'])->name('articles.store');