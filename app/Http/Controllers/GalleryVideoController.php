<?php

namespace App\Http\Controllers;

use App\Http\Requests\GalleryVideoRequest;
use App\Models\GalleryVideo;
use App\Models\Gallery;
use App\Models\GalleryCategory;
use Illuminate\Http\Request;

class GalleryVideoController extends Controller
{
    public function store(GalleryVideoRequest $request){

        $validated = $request->validated();

        if($request->hasFile('video_image'))
        {
            $filenameWithExt = $request->file('video_image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('video_image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('video_image')->storeAs('public/gallery_videos',$fileNameToStore);
        }
        else
        {
            $fileNameToStore = 'noimage.jpg';
        }
        GalleryVideo::create(
            [
                'video_name' => $validated['video_name'],
                'video_image' => $fileNameToStore,
                'video_link' => $validated['video_link'],
                'user_id' => auth()->user()->id
            ]
        );
        return redirect(route('home.gallery'))->with('video_message', 'Successfully added Video');
    }
    
    public function destroy(Request $request)
    {
        $galVideo = GalleryVideo::findorfail($request->id);
        $galVideo->delete();
        return redirect(route('home.gallery'))->with('delete-vid-message', 'Video Deleted Successfully');
    }

    public function edit($id)
    {
        $galleryVideo = GalleryVideo::get();
        $ListVideo = auth()->user()->gallery_videos()->paginate(10);
        $galVideo = GalleryVideo::findorfail($id);
        $galleries = Gallery::get();
        $galleryCategories = GalleryCategory::get();
       return view('admin.gallery.edit-vid-gallery', compact( 'galleryVideo', 'galleries', 'ListVideo', 'galVideo', 'galleryCategories'));
    }

    public function update(GalleryVideoRequest $request, $id)
    {
        $GalleryVideo = GalleryVideo::findorfail($id);

        $validated = $request->validated();
        $GalleryVideo->video_name = $validated['video_name'];
        $GalleryVideo->video_link = $validated['video_link'];
        if($request->hasFile('video_image')){
            $location = 'public/gallery_videos'.$article->video_image;
            if(File::exists($location))
            {
                File::delete($location);
            }
            $filenameWithExt = $request->file('video_image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('video_image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('video_image')->storeAs('public/gallery_videos',$fileNameToStore);
            $GalleryVideo->video_image = $fileNameToStore;
        }
        $GalleryVideo->update();
        return redirect(route('home.gallery'))->with('update_vid_message', 'Video Successfully Updated');

    }
}
