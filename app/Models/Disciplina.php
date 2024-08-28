<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model
{
    use HasFactory;

    protected $table = 'disciplinas';

    protected $fillable = [
        'name',
        'date_creation',
    ];

    public function lotacoes()
    {
        return $this->hasMany(Lotacao::class);
    }
}
