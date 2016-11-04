<?php

namespace SistemaHAD;

use Illuminate\Database\Eloquent\Model;
use DB;
class Employee_Goal extends Model
{
    protected $fillable = ['employee_id','goal_id'];

    public function Employee(){
        return $this->belongsTo('SistemaHAD\Employee');
    }
    public function Goal(){
        return $this->belongsTo('SistemaHAD\Goal');
    }

}
