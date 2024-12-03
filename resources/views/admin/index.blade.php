@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="container-fluid">
        <!-- Cards de Resumo -->
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- Card Faturamento -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>R$ {{ number_format($totalRevenue, 2, ',', '.') }}</h3>
                        <p>Faturamento Total</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-dollar-sign"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- Card Acessos -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $totalAccess }}</h3>
                        <p>Acessos Totais</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- Card Conversão -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $conversionRate }}%</h3>
                        <p>Taxa de Conversão</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-percentage"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- Card Outros -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{ $otherMetric }}</h3>
                        <p>Outra Métrica</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-chart-pie"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Gráficos -->
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Faturamento Mensal</h3>
                    </div>
                    <div class="card-body">
                        <canvas id="revenueChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Acessos Mensais</h3>
                    </div>
                    <div class="card-body">
                        <canvas id="accessChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Dados para o gráfico de faturamento
        const revenueData = @json($revenueData);
        const accessData = @json($accessData);

        // Gráfico de Faturamento Mensal
        const revenueCtx = document.getElementById('revenueChart').getContext('2d');
        new Chart(revenueCtx, {
            type: 'line',
            data: {
                labels: revenueData.labels,
                datasets: [{
                    label: 'Faturamento (R$)',
                    data: revenueData.values,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                }]
            }
        });

        // Gráfico de Acessos Mensais
        const accessCtx = document.getElementById('accessChart').getContext('2d');
        new Chart(accessCtx, {
            type: 'bar',
            data: {
                labels: accessData.labels,
                datasets: [{
                    label: 'Acessos',
                    data: accessData.values,
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                }]
            }
        });
    </script>
@stop
