<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StroreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'NAME' => 'required|min:10',
            'ARTICLE' => 'required|regex:/^[a-zA-Z0-9]+$/|unique:products',
            'STATUS' => '',
        ];
    }

    public function messages()
    {
        return [
            'NAME.required' => 'Поле "name" является обязательным.',
            'NAME.min' => 'Поле "name" должно содержать минимум 10 символов.',
            'ARTICLE.required' => 'Поле "article" является обязательным.',
            'ARTICLE.regex' => 'Поле "article" должно содержать только латинские буквы и цифры.',
            'ARTICLE.unique' => 'Значение поля "article" уже существует в таблице "table_name".',
        ];
    }
}
