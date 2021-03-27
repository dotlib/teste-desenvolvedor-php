<?php

namespace App\Http\Requests\Controle;

use Illuminate\Foundation\Http\FormRequest;

class ClienteAtualizaRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        $rules = [
            'nome' => 'required|min:2|max:255',
            'cpf' => 'required|min:11',
            'email' => 'required|min:2|max:255|email',
        ];
        if (request()->get('password')) {
            $rules['password'] = 'required|min:6|max:255|confirmed';
        }

        return $rules;
    }
}
