<?php

namespace App\Http\Controllers;

use App\Models\CasaDeAposta;
use Illuminate\Http\Request;

class CasaDeApostaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $casas = CasaDeAposta::paginate(10);

        return view('admin.casas.index')->with('casas', $casas);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.casas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string',
            'logo_url' => 'nullable|string',
            'descricao' => 'nullable|string',
            'avaliacao' => 'required|numeric',
        ]);

        CasaDeAposta::create($validated);

        return redirect()->route('admin.casas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(CasaDeAposta $casa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CasaDeAposta $casa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CasaDeAposta $casa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CasaDeAposta $casa)
    {
        //
    }
}
