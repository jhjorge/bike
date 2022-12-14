<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBikesRequest extends FormRequest
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
            'title' => 'required|unique:bikes|min:3|max:50',
            'quadro' => ' max:500',
            'garfo' => 'max:500',
            'movimentoDirecao' => ' max:500',
            'guidao' => ' max:500',
            'manopla' => ' max:500',
            'freio' => 'max:500',
            'aro' => ' max:500',
            'cubo' => 'max:500',
            'pneu' => 'max:500',
            'pedivela' => ' max:500',
            'corrente' => ' max:500',
            'movimentoCentral' => 'max:500',
            'rodaLivre' => 'max:500',
            'cambioTraseio' => 'max:500',
            'cambioDianteiro' => 'max:500',
            'manete' => 'max:500',
            'selim' => 'max:500',
            'canote' => ' max:500',
            'abracadeira' => ' max:500',
            'pedal' => 'max:500',
            'peso' => 'max:500',
            'observacao' => ' max:2000',
            'content' => ' max:2000',
            'descricao' => 'max:2000',

            'thumb' => 'required | image',

        ];
    }
    public function messages()
    {
        return [
            'required' => 'O campo :attribute é obrigatório.',
            'min' => 'O campo :attribute precisa ter no mínimo 1 letra.',
            'max' => 'O campo :attribute pode ter no máximo 500 letras.',
            'image' => 'O campo :attribute precisa ser uma imagem válida!',
            'slug.min' => 'A slug deve conter no mínimo 3 letras',
            'title.min' => 'O tiítulo deve conter no mínimo 3 letras',
            'slug.max' => 'A slug deve conter no máximo 30 letras',
            'title.max' => 'O título deve conter no máximo 50 letras',
            'unique' => 'O campo :attribute já existe!',
        ];
    }
}