@extends('layouts.dashboard')
@section('title', 'Statistics')
@section('content')
    <x-dashboard.about icon="chart-bar" iconClass="text-blue-400">
        Statistics of completed tasks
    </x-dashboard.about>
    <div class="container mx-auto mt-8">

        <div class="flex mb-4">
            <form action="{{ route('statistics') }}" method="GET">
                <label for="year" class="mr-2">Select the year:</label>
                <input type="number" name="year" id="year" min="0" value="{{ $year }}"
                    class="border p-2 rounded">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded ml-2">Search</button>
            </form>
        </div>

        <!-- Contenedor del gráfico con ancho completo -->
        <div class="w-full">
            <canvas id="tasksChart"></canvas> <!-- Canvas que ocupa el 100% -->
        </div>
    </div>

    <script>
        const ctx = document.getElementById('tasksChart').getContext('2d');
        const tasksChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September',
                    'October', 'November', 'December'
                ],
                datasets: [{
                    label: 'Completed Tasks',
                    data: @json($monthlyData),
                    backgroundColor: 'rgb(75, 192, 192)', // Color sólido sin transparencia
                    borderColor: 'rgb(75, 192, 192)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return Number.isInteger(value) ? value : null; // Muestra solo valores enteros
                            },
                            stepSize: 1 // Fuerza el incremento en pasos de 1
                        },
                        grid: {
                            display: true, // Muestra las líneas horizontales
                            drawBorder: false // Oculta el borde alrededor del gráfico en el eje Y
                        }
                    },
                    x: {
                        grid: {
                            display: false // Oculta las líneas de la cuadrícula en el eje X (verticales)
                        }
                    }
                }
            }
        });
    </script>
@endsection
