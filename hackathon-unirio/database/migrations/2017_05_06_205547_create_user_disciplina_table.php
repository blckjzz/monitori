<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserDisciplinaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mo_user_disciplina', function (Blueprint $table) {
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('disciplina_id');
            $table->foreign('user_id')->references('id')->on('mo_users')->onDelete('cascade');
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
        Schema::dropIfExists('mo_user_disciplina');
    }
}
