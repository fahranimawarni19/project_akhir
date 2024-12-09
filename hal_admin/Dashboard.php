<!-- PHP MENAMPILKAN JAM YANG SEDANG BERLANGSUNG -->

    <?php
    // Inisialisasi waktu zona
    date_default_timezone_set('Asia/Jayapura');

    // Ambil waktu saat ini
    $AmbilJam = date('H');

    // Tentukan ucapan berdasarkan waktu
    if ($AmbilJam >= 5 && $AmbilJam < 12) {
        $Ucapan = "Selamat Pagi";
    } elseif ($AmbilJam >= 12 && $AmbilJam < 15) {
        $Ucapan = "Selamat Siang";
    } elseif ($AmbilJam >= 15 && $AmbilJam < 18) {
        $Ucapan = "Selamat Sore";
    } else {
        $Ucapan = "Selamat Malam";
    }

    ?>
<!-- END PHP MENAMPILKAN JAM YANG SEDANG BERLANGSUNG -->




<!-- PHP MENAMPILKAN DATA -->
    <?php
        
        $tampil= mysqli_query($con, "SELECT * FROM tb_pengurus");
        $p=mysqli_num_rows($tampil);

        // Qury Menampilkan Semua Jenis Sampah
        $tampil= mysqli_query($con, "SELECT * FROM tb_sampah");
        $s=mysqli_num_rows($tampil);

        //Query Menampilkan Semua Nasabah Yang terdaftar
        $tampil= mysqli_query($con, "SELECT * FROM tb_nasabah");
        $n=mysqli_num_rows($tampil);
    ?>
<!-- END PHP MENAMPILKAN DATA -->


<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <div>
                <h4 class="fs-16 fw-semibold mb-1 mb-md-2"><?=$Ucapan?>, <span class="text-primary"><?=$r['nama']?>!</span></h4>
                <p class="text-muted mb-0">
                    <i class="mdi mdi-alert-circle"></i> Selamat Datang! Kamu Berhasil Login Sebagai <?=$r['jabatan']?>
                </p>
                <p class="text-muted mb-0"><i class="fas fa-grin-hearts"></i>
                Semoga harimu menyenangkan hari ini.</p>
            </div>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">BLM-Mekar Laha</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!--    end row -->

<div class="row">
    <div class="col-xxl-9">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-3">
                        <div class="card shadow-lg">
                            <div class="card-body " >
                                <div class="d-flex ">
                                    <div class="flex-shrink-0 avatar avatar-xs avatar-label-success">
                                        <i class="fas fa-user-tag fs-18"></i>
                                    </div>
                                    <div class="flex-grow-1 ms-2">
                                        <h4 class="fs-14 mb-1">Jumlah Nasabah </h4>
                                        <p class="text-muted fs-12 mb-0"> BLM Mekar Laha</p>
                                    </div>
                                    <p class="text-muted mb-0"><a href="admin.php?page=Nasabah"><span class="badge badge-primary badge-circle"><?=$n?></span></a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3">
                        <div class="card shadow-lg">
                            <div class="card-body " >
                                <div class="d-flex ">
                                    <div class="flex-shrink-0 avatar avatar-xs avatar-label-success">
                                        <i class=" fas fa-user-tie fs-18"></i>
                                    </div>
                                    <div class="flex-grow-1 ms-2">
                                        <h4 class="fs-14 mb-1">Pengurus</h4>
                                        <p class="text-muted fs-12 mb-0">BLM Mekar Laha</p>
                                    </div>
                                    <p class="text-muted mb-0"><a href="admin.php?page=Pengurus"><span class="badge badge-primary badge-circle"><?=$p?></span></a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3">
                        <div class="card shadow-lg">
                            <div class="card-body " >
                                <div class="d-flex ">
                                    <div class="flex-shrink-0 avatar avatar-xs avatar-label-success">
                                        <i class=" fas fa-tasks fs-18"></i>
                                    </div>
                                    <div class="flex-grow-1 ms-2">
                                        <h4 class="fs-14 mb-1">Jenis Sampah</h4>
                                        <p class="text-muted fs-12 mb-0"> BLM Mekar Laha</p>
                                    </div>
                                    <p class="text-muted mb-0"><a href="admin.php?page=info_blm"><span class="badge badge-primary badge-circle"><?=$s?></span></a></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Kode  Menampilkan Semua Jenis Sampah-->
                      <?php
                        //Query Menampilkan Semua Timbangan
                        
                          $tampil= mysqli_query($con, "SELECT SUM(CAST(berat AS UNSIGNED)) AS total_berat FROM tb_detail_timbangan");
                          $t=mysqli_num_rows($tampil);
                          if ($t > 0) {
                          $row = mysqli_fetch_array($tampil);
                         
                      ?>
                    <!-- END Kode  Menampilkan Semua Jenis Sampah-->

                    <div class="col-xl-3">
                        <div class="card shadow-lg">
                            <div class="card-body " >
                                <div class="d-flex ">
                                    <div class="flex-shrink-0 avatar avatar-xs avatar-label-success">
                                        <i class="fas fa-chart-line fs-18"></i>
                                    </div>
                                    <div class="flex-grow-1 ms-2">
                                        <h4 class="fs-14 mb-1">Total</h4>
                                        <p class="text-muted fs-12 mb-0">Data Sampah</p>
                                    </div>
                                    <p class="text-muted mb-0"><span class="badge badge-primary"><?=$row['total_berat']?> KG</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                     <?php 
                      } else {
                          echo "0 results";
                      }

                    ?>

                </div>
            </div>
            <div class="card-body">
                <!-- SOURCE CODE GRAFIK DATA TIMBANGAN SAMPAH DARI NASABAH BLM -->
                <?php
                    // Koneksi ke database
                    require_once 'z_config/Koneksi.php';

                    // Query untuk mengambil data jenis sampah dan total berat sampah per kode sampah selama 6 bulan terakhir
                    $sql = mysqli_query($con, "
                        SELECT tb_sampah.jenis_sampah, SUM(tb_detail_timbangan.berat) as total_berat
                        FROM tb_detail_timbangan
                        JOIN tb_sampah ON tb_detail_timbangan.kode_sampah = tb_sampah.kode_sampah
                        JOIN tb_timbangan ON tb_detail_timbangan.id_timbangan = tb_timbangan.id_timbangan
                        WHERE tb_timbangan.tgl_timbangan >= DATE_SUB(CURDATE(), INTERVAL 6 MONTH)
                        GROUP BY tb_detail_timbangan.kode_sampah
                    ");

                    $jml = mysqli_num_rows($sql);

                    $data = [];

                    if ($jml > 0) {
                        // Output data of each row
                        while ($row = mysqli_fetch_array($sql)) {
                            $data[] = [$row['jenis_sampah'], (int)$row['total_berat']];
                        }
                    } else {
                        echo "Data timbangan belum ada";
                    }
                ?>
                <div class="row">
                    <div class="col-12 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <figure class="highcharts-figure">
                                    <div id="container"></div>
                                    <p class="highcharts-description">
                                        <i>Jenis sampah yang telah terkumpul</i><br><br>
                                        Grafik ini menunjukkan distribusi total berat sampah berdasarkan jenis sampah dalam <b>6 bulan Terakhir</b>. Klik pada potongan untuk memilih dan membatalkan pemilihan.
                                    </p>
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
                <script src="assets/highchart/highcharts.js"></script>
                <script src="assets/highchart/exporting.js"></script>
                <script src="assets/highchart/export-data.js"></script>
                <script src="assets/highchart/accessibility.js"></script>

                <script type="text/javascript">
                    document.addEventListener('DOMContentLoaded', function () {
                        Highcharts.chart('container', {
                            chart: {
                                type: 'pie',
                                options3d: {
                                    enabled: true,
                                    alpha: 45,
                                    beta: 0
                                }
                            },
                            title: {
                                text: 'GRAFIK TOTAL JENIS TIMBANGAN SAMPAH',
                                align: 'center'
                            },
                            subtitle: {
                                text: 'Bank Sampah Bumi Lestari Maluku Mekar Laha',
                                align: 'center'
                            },
                            accessibility: {
                                point: {
                                    valueSuffix: 'Kg'
                                }
                            },
                            tooltip: {
                                pointFormat: '{series.name}: <b>{point.y} Kg</b>'
                            },
                            plotOptions: {
                                pie: {
                                    allowPointSelect: true,
                                    cursor: 'pointer',
                                    depth: 35,
                                    dataLabels: {
                                        enabled: true,
                                        format: '{point.name}<br>'+'<span style="opacity: 0.6">{point.y} kg'
                                    }
                                }
                            },
                            series: [{
                                type: 'pie',
                                name: 'Berat Sampah',
                                data: <?php echo json_encode($data); ?>
                            }]
                        });
                    });
                </script>
                <!-- END SOURCE CODE GRAFIK DATA TIMBANGAN SAMPAH DARI NASABAH BLM -->
            </div>

        </div>
    </div>
</div>





