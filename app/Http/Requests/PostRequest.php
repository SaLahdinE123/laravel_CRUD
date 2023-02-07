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
            'productName' => 'required|max:20|min:3',
            'description'=>'required|max:40|min:3' ,
            'price'=>'required|max:6'
        ];
    }
    public function messages()
    {
        return [
            'productName.required'=>'product name is required',
            'description.required'=>'description is required',
            'price.required'=>'price is required' ,
        ];
    }
}
