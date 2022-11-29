<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEventosRequest extends FormRequest
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
            'title' => 'min:3|max:50',
            'date' => 'min:3|max:50',
            'content' => 'min:10|max:2000',
            'thumb' => 'image',
        ];
    }
    public function messages()
    {
        return [
            'image' => 'O campo :attribute precisa ser uma imagem válida!',
            'max' => 'A :attribute deve conter no máximo 50 letras',
            'min' => 'A :attribute deve conter no mínimo 3 letras',
            'slug.min' => 'A slug deve conter no mínimo 3 letras',
            'title.min' => 'O tiítulo deve conter no mínimo 3 letras',
            'slug.max' => 'A slug deve conter no máximo 30 letras',
            'title.max' => 'O título deve conter no máximo 50 letras',
        ];
    }
}