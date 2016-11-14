<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShiftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shifts',function(Blueprint $table){
            $table->increments('id');

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
            $table->string('month');
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
