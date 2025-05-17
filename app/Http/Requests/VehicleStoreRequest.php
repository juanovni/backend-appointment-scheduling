<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehicleStoreRequest extends FormRequest
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
            'propietario' => [
                'required',
                'string',
                'max:155'
            ],
            'placa' => [
                'required',
                'string',
                'min:4',
                'max:10',
                #'unique:age_vehiculos,placa'
            ],
            'telefono' => [
                'required',
                'string',
                'max:15'
            ],
            'email' => [
                'required',
                'email'
            ]
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
            'name' => 'nombre completo del propietario',
            'email' => 'email'
        ];
    }
}
