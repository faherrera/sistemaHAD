@extends('layouts.admin')
  @section('content')
    <div class="container">
      <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">Empleados con usuarios asignados</div>

        <!-- Table -->
        <table class="table">
          <thead>
            <th>## Legajo</th>
            <th># Nombre y Apellido</th>
            <th># Email</th>
            <th># Usuario</th>
          </thead>
          <tbody>
            <tr>
              <th>
                0003
              </th>
              <th>
                Pedro Alberto
              </th>
              <th>pedro@gmail.com</th>
              <th>palberto</th>
            </tr>

          </tbody>
        </table>
      </div>

    </div>
  @endsection
