@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: rgb(51, 49, 49);
        color: white;
    }
    .card {
        background-color: rgba(51, 51, 51, 0.5);
        border: none;
    }
    .card-title {
        color: rgb(255, 165, 0);
    }
    .table {
        color: white;
    }
    .table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(255, 255, 255, 0.05);
    }
    .btn-custom {
        background-color: rgb(255, 165, 0);
        color: rgb(51, 49, 49);
    }
    .btn-custom:hover {
        background-color: darkorange;
        color: white;
    }
</style>

<div class="container py-5">
    <h1 class="mb-4 text-center" >Statistiche Ordini</h1>
    <a href="{{ route('admin.orders.index') }}" class="btn btn-outline-orange mb-4">Torna agli Ordini</a>
    
    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card shadow">
                <div class="card-body">
                    <h3 class="card-title">Distribuzione Ordini per Mese/Anno</h3>
                    <canvas id="orderPieChart"></canvas>
                </div>
            </div>
        </div>
        
        <div class="col-md-6 mb-4">
            <div class="card shadow">
                <div class="card-body">
                    <h3 class="card-title">Ammontare delle Vendite per Mese/Anno (€)</h3>
                    <canvas id="salesChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-body">
                    <h3 class="card-title">Riepilogo Dati</h3>
                    <div class="table-responsive">
                        <table class="table table-dark table-striped table-hover align-middle">
                            <thead>
                                <tr>
                                    <th>Mese/Anno</th>
                                    <th>Numero Ordini</th>
                                    <th>Totale Vendite (€)</th>
                                </tr>
                            </thead>
                            <tbody id="dataSummary"></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // Dati passati dal controller
    const labels = @json($labels);
    const orderCounts = @json($orderCounts);
    const totalSales = @json($totalSales);

    // Configurazione colori
    const primaryColor = 'rgb(255, 165, 0)';
    const backgroundColor = 'rgb(51, 49, 49)';
    const textColor = 'white';

    // Funzione per generare sfumature di arancione
    function generateOrangeShades(num) {
        return Array.from({ length: num }, (_, i) => 
            `hsl(${39 - i * 5}, 100%, ${50 + i * 2}%)`
        );
    }

    // Grafico a Torta per Numero di Ordini
    new Chart(document.getElementById('orderPieChart').getContext('2d'), {
        type: 'pie',
        data: {
            labels: labels,
            datasets: [{
                data: orderCounts,
                backgroundColor: generateOrangeShades(labels.length),
                borderColor: backgroundColor,
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'right',
                    labels: { 
                        color: textColor,
                        font: {
                            size: 10
                        }
                    }
                },
                title: {
                    display: true,
                    text: 'Distribuzione Ordini',
                    color: primaryColor
                }
            }
        }
    });

    // Grafico Ammontare delle Vendite
    new Chart(document.getElementById('salesChart').getContext('2d'), {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Ammontare delle Vendite (€)',
                data: totalSales,
                borderColor: primaryColor,
                backgroundColor: 'rgba(255, 165, 0, 0.1)',
                tension: 0.1,
                fill: true
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                    labels: { color: textColor }
                },
                title: {
                    display: true,
                    text: 'Andamento Vendite',
                    color: primaryColor
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        color: textColor,
                        callback: function(value, index, values) {
                            return '€' + value.toLocaleString();
                        }
                    }
                },
                x: {
                    ticks: { color: textColor }
                }
            }
        }
    });

    // Popolamento tabella riepilogativa
    const summaryBody = document.getElementById('dataSummary');
    labels.forEach((label, index) => {
        const row = summaryBody.insertRow();
        row.insertCell(0).textContent = label;
        row.insertCell(1).textContent = orderCounts[index];
        row.insertCell(2).textContent = '€' + totalSales[index].toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2});
    });
</script>
@endsection