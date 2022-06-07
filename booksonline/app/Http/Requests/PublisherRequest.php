<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PublisherRequest extends FormRequest
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
            'code_name' => 'required|min:2|max:255|unique:publishers,code_name',
        ];
        

        if($this->route()->named('publishers.update')) {
            $rules['code_name'] .= ','. $this->route()->parameter('publisher')->id;
        }

        return $rules;
    }

    public function messages() {
        return [
            'required' => 'Поле является обязательным для ввода!',
            'min' => 'Поле должно содержать минимум :min символа!', 
            'unique' => 'Кодовое имя уже существует!',
        ];
    }
}
