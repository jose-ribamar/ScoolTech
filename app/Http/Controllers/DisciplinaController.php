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
        return view('disciplina.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'date_creation' => 'required|date',
        ]);

        Disciplina::create([
            'name' => $request->input('name'),
            'date_creation' => $request->input('date_creation'),
        ]);

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
        $data = $request->only([
            'name',
            'date_creation',
        ]);

        $update = $disciplina->updateCnd($data);
        if (!$update) {
            return redirect()->back()->withErrors('Erro ao atualizar.');
        }

        return redirect()->route('disciplina.index')->with('success', 'Atualizada com sucesso.');
    }

    // public function destroy(Disciplina $disciplina)
    // {
    //     $disciplina->delete();
    //     return redirect()->route('disciplina.index')->with('success', 'Disciplina deletada com sucesso!');
    // }
}
