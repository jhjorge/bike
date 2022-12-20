<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProdutosRequest extends FormRequest
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
            'title' => 'required|min:3|max:50',
            'descricao' => 'required|max:2000',
            'categoria_id' => 'required',

            'cor' => 'max:200',
            'tamanho' => 'max:200',
            'thumb' => 'required|mimes:png,jpg,jpeg',
        ];
    }
    public function messages()
    {
        return [
            'required' => 'O campo :attribute é obrigatório!',
            'categoria_id.required' => 'A categoria é obrigatório!',
            'title.unique' => 'O titulo já existe',
            'title.min' => 'O tiítulo deve conter no mínimo 3 letras',
            'title.max' => 'O título deve conter no máximo 50 letras',
            'thumb.mimes' => 'A imagem de destaque deve ser png, jpg ou jpeg'
        ];
    }
}