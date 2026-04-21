@extends('layouts.admin')

@section('content')
    <div class="container py-4">
        <h2 class="mb-4">
            <i class="fa-solid fa-chart-column me-2"></i>
            Statistiche: {{ $apartment->title }}
        </h2>

        <!-- Card numero totale -->
        <div class="row mb-4">
            <div class="col-md-3">
                <div class="card text-center shadow-sm p-4">
                    <i class="fa-solid fa-eye fa-2x mb-2" style="color: #01696f;"></i>
                    <h5 class="text-muted">Visualizzazioni totali</h5>
                    <h1 class="fw-bold" style="color: #01696f;">{{ $apartment->views }}</h1>
                </div>
            </div>
        </div>

        <!-- Grafico -->
        <div class="card shadow-sm">
            <div class="card-body">
                <h5 class="card-title">Andamento visualizzazioni</h5>
                <canvas id="viewsChart" height="80"></canvas>
            </div>
        </div>

        <a href="{{ route('admin.apartments.index') }}" class="btn btn-danger mt-4">
            ← Torna agli appartamenti
        </a>
    </div>

    <!-- Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        new Chart(document.getElementById('viewsChart'), {
            type: 'bar',
            data: {
                labels: ['{{ $apartment->title }}'],
                datasets: [{
                    label: 'Visualizzazioni',
                    data: [{{ $apartment->views }}],
                    backgroundColor: 'rgba(1, 105, 111, 0.7)',
                    borderColor: 'rgba(1, 105, 111, 1)',
                    borderWidth: 1,
                    borderRadius: 8,
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    },
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1
                        }
                    }
                }
            }
        });
    </script>
@endsection
