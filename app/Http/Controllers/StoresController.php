<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateStoreRequest;
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
    
    Public function destroy(Request $request) {
        $stores = Stores::findorfail($request->id);
        $stores->delete();
        return redirect()->back()->with('delete-message', 'Store deleted!');
    }
    
    Public function edit($id) {
        $stores_list = Stores::get();
        $stores = Stores::findorfail($id);
        return view('admin.edit-stores', compact( 'stores', 'stores_list'));
    }

    Public function update(UpdateStoreRequest $request, $id) {
        $stores = Stores::find($id);
        $validated = $request->validated();
        $stores->user_id = auth()->user()->id;
        $stores->store_name = $validated['store_name'];
        $stores->store_owner = $validated['store_owner'];
        $stores->fb_link = $validated['fb_link'];
        $stores->ig_link = $validated['ig_link'];
        $stores->twit_link = $validated['twit_link'];
        if($request->hasFile('store_image')){
            $location = 'public/gallery_images'.$validated['store_image'];
            if(File::exists($location)){
                File::delete($location);
            }
            $fileNameWithExt = $request->file('store_image')->getClientOriginalName();
            $filename=pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            $extension = $request->file('store_image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('store_image')->storeAs('public/stores_image',$fileNameToStore);
            $stores->store_image = $fileNameToStore;
        }
        $stores->update();

        return redirect(route('home.stores'))->with('update-message', 'Store updated successfully');
    }

}
