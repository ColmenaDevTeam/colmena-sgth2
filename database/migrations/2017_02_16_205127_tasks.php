<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Tasks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->date('estimated_date');
            $table->date('deliver_date')->nullable();
            $table->text('details');
            $table->integer('priority');
            $table->integer('complexity');
            $table->enum('task_status',['Asignada','Revision','Cumplida','Cancelada','Diferida','Retardada']);
            $table->enum('task_type',['Academico-Docente','Administrativas','Creacion intelectual','Integracion Social','Administrativo-Docente','Produccion']);
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->boolean('seen')->default(false);
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
        Schema::drop('tasks');
    }
}
