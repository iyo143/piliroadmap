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
  
}
