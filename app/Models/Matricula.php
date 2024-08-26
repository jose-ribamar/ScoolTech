<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Matricula extends Model
{
    use HasFactory;

    protected $table = 'plates';
    protected $fillable = [
        'date_creation',
        'turma_id',
        'aluno_id',
    ];

    static public function createMatricula(array $matricula): bool
    {
        try {
            DB::beginTransaction();

            self::create([
                'date_creation' => $matricula['date_creation'],
                'turma_id' => $matricula['turma_id'],
                'aluno_id' => $matricula['aluno_id'],
            ]);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            return false;
        }
        return true;
    }
    public function turma()
    {
        return $this->belongsTo(Turma::class);
    }

    public function aluno()
    {
        return $this->belongsTo(Aluno::class);
    }
}
