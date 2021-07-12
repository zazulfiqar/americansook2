<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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

    public function rules()
    {
        return [
            'title'=>'string|required',
            'brand_id' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'year' => 'required',
            'cat_id' => 'required',
//            'old_new' => 'required',
//            'file' => 'required',
            // 'product_type' => 'required'
        ];
    }
}
