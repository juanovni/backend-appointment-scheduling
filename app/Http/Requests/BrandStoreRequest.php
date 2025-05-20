<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandStoreRequest extends FormRequest
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
            'nombre' => [
                'required',
                'string',
                'max:155'
            ],
        ];
    }

    /**
     * Set nice attributes names
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'name' => 'nombre de la marca',
        ];
    }
}
