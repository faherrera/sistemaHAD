<?php

namespace SistemaHAD\Http\Requests;

use SistemaHAD\Http\Requests\Request;

class employeeGoalRequest extends Request
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
            'employee_id'=>'required|numeric',
            'goal_id'=>'required|numeric'
        ];
    }
}
