<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoresRequest extends FormRequest
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
            'store_name' => 'required',
            'store_image' => 'required',
            'store_owner' => 'required',
            'fb_link' => 'required',
            'ig_link' => 'required',
            'twit_link' => 'required'
        ];
    }
}
