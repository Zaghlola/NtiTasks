<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'name_en' => ['required', 'max:255'],
            'name_ar' => ['required', 'max:255'],
            'code' => ['required', 'digits:5', "unique:products,code,$this->id,id"],
            'price' => ['required', 'numeric', 'between:1,99999.99'],
            'quantity' => ['nullable', 'integer', 'min:1', 'max:999'],
            'detailes_en' => ['required'],
            'detailes_ar' => ['required'],
            'brand_id' => ['nullable', 'integer', 'exists:brands,id'],
            'subcategory_id' => ['required', 'integer', 'exists:subcategories,id'],
            'image' => ['nullable', 'max:1000', 'mimes:png,jpg,jpeg']
      
        ];
    }
}