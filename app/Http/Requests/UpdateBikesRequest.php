<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBikesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function rules()
    {
        return [
            'title' => 'min:3|max:50',
            'quadro' => 'min:1 | max:500',
            'garfo' => 'min:1 | max:500',
            'movimentoDirecao' => 'min:1 | max:500',
            'guidao' => 'min:1 | max:500',
            'manopla' => 'min:1 | max:500',
            'freio' => 'min:1 | max:500',
            'aro' => 'min:1 | max:500',
            'cubo' => 'min:1 | max:500',
            'pneu' => 'min:1 | max:500',
            'pedivela' => 'min:1 | max:500',
            'corrente' => 'min:1 | max:500',
            'movimentoCentral' => 'min:1 | max:500',
            'rodaLivre' => 'min:1 | max:500',
            'cambioTraseio' => 'min:1 | max:500',
            'cambioDianteiro' => 'min:1 | max:500',
            'manete' => 'min:1 | max:500',
            'selim' => 'min:1 | max:500',
            'canote' => 'min:1 | max:500',
            'abracadeira' => 'min:1 | max:500',
            'pedal' => 'min:1 | max:500',
            'peso' => 'min:1 | max:500',
            'observacao' => 'min:1 | max:500',
            'content' => 'min:1 | max:2000',
            'descricao' => 'min:1 | max:2000',
            'thumb' => 'image',
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
        ];
    }
}