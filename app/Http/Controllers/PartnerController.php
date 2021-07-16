<?php

namespace App\Http\Controllers;

use App\Http\Requests\PartnerRequest;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function store(PartnerRequest $request){
        $validatedAgencies = $request->validated();

        if($request->hasFile('agency_logo'))
        {
            $filenameWithExt = $request->file('agency_logo')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('agency_logo')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('agency_logo')->storeAs('public/partner_images',$fileNameToStore);
        }
        else
        {
            $fileNameToStore = 'noimage.jpg';
        }

        Gallery::create([
            'agency_name'=>$validatedAgencies['agency_name'],
            'agency_logo'=>$fileNameToStore,
            'agency_link'=>$validatedAgencies['agency_link'],
            'user_id' => auth()->user()->id
        ]);
        return redirect(route('home.partners'))->with('success_message', 'Successfully added Agency');
    }
}
