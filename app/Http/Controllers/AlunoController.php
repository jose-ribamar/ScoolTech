<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Carregar os dados da direção e a relação com o usuário
        $aluno = Aluno::with('user')->paginate(15);
    
        return view('aluno.index', compact('aluno'));
    }
    
    
    
        public function create()
        {
            return view('aluno.create');
        }
    
        
        public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'cpf' => 'required|string|max:14|unique:alunos',
            'date_nascimento' => 'required|date',
        ]);
    
        $user = \App\Models\User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => \Illuminate\Support\Facades\Hash::make($request->password),
        ]);
    
        Aluno::create([
            'cpf' => $request->cpf,
            'date_nascimento' => $request->date_nascimento,
            'user_id' => $user->id,
        ]);
    
        return redirect()->route('aluno.index')->with('success', 'Usuário e dados de aluno criados com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Aluno $aluno)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Aluno $aluno)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Aluno $aluno)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Aluno $aluno)
    {
        //
    }
}
