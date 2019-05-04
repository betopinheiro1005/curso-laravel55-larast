<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NotesRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required',
            'body' => 'required|min: 20'
        ];
    }

    // public function messages()
    // {
    //     return [
    //         'title.required' => 'O título da anotação é obrigatório!',
    //         'body.required' => 'O conteúdo da anotação é obrigatório!',
    //         'body.min' => 'A anotação deve conter no mínimo :min caracteres'
    //     ];
    // }
}
