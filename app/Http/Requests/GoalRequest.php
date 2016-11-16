<?php

namespace SistemaHAD\Http\Requests;

use SistemaHAD\Http\Requests\Request;

class GoalRequest extends Request
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
            'cod_legajo' => 'required',
            'nombre' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'representante' => 'required',
            'path' =>'required|mimes:jpeg,bmp'

        ];
    }
}
