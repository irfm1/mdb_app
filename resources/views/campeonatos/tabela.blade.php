@extends('adminlte::page')

@section('title', 'Tabela do Campeonato')

@section('content_header')
    <h1>Tabela do Campeonato {{$campeonatoNome}}</h1>
@stop

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Classificação</h3>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Time</th>
                        <th>Pontos</th>
                        <th>Jogos</th>
                        <th>Vitórias</th>
                        <th>Empates</th>
                        <th>Derrotas</th>
                        <th>Gols Pró</th>
                        <th>Gols Contra</th>
                        <th>Saldo</th>
                        <th>Aproveitamento</th>
                        <th>Últimos Jogos</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tabela as $time)
                        <tr>
                            <td>{{ $time['posicao'] }}</td>
                            <td>
                                <img src="{{ $time['time']['escudo'] }}" alt="{{ $time['time']['nome_popular'] }}" style="width: 30px; margin-right: 10px;">
                                {{ $time['time']['nome_popular'] }}
                            </td>
                            <td>{{ $time['pontos'] }}</td>
                            <td>{{ $time['jogos'] }}</td>
                            <td>{{ $time['vitorias'] }}</td>
                            <td>{{ $time['empates'] }}</td>
                            <td>{{ $time['derrotas'] }}</td>
                            <td>{{ $time['gols_pro'] }}</td>
                            <td>{{ $time['gols_contra'] }}</td>
                            <td>{{ $time['saldo_gols'] }}</td>
                            <td>{{ $time['aproveitamento'] }}%</td>
                            <td>
                                @foreach($time['ultimos_jogos'] as $jogo)
                                    @php
                                        $badgeClass = $jogo === 'v' ? 'bg-success' : ($jogo === 'e' ? 'bg-warning' : 'bg-danger');
                                    @endphp
                                    <span class="badge {{ $badgeClass }}">{{ strtoupper($jogo) }}</span>
                                @endforeach
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop
