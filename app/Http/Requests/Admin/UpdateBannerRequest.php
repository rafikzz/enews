<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBannerRequest extends FormRequest
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
            'title'=>'required|min:3|unique:tbl_banners,title,'.$this->banner->id,
            'image'=>'mimes:jpg,jpeg,png,bmp,tiff|image|max:4096|nullable',
            'order'=> 'required|integer',

        ];
    }
}
