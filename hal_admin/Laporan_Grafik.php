
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <div>
                 <h4 class="fs-16 fw-semibold mb-1 mb-md-2"> <i class="fas fa-address-card"></i> DATA <span class="text-primary"> NASABAH BLM MEKAR LAHA</span></h4>
            </div>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="admin.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Data Nasabah </li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!--    end row -->
<div class="row">
    <div class="col-xl-12">
        <div class="card">
          
            <div class="card-body">

                <?php
                require_once 'z_config/Koneksi.php';

                // Query untuk mendapatkan total berat timbangan berdasarkan jenis sampah untuk 3 tahun terakhir
                $query = mysqli_query($con, "
                    SELECT
                        YEAR(STR_TO_DATE(tb_timbangan.tgl_timbangan, '%Y-%m-%d')) AS tahun,
                        tb_sampah.jenis_sampah,
                        SUM(tb_detail_timbangan.berat) AS total_berat
                    FROM
                        tb_timbangan
                    JOIN
                        tb_detail_timbangan ON tb_timbangan.id_timbangan = tb_detail_timbangan.id_timbangan
                    JOIN
                        tb_sampah ON tb_detail_timbangan.kode_sampah = tb_sampah.kode_sampah
                    WHERE
                        YEAR(STR_TO_DATE(tb_timbangan.tgl_timbangan, '%Y-%m-%d')) >= YEAR(CURDATE()) - 3
                    GROUP BY
                        tahun, tb_sampah.jenis_sampah
                    ORDER BY
                        tahun, tb_sampah.jenis_sampah
                ");

                // Siapkan data untuk grafik
                $data = [];
                while ($row = mysqli_fetch_assoc($query)) {
                    $tahun = $row['tahun'];
                    $jenis_sampah = $row['jenis_sampah'];
                    $total_berat = (float)$row['total_berat'];

                    if (!isset($data[$tahun])) {
                        $data[$tahun] = [];
                    }

                    $data[$tahun][] = [
                        'jenis_sampah' => $jenis_sampah,
                        'total_berat' => $total_berat
                    ];
                }

                // Format data untuk Highcharts
                $categories = [];
                $series_data = [];
                foreach ($data as $tahun => $values) {
                    $series = ['name' => "Tahun $tahun", 'data' => []];
                    foreach ($values as $value) {
                        if (!in_array($value['jenis_sampah'], $categories)) {
                            $categories[] = $value['jenis_sampah'];
                        }
                        $series['data'][] = $value['total_berat'];
                    }
                    $series_data[] = $series;
                }
                ?>
                <div class="card-body">
                    <p class="form-control" align="justify-content-between">Berikut ini adalah grafik yang menampilkan total berat timbangan sampah untuk 3 tahun terakhir</p>
                    <figure class="highcharts-figure">
                        <div id="container">
                            
                        </div>
                    </figure>
                    <script src="https://code.highcharts.com/highcharts.js"></script>
                    <script src="https://code.highcharts.com/modules/exporting.js"></script>
                    <script src="https://code.highcharts.com/modules/export-data.js"></script>
                    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
                    <script type="text/javascript">
                        Highcharts.chart('container', {
                            chart: {
                                type: 'bar'
                            },
                            title: {
                                text: '',
                                align: 'left'
                            },
                            xAxis: {
                                categories: <?php echo json_encode($categories); ?>,
                                title: {
                                    text: 'Jenis Sampah'
                                },
                                gridLineWidth: 1,
                                lineWidth: 0
                            },
                            yAxis: {
                                min: 0,
                                title: {
                                    text: 'Total Berat (Kg)',
                                    align: 'high'
                                },
                                labels: {
                                    overflow: 'justify'
                                },
                                gridLineWidth: 0
                            },
                            tooltip: {
                                pointFormatter: function() {
                                    return Highcharts.numberFormat(this.y, 2, ',', '.') + ' Kg';
                                }
                            },
                            plotOptions: {
                                bar: {
                                    borderRadius: '50%',
                                    dataLabels: {
                                        enabled: true,
                                        formatter: function() {
                                            return Highcharts.numberFormat(this.y, 2, ',', '.') + ' Kg';
                                        }
                                    },
                                    groupPadding: 0.1
                                }
                            },
                            legend: {
                                layout: 'vertical',
                                align: 'right',
                                verticalAlign: 'top',
                                x: -40,
                                y: 80,
                                floating: true,
                                borderWidth: 1,
                                backgroundColor:
                                    Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
                                shadow: true
                            },
                            credits: {
                                enabled: false
                            },
                            series: <?php echo json_encode($series_data); ?>
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end row -->

