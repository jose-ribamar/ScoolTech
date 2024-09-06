<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Matricula;
use App\Models\Turma;
use Illuminate\Http\Request;

class MatriculaController extends Controller
{
    public function index(Request $request)
    {
        $turmaId = $request->input('turma_id');
        $matriculaQuery = Matricula::with(['turma', 'aluno']);

        if ($turmaId) {
            $matriculaQuery->where('turma_id', $turmaId);
        }

        $matricula = $matriculaQuery->paginate(15);
        $turmas = Turma::all();
        $alunos = Aluno::all();

        return view('matricula.index', compact('matricula', 'turmas', 'alunos'));
    }

   
    public function create($turmaId)
    {
        $turma = Turma::findOrFail($turmaId);
        
        // Excluir alunos já matriculados em qualquer turma
        $alunos = Aluno::whereDoesntHave('matriculas')->get();

        return view('matricula.create', compact('turma', 'alunos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'date_creation' => 'required|date',
            'turma_id' => 'required|integer|exists:turmas,id',
            'aluno_id' => 'required|integer|exists:alunos,id',
        ]);

        // Verificar se o aluno já está matriculado em qualquer turma
        $alunoId = $request->aluno_id;
        $existingMatricula = Matricula::where('aluno_id', $alunoId)->first();

        if ($existingMatricula) {
            return back()->with('error', 'O aluno já está matriculado em outra turma.');
        }

        // Criar a nova matrícula
        Matricula::create([
            'date_creation' => $request->date_creation,
            'turma_id' => $request->turma_id,
            'aluno_id' => $alunoId,
        ]);

        return redirect()->route('turma.index')->with('success', 'Matrícula criada com sucesso.');
    }




    /**
     * Display the specified resource.
     */
    public function show(Matricula $matricula)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Matricula $matricula)
    {
        
        $turmas = Turma::all();
        $alunos = Aluno::all();

        return view('matricula.edit', compact('matricula', 'alunos', 'turmas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Matricula $matricula)
{
    $data = $request->only(['date_creation']);

    if (!$matricula->updatematricula($data)) {
        return redirect()->back()->withErrors('Erro ao atualizar.');
    }

    return redirect()->route('turma.index')->with('success', 'Atualizada com sucesso.');
}


    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Matricula $matricula)
    {
        //
    }
}
