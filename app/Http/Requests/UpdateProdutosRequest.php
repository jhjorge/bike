<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProdutosRequest extends FormRequest
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
            'descricao' => 'required',
            'categoria_id' => 'required',
            'cor' => 'required|max:200',
            'tamanho' => 'required|max:200',
            'thumb' => 'mimes:png,jpg,jpeg',
        ];
    }
    public function messages()
    {
        return [
            'required' => 'O campo :attribute é obrigatório!',
            'title.unique' => 'O titulo já existe',
            'title.min' => 'O tiítulo deve conter no mínimo 3 letras',
            'min' => ':attribute deve conter no mínimo 3 letras',
            'max' => ':attribute deve conter no máximo 200 letras',
            'thumb.mimes' => 'A imagem de destaque deve ser png, jpg ou jpeg'
        ];
    }
}