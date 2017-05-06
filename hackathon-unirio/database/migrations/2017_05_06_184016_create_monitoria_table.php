<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMonitoriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mo_monitorias', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('aceita')->nullable();
            $table->timestamp('finalizada')->nullable();
            $table->integer('nota')->nullable();
            $table->text('avaliacao')->nullable();
            $table->unsignedInteger('monitor_id');
            $table->unsignedInteger('monitorado_id');
            $table->softDeletes();
            $table->foreign('monitor_id')->references('id')->on('mo_users')->onDelete('cascade');
            $table->foreign('monitorado_id')->references('id')->on('mo_users')->onDelete('cascade');
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
        Schema::dropIfExists('mo_curso_disciplina');
    }
}
