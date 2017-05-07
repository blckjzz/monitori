<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Monitoria extends Model
{
    protected $table = 'mo_monitorias';

    protected $fillable = [
        'aceita',
        'finalizada',
        'nota',
        'avaliacao',
        'monitor_id',
        'monitorado_id',
        'disciplina_id',
    ];

    public function disciplina()
    {
        return $this->belongsTo(Disciplina::class);
    }

    public function monitor()
    {
        return $this->belongsTo(User::class, 'monitor_id');
    }

    public function monitorado()
    {
        return $this->belongsTo(User::class, 'monitorado_id');
    }
}
