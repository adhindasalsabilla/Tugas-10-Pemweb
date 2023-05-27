<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Covid's Bar Chart</title>
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
     <canvas id="barChart" width="800" height="400"></canvas>

     <?php
    // mengkoneksikan dengan database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_covid";

    // membuat koneksi
    $conn = new mysqli($servername, $username, $password, $dbname);

    // pemeriksaan koneksi
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // mengambil data dari tabel data_negara
    $sql = "SELECT * FROM data_negara";
    $result = $conn->query($sql);

    // inisialisasi array
    $negara = array();
    $total_cases = array();
    $total_death = array();
    $total_recovered = array();
    $active_cases = array();
    $total_tests = array();

    // memasukkan data ke dalam array
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            array_push($negara, $row['country']);
            array_push($total_cases, $row['total_cases']);
            array_push($total_death, $row['total_deaths']);
            array_push($total_recovered, $row['total_recovered']);
            array_push($active_cases, $row['active_cases']);
            array_push($total_tests, $row['total_tests']);
        }
    }

    $conn->close();
    ?>

    <script>
    var negara = <?php echo json_encode($negara); ?>;
    var totalCases = <?php echo json_encode($total_cases); ?>;
    var totalDeath = <?php echo json_encode($total_death); ?>;
    var totalRecovered = <?php echo json_encode($total_recovered); ?>;
    var activeCases = <?php echo json_encode($active_cases); ?>;
    var totalTests = <?php echo json_encode($total_tests); ?>;

    // membuat bar chart
    var ctx = document.getElementById('barChart').getContext('2d');
    var barChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: negara,
            datasets: [{
                label: 'Total Cases',
                data: totalCases,
                backgroundColor: 'purple',
                borderColor: 'purple',
                borderWidth: 1
            }, {
                label: 'Total Death',
                data: totalDeath,
                backgroundColor: 'black',
                borderColor: 'black',
                borderWidth: 1
            }, {
                label: 'Total Recovered',
                data: totalRecovered,
                backgroundColor: 'orange',
                borderColor: 'orange',
                borderWidth: 1
            }, {
                label: 'Active Cases',
                data: activeCases,
                backgroundColor: 'red',
                borderColor: 'red',
                borderWidth: 1
            }, {
                label: 'Total Tests',
                data: totalTests,
                backgroundColor: 'green',
                borderColor: 'green',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            title: {
                display: true,
                text: 'Bar Chart'
            },
            scales: {
                x: {
                    display: true,
                    title: {
                        display: true,
                        text: 'Negara'
                    }
                },
                y: {
                    display: true,
                    title: {
                        display: true,
                        text: 'Jumlah'
                    },
                    ticks: {
                        beginAtZero: true
                    }
                }
            }
        }
    });
    </script>
</body>
</html>