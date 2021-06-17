<?php

namespace App\Http\Controllers;

use App\Models\Archive;
use App\Models\Stores;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\LocationTag;
use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\Gallery;
use App\Models\GalleryCategory;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $location = LocationTag::get();
        $countFarmers = LocationTag::sum('farmers');
        $countRetailers = LocationTag::sum('retailers');
        $countProcessors = LocationTag::sum('processors');
        $countTrees = LocationTag::sum('trees');
        $articles = Article::paginate(5);
        $galleries = Gallery::paginate(5);
        $archives = Archive::paginate(5);
        $stores = Stores::get();

        $locationTags = LocationTag::paginate(5);

        return view('admin.admin',compact('location',
                  'countFarmers','countRetailers',
                            'countProcessors','countTrees',
                            'articles', 'galleries', 'archives','locationTags','stores'));
    }
    public function mapping()
    {
        $location = LocationTag::get();
        return view('admin.location_tag.mapping',compact('location'));
    }
    public function articles()
    {
        $articles = auth()->user()->articles()->paginate(10);
        $articleCategories = ArticleCategory::get();
        return view ('admin.articles.articles',compact('articles', 'articleCategories'));
    }
    public function about()
    {
        return view ('admin.about');
    }
    public function archives()
    {
        $archives = Archive::get();
        return view ('admin.arcives.archives', compact('archives'));
    }
    public function gallery()
    {
        $gallery = auth()->user()->galleries()->paginate(10);
        $galleryCategories = GalleryCategory::get();
        $galleryVideo = auth()->user()->gallery_videos()->paginate(10);
        return view ('admin.gallery.gallery', compact('gallery','galleryCategories', 'galleryVideo'));
    }
    public function contact()
    {
        return view ('admin.contact-us');
    }
    public function stores(){
        return view ('admin.stores');
    }


}
