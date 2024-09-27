@extends('layouts.app')
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
@section('content')
    <div class="bg-white p-2 rounded shadow mt-8">
        <canvas id="paymentDebtChart"></canvas>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const ctx = document.getElementById('paymentDebtChart').getContext('2d');

        const chartData = @json($chartData);

        const dates = Object.keys(chartData);
        const payments = dates.map(date => chartData[date].payments ?? 0);
        const debts = dates.map(date => chartData[date].debts ?? 0);
        const balance = dates.map(date => (chartData[date].payments ?? 0) - (chartData[date].debts ?? 0));

        const paymentDebtChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: dates,
                datasets: [{
                        label: 'Payments',
                        data: payments,
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1,
                        fill: false
                    },
                    {
                        label: 'Debts',
                        data: debts,
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1,
                        fill: false
                    },
                    {
                        label: 'Balance (Payments - Debts)',
                        data: balance,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1,
                        fill: false
                    }
                ]
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Date'
                        }
                    },
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Amount'
                        }
                    }
                }
            }
        });
    </script>
    <div class="bg-white p-2 rounded shadow mt-8 flex justify-center">
        <div class="w-full md:w-1/2 lg:w-1/3">
            <h3 class="text-lg font-bold mb-2">Payments Breakdown</h3>
            <canvas id="paymentChart"></canvas>
        </div>
    </div>

    <div class="bg-white p-2 rounded shadow mt-8 flex justify-center">
        <div class="w-full md:w-1/2 lg:w-1/3 mt-6">
            <h3 class="text-lg font-bold mb-2 mr-12">Debts Breakdown</h3>
            <canvas id="debtChart"></canvas>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


    <script>
        const chartDataType = @json($chartDataType);


        const paymentLabels = Object.keys(chartDataType).filter(type => chartDataType[type].payments);
        const paymentValues = paymentLabels.map(type => chartDataType[type].payments);


        const debtLabels = Object.keys(chartDataType).filter(type => chartDataType[type].debts);
        const debtValues = debtLabels.map(type => chartDataType[type].debts);


        const paymentCtx = document.getElementById('paymentChart').getContext('2d');
        new Chart(paymentCtx, {
            type: 'doughnut',
            data: {
                labels: paymentLabels,
                datasets: [{
                    label: 'Payments',
                    data: paymentValues,
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.2)', // Cash
                        'rgba(255, 159, 64, 0.2)', // Check
                        'rgba(75, 192, 192, 0.2)', // IOU
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(75, 192, 192, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    }
                }
            }
        });

        // Debt Chart
        const debtCtx = document.getElementById('debtChart').getContext('2d');
        new Chart(debtCtx, {
            type: 'doughnut', // or 'pie'
            data: {
                labels: debtLabels,
                datasets: [{
                    label: 'Debts',
                    data: debtValues,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)', // Cash
                        'rgba(153, 102, 255, 0.2)', // Check
                        'rgba(255, 206, 86, 0.2)', // IOU
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 206, 86, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    }
                }
            }
        });
    </script>
@endsection
