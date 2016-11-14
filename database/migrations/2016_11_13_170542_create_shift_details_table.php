<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShiftDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shift_details',function(Blueprint $table){
             $table->increments('id');
             $table->datetime('inicio');
             $table->datetime('finalizacion');
             $table->boolean('asistencia')->default(true);
             $table->boolean('feriado')->default(false);
             $table->integer('shift_id')->unsigned();
             $table->integer('employee_id')->unsigned();
             $table->integer('goal_id')->unsigned();
             $table->foreign('employee_id')
                     ->references('id')
                     ->on('employees')
                     ->onDelete('cascade');
             $table->foreign('goal_id')
                     ->references('id')
                     ->on('goals')
                     ->onDelete('cascade');
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
        //
    }
}
