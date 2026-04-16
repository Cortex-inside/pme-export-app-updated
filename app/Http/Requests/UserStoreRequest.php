<?php

namespace PMEexport\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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

        return [
            'name' => 'required:max:255|min:3|string',
            'email' => 'required|email|unique:users',
            'role_id' => 'required',
        ];

    }

    //Personalizar mensagem
    public function messages()
    {
        return [
        ];
    }

    //Tradução dos campos
    public function attributes()
    {
        return[
            'name' => 'Nome',
            'email' => 'E-mail',
            'role_id' => 'Tipo de usuário',
        ];
    }
}
