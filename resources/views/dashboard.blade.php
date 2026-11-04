<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Panel de Impacto Social ') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Alertas de Usabilidad (Requisito de la rúbrica) -->
            @if (session('status'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">{{ session('status') }}</span>
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <!-- Tarjeta de Métrica 1 -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-l-4 border-blue-500">
                    <div class="text-gray-500 text-sm">Casos Analizados por IA</div>
                    <div class="text-3xl font-bold text-gray-800">142</div>
                </div>
                <!-- Tarjeta de Métrica 2 -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-l-4 border-green-500">
                    <div class="text-gray-500 text-sm">Nivel de Precisión Ética</div>
                    <div class="text-3xl font-bold text-gray-800">98.5%</div>
                </div>
                <!-- Tarjeta de Métrica 3 -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-l-4 border-red-500">
                    <div class="text-gray-500 text-sm">Población Impactada (Aprox)</div>
                    <div class="text-3xl font-bold text-gray-800">1,250</div>
                </div>
            </div>

            <!-- Contenedor de la Gráfica -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Métricas de Resolución Social (Ejemplo)</h3>
                <div class="relative h-72 w-full">
                    <canvas id="impactChart"></canvas>
                </div>
            </div>

        </div>
    </div>

    <!-- Carga de Chart.js vía CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const ctx = document.getElementById('impactChart').getContext('2d');
            
            // Mañana solo tendrán que inyectar las variables de PHP en 'data'
            const chartData = [12, 19, 3, 5, 2, 3]; 
            const chartLabels = ['Vivienda', 'Educación', 'Salud', 'Infraestructura', 'Empleo', 'Otros'];

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: chartLabels,
                    datasets: [{
                        label: 'Vulnerabilidades Detectadas',
                        data: chartData,
                        backgroundColor: 'rgba(54, 162, 235, 0.5)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1,
                        borderRadius: 4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
</x-app-layout>