<?php

namespace PMEexport\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserUpdateRequest extends FormRequest
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
        $user = $this->route('user');
        $userId = $user ? $user->id : null;

        return [
            'name' => 'required|string|min:3|max:255',
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($userId),
            ],
            'role_id' => 'required|integer|exists:roles,id',
            'department_id' => 'nullable|integer|exists:departments,id',
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
            'department_id' => 'Departamento',
        ];
    }
}
