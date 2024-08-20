@php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Direcao;

class PerfilController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        $direcao = $user->direcao; // Supondo que você tenha uma relação definida
        return view('perfil.edit', compact('user', 'direcao'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'cpf' => 'required|string|max:255',
            'date_nascimento' => 'required|date',
        ]);

        $user = Auth::user();
        $direcao = $user->direcao;
        
        $direcao->update([
            'cpf' => $request->input('cpf'),
            'date_nascimento' => $request->input('date_nascimento'),
        ]);

        return redirect()->route('perfil.edit')->with('success', 'Perfil atualizado com sucesso.');
    }
}
