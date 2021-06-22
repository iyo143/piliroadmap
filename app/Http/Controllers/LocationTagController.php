<?php

namespace App\Http\Controllers;

use App\Http\Requests\LocationTagRequest;
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
    public function store(LocationTagRequest $request)
    {
        $validatedTags = $request->validated();

        if($request->hasFile('pili_image'))
        {
            $fileNameWithExt = $request->file('pili_image')->getClientOriginalName();
            $filename=pathinfo($fileNameWithExt,PATHINFO_FILENAME);

            $extension = $request->file('pili_image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            $path = $request->file('pili_image')->storeAs('public/location_images',$fileNameToStore);

        }
        else{
            $fileNameToStore = 'noimage.jpeg';
        }
        LocationTag::create([
            'user_id' => auth()->user()->id,
            'brgy'=>$validatedTags['brgy'],
            'municipality'=>$validatedTags['municipality'],
            'trees'=>$validatedTags['trees'],
            'farmers'=>$validatedTags['farmers'],
            'retailers'=>$validatedTags['retailers'],
            'processors'=>$validatedTags['processors'],
            'latitude'=>$validatedTags['latitude'],
            'longitude'=>$validatedTags['longitude'],
            'brgy_value' =>$validatedTags['brgy_value'],
            'municipality_value' => $validatedTags['municipality_value'],
            'pili_image'=>$fileNameToStore,

        ]);
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
    public function edit($id)
    {
        $locations = LocationTag::get();
        $location = LocationTag::findorfail($id);
        return view('admin.location_tag.edit-mapping', compact('location', 'locations'));
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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LocationTag  $locationTag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $location = LocationTag::findorfail($request->id);
        $location->delete();
        return redirect()->back()->with('delete','successfuly deleted');
    }
}
