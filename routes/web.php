<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\LocationTagController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GalleryCategoryController;
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
Route::get('/',[PagesController::class, 'homePage'])->name('homePage');
Route::prefix('/')->group(function () {
    Route::get('articles/{id}', [PagesController::class, 'mainArticle'])->name('main.articles');
    Route::get('about', [PagesController::class, 'mainAbout'])->name('main.about');

    Route::prefix('articles')->group(function () {
        Route::get('article/{id}', [ArticleController::class, 'show'])->name('main.article');
    });

});

Auth::routes();

Route::prefix('home')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('mapping', [HomeController::class, 'mapping'])->name('home.mapping');
    Route::get('articles', [HomeController::class, 'articles'])->name('home.articles');
    Route::get('archives', [HomeController::class, 'archives'])->name('home.archive');
    Route::get('gallery', [HomeController::class, 'gallery'])->name('home.gallery');
    Route::get('about', [HomeController::class, 'about'])->name('home.about');
    Route::get('contact', [HomeController::class, 'contact'])->name('home.contact');

    Route::prefix('mapping')->group(function () {
        Route::POST('store-tag',[LocationTagController::class, 'store'])->name('map.store');
        Route::DELETE('delete/{id}',[LocationTagController::class, 'destroy'])->name('map.destroy');
    });

    Route::prefix('articles')->group(function () {
        Route::POST('store',[App\Http\Controllers\ArticleController::class, 'store'])->name('articles.store');
        Route::DELETE('delete/{id}', [ArticleController::class, 'destroy'])->name('articles.destroy');
        Route::GET('edit/{id}', [ArticleController::class, 'edit'])->name('articles.edit');
        Route::PUT('update/{id}', [ArticleController::class, 'update'])->name('articles.update');
    });
    Route::prefix('gallery')->group(function () {
        Route::POST('store',[GalleryController::class, 'store'])->name('gallery.store');
    });
    Route::prefix('gallery_category')->group(function(){
        Route::POST('store',[GalleryCategoryController::class, 'store'])->name('galCategory.store');
    });
});




