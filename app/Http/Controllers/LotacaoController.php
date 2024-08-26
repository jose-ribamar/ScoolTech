<?php

namespace App\Http\Controllers;

use App\Models\Lotacao;
use App\Models\Turma;
use App\Models\Docente;
use App\Models\Disciplina;
use Illuminate\Http\Request;

class LotacaoController extends Controller
{
    /**
     * Exibe uma listagem do recurso.
     */
    public function index(Request $request)
{
    
    $turmaId = $request->input('turma_id');

    $lotacaoQuery = Lotacao::with(['turma', 'docente', 'disciplina']);

    if ($turmaId) {
        $lotacaoQuery->where('turma_id', $turmaId);
    }

    $lotacao = $lotacaoQuery->paginate(15);
    
 
    $turmas = Turma::all();
    $docentes = Docente::all();


    return view('lotacao.index', compact('lotacao', 'turmas', 'docentes'));
}


public function create($turmaId)
{
    $turma = Turma::findOrFail($turmaId);
    $docentes = Docente::all();

    $disciplinasSelecionadas = Lotacao::where('turma_id', $turma->id)->pluck('disciplina_id')->toArray();

    $disciplinas = Disciplina::whereNotIn('id', $disciplinasSelecionadas)->get();

    return view('lotacao.create', compact('turma', 'docentes', 'disciplinas'));
}


    public function store(Request $request)
    {
        $request->validate([
            'turma_id' => 'required|integer|exists:turmas,id',
            'docente_id' => 'required|integer|exists:docentes,id',
            'disciplina_id' => 'required|integer|exists:disciplinas,id',
        ]);

        

        Lotacao::create([
            'turma_id' => $request->turma_id,
            'docente_id' => $request->docente_id,
            'disciplina_id' => $request->disciplina_id,
        ]);

        return redirect()->route('turma.index')->with('success', 'Lotação criada com sucesso.');
    }

    /**
     * Exibe o recurso especificado.
     */
    public function show(Lotacao $lotacao)
    {
        // Implementar conforme necessidade
    }

    /**
     * Mostra o formulário para edição do recurso especificado.
     */
    public function edit(Lotacao $lotacao)
    {
        // Implementar conforme necessidade
    }

    /**
     * Atualiza o recurso especificado no armazenamento.
     */
    public function update(Request $request, Lotacao $lotacao)
    {
        // Implementar conforme necessidade
    }

    /**
     * Remove o recurso especificado do armazenamento.
     */
    public function destroy(Lotacao $lotacao)
    {
        // Implementar conforme necessidade
    }
}
