<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    // public function authorize()
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name_product' => 'required|max:255',
            'img' => 'image',
            'description' => 'required',
            'price' => 'required',
            'soluong'=>'required',
            'category_id'=>'required',
        ];
    }
}