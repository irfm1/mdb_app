@extends('adminlte::page')

@section('title', 'Campeonatos')

@section('content_header')
    <h1>Campeonatos Disponíveis</h1>
@stop

@section('content')
    <div class="container">
        <div class="row">
            @foreach($campeonatos as $campeonato)
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h3>{{ $campeonato['nome_popular'] }}</h3>
                        </div>
                        <div class="card-body">
                            <p><strong>Nome Completo:</strong> {{ $campeonato['nome'] }}</p>
                            <p><strong>Temporada Atual:</strong> {{ $campeonato['edicao_atual']['temporada'] }}</p>
                            <p><strong>Status:</strong> {{ ucfirst($campeonato['status']) }}</p>
                            <p><strong>Tipo:</strong> {{ $campeonato['tipo'] }}</p>
                            <img src="{{ $campeonato['logo'] }}" alt="Logo do Campeonato" style="max-width: 150px;">
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('campeonatos.show', $campeonato['campeonato_id']) }}" class="btn btn-primary">
                                Ver Detalhes
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@stop
