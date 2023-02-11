<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'product_name_ar' => 'required|max:20|min:3',
            'product_name_en' => 'required|max:20|min:3' ,
            'product_description_ar' => 'required|max:40|min:3' ,
            'product_description_en' => 'required|max:40|min:3',
            'price'=>'required|max:6'
        ];
    }
    public function messages()
    {
        return [
            'price.required'=>__('messages.price_required') ,
            'product_name_ar.required'=>__('messages.product_required'),
            'product_name_en.required'=>__('messages.product_required'),
            'product_description_ar.required'=>__('messages.description_required'),
            'product_description_en.required'=>__('messages.description_required'),
        ];
    }
}
