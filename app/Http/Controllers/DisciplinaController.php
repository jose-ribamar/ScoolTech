<?php

namespace App\Http\Controllers;

use App\Models\Disciplina;
use Illuminate\Http\Request;

class DisciplinaController extends Controller
{
    public function index()
    {
        $disciplina = Disciplina::paginate(15);
        return view('disciplina.index', compact('disciplina'));
    }

    public function create()
{
    $disciplina = new Disciplina(); // Inicializa uma nova instância
    return view('disciplina.create', compact('disciplina'));
}


    public function store(Request $request)
{
    // Validação dos dados
    $request->validate([
        'name' => 'required|string|max:255',
        'date_creation' => 'required|date',
    ]);

    // Criação da nova disciplina
    Disciplina::create([
        'name' => $request->input('name'),
        'date_creation' => $request->input('date_creation'),
    ]);

    // Redirecionamento após a criação com mensagem de sucesso
    return redirect()->route('disciplina.index')->with('success', 'Disciplina criada com sucesso!');
}


    public function show(Disciplina $disciplina)
    {
        //
    }

    public function edit($id)
{
    $disciplina = Disciplina::findOrFail($id);
    return view('disciplina.edit', compact('disciplina'));
}


public function update(Request $request, Disciplina $disciplina)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'date_creation' => 'required|date',
    ]);

    $disciplina->update($request->only('name', 'date_creation'));

    return redirect()->route('disciplina.index')->with('success', 'Atualizada com sucesso.');
}


    public function destroy(Disciplina $disciplina)
{
    try {
        // Tenta excluir a disciplina
        $disciplina->delete();
        return redirect()->route('disciplina.index')->with('success', 'Disciplina deletada com sucesso!');
    } catch (\Illuminate\Database\QueryException $e) {
        // Captura erro de chave estrangeira e exibe uma mensagem personalizada
        if($e->getCode() == "23000") {
            return redirect()->route('disciplina.index')->withErrors('Não é possível apagar a disciplina pois ela está vinculada a uma turma.');
        }
        
        // Caso seja outra exceção, pode tratá-la ou simplesmente retornar uma mensagem genérica
        return redirect()->route('disciplina.index')->withErrors('Ocorreu um erro ao tentar deletar a disciplina.');
    }
}


}
