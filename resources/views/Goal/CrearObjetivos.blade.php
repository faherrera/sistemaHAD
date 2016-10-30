@extends('layouts.admin')
    @section('content')

        <!--  Section Content Yield-->
            <section class="content">
                <div class="jumbotron">
                    <div class="row">
                        <!--  Formulario CREATE or UPDATE-->
                        <div class="box-crud__container">
                            <h1> Alta Objetivos</h1>

                             <div class="col-sm-6 col-sm-offset-3">
                                <form action="" class="box-crud__container--form">
                                    <label for="">Cargar imagen del Objetivo:</label>
                                    <input type="file" name="image" >
                                    <label for="">Direccion:</label>
                                    <input type="text" placeholder="ej: Santiago 81">
                                    <label for="">Nombre:</label>
                                    <input type="text" placeholder="ej: Nombre del Objetivo">
                                    <label for="">Telefono:</label>
                                    <input type="text" placeholder="ej: 4854346">
                                    <label for="">Representante:</label>
                                    <input type="text" placeholder="ej: Daniel Barraza">
                                    <br>
                                    <label for="">Cantidad de Empleados:</label>
                                    <div>
                                        <input type="checkbox" value="1">1
                                        <input type="checkbox" value="2">2
                                        <input type="checkbox" value="3">3

                                    </div>
                                    <br>

                                    <label for=""> Empleados a Cargo </label>
                                    <select class="" name="">

                                        <option value="1">Figueroa Jesus</option>
                                        <option value="2">Facundo Herrera</option>
                                        <option value="3">Martiez Francisco</option>
                                        <option value="4">Coronel Exequiel</option>
                                        <option value="5">Canto Javier</option>
                                        <option value="6">Cristian Daud</option>
                                    </select>
                                    <input type="submit" value="Dar de alta" class="btn btn-success">
                                </form>
                            </div>
                        </div>
                        <!--  Formulario CREATE or UPDATE-->
                    </div>
                </div>
            </section>
        <!--  Section Content Yield-->
    @endsection
