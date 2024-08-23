<?php

use App\Http\Controllers\AlunoController;
use App\Http\Controllers\DirecaoController;
use App\Http\Controllers\DisciplinaController;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\LotacaoController;
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

    Route::get('/docente', [DocenteController::class, 'index'])->name('docente.index');
    Route::get('/docente/create', [DocenteController::class, 'create'])->name('docente.create');
    Route::post('/docente', [DocenteController::class, 'store'])->name('docente.store');

    Route::get('/lotacao', [LotacaoController::class, 'index'])->name('lotacao.index');
    Route::get('/lotacao/create/{turma_id}', [LotacaoController::class, 'create'])->name('lotacao.create');
    Route::post('/lotacao', [LotacaoController::class, 'store'])->name('lotacao.store');

    Route::get('/aluno', [AlunoController::class, 'index'])->name('aluno.index');
    Route::get('/aluno/create', [AlunoController::class, 'create'])->name('aluno.create');
    Route::post('/aluno', [AlunoController::class, 'store'])->name('aluno.store');

    Route::get('/disciplina', [DisciplinaController::class, 'index'])->name('disciplina.index');
    Route::get('/disciplina/create', [DisciplinaController::class, 'create'])->name('disciplina.create');
    Route::post('/disciplina/store', [DisciplinaController::class, 'store'])->name('disciplina.store');
    Route::get('/disciplina/{client}/edit', [DisciplinaController::class, 'edit'])->name('disciplina.edit');
    Route::put('/disciplina/{client}', [DisciplinaController::class, 'update'])->name('disciplina.update');
    Route::delete('/disciplina/{client}', [DisciplinaController::class, 'destroy'])->name('disciplina.destroy');

    Route::get('/turma', [TurmaController::class, 'index'])->name('turma.index');
    Route::get('/turma/create', [TurmaController::class, 'create'])->name('turma.create');
    Route::post('/turma/store', [TurmaController::class, 'store'])->name('turma.store');
    // Route::get('/turma/{client}/edit', [TurmaController::class, 'edit'])->name('turma.edit');
    // Route::put('/turma/{client}', [TurmaController::class, 'update'])->name('turma.update');
    // Route::delete('/turma/{client}', [TurmaController::class, 'destroy'])->name('turma.destroy');

});
