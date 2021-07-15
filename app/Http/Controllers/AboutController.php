<?php

namespace App\Http\Controllers;

use App\Http\Requests\AboutRequest;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function store(AboutRequest $request){
        $validated = $request->validated();

        if($request->hasFile('about_image'))
        {
            $filenameWithExt = $request->file('about_image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('about_image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('about_image')->storeAs('public/about_images',$fileNameToStore);
        }
        else
        {
            $fileNameToStore = 'noimage.jpg';
        }
        About::create([
            'title'=>$validated['title'],
            'body'=>$validated['body'],
            'excerpt'=>$validated['excerpt'],
            'about_image'=>$fileNameToStore,

        ]);
        return redirect(route('home.about'))->with('success_message', 'successfully Add About');
    }
}
