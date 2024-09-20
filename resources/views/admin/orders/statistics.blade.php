@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Statistiche Ordini</h1>

    <!-- Grafico Numero di Ordini per Mesi/Anni -->
    <div class="mb-5">
        <h3>Numero di Ordini per Mese/Anno</h3>
        <canvas id="orderCountChart"></canvas>
    </div>

    <!-- Grafico Ammontare delle Vendite per Mesi/Anni -->
    <div>
        <h3>Ammontare delle Vendite per Mese/Anno (€)</h3>
        <canvas id="salesChart"></canvas>
    </div>
</div>

<!-- Aggiungi Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // Dati passati dal controller
    const labels = @json($labels);
    const orderCounts = @json($orderCounts);
    const totalSales = @json($totalSales);

    // Grafico Numero di Ordini
    const orderCountCtx = document.getElementById('orderCountChart').getContext('2d');
    const orderCountChart = new Chart(orderCountCtx, {
        type: 'bar',
        data: {
            labels: labels, // Etichette mesi/anni
            datasets: [{
                label: 'Numero di Ordini',
                data: orderCounts,
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
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

    // Grafico Ammontare delle Vendite
    const salesCtx = document.getElementById('salesChart').getContext('2d');
    const salesChart = new Chart(salesCtx, {
        type: 'line',
        data: {
            labels: labels, // Etichette mesi/anni
            datasets: [{
                label: 'Ammontare delle Vendite (€)',
                data: totalSales,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1,
                fill: true // Riempi l'area sotto la linea
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
</script>
@endsection
