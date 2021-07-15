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
        if($request->hasFile('pdf_thumbnail')){
            $filenameWithExt = $request->file('pdf_thumbnail')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('pdf_thumbnail')->getClientOriginalExtension();
            $pdfnameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('pdf_thumbnail')->storeAs('public/pdf_thumbnail',$filenameToStore);
        }

        Archive::create([
           "pdf_name" => $validated['pdf_name'],
           "pdf_file" => $filenameToStore,
           "pdf_thumbnail" => $pdfnameToStore,
           "pdf_description"=> $validated['pdf_description']
        ]);
        return redirect(route('home.archive'))->with('success_message', "Archive successfully added");
    }

    public function show($id){
        $pdf = Archive::findorfail($id);
        return view('admin.arcives.show-archives', compact('pdf'));
    }

    public function downloadpdf($id){
        $pdf = Archive::findorfail($id);
        return response()->download('storage/archives/'.$pdf->pdf_file);
    }
    public function destroy(Request $request)
    {
        $pdf = Archive::findorfail($request->id);
        $pdf->delete();
        return redirect()->back()->with('delete_message', 'PDF Deleted Successfully');
    }

}
