<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class datoRequest extends FormRequest
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
            'venta_id' => 'required|integer|min:0'
            , 'cantidad' => 'required|numeric|min:1'
            , 'total' => 'required|numeric|min:0|max:200'
        ];
    }

    public function messages()
    {
    return [
        'venta_id.required' => 'La venta_id debe ser un campo requerido',
        'cantidad.required' => 'La cantidad debe ser un campo requerido',
        'cantidad.min' => 'La cantidad debe tener minimo un caracter',
        'total.required' => 'La total debe ser un campo requerido',
        'total.min' => 'La total debe tener minimo un caracter',
        'total.max' => 'La total debe tener maximo 5 caracteres',
        ];
    }
}
