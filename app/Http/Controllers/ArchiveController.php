<?php

namespace App\Http\Controllers;


use App\Http\Requests\ArchiveRequest;
use App\Models\Archive;
use Illuminate\Http\Request;

class ArchiveController extends Controller
{
    public function store(ArchiveRequest $request){

        $validated = $request->validated();
        if($request->hasFile('pdf_file')){
            $filenameWithExt = $request->file('pdf_file')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('pdf_file')->getClientOriginalExtension();
            $filenameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('pdf_file')->storeAs('public/archives',$filenameToStore);
        }
        Archive::create([
           "pdf_name" => $validated['pdf_name'],
           "pdf_file" => $filenameToStore
        ]);
        return redirect(route('home.archive'))->with('success_message', "Archive successfully added");
    }


}
