<?php

namespace SistemaHAD\Http\Requests;

use SistemaHAD\Http\Requests\Request;

class EmployeeRequest extends Request
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
            'legajo' => 'required',
            'nombre' => 'required',
            'apellido' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'DNI' => 'required',
            'puesto' => 'required',
            'path' =>'required|mimes:jpeg,bmp'
        ];
    }
}
