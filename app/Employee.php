<?php

namespace SistemaHAD;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Employee extends Model
{
    protected $table = "employees";

    protected $fillable = ['nombre','apellido','legajo','DNI','direccion','telefono','puesto','path','notes'];

    public function setPathAttribute($path){
        $name = Carbon::now()->second.$path->getClientOriginalName();
        $this->attributes['path'] = $name;
        \Storage::disk('local')->put($name,\File::get($path));
    }

    public function employee_goals(){
        return $this->hasMany('SistemaHAD\Employee_Goal');
    }
    public function Shifts(){
        return $this->hasMany('SistemaHAD\Shift_Detail');
    }
}
