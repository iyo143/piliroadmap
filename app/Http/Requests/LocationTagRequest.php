<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LocationTagRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'brgy'=>'required',
            'municipality'=>'required',
            'trees'=>'required',
            'farmers'=>'required',
            'retailers'=>'required',
            'processors'=>'required',
            'latitude'=>'required',
            'longitude'=>'required',
            'pili_image'=>'required|image'
        ];
    }
}
