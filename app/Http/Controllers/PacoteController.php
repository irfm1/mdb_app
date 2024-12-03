<?php

namespace App\Http\Controllers;

use App\Models\Pacote;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PacoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Pacote $pacote)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pacote $pacote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pacote $pacote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pacote $pacote)
    {
        //
    }

    public function contratar(Request $request, $pacoteId)
    {
        $request->validate([
            'duracao' => 'required|in:1,3,6,12',
        ]);

        $pacote = Pacote::findOrFail($pacoteId);
        $usuario = auth()->user(); // Usuário autenticado

        $dataInicio = Carbon::now();
        $dataFim = $dataInicio->copy()->addMonths($request->duracao);

        $usuario->pacotes()->attach($pacoteId, [
            'data_inicio' => $dataInicio,
            'data_fim' => $dataFim,
        ]);

        return redirect()->route('pacotes.index')->with('message', 'Pacote contratado com sucesso!');
    }

    public function meusPacotes()
    {
        $usuario = auth()->user();
        $pacotes = $usuario->pacotes;

        return view('pacotes.meus', compact('pacotes'));
    }
}
