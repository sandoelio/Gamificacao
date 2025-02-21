@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="row">
    <!-- Menu -->
    <div class="col-md-3 mb-4">
        <div class="list-group">
            <a href="{{ route('questions.store') }}" class="list-group-item list-group-item-action">Inserir Perguntas</a>
            <a href="{{ route('report.index') }}" class="list-group-item list-group-item-action">Relatórios</a>
            <a href="{{ route('questions.cadastradas') }}" class="list-group-item list-group-item-action">Ver Perguntas Cadastradas</a>
            <a href="{{ route('logout') }}" class="list-group-item list-group-item-action text-danger">Sair</a>
        </div>
    </div>

    <div class="col-md-9">
        <div class="row">
            <!-- Gráfico de Ranking -->
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm">
                    <div class="card-header bg-secondary text-white">
                        <h4 class="mb-0">Ranking de Pontuação</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="rankingChart"></canvas>
                    </div>
                </div>
            </div>
        
            <!-- Gráfico de Estatísticas de Usuários -->
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm">
                    <div class="card-header bg-secondary text-white">
                        <h4 class="mb-0">Estatísticas de Usuários</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="userStatsChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        let rankingChart;
        let userStatsChart;

        // Função para criar o gráfico de Ranking
        function createRankingChart(labels, data) {
            const ctx = document.getElementById('rankingChart').getContext('2d');
            if (rankingChart) {
                rankingChart.destroy();
            }
            rankingChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Pontuação',
                        data: data,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        }

        // Função para criar o gráfico de Estatísticas de Usuários
        function createUserStatsChart(labels, data) {
            const ctx = document.getElementById('userStatsChart').getContext('2d');
            if (userStatsChart) {
                userStatsChart.destroy();
            }
            userStatsChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Novos Usuários',
                        data: data,
                        backgroundColor: 'rgba(153, 102, 255, 0.2)',
                        borderColor: 'rgba(153, 102, 255, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        }

        // Função para buscar e atualizar os dados do Ranking
        function fetchRankingData() {
            axios.get("{{ route('admin.ranking') }}")
                .then(response => {
                    const data = response.data;
                    createRankingChart(data.labels, data.points);
                })
                .catch(error => console.error("Erro ao carregar dados de ranking:", error));
        }

        // Função para buscar e atualizar os dados de Estatísticas de Usuários
        function fetchUserStats() {
            axios.get("{{ route('admin.user') }}")
                .then(response => {
                    const data = response.data;
                    createUserStatsChart(data.labels, data.counts);
                })
                .catch(error => console.error("Erro ao carregar estatísticas de usuários:", error));
        }

        // Chama as funções para carregar os gráficos inicialmente
        fetchRankingData();
        fetchUserStats();

        // Atualiza os gráficos a cada 10 segundos (opcional)
        setInterval(() => {
            fetchRankingData();
            fetchUserStats();
        }, 10000);
    });
</script>
