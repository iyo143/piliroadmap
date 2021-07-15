<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\LocationTagController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GalleryCategoryController;
use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\GalleryVideoController;
use App\Http\Controllers\StoresController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\AboutController;
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
    Route::get('archive', [PagesController::class, 'mainArchive'])->name('main.archive');
    Route::post('feedback', [FeedbackController::class, 'store'])->name('main.feedback');
    Route::get('stores', [PagesController::class, 'mainStores'])->name('main.stores');
    Route::get('roadmap', [PagesController::class, 'mainRoadmap'])->name('main.roadmap');
    Route::prefix('gallery')->group(function () {
        Route::get('images', [PagesController::class, 'mainGallery'])->name('main.gallery');
        Route::get('videos', [PagesController::class, 'mainGalleryVideo'])->name('main.galleryVideo');
    });
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
    Route::get('stores', [HomeController::class, 'stores'])->name('home.stores');
    Route::get('banner', [HomeController::class, 'banners'])->name('home.banner');

    Route::prefix('mapping')->group(function () {
        Route::POST('store-tag',[LocationTagController::class, 'store'])->name('map.store');
        Route::GET('edit/{id}', [LocationTagController::class, 'edit'])->name('map.edit');
        Route::DELETE('delete/{id}',[LocationTagController::class, 'destroy'])->name('map.destroy');
    });

    Route::prefix('articles')->group(function () {
        Route::POST('store',[ArticleController::class, 'store'])->name('articles.store');
        Route::DELETE('delete/{id}',[ArticleController::class, 'destroy'])->name('articles.destroy');
        Route::GET('edit/{id}', [ArticleController::class, 'edit'])->name('articles.edit');
        Route::PUT('update/{id}', [ArticleController::class, 'update'])->name('articles.update');
        Route::GET('show/{id}', [ArticleController::class,'homeShow'])->name('articles.show');
    });
    Route::prefix('gallery')->group(function () {
        Route::POST('store',[GalleryController::class, 'store'])->name('gallery.store');
        Route::GET('edit/{id}',[GalleryController::class, 'edit'])->name('gallery.edit');
        Route::PUT('update/{id}',[GalleryController::class, 'update'])->name('gallery.update');
        Route::DELETE('delete/{id}',[GalleryController::class, 'destroy'])->name('gallery.destroy');
    });
    Route::prefix('gallery_category')->group(function(){
        Route::POST('store',[GalleryCategoryController::class, 'store'])->name('galCategory.store');
        Route::DELETE('delete/{id}',[GalleryCategoryController::class, 'destroy'])->name('galCategory.destroy');
    });
    Route::prefix('archives')->group(function(){
        Route::POST('store', [ArchiveController::class, 'store'])->name('archives.store');
        Route::get('show/{id}', [ArchiveController::class, 'show'])->name('archives.show');
        Route::get('download/{id}', [ArchiveController::class, 'downloadpdf'])->name('archives.download');
        Route::DELETE('delete/{id}', [ArchiveController::class, 'destroy'])->name('archives.destroy');
    });
    Route::prefix('gallery_video')->group(function(){
        Route::POST('store', [GalleryVideoController::class, 'store'])->name('galVideo.store');
          Route::DELETE('delete/{id}', [GalleryVideoController::class, 'destroy'])->name('galVideo.destroy');
        Route::GET('edit/{id}', [GalleryVideoController::class, 'edit'])->name('galVideo.edit');
        Route::PUT('update/{id}', [GalleryVideoController::class, 'update'])->name('galVideo.update');
    });
    Route::prefix('stores')->group(function(){
        Route::POST('store', [StoresController::class, 'store'])->name('stores.store');
        Route::DELETE('delete/{id}', [StoresController::class, 'destroy'])->name('stores.destroy');
        Route::GET('edit/{id}', [StoresController::class, 'edit'])->name('stores.edit');
        Route::PUT('update/{id}', [StoresController::class, 'update'])->name('stores.update');
    });

    Route::prefix('banner')->group(function(){
        Route::POST('store', [BannerController::class, 'store'])->name('banner.store');
        Route::DELETE('delete/{id}',[BannerController::class, 'destroy'])->name('banner.destroy');
        Route::get('edit/{id}',[BannerController::class, 'edit'])->name('banner.edit');
        Route::PUT('update/{id}',[BannerController::class, 'update'])->name('banner.update');
    });
    Route::prefix('about')->group(function(){
        Route::POST('stgore', [AboutController::class, 'store'])->name('about.store');
    });
});




