<?php

namespace SistemaHAD;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Goal extends Model
{
    protected $table = 'goals';
    protected $fillable = ['cod_legajo','nombre','direccion','telefono','representante','path'];

    public function setPathAttribute($path){
        $name = Carbon::now()->second.$path->getClientOriginalName();
        $this->attributes['path'] = $name;
        \Storage::disk('local')->put($name,\File::get($path));
    }

    public function Employee_goals(){
        return $this->hasMany('SistemaHAD\Employee_Goal');
    }
    public function Shift_Details(){
        return $this->hasMany('SistemaHAD\Shift_Detail');
    }
}
