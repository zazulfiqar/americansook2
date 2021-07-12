<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
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
            'title'=>'required|string',
//            'summary'=>'string|required',
//            'description'=>'string|nullable',
//            'photo'=>'string|required',
//            'size'=>'nullable',
//            'stock'=>"required|numeric",
//            'cat_id'=>'required|exists:categories,id',
//            'child_cat_id'=>'nullable|exists:categories,id',
//            'is_featured'=>'sometimes|in:1',
//            'brand_id'=>'nullable|exists:brands,id',
//            'status'=>'required|in:active,inactive',
//            'condition'=>'required|in:default,new,hot',
//            'price'=>'required|numeric',
//            'discount'=>'nullable|numeric'
        ];
    }
}
