<?php

use App\Http\Controllers\AlunoController;
use App\Http\Controllers\DirecaoController;
use App\Http\Controllers\DisciplinaController;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\LotacaoController;
use App\Http\Controllers\MatriculaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TurmaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


 

    Route::get('/direcao', [DirecaoController::class, 'index'])->name('direcao.index');
    Route::get('/direcao/create', [DirecaoController::class, 'create'])->name('direcao.create');
    Route::post('/direcao', [DirecaoController::class, 'store'])->name('direcao.store');
    Route::get('/direcao/{direcao}', [DirecaoController::class, 'show'])->name('direcao.show');
    // Route::get('/direcao/{direcao}/edit', [DirecaoController::class, 'edit'])->name('direcao.edit');
    // Route::put('/direcao/{direcao}', [DirecaoController::class, 'update'])->name('direcao.update');
    // Route::delete('/direcao/{direcao}', [DirecaoController::class, 'destroy'])->name('direcao.destroy');


    Route::get('/docente', [DocenteController::class, 'index'])->name('docente.index');
    Route::get('/docente/create', [DocenteController::class, 'create'])->name('docente.create');
    Route::post('/docente', [DocenteController::class, 'store'])->name('docente.store');
   

   

    Route::get('/lotacao', [LotacaoController::class, 'index'])->name('lotacao.index');
    Route::get('/lotacao/create/{turma_id}', [LotacaoController::class, 'create'])->name('lotacao.create');
    Route::post('/lotacao', [LotacaoController::class, 'store'])->name('lotacao.store');
    Route::get('/lotacao/{turma_id}/edit', [LotacaoController::class, 'edit'])->name('lotacao.edit');

    Route::put('/lotacao/{turma_id}', [LotacaoController::class, 'update'])->name('lotacao.update');
    

    Route::get('/matricula', [MatriculaController::class, 'index'])->name('matricula.index');
    Route::get('/matricula/search', [MatriculaController::class, 'search'])->name('matricula.search');
    Route::get('/matricula/create/{turma_id}', [matriculaController::class, 'create'])->name('matricula.create');
    Route::post('/matricula', [matriculaController::class, 'store'])->name('matricula.store');
    Route::get('/matricula/{matricula}/edit', [MatriculaController::class, 'edit'])->name('matricula.edit');
    Route::put('/matricula/{matricula}', [MatriculaController::class, 'update'])->name('matricula.update');

    // Route::delete('/matricula/{matricula}', [MatriculaController::class, 'destroy'])->name('matricula.destroy');

    Route::get('/aluno', [AlunoController::class, 'index'])->name('aluno.index');
    Route::get('/aluno/create', [AlunoController::class, 'create'])->name('aluno.create');
    Route::post('/aluno', [AlunoController::class, 'store'])->name('aluno.store');

    Route::resource('disciplina', DisciplinaController::class);
    Route::get('/disciplina/create', [DisciplinaController::class, 'create'])->name('disciplina.create');
    Route::get('/disciplina/create', [DisciplinaController::class, 'create'])->name('disciplina.create');
    Route::post('/disciplina/store', [DisciplinaController::class, 'store'])->name('disciplina.store');
    Route::get('/disciplina/{id}/edit', [DisciplinaController::class, 'edit'])->name('disciplina.edit');
    Route::put('/disciplina/{disciplina}', [DisciplinaController::class, 'update'])->name('disciplina.update');
    Route::delete('/disciplina/{disciplina}', [DisciplinaController::class, 'destroy'])->name('disciplina.destroy');

    Route::get('/turma', [TurmaController::class, 'index'])->name('turma.index');
    Route::get('/turma/create', [TurmaController::class, 'create'])->name('turma.create');
    Route::post('/turma/store', [TurmaController::class, 'store'])->name('turma.store');
    Route::get('/turma/{turma}/edit', [TurmaController::class, 'edit'])->name('turma.edit');
    Route::put('/turma/{client}', [TurmaController::class, 'update'])->name('turma.update');
    Route::delete( '/turma/{turma}', [TurmaController::class, 'destroy'])->name('turma.destroy');

});
