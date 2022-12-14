<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEventosRequest extends FormRequest
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
            'title' => 'required|unique:eventos|min:3|max:50',
            'locale' => 'required|',
            'content' => 'required|min:10',
            'thumb' => 'required|image',
        ];
    }
    public function messages()
    {
        return [
            'required' => 'O campo :attribute é obrigatório!',
            'title.unique' => 'O titulo já existe',
            'image' => 'O campo :attribute precisa ser uma imagem válida!',
            'slug.min' => 'A slug deve conter no mínimo 3 letras',
            'title.min' => 'O tiítulo deve conter no mínimo 3 letras',
            'slug.max' => 'A slug deve conter no máximo 30 letras',
            'title.max' => 'O título deve conter no máximo 50 letras',
        ];
    }
}