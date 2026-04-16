<?php

namespace PMEexport\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use PMEexport\Models\CompanyPhone;

class CreateCompanyPhoneRequest extends FormRequest
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
        return CompanyPhone::$rules;
    }
}
