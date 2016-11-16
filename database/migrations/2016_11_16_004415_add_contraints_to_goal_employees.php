<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddContraintsToGoalEmployees extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee__goals', function (Blueprint $table) {
            $table->increments('id');

            // Employee relation
            $table->integer('employee_id')->unsigned();
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
            // Goals Relation
            $table->integer('goal_id')->unsigned();
            $table->foreign('goal_id')
                    ->references('id')
                    ->on('goals')->onDelete('cascade') ;
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
        Schema::table('employee__goals', function (Blueprint $table) {
            //
        });
    }
}
