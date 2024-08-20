<?php

namespace App\Http\Controllers;

use App\Models\Direcao;
use Illuminate\Http\Request;

class DirecaoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    // Carregar os dados da direção e a relação com o usuário
    $direcao = Direcao::with('user')->paginate(15);

    return view('direcao.index', compact('direcao'));
}



    public function create()
    {
        return view('direcao.index');
    }

    
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
        'cpf' => 'required|string|max:14|unique:direcao',
        'date_nascimento' => 'required|date',
    ]);

    $user = \App\Models\User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => \Illuminate\Support\Facades\Hash::make($request->password),
    ]);

    Direcao::create([
        'cpf' => $request->cpf,
        'date_nascimento' => $request->date_nascimento,
        'user_id' => $user->id,
    ]);

    return redirect()->route('direcao.index')->with('success', 'Usuário e dados de direção criados com sucesso.');
}


    /**
     * Display the specified resource.
     */
    public function show(Direcao $direcao)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Direcao $direcao)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Direcao $direcao)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Direcao $direcao)
    {
        //
    }
}
