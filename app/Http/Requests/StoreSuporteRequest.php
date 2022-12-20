<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSuporteRequest extends FormRequest
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
            'nome' => 'required|min:3|max:50',
            'telefone' => 'required|min:3|max:50',
            'email' => 'required|min:3|max:50',
            'modelo_bike' => 'required|min:3|max:50',
            'numero_serie' => 'required|min:3|max:50',
            'nota_fiscal' => 'required|min:3|max:50',
            'nome_revenda' => 'required|min:3|max:50',
            'data_compra' => 'required|min:3|max:50',
            'assunto' => 'required|min:3|max:500',
        ];
    }
    public function messages()
    {
        return [
            'required' => 'O campo :attribute é obrigatório!',
            'min' => 'O :attribute deve conter no mínimo 3 letras',
            'max' => 'O :attribute deve conter no máximo 50 letras',
        ];
    }
}