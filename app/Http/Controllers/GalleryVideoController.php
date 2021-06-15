<?php

namespace App\Http\Controllers;

use App\Http\Requests\GalleryVideoRequest;
use App\Models\GalleryVideo;
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
}
