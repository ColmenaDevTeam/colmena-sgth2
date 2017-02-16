<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RecurringActivities extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('recurring_activities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',45);
            $table->enum('frequency',['Semanal','Mensual','Bimensual','Trimestral','Semestral']);
            $table->integer('deliverer_days');
            $table->text('details');
            $table->integer('priority');
            $table->integer('compexity');
            $table->enum('task_type',['Academico-Docente','Administrativas','Creacion intelectual','Integracion Social','Administrativo-Docente','Produccion']);
            $table->date('start_date');
            $table->date('last_launch')->nullable();
            $table->boolean('active')->nullable();
            $table->nullableTimestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExist('recurring_activities');
    }
}
