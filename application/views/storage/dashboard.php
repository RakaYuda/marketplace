<!DOCTYPE html>
<html>

<head>
    <title>Grafik Dengan Chart.js</title>
</head>

<body>
    <h1><?php echo $judul; ?></h1>
    <div style="width: 500px;height: 500px">
        <canvas id="chart_stok"></canvas>
    </div>
    <?php
#persiapan label dan data yang akan digunakan pada grafik
$label_grafik = '';
$data_grafik = '';
foreach ($rows as $row) {
    $label_grafik .= '"' . $row->merk . '", ';
    $data_grafik .= $row->stok . ", ";
}
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.0/chart.min.js" integrity="sha512-GMGzUEevhWh8Tc/njS0bDpwgxdCJLQBWG3Z2Ct+JGOpVnEmjvNx6ts4v6A2XJf1HOrtOsfhv3hBKpK9kE5z8AQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script language="javascript">
        var ctx = document.getElementById("chart_stok").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: [<?php echo $label_grafik; ?>],
                datasets: [{
                    label: 'Stok Barang',
                    data: [<?php echo $data_grafik; ?>],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(255, 206, 86, 0.4)',
                        'rgba(255, 139, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(255, 139, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
</body>

</html>