<?php

namespace App\Http\Controllers;

use App\Models\Archive;
use App\Models\GalleryCategory;
use App\Models\GalleryVideo;
use App\Models\Stores;
use Illuminate\Http\Request;
use App\Models\LocationTag;
use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\User;
use App\Models\Gallery;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\View;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Carbon\Carbon;
class PagesController extends Controller
{


    public function homePage()
    {
        $location = LocationTag::get();
        $trees = LocationTag::sum('trees');
        $processors = LocationTag::sum('processors');
        $retailers = LocationTag::sum('retailers');
        $farmers = LocationTag::sum('farmers');
        $gallery = Gallery::get();
        $galleryCategories = GalleryCategory::get();
        $departments = User::get();
        $stores = Stores::paginate(3);
        return view('index',compact('location','trees','processors','retailers','farmers','gallery','galleryCategories', 'departments', 'stores'));
    }

    public function mainArticle($id)
    {
        $category = ArticleCategory::findorfail($id);
        $articles = $category->articles()->get();

        return view('main-article',compact('articles'));
    }
    public function mainAbout()
    {
        return view('main-article',compact('articles'));
    }
    public function mainArchive()
    {
        $articles = Article::get();
        $archives = Archive::get();
        return view('main-archive',compact('articles', 'archives'));
    }
    public function mainGallery()
    {
        $articles = Article::get();
        $images = Gallery::get();
        $videos = GalleryVideo::get();
        $galleryCategories = GalleryCategory::get();
        return view('gallery',compact('images', 'videos', 'galleryCategories','articles'));
    }
    public function mainStores()
    {
        $articles = Article::get();
        $stores = Stores::get();

        return view('main-stores', compact('stores','articles'));
    }
    public function mainRoadmap()
    {
        $articles = Article::get();
        $stores = Stores::get();
        $trees = LocationTag::sum('trees');
        $processors = LocationTag::sum('processors');
        $retailers = LocationTag::sum('retailers');
        $farmers = LocationTag::sum('farmers');
        $location = LocationTag::get();
        return view('main-roadmap', compact('stores','articles', 'trees', 'processors', 'retailers', 'farmers','location'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
