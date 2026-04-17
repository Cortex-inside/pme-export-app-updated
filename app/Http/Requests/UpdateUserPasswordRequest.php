<?php

namespace PMEexport\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserPasswordRequest extends FormRequest
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
            'password' => 'required|string|min:8|confirmed',
        ];
    }

    /**
     * Normaliza campos legados antes da validação.
     */
    protected function prepareForValidation()
    {
        if (! $this->has('password_confirmation') && $this->has('repassword')) {
            $this->merge([
                'password_confirmation' => $this->input('repassword'),
            ]);
        }
    }

    /**
     * Tradução dos campos.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'password' => 'Senha',
            'password_confirmation' => 'Confirmação de senha',
        ];
    }
}
