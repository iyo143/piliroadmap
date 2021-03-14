<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LocationTag;
use App\Models\Article;
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
        return view('admin.admin');
    }

    public function mapping()
    {
        $location = LocationTag::get();
        return view('admin.mapping',compact('location'));
    }

    public function articles()
    {
        $articles = Article::get();
        return view ('admin.articles',compact('articles'));
    }
    public function about()
    {
       
        return view ('admin.about');
    }
    public function archives()
    {
       
        return view ('admin.archives');
    }
    public function gallery()
    {
    
        return view ('admin.gallery');
    }
    public function contact()
    {
   
        return view ('admin.contact-us');
    }

  
}
