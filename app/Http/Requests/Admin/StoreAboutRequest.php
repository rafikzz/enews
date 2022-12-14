<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreAboutRequest extends FormRequest
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
            'tagline'=>'required|min:3',
            'altimage'=>'required|min:3',
            'image'=>'mimes:jpg,jpeg,png,bmp,tiff|image|max:4096',
            'brief'=>'required',
            'content'=>'required',
        ];
    }
}
