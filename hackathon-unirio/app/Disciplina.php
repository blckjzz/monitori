<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model
{
    protected $table = 'mo_disciplinas';

    protected $fillable = [
        'codigo',
        'nome',
    ];

    public function monitores()
    {
        return $this->belongsToMany(User::class, 'mo_user_disciplina');
    }

    public function cursos()
    {
        return $this->belongsToMany(Curso::class, 'mo_curso_disciplina');
    }
}
