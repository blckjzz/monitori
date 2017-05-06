<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model
{
    protected $table = 'os_disciplinas';

    protected $fillable = [
        'codigo',
        'nome',
    ];

    public function cursos()
    {
        return $this->belongsToMany(Curso::class, 'mo_curso_disciplina');
    }
}
