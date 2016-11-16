<?php

namespace SistemaHAD;

use Illuminate\Database\Eloquent\Model;

class Shift_Detail extends Model
{
    protected $table ="shift_details";
    protected $fillable = ['inicio','finalizacion','asistencia','feriado','shift_id','employee_id','goal_id'];

    public function Employee(){
        return $this->belongsTo('SistemaHAD\Employee');
    }
    public function Goal(){
        return $this->belongsTo('SistemaHAD\Goal');
    }
}
