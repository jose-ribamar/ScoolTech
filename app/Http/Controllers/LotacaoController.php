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
     * Display a listing of the resource.
     */
    public function index()
    {
        // Carregar os dados da lotação com as relações necessárias
        $lotacao = Lotacao::with(['turma', 'docente', 'disciplina'])->paginate(15);
    
        return view('lotacao.index', compact('lotacao'));
    }

    public function create($turma_id)
{
    $docentes = Docente::all();
    $disciplinas = Disciplina::all();
    $turma = Turma::findOrFail($turma_id);

    

    return view('lotacao.create', compact('docentes', 'disciplinas', 'turma'));
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
     * Display the specified resource.
     */
    public function show(Lotacao $lotacao)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lotacao $lotacao)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lotacao $lotacao)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lotacao $lotacao)
    {
        //
    }
}
