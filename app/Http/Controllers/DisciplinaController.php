<?php

namespace App\Http\Controllers;

use App\Models\Disciplina;
use Illuminate\Http\Request;

class DisciplinaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $disciplina = Disciplina::paginate(15);
        return view('disciplina.index', compact('disciplina'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('disciplina.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    // store method
    public function store(Request $request)
{
    // Validação dos dados do formulário
    $request->validate([
        'name' => 'required|string|max:255',
        'date_creation' => 'required|date',
    ]);

    // Criação de um novo registro
    Disciplina::create([
        'name' => $request->input('name'),
        'date_creation' => $request->input('date_creation'),
    ]);

    // Redirecionar para a lista de disciplinas com uma mensagem de sucesso
    return redirect()->route('disciplina.index')->with('success', 'Disciplina criada com sucesso!');
}




    /**
     * Display the specified resource.
     */
    public function show(Disciplina $disciplina)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Disciplina $disciplina)
{
    return view('disciplina.edit', compact('disciplina'));
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Disciplina $disciplina)
{
    // Validação dos dados recebidos
    $request->validate([
        'name' => 'required|string|max:255',
        'date_creation' => 'required|date',
    ]);

    // Atualiza a disciplina com os novos dados
    $disciplina->update([
        'name' => $request->name,
        'date_creation' => $request->date_creation,
    ]);

    // Redireciona para a lista de disciplinas com uma mensagem de sucesso
    return redirect()->route('disciplina.index')->with('success', 'Disciplina atualizada com sucesso!');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Disciplina $disciplina)
{
    // Deleta a disciplina
    $disciplina->delete();

    // Redireciona para a lista de disciplinas com uma mensagem de sucesso
    return redirect()->route('disciplina.index')->with('success', 'Disciplina deletada com sucesso!');
}

}
