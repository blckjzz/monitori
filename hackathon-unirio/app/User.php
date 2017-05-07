<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'mo_users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'matricula',
        'nome',
        'nome_social',
        'email',
        'telefone',
        'curso_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function ensinadas()
    {
        return $this->belongsToMany(Disciplina::class, 'mo_user_disciplina');
    }

    public function monitoriasMonitor()
    {
        return $this->hasMany(User::class, 'monitor_id');
    }

    public function monitoriasAluno()
    {
        return $this->hasMany(User::class, 'monitorado_id');
    }

    public function curso()
    {
        return $this->hasOne(Curso::class);
    }
}
