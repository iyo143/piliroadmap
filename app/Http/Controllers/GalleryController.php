<?php

namespace App\Http\Controllers;

use App\Http\Requests\GalleryRequest;
use App\Models\Gallery;
use App\Models\GalleryCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class GalleryController extends Controller
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
    public function store(GalleryRequest $request)
    {
        $validatedGallery = $request->validated();

        if($request->hasFile('image_file'))
        {
            $filenameWithExt = $request->file('image_file')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image_file')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('image_file')->storeAs('public/gallery_images',$fileNameToStore);
        }
        else
        {
            $fileNameToStore = 'noimage.jpg';
        }

        Gallery::create([
            'image_name'=>$validatedGallery['image_name'],
            'image_file'=>$fileNameToStore,
            'gallery_category_id'=>$validatedGallery['gallery_category_id'],
            'user_id' => auth()->user()->id
        ]);
        return redirect(route('home.gallery'))->with('message', 'Successfully added Image');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $galleryVideo = auth()->user()->gallery_videos()->paginate(10);
        $gallery = Gallery::findorfail($id);
        $galleries = Gallery::get();
        $galleryCategories = GalleryCategory::get();
        return view ('admin.gallery.edit-gallery', compact('galleries','gallery', 'galleryCategories', 'galleryVideo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(GalleryRequest $request, $id)
    {
        $gallery = Gallery::findorfail($id);

        $validated = $request->validated();

        if($request->hasFile('image_file')){
            $location = 'public/gallery_images'.$validated['image_file'];
            if(File::exists($location)){
                File::delete($location);
            }
            $filenameWithExt = $request->file('image_file')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image_file')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('image_file')->storeAs('public/gallery_images',$fileNameToStore);
            $gallery->image_file = $fileNameToStore;
        }

        $gallery->update([
            'image_name'=>$validated['image_name'],
            'image_category'=>$validated['gallery_category_id'],
            'user_id' => auth()->user()->id
        ]);
        return redirect(route('home.gallery'))->with('update_message', 'Successfully Update Image');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $image = Gallery::findorfail($request->id);
        $image->delete();
        return redirect()->back()->with('delete_message', 'Image Deleted Successfully');
    }
}
