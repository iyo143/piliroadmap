<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\ArticleCategory;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
    public function store(ArticleRequest $request)
    {

        $validatedArticles = $request->validated();


        if($request->hasFile('cover_image'))
        {
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('cover_image')->storeAs('public/article_images',$fileNameToStore);

        }
        else
        {
            $fileNameToStore = 'noimage.jpg';
        }
          Article::create([
            'author'=>$validatedArticles['author'],
            'title'=>$validatedArticles['title'],
            'body'=>$validatedArticles['body'],
            'excerpt'=>$validatedArticles['excerpt'],
            'article_category_id' =>$validatedArticles['article_category_id'],
            'cover_image'=>$fileNameToStore
        ]);
        return redirect(route('home.articles'))->with('message', 'successfully Published Articles');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::findorfail($id);
        $articles = Article::get();
        return view('article',compact('article','articles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $article = Article::findorfail($id);
       $articles = Article::get();
       $articleCategories = ArticleCategory::get();
       return view('admin.edit-articles', compact('article', 'articleCategories', 'articles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, $id)
    {
        $article = Article::findorfail($id);

        $validated = $request->validated();

        $article->update($validated);

        return redirect(route('home.articles'))->with('message', 'successfully Published Articles');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $article = Article::findorfail($request->id);
        $article->delete();
        return redirect()->back()->with('delete-message', 'Articles Deleted Successfully');
    }
}
