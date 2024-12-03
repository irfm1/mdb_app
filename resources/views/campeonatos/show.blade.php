@extends('adminlte::page')

@section('title', 'Detalhes do Campeonato')

@section('content_header')
    <h1>{{ $campeonato['nome_popular'] }} - Temporada {{ $campeonato['edicao_atual']['temporada'] }}</h1>
@stop

@section('content')
    <div class="container">
        <!-- Informações do Campeonato -->
        <div class="card">
            <div class="card-header">
                <h3>Informações Gerais</h3>
            </div>
            <div class="card-body">
                <p><strong>Nome:</strong> {{ $campeonato['nome'] }}</p>
                <p><strong>Temporada:</strong> {{ $campeonato['edicao_atual']['nome_popular'] }}</p>
                <p><strong>Fase Atual:</strong> {{ $campeonato['fase_atual']['nome'] }}</p>
                <p><strong>Status:</strong> {{ ucfirst($campeonato['status']) }}</p>
                <p><strong>Tipo:</strong> {{ $campeonato['tipo'] }}</p>
                <p><strong>Região:</strong> {{ ucfirst($campeonato['regiao']) }}</p>
                <p><strong>Table:</strong> <a href="{{ route('campeonatos.tabela', $campeonato['campeonato_id']) }}">Ver Tabela</a></p>
                <img src="{{ $campeonato['logo'] }}" alt="Logo do Campeonato" style="max-width: 200px;">

            </div>
        </div>

        <!-- Rodada Atual -->
        <div class="card mt-4">
            <div class="card-header">
                <h3>Rodada Atual</h3>
            </div>
            <div class="card-body">
                <p><strong>Nome:</strong> {{ $campeonato['rodada_atual']['nome'] }}</p>
                <p><strong>Status:</strong> {{ ucfirst($campeonato['rodada_atual']['status']) }}</p>
            </div>
        </div>

        <!-- Fases do Campeonato -->
        <div class="card mt-4">
            <div class="card-header">
                <h3>Fases do Campeonato</h3>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Temporada</th>
                        <th>Status</th>
                        <th>Tipo</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($campeonato['fases'] as $fase)
                        <tr>
                            <td>{{ $fase['nome'] }}</td>
                            <td>{{ $fase['edicao']['temporada'] }}</td>
                            <td>{{ ucfirst($fase['status']) }}</td>
                            <td>{{ ucfirst($fase['tipo']) }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop
