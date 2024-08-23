<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lotacao extends Model
{
    use HasFactory;

    protected $table = 'lotacoes'; 

    protected $fillable = [
        'turma_id',
        'docente_id',
        'disciplina_id',
    ];

    public function turma()
    {
        return $this->belongsTo(Turma::class);
    }

    public function docente()
    {
        return $this->belongsTo(Docente::class);
    }

    public function disciplina()
    {
        return $this->belongsTo(Disciplina::class);
    }
}
