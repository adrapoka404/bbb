<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreZone extends FormRequest
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
            'name'          => 'required|min:3|max:50',
            'code'          => 'required|min:3|max:5',
            'user_id'       => 'required|numeric',
            'werehouse_id'  => 'required|numeric',
            'config_1'      => 'required|numeric',
            'config_2'      => 'required|numeric',        ];
    }

    public function messages()
    {
        return [
            'name.required'         => 'El campo Nombre es requerido',
            'name.min'              => 'El campo Nombre necesita al menos 3 caracteres ',
            'name.max'              => 'El campo Nombre no puede exceder los 50 caracteres ',
            'code.required'         => 'El campo Código es requerido ',
            'code.min'              => 'El campo Código necesita al menos 3 caracteres ',
            'code.max'              => 'El campo Código no puede exceder los 5 caracteres ',
            'user_id.required'      => 'Debe asignar un Gerente a la zona',
            'werehouse_id.required' => 'Debe asignar la zona a un almacen',
            'user_id.numeric'       => 'Debe asignar un Gerente a la zona',
            'werehouse_id.numeric'  => 'Debe asignar la zona a un almacen',
            'config_1.required'     => 'El campo Configuración 1 es requerido',
            'config_1.numeric'      => 'El campo Configuración 1 debe ser un valor numerico',
            'config_2.required'     => 'El campo Configuración 2 es requerido',
            'config_2.numeric'      => 'El campo Configuración 2 debe ser un valor numerico',
        ];
    }
}
