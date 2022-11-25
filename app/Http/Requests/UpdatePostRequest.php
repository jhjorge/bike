<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
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
            'title' => 'min:3|max:50|required',
            'content' => 'min:10|max:2000',
            'thumb' => 'mimes:png,jpg,jpeg',
        ];
    }
    public function messages()
    {
        return [
            'thumb.mimes' => 'O campo imagem precisa ser válido!',
            'title.required' => 'O tiítulo é requirido',
            'title.max' => 'O título deve conter no máximo 50 letras',
            'title.min' => 'O título deve conter no minimo 3 letras',
        ];
    }
}