<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $table = 'mo_cursos';

    protected $fillable = [
        'codigo',
        'nome',
    ];

    public function disciplinas()
    {
        return $this->belongsToMany(Disciplina::class, 'mo_curso_disciplina');
    }
}
