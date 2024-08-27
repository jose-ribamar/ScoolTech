<?php

namespace App\Http\Controllers;

use App\Models\Turma;
use Illuminate\Http\Request;

class TurmaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $turma = Turma::paginate(15);
        return view('turma.index', compact('turma'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('turma.create');
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
        'ano' => 'required|string|max:10',
        'date_creation' => 'required|date',
    ]);

    // Criação de um novo registro
    Turma::create([
        'name' => $request->input('name'),
        'ano' => $request->input('ano'),
        'date_creation' => $request->input('date_creation'),
    ]);

    
    return redirect()->route('turma.index')->with('success', 'Turma criada com sucesso!');
}

    /**
     * Display the specified resource.
     */
    public function show(Turma $turma)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
{
    $turma = Turma::findOrFail($id);
    return view('turma.edit', compact('turma'));
}

public function update(Request $request, $id)
{
    $turma = Turma::findOrFail($id);
    $turma->update($request->all());
    return redirect()->route('turma.index')->with('success', 'Turma updated successfully');
}

    public function destroy(Turma $turma)
    {
        //
    }
}
