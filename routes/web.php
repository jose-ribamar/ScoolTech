<?php

use App\Http\Controllers\AlunoController;
use App\Http\Controllers\DirecaoController;
use App\Http\Controllers\DisciplinaController;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\ProfileController;
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

    Route::get('/aluno', [AlunoController::class, 'index'])->name('aluno.index');
    Route::get('/aluno/create', [AlunoController::class, 'create'])->name('aluno.create');

    Route::get('/disciplina', [DisciplinaController::class, 'index'])->name('disciplina.index');
    Route::get('/disciplina/create', [DisciplinaController::class, 'create'])->name('disciplina.create');
});
