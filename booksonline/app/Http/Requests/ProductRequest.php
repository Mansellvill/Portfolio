<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        $rules = [
            'name' => 'required|min:2|max:255',
            'code_name' => 'required|min:2|max:255|unique:products,code_name',
            'description' => 'max:999',
            'author_id' => 'required',
            'category_id' => 'required',
            'publisher_id' => 'required',
            'isbn' => 'required',
            'rating' => 'required',
            'price' => 'required|numeric|min:1',
        ];

        if($this->route()->named('products.update')) {
           
            $rules['code_name'] .= ','. $this->route()->parameter('product')->id;
        }
        return $rules;
    }

    public function messages() {
        return [
            'required' => 'Поле является обязательным для ввода!',
            'min' => 'Поле должно содержать минимум :min символа!',
            'max' => 'Поле должно содержать не больше :max символа!',  
            'unique' => 'Кодовое имя уже существует!',
        ];
    }
}
