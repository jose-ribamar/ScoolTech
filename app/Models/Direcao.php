<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Direcao extends Model
{
    use HasFactory;

    // Especificar o nome correto da tabela no banco de dados
    protected $table = 'direcao'; // Altere este valor caso sua tabela tenha outro nome

    protected $fillable = [
        'cpf',
        'date_nascimento',
        'user_id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
