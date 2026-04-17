<?php

namespace PMEexport\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use PMEexport\Models\ProductCategory;

class UpdateProductCategoryRequest extends FormRequest
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
            'name' => 'required|max:255|min:3|string',
            'photo' => 'nullable|image',
        ];
    }
}
