<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    use HasFactory;

    protected $table = 'turmas';

    protected $fillable = [
        'name',
        'ano',
        'date_creation',
    ];

    // Definindo a relação com o modelo Matricula
    public function matriculas()
    {
        return $this->hasMany(Matricula::class, 'turma_id'); // Certifique-se de que 'turma_id' é a chave estrangeira correta
    }

    // Definindo a relação com o modelo Lotacao
    public function lotacoes()
    {
        return $this->hasMany(Lotacao::class, 'turma_id'); // Certifique-se de que 'turma_id' é a chave estrangeira correta
    }
}


