<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LocationTag;
use App\Models\Article;
use App\Models\User;
use App\Models\Gallery;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
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
        return view('index',compact('location','trees','processors','retailers','farmers','gallery'));
    }
    public function mainArticle()
    {
        $articles = Article::get();
        return view('main-article',compact('articles'));
    }
    public function mainAbout()
    {
       
        return view('main-article',compact('articles'));
    }
    public function mainArchive()
    {
       
        return view('main-article',compact('articles'));
    }
    public function mainGallery()
    {
       
        return view('main-article',compact('articles'));
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
