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

        // Obter disciplinas já selecionadas para a turma
        $disciplinasSelecionadas = Lotacao::where('id', $turma->id)->pluck('disciplina_id')->toArray();

        // Obter disciplinas que não foram selecionadas
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

        return redirect()->route('lotacao.index')->with('success', 'Lotação criada com sucesso.');
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
    public function edit($id)
{
    $lotacao = Lotacao::findOrFail($id);
    $docentes = Docente::all();

    // Obter a lista de disciplinas disponíveis para seleção
    $disciplinas = Disciplina::all();

    // Adicionar lógica para excluir disciplinas já alocadas, exceto a disciplina atual
    $disciplinasDisponiveis = $disciplinas->filter(function ($disciplina) use ($lotacao) {
        return $disciplina->id === $lotacao->disciplina_id || !Lotacao::where('disciplina_id', $disciplina->id)->exists();
    });

    return view('lotacao.edit', compact('lotacao', 'docentes', 'disciplinasDisponiveis'));
}



public function update(Request $request, $id)
{
    $request->validate([
        'turma_id' => 'required|integer|exists:turmas,id',
        'docente_id' => 'required|integer|exists:docentes,id',
        'disciplina_id' => 'required|integer|exists:disciplinas,id',
    ]);

    $lotacao = Lotacao::findOrFail($id);
    $lotacao->update([
        'turma_id' => $request->turma_id,
        'docente_id' => $request->docente_id,
        'disciplina_id' => $request->disciplina_id,
    ]);

    return redirect()->route('lotacao.index')->with('success', 'Lotação atualizada com sucesso!');
}


    /**
     * Remove o recurso especificado do armazenamento.
     */
    public function destroy(Lotacao $lotacao)
    {
        // Implementar conforme necessidade
    }
}
