<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
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

    public function updateCnd(array $disciplina): bool
    {
        try {
            DB::beginTransaction();

            $this->update([
                'name' => $disciplina['name'],
                'date_creation' => $disciplina['date_creation'],
            ]);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            return false;
        }
        return true;
    }

    public function lotacoes()
    {
        return $this->hasMany(Lotacao::class);
    }
}
