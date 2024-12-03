<?php

namespace App\Http\Controllers;

use App\Services\FutebolApiService;

class CampeonatosController extends Controller
{
    protected $apiService;

    public function __construct(FutebolApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    public function index()
    {
        $campeonatos = $this->apiService->get('campeonatos');
        return view('campeonatos.index', compact('campeonatos'));
    }

    public function show($id)
    {
        $campeonato = $this->apiService->get("campeonatos/{$id}");
        $tabela = $this->apiService->get("campeonatos/{$id}/tabela");
        $artilharia = $this->apiService->get("campeonatos/{$id}/artilharia");

        return view('campeonatos.show', compact('campeonato', 'tabela', 'artilharia'));
    }

    public function tabela($id)
    {

        $campeonato = $this->apiService->get("campeonatos/{$id}");
        $tabela = $this->apiService->get("campeonatos/{$id}/tabela");


        return view('campeonatos.tabela', [
            'campeonatoNome' => $campeonato['nome_popular'] ?? 'Desconhecido',
            'tabela' => $tabela,
        ]);
    }


}
