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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'image' => 'required',
            'product' => 'required|unique:produtos|min:5',
            'price' => 'required',
            'current_inventory' => 'required',
            'description' => 'required|min:15',
            'category_id' => 'required',
            'unity_id' => 'required',
            'type_id' => 'required',
        ];
    }
}
