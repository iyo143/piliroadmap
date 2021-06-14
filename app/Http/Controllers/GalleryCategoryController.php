<?php

namespace App\Http\Controllers;

use App\Http\Requests\GalCategoryRequest;
use App\Models\GalleryCategory;
use Database\Seeders\GalCategorySeedre;
use Illuminate\Http\Request;

class GalleryCategoryController extends Controller
{
    public function store(GalCategoryRequest $request){
        $validated = $request->validated();
        GalleryCategory::create($validated);
        return redirect(route('home.gallery'))->with('cat_message', 'Successfully added Gallery Category');
    }
    public function destroy(Request $request){
        $category = GalleryCategory::findorfail($request->id);
        $category->delete();
        return redirect()->back()->with('delete_gal_category', 'Successfully Deleted Gallery Category');
    }
}
