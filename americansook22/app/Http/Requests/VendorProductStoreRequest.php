<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VendorProductStoreRequest extends FormRequest
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
            'title'=>'required',
            'year'=>'required',
            'brand_id'=>'required',
            'cat_id'=>'required',
            // 'child_cat_id'=>'required',
            'price'=>'required',
            'stock'=>'required',
            // 'old_new'=>'required',
            'file'=>'required',
            'summary'=>'required',
        ];
    }
}
