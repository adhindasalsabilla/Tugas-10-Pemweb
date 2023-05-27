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
        type: 'bar',
        data: {
            labels: countries,
            datasets: [{
                label: 'Total Kasus',
                data: totalCases,
                backgroundColor: 'rgba(50, 115, 220, 0.3)',
                borderColor: 'rgba(50, 115, 220, 0.3)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            var label = context.dataset.label || '';
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