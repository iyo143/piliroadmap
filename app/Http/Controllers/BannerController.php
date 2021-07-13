<?php

namespace App\Http\Controllers;

use App\Http\Requests\BannerRequest;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function store(BannerRequest $request){
        $validated = $request->validated();

        if($request->hasFile('banner_image'))
        {
            $filenameWithExt = $request->file('banner_image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('banner_image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('banner_image')->storeAs('public/banner_image',$fileNameToStore);
        }
        else
        {
            $fileNameToStore = 'noimage.jpg';
        }
        Banner::where('id', 'like', '%%')->delete();
        Banner::create([
            'title'=>$validated['title'],
            'excerpts'=>$validated['excerpts'],
            'body'=>$validated['body'],
            'banner_image'=>$fileNameToStore
        ]);

        return redirect(route('home.banner'))->with('success_message', 'successfully added the Banner');
    }
}
