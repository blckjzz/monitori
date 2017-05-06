<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCursoDisciplinaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mo_curso_disciplina', function (Blueprint $table) {
            $table->unsignedInteger('curso_id');
            $table->unsignedInteger('disciplina_id');
            $table->foreign('curso_id')->references('id')->on('mo_cursos')->onDelete('cascade');
            $table->foreign('disciplina_id')->references('id')->on('mo_disciplinas')->onDelete('cascade');
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