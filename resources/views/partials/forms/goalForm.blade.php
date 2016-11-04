{!! Form::label('Codigo de objetivo') !!}
{!! Form::number('cod_legajo',null,['placeholder'=>'00005','min'=>'1'])!!}

{!! Form::label('Nombre') !!}
{!! Form::text('nombre',null,['placeholder'=>'Torre A']) !!}

{!! Form::label('Direccion') !!}
{!! Form::text('direccion',null,['placeholder'=>'Av. Independencia 2015']) !!}

{!! Form::label('Representante/Responsable') !!}
{!! Form::text('representante',null,['placeholder'=>'Torre A','pattern'=>'[A-Za-z]{4-20}','title'=>'No puede ingresar un nombre tan corto']) !!}

{!! Form::label('Telefono de contacto') !!}
{!! Form::number('telefono',null,['placeholder'=>'4322388','min'=>'1'])!!}

{!! Form::label('Fotografia del objetivo') !!}
{!! Form::file('path') !!}
