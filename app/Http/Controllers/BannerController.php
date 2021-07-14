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

    public function destroy(Request $request){
        $banner = Banner::findorfail($request->id);
        $banner->delete();
        return redirect()->back()->with('delete_message', 'Banner Deleted Successfully');
    }

    public function edit($id)
    {
        $banner = Banner::findorfail($id);
        return view('admin.Banner.edit-banner', compact('banner'));
    }

    public function update( BannerRequest $request,$id){

        $banner = Banner::findorfail($id);
        $validated = $request->validated();
        $banner->title = $validated['title'];
        $banner->body = $validated['body'];
        $banner->excerpts = $validated['excerpts'];
        if($request->hasFile('banner_image')){
            $location = 'public/banner_image'.$banner->banner_image;
            if(File::exists($location))
            {
                File::delete($location);
            }
            $filenameWithExt = $request->file('banner_image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('banner_image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('banner_image')->storeAs('public/banner_image',$fileNameToStore);
            $banner->banner_image = $fileNameToStore;
        }
        $banner->update();
        return redirect(route('home.banner'))->with('update_message', 'Successfully Update Banner');
    }
}
