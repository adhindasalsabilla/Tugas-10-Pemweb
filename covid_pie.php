<!DOCTYPE html>
<html>
<head>
    <title>Grafik Perbandingan Total Kasus 10 Negara</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <canvas id="myChart"></canvas>

    <script>
        // Data negara dan total kasus
        var countries = ["India", "Japan", "S.Korea", "Turkey", "Vietnam", "Taiwan", "Iran", "Indonesia", "Malaysia", "Israel"];
        var totalCases = [44986461, 33803572, 31548083, 17232066, 11602738, 10239998, 7611224, 6802090, 5088009, 4824551];

        // Membuat grafik
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: countries,
                datasets: [{
                    label: 'Total Kasus',
                    data: totalCases,
                    backgroundColor: [
                        'rgba(255, 96, 129, 0.4)',
                        'rgba(68, 170, 212, 0.1)',
                        'rgba(240, 201, 90, 0.7)',
                        'rgba(80, 187, 189, 0.5)',
                        'rgba(160, 110, 250, 0.7)',
                        'rgba(230, 160, 70, 0.4)',
                        'rgba(232, 100, 140, 0.2)',
                        'rgba(60, 170, 240, 0.4)',
                        'rgba(217, 210, 87, 0.1)',
                        'rgba(76, 180, 192, 0.3)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                var label = context.label || '';
                                if (label) {
                                    label += ': ';
                                }
                                label += context.formattedValue;
                                return label;
                            }
                        }
                    }
                }
            }
        });
    </script>
</body>
</html>