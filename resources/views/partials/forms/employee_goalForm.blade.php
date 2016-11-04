{!! Form::label('Seleccionar a un empleado:') !!}
<div class="form-group">
    {!! Form::select('employee_id',$employees)!!}

</div>

{!! Form::label('Seleccionar a un objetivo:') !!}
<div class="form-group">
    {!! Form::select('goal_id',$goals)!!}

</div>
