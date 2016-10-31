<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('legajo');
            $table->char('nombre',50);
            $table->char('apellido',50);
            $table->string('direccion');
            $table->char('telefono','12');
            $table->char('DNI','9');
            $table->enum('puesto',['fijo','relevo','supervisor'])->default('fijo');
            $table->string('path');
    

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('employees');
    }
}
