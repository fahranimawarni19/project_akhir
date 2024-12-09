<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <div>
                 <h4 class="fs-16 fw-semibold mb-1 mb-md-2"> <i class="fas fa-box"></i> DATA TABUNGAN <span class="text-primary"> NASABAH BLM MEKAR LAHA</span></h4>
            </div>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="admin.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Tabungan Nasabah </li>
                </ol>
            </div>
        </div>
    </div>
</div>

<?php


require_once 'z_config/Koneksi.php';

 function rupiah($angka){
  $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
  return $hasil_rupiah;
  }

// Query untuk menggabungkan data dari tb_tabungan dan tb_nasabah
$tampil = mysqli_query($con,"SELECT tb_tabungan.id_tabungan, tb_tabungan.id_nasabah, tb_tabungan.tabungan, tb_nasabah.nama, tb_nasabah.alamat, tb_nasabah.tlp FROM tb_tabungan JOIN tb_nasabah ON tb_tabungan.id_nasabah = tb_nasabah.id_nasabah");

?>


<div class="row">
    <div class="col-7">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"><i class="fas fa-book-open"></i> Tabungan Nasabah    </h4>
            </div>
            <div class="card-body">


                <table id="scroll-sidebar-datatable" class="table dt-responsive nowrap w-100 table-hover table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID Nasbah</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>No Tlp</th>
                            <th>Saldo</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $no = 1;
                            while ($r = mysqli_fetch_array($tampil)) { ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $r['id_nasabah']; ?></td>
                                <td><?php echo $r['nama']; ?></td>
                                <td><?php echo $r['alamat']; ?></td>
                                <td><?php echo $r['tlp']; ?></td>
                                <td><?php echo rupiah($r['tabungan']); ?></td>
                                <td>
                                    <a data-bs-toggle="modal" data-bs-target="#Penarikan" data-id='<?=$r[0]?>'><button type="button" class="btn btn-danger btn-sm">Tarik</button>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

            </div> <!-- end card body-->
        </div> <!-- end card -->
 </div>
    
    <div class="col-5">
        <div class="card">
            <div class="card-body">
                <!-- SOURCE CODE GRAFIK DATA TIMBANGAN SAMPAH DARI NASABAH BLM -->
                   <?php
                    require_once 'z_config/Koneksi.php';

                    // Query untuk mengambil data nama_nasabah dan tabungan
                    $query = mysqli_query($con, "SELECT n.nama, SUM(t.tabungan) as tabungan FROM tb_tabungan t JOIN tb_nasabah n ON t.id_nasabah = n.id_nasabah GROUP BY n.nama ORDER BY tabungan DESC LIMIT 5");
                    $jml = mysqli_num_rows($query);
                    // Membuat array untuk menyimpan data

                    if ($jml > 0) {
                        $data = [];
                        while ($row = mysqli_fetch_array($query)) {
                            $data[] = ['name' => $row['nama'], 'y' => (int)$row['tabungan']];
                        }
                        // Mengubah data array menjadi format JSON
                        $data_json = json_encode($data);
                    } else {
                        echo "Data timbangan belum ada";
                        exit;
                    }
                    ?>

<figure class="highcharts-figure">
    <div id="container"></div>
    <p class="highcharts-description">
        A variation of a 3D pie chart with an inner radius added.
        These charts are often referred to as donut charts.
    </p>
</figure>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<script type="text/javascript">
    Highcharts.setOptions({
        colors: Highcharts.map(Highcharts.getOptions().colors, function (color) {
            return {
                radialGradient: {
                    cx: 0.5,
                    cy: 0.3,
                    r: 0.7
                },
                stops: [
                    [0, color],
                    [1, Highcharts.color(color).brighten(-0.3).get('rgb')] // darken
                ]
            };
        })
    });

    // Build the chart
    Highcharts.chart('container', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Grafik Tabungan Nasabah',
            align: 'left'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>Rp {point.y}</b>'
        },
        accessibility: {
            point: {
                valueSuffix: ' Rp'
            }
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<span style="font-size: 1.2em"><b>{point.name}</b></span><br>' +
                           '<span style="opacity: 0.6">Rp {point.y}</span>',
                    connectorColor: 'rgba(128,128,128,0.5)'
                }
            }
        },
        series: [{
            name: 'Tabungan',
            data: <?php echo $data_json; ?>
        }]
    });
</script>
                <!-- END SOURCE CODE GRAFIK DATA TIMBANGAN SAMPAH DARI NASABAH BLM -->

            </div>
        </div> 
    </div>
</div>

<!-- MODAL PENARIKAN TABUNGAN -->
    <div class="modal fade" id="Penarikan">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Forum Penarikan</h5><button type="button" class="btn btn-sm btn-label-danger btn-icon" data-bs-dismiss="modal"><i class="mdi mdi-close"></i></button>
                </div>
                <div class="modal-body">
                    <div class="Penarikan-Tab"></div>
                </div>
            </div>
        </div>
    </div>
<!-- END MODAL PENARIKAN TABUNGAN -->