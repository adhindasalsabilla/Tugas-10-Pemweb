<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Covid's Pie Chart</title>
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <canvas id="pieChart" width="800" height="400"></canvas>

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

    
    var ctx = document.getElementById('pieChart').getContext('2d');
    var pieChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: negara,
            datasets: [{
                label: 'Total Cases',
                data: totalCases,
                backgroundColor: [
                    'purple',
                    'black',
                    'orange',
                    'red',
                    'green'
                ],
                borderColor: 'white',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            title: {
                display: true,
                text: 'Pie Chart'
            },
            legend: {
                display: true,
                position: 'bottom'
            }
        }
    });
    </script>
</body>
</html>