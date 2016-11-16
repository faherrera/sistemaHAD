<?php

namespace SistemaHAD;

use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
        protected $fillable = ['employee_id','goal_id','month'];

        public function Employee(){
            return $this->belongsTo('SistemaHAD\Employee');
        }
        public function Goal(){
            return $this->belongsTo('SistemaHAD\Goal');
        }
}
