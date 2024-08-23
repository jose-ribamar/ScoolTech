<?php

namespace App\Http\Controllers;

use App\Models\Docente;
use Illuminate\Http\Request;

class DocenteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Carregar os dados da direção e a relação com o usuário
        $docente = Docente::with('user')->paginate(15);
    
        return view('docente.index', compact('docente'));
    }
    
    
    
        public function create()
        {
            return view('docente.create');
        }
    
        
        public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'cpf' => 'required|string|max:14|unique:docentes',
            'date_nascimento' => 'required|date',
        ]);
    
        $user = \App\Models\User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => \Illuminate\Support\Facades\Hash::make($request->password),
        ]);
    
        Docente::create([
            'cpf' => $request->cpf,
            'date_nascimento' => $request->date_nascimento,
            'user_id' => $user->id,
        ]);
    
        return redirect()->route('docente.index')->with('success', 'Usuário e dados de direção criados com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Docente $docente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Docente $docente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Docente $docente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Docente $docente)
    {
        //
    }
}
