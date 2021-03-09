<?php

namespace App\Http\Controllers;

use App\Models\LocationTag;
use Illuminate\Http\Request;


class LocationTagController extends Controller
{
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
        $validatedTags = request()->validate([
            'brgy'=>'required',
            'municipality'=>'required',
            'trees'=>'required',
            'farmers'=>'required',
            'retailers'=>'required',
            'processors'=>'required',
            'latitude'=>'required',
            'longitude'=>'required',
        ]);
        LocationTag::create($validatedTags);
        return redirect(route('home.mapping'))->with('message','successfully added Location Tag');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LocationTag  $locationTag
     * @return \Illuminate\Http\Response
     */
    public function show(LocationTag $locationTag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LocationTag  $locationTag
     * @return \Illuminate\Http\Response
     */
    public function edit(LocationTag $locationTag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LocationTag  $locationTag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LocationTag $locationTag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LocationTag  $locationTag
     * @return \Illuminate\Http\Response
     */
    public function destroy(LocationTag $locationTag)
    {
        //
    }
}
