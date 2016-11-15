<?php

namespace SistemaHAD\Http\Requests;

use SistemaHAD\Http\Requests\Request;

class ShiftDetailRequest extends Request
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
            'idempleado' => 'required',
            'idobjetivo' => 'required',
            'meselegido' => 'required',
            'asignadaslunes' => 'sometimes|required',
            'iniciolunes' => 'sometimes|required',
            'asignadasmartes' => 'sometimes|required',
            'iniciomartes' => 'sometimes|required',
            'asignadasmiercoles' => 'sometimes|required',
            'iniciomiercoles' => 'sometimes|required',
            'asignadasjueves' => 'sometimes|required',
            'iniciojueves' => 'sometimes|required',
            'asignadasviernes' => 'sometimes|required',
            'inicioviernes' => 'sometimes|required',
            'asignadassabado' => 'sometimes|required',
            'iniciosabado' => 'sometimes|required',
            'asignadasdomingo' => 'sometimes|required',
            'iniciodomingo' => 'sometimes|required',
        ];
    }
}
