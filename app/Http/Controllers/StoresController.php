<?php

namespace App\Http\Controllers;


use App\Http\Requests\StoresRequest;
use App\Models\Stores;
use Illuminate\Http\Request;

class StoresController extends Controller
{
    public function store(StoresRequest $request)
    {
        $validatedTags = $request->validated();

        if($request->hasFile('store_image'))
        {
            $fileNameWithExt = $request->file('store_image')->getClientOriginalName();
            $filename=pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            $extension = $request->file('store_image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('store_image')->storeAs('public/stores_image',$fileNameToStore);
        }
        else{
            $fileNameToStore = 'noimage.jpeg';
        }
        Stores::create([
            'user_id' => auth()->user()->id,
            'store_name'=>$validatedTags['store_name'],
            'store_owner'=>$validatedTags['store_owner'],
            'fb_link'=>$validatedTags['fb_link'],
            'ig_link'=>$validatedTags['ig_link'],
            'twit_link'=>$validatedTags['twit_link'],
            'store_image'=>$fileNameToStore
        ]);
        return redirect(route('home.stores'))->with('success_add','successfully added Store');
    }

}
