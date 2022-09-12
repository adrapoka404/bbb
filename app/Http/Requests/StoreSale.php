<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSale extends FormRequest
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
            'quantity'  => 'required|numeric',
            'date'      => 'required|date',
            'store_id'  => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'quantity.required' => 'El campo Cantidad es requerido',
            'quantity.numeric'  => 'El campo Cantidad debe ser un número valido',
            'date.required'     => 'El campo Fecha es requeruido',
            'date.date'         => 'El campo Fecha no es una fecha valida',
            'store_id.required' => 'El campo tienda es requerido',
            'store_id.numeric'  => 'El campo tienda es requerido',
        ];
    }
}
