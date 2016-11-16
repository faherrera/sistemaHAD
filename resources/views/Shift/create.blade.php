@extends('layouts.admin')
    @section('content')
        <section class="content over">
            <div class="container">
                <br>
                <br>
                <br>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-default">
                          <div class="panel-heading">Generacion Individual de turnos</div>
                           <div class="panel-body">
                                {{-- PANEL --}}
                                {!! Form::open(['route'=>'turnos.store','method'=>'POST']) !!}

                                    {{-- Include --}}
                                        @include('partials.forms.shiftDetailForm')
                                    {{-- Include --}}
                                                {{-- BOTON --}}
                                                {!!Form::submit('Cargar Turno',['class'=>'btn btn-primary','id'=>'btnEnviar']) !!}
                                                {{-- BOTON --}}
                                    </div>
                                {{-- PANEL --}}
                                {!! Form::close() !!}

                           </div>
                          </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    @endsection

    @section('scripts')
        <script src="{{asset('assets/js/moment-with-locales.js')}}" charset="utf-8"></script>
        <script src="{{asset('assets/js/bootstrap-datetimepicker.js')}}" charset="utf-8"></script>

        <script type="text/javascript">
            $(function () {
                var inicio;
                var transformacion;
                $('#datetimepicker6').datetimepicker({
                                    locale: 'en',
                                    format: 'YYYY/MM/DD HH:mm'
                                });

                    $("#datetimepicker6").on("dp.change", function (e) {
                    });

                    // $('#btnEnviar').click(function(e){
                    //     e.preventDefault();
                    //     inicio = $('#inicio').val();
                    //     console.log(inicio);
                    //     console.log(inicio.getHours());
                    //
                    // });


                });
        </script>
    @endsection
