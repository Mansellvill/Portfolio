<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccountRequest extends FormRequest
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
            'full_name' => 'required|min:2|max:255',
            'phone' => 'required|min:8|max:255',
            'email' => 'required|min:2|max:255',
        ];
    }

    public function messages() {
        return [
            'required' => 'Поле является обязательным для ввода!',
            'min' => 'Поле должно содержать минимум :min символа!',
            'unique' => 'Кодовое имя уже существует!',
        ];
    }
}
