<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreWerehouse extends FormRequest
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
            'name'      => 'required|min:3|max:50',
            'code'      => 'required|min:3|max:5',
            'user_id'   => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'name.required'     => 'El campo Nombre es requerido',
            'name.min'          => 'El campo Nombre necesita al menos 3 caracteres ',
            'name.max'          => 'El campo Nombre no puede exceder los 50 caracteres ',
            'code.required'     => 'El campo Código es requerido ',
            'code.min'          => 'El campo Código necesita al menos 3 caracteres ',
            'code.max'          => 'El campo Código no puede exceder los 5 caracteres ',
            'user_id.required'  => 'Debe asignar un gerente al almacen',
            'user_id.numeric'   => 'Debe asignar un gerente al almacen',
        ];
    }
}
