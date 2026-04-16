<?php

namespace PMEexport\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use PMEexport\Models\Company;

class CreateCompanyComplementRequest extends FormRequest
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
            'nuit' => 'required|unique:companies',
            'alvara' => 'required|unique:companies',
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
            'nuit' => 'Nuit',
            'alvara' => 'Alvará',
        ];
    }

}
