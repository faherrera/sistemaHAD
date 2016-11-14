<?php

namespace SistemaHAD;

use Illuminate\Database\Eloquent\Model;

class Shift_Detail extends Model
{
    protected $table ="shift_details";
    protected $table = ['inicio','finalizacion','asistencia','feriado','shift_id','employee_id','goal_id','asistencia'];
}
