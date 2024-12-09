<?php
    $tahun_berdiri = 2018;
    $tahun_sekarang = date('Y'); // Menggunakan fungsi date untuk mendapatkan tahun saat ini
    $usia = $tahun_sekarang - $tahun_berdiri;


    require_once 'z_config/Koneksi.php';
   //Star Variabel untuk Kode Nasabah
      $kode = date("is");
      $tanggal = date("d-m-Y");
    //END Variabel untuk Kode Nasabah
      
 //Query Menampilkan Semua Nasabah Yang terdaftar

        $tampil= mysqli_query($con, "SELECT * FROM tb_pengurus");
        $p=mysqli_num_rows($tampil);

        // Qury Menampilkan Semua Jenis Sampah
        $tampil= mysqli_query($con, "SELECT * FROM tb_sampah");
        $s=mysqli_num_rows($tampil);

        //Query Menampilkan Semua Nasabah Yang terdaftar
        $tampil= mysqli_query($con, "SELECT * FROM tb_nasabah");
        $n=mysqli_num_rows($tampil);

        // Query Menampilkan keseluruhan total timbangan
        $tampil = mysqli_query($con, "SELECT SUM(CAST(berat AS UNSIGNED)) AS total_berat FROM tb_detail_timbangan");
        $total = mysqli_fetch_array($tampil);

        $tampil = mysqli_query($con,"SELECT * FROM tb_tentang_kami");
        $cek = mysqli_num_rows($tampil);
        

?>



<!-- STAR Carousel End -->
    <div class="container-fluid p-0 wow fadeIn" data-wow-delay="0.1s">
            <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="w-100" src="pageuser/img/pengurus1.jpg" alt="Image">
                        <div class="carousel-caption">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-lg-8"><br>
                                        <h5 class="display-6 text-white mb-2 animated slideInUp">WELCOME TO BANK SAMPAH <br>"Bumi Lestari Maluku Mekar Laha"</h5>
                                        <!-- <a href="index.php?page=Prestasi_BLM" class="btn btn-primary py-sm-2 px-sm-2">Sayangi Bumi Bijak Dengan Sampah</a> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="w-100" src="pageuser/img/timbang.jpg" alt="Image">
                        <div class="carousel-caption">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-lg-8">
                                        <!-- <h1 class="display-6 text-white mb-2 animated slideInDown">Create Your Own Small Garden At Home</h1>
                                        <a href="" class="btn btn-primary py-sm-2 px-sm-2">Explore More</a> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
    </div>
    <hr>
<!-- Carousel End -->

<!-- TENTANG KAMI -->
     <?php while ($r = mysqli_fetch_array($tampil)) 
    { ?>
    <!-- About Start -->
    <div class="container-xl py-0">
        <div class="container">
            <div class="row g-3 align-items-end">
                <div class="col-lg-2 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <img class="img-fluid rounded" data-wow-delay="0.1s" width="500" src="img/Tentang-Kami/<?=$r[10]?>">
                </div>
                <div class="col-lg-6 col-md-2 wow fadeInUp" data-wow-delay="0.3s">
                    <h1 class="display-1 text-primary mb-0"><?=$usia?></h1>
                    <p class="text-primary mb-2">Year of Experience</p>
                    <h1 class="display-5 mb-3"><?=$r[1]?></h1>
                    <p class="mb-2" align="justify"><?=$r[2]?></p>
                    <a class="btn btn-primary py-3 px-3" href="index.php?page=Prestasi_BLM"> Prestasi BLM</a>
                </div>
                <div class="col-lg-4 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="row g-5">
                        <div class="col-12 col-sm-6 col-lg-12">
                            <div class="border-start ps-3">
                                <i class="fa fa-award fa-3x text-primary mb-3"></i>
                                <h4 class="mb-2">VISI</h4>
                                <p align="justify"><?=$r[3]?></p>
                            </div>
                        </div>
                        <div class="col-12 col-sm-1 col-lg-12">
                            <div class="border-start ps-4">
                                <i class="fa fa-award fa-3x text-primary mb-3"></i>
                                <h4 class="mb-1">MISI</h4>
                                
                                <p align="justify"><?=$r[4]?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php } ?>
<!-- END TENTANG KAMI -->
<hr>
<br>


<?php
   require_once 'z_config/Koneksi.php';

   //Star Variabel untuk Kode Nasabah
      $kode = date("is");
      $tanggal = date("d-m-Y");
    //END Variabel untuk Kode Nasabah
      
 //Query Menampilkan Semua Nasabah Yang terdaftar

        $tampil= mysqli_query($con, "SELECT * FROM tb_pengurus");
        $p=mysqli_num_rows($tampil);

        // Qury Menampilkan Semua Jenis Sampah
        $tampil= mysqli_query($con, "SELECT * FROM tb_sampah");
        $s=mysqli_num_rows($tampil);

        //Query Menampilkan Semua Nasabah Yang terdaftar
        $tampil= mysqli_query($con, "SELECT * FROM tb_nasabah");
        $n=mysqli_num_rows($tampil);

        // Query Menampilkan keseluruhan total timbangan
        $tampil = mysqli_query($con, "SELECT SUM(CAST(berat AS UNSIGNED)) AS total_berat FROM tb_detail_timbangan");
        $total = mysqli_fetch_array($tampil);
?>
<!-- Top Feature Start -->
   
<!-- Top Feature End -->

<!-- ISI BERANDA -->
    <div class="container-xl py-8">
        <div class="container">
            <div class="row lg-12">
                <?php
                require_once 'z_config/Koneksi.php';

                $id_dok = 10; // Misalnya id_dokumentasi yang ingin ditampilkan adalah 1

                // Query untuk menampilkan satu foto dari tb_dokumentasi berdasarkan id_dokumentasi
                $query_galeri = mysqli_query($con, "SELECT foto_dokumentasi FROM tb_dokumentasi WHERE id_dokumentasi='$id_dok'");

                // Memeriksa apakah query mengembalikan hasil
                if ($query_galeri) {
                    $cek = mysqli_num_rows($query_galeri);

                    if ($cek > 0) {
                        $row = mysqli_fetch_array($query_galeri);
                        $foto = $row['foto_dokumentasi']; ?>
                <div class="col-lg-2 col-md-4 wow fadeInUp" data-wow-delay="0.1s">
                    <img class="img-fluid rounded" data-wow-delay="0.1s" src="img/Dokumentasi/<?=$foto?>">
                </div>
                        <?php } else {
                        echo "Foto tidak ditemukan";
                    }
                } else {
                    echo "Query gagal dijalankan";
                } ?>
                <div class="col-lg-4 col-md-3 wow fadeInUp" data-wow-delay="0.3s">
                    <!-- <h4 class="display-1 text-primary mb-0"><?=$n?></h4> -->
                    <!-- <p class="text-primary mb-1">Nasabah Terdaftar</p> -->
                    <h3 class="display-13 mb-2">Belum Menjadi Bagian Bank Sampah Bumi Lestari Maluku Mekar Laha?</h3>
                    <p class="mb-2" align="justify">Sampah bisa memiliki manfaat lebih untuk kehidupan. Mari bergabung menjadi bagian dari Bank Sampah Bumi Lestari Maluku</p>
                    <a class="btn btn-primary py-2 px-2" data-bs-toggle="modal" data-bs-target="#TambahDataNasabah"> Bergabung Sekarang</a>
                </div>

                <div class="col-lg-2 col-md-3 wow fadeInUp" data-wow-delay="0.1s">
                    <img class="img-fluid rounded" data-wow-delay="0.1s" src="pageuser/img/pengurus1.jpg">
                </div>
                <div class="col-lg-4 col-md-3 wow fadeInUp" data-wow-delay="0.3s">
                    
                    <h3 class="display-13 mb-2">Ingin Tahu Tentang Bank Sampah Bumi Lestari Maluku?</h3>
                    <p class="mb-2">Bank Sampah Bumi Lestari Maluku merupakan bank sampah percontohan di kota Ambon yang telah ditetapkan sebagai Waste Management Center</p>
                    <a class="btn btn-primary py-2 px-2" href="index.php?page=Tentang_Kami">Lihat Sejarah </a>
                </div>
               
            </div>
        </div>
    </div>
<!-- END ISI DASHBOAR -->

<!-- MODAL TAMBAH DATA NASABAH -->
    <div class="modal fade" id="TambahDataNasabah">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Masukan Biodata Diri Nasabah</h5><button type="button" class="btn btn-sm btn-label-danger btn-icon" data-bs-dismiss="modal"><i class="mdi mdi-close"></i></button>
                </div>
                <form method = "POST" action="index.php?page=Nasabah_S" data-parsley-validate enctype="multipart/form-data" class="form-sample">
                    <div class="modal-body">
                        <div class="d-grid gap-2">
                            <div class="row">
                                <div class="col-sm-4 col-lg-4">
                                    <label class="col-form-label" for="nama">Nama Lengkap</label>
                                </div>
                                <div class="col-sm-4 col-lg-8">
                                    <input type="hidden" class="form-control border-success" id="nik" name="id_nasabah" value="<?php echo "NBLM-$kode";?>" readonly>

                                    <input type="text" class="form-control border-success" id="nik" name="nama" placeholder="Masukan Nama Lengkap Anda" required="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 col-lg-4">
                                    <label class="col-form-label" for="alamat">Alamat</label>
                                </div>
                                <div class="col-sm-4 col-lg-8">
                                    <textarea class="form-control border-success" id="alamat" name="alamat" required=""></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 col-lg-4">
                                    <label class="col-form-label" for="Dusun">Dusun</label>
                                </div>
                                <div class="col-sm-4 col-lg-4">
                                    <input type="text" class="form-control border-success" id="nama" name="dusun" placeholder="Masukan Dusun" required="">
                                </div>
                                <div class="col-sm-4 col-lg-4">
                                    <input type="text" class="form-control border-success" id="rt_rw" name="rt_rw" placeholder="Masukan RT/RW" required="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 col-lg-4">
                                    <label class="col-form-label" for="tlp">No Telp</label>
                                </div>
                                <div class="col-sm-4 col-lg-8">
                                     <input type="text" class="form-control border-success" id="tlp" name="tlp" placeholder="Masukan No Tlp" required="">
                                     <input type="hidden" class="form-control border-success" value="<?=$tanggal?>" id="tgl" name="tgl_daftar" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button> 
                        <button type="reset" class="btn btn-outline-danger">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<!-- END MODAL TAMBAH DATA NASABAH -->

<!-- Facts Start -->
    <div class="container-fluid facts my-5 py-5" data-parallax="scroll" data-image-src="pageuser/img/tentangkami.jpg">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-sm-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.5s">
                    <h1 class="display-4 text-white" data-toggle="counter-up"><?=$n?></h1>
                    <span class="fs-5 fw-semi-bold text-light">Total Nasabah yang Terdaftar</span>
                </div>
                
                <div class="col-sm-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.3s">
                    <h1 class="display-4 text-white" data-toggle="counter-up"><?=$p?></h1>
                    <span class="fs-5 fw-semi-bold text-light">Jumlah Pengurus BLM Mekar Laha</span>
                </div>
                <div class="col-sm-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.5s">
                    <h1 class="display-4 text-white" data-toggle="counter-up"><?=$s?></h1>
                    <span class="fs-5 fw-semi-bold text-light">Jenis Sampah yang dapat dikelola</span>
                </div>
                <div class="col-sm-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.1s">
                    <h1 class="display-4 text-white" data-toggle="counter-up"><?=$total['total_berat']?></h1>
                    <span class="fs-5 fw-semi-bold text-light">Total Timbangan Sampah Telah dikelola / KG</span>
                </div>
                
               
            </div>
        </div>
    </div>
<!-- Facts End -->


<?php

    require_once 'z_config/Koneksi.php';
    $tampil = mysqli_query($con,"SELECT * FROM tb_produk");
    $cek = mysqli_num_rows($tampil);
        
?>
<!-- Produk Bank Sampah -->
    <div class="container-xxl py-2">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h4 class="display-8 mb-5">Echo Produk Bank Sampah Bumi Lestari Maluku Mekar Laha</h4>
            </div>
            <div class="row g-4 portfolio-container">
                <?php while ($r = mysqli_fetch_array($tampil)) 
                { ?>
                <div class="col-lg-3 col-md-6 portfolio-item first wow fadeInUp" data-wow-delay="0.1s">
                    <div class="portfolio-inner rounded">
                        <img class="img-fluid" src="img/Produk/<?=$r[3]?>" alt="">
                        <div class="team-text">
                            <br>
                            <table>
                                <tr>
                                    <th></th>
                                    <th><h4 class="mb-2"><?=$r[1]?></h4></th>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><p class="text-black" align="justify"><?=$r[2]?></p></td>
                                </tr>
                            </table>
                                                        
                        </div>
                        <div class="portfolio-text">
                            <div class="d-flex">
                                <a class="btn btn-lg-square rounded-circle mx-2" href="img/Produk/<?=$r[3]?>" data-lightbox="portfolio" title="Lihat Gambar"><i class="fa fa-eye"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
                
            </div>
        </div>
    </div>
<!-- End Produk Bank Sampah-->


<!-- Menampilkan grafik -->
    <div class="container-fluid quote my-5 py-5" data-parallax="scroll" data-image-src="pageuser/img/NewSlide1.jpg">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="bg-white rounded p-4 p-sm-5 wow fadeIn" data-wow-delay="0.5s">
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
        </div>
    </div>
<!-- End grafik-->


<!-- Testimonial Start -->

    <?php
    $tampil = mysqli_query($con,"SELECT * FROM tb_pengurus");
    $cek = mysqli_num_rows($tampil);

     $tampil_struktur = mysqli_query($con,"SELECT * FROM tb_tentang_kami");
    $cek_struktur = mysqli_num_rows($tampil_struktur);
        

    ?>
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 col-md-4 portfolio-item first wow fadeInUp" data-wow-delay="0.1s">
                   <p class="fs-4 fw-bold text-primary">Struktur Organisasi Bank Sampah Bumi Letari Maluku Mekar Laha</p>
                    
                    <?php while ($r = mysqli_fetch_array($tampil_struktur)) 
                            { ?>
                     <div class="portfolio-inner rounded">
                        <img class="img-fluid" src="img/Tentang-Kami/<?=$r[9]?>" alt="">
                        <div class="portfolio-text">
                            <h4 class="text-white mb-4">Perbesar</h4>
                             
                            <div class="d-flex">
                                <a class="btn btn-lg-square rounded-circle mx-2" href="img/Tentang-Kami/<?=$r[9]?>" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                            </div>
                        <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 wow fadeInUp" data-wow-delay="0.5s">
                    <p class="fs-4 fw-bold text-primary">Anggota Pengurus BLM Mekar Laha</p>
                    <div class="owl-carousel testimonial-carousel">
                         <?php  while ($rkami = mysqli_fetch_array($tampil)) { ?>
                        <div class="testimonial-item">
                            
                            <table width="100%">
                                <tr>
                                    <td rowspan="5">
                                        <img class="img-fluid rounded mb-3" src="img/pengurus/<?=$rkami[10]?>" alt="">
                                    </td>
                                </tr>
                                <tr>
                                    <td> Nama</td>
                                    <td> :</td>
                                    <td> <?=$rkami[1]?></td>
                                </tr>
                                <tr>
                                    <td> Jabatan</td>
                                    <td> :</td>
                                    <td> <?=$rkami[5]?></td>
                                </tr>
                                <tr>
                                    <td> Alamat</td>
                                    <td> :</td>
                                    <td> <?=$rkami[6]?></td>
                                </tr>
                                <tr>
                                    <td> No.Tlp</td>
                                    <td> :</td>
                                    <td> <?=$rkami[7]?></td>
                                </tr>
                            </table>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Testimonial End -->
<hr class="form-control">
<!-- Contact Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <p class="fs-5 fw-bold text-primary"></p>
                    <h3 class="display-12 mb-0">Ingin Menjadi Bagian dari Bank Sampah Bumi Lestari Maluku Mekar Laha?</h3>
                    <p class="mb-4">Diharapkan Bapak/Ibu/Sudara/i/Kakak/Adik untuk mengisi biodata yang singkat dibawah ini terlebih dahulu ya!</p>
                     <form method = "POST" action="index.php?page=Nasabah_S" data-parsley-validate enctype="multipart/form-data" class="form-sample">
                        <div class="row g-3">
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="hidden" class="form-control" id="id" name="id_nasabah" value="<?php echo "NBLM-$kode";?>" readonly>

                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama Lengkap Anda" required="">
                                    <label for="nama">Nama Lengkap</label>
                                </div>
                            </div>
                             <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Masukan Alamat disini" id="alamat" name="alamat" style="height: 100px"></textarea>
                                    <label for="alamat">Alamat</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="dusun" name="dusun" placeholder="Masukan Nama Dusun" required="">
                                    <label for="dusun"> Dusun</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="RT/RW" placeholder="Masukan RT/RW" name="rt_rw" required="">
                                    <label for="RT/RW">RT / RW</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="tlp" name="tlp" placeholder="Masukan No Tlp" required="">
                                    <input type="hidden" class="form-control border-success" value="<?=$tanggal?>" id="tgl" name="tgl_daftar" readonly>
                                    <label for="tlp">No Tlp</label>
                                </div>
                            </div>
                           
                            <div class="col-12">
                                <button class="btn btn-primary py-3 px-4" type="submit">Daftar</button>
                            </div>
                        </div>
                    </form>
                </div>
                 <style>
                    #map {
                        height: 500px;
                        width: auto;
                        border: 2px solid #4C9556;
                        border-radius: 15px; /* Rounded corners */
                        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Shadow effect */
                        transition: transform 0.2s; /* Smooth transition */
                    }

                    #map:hover {
                        transform: scale(1.02); /* Slight zoom effect on hover */
                    }
                </style>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s" style="min-height: 450px;">
                    <div class="position-relative rounded overflow-hidden h-100">
                        <?php 
                            require_once 'z_config/Koneksi.php';
                            $tampil = mysqli_query($con,"SELECT * FROM tb_tentang_kami");
                            $cek = mysqli_num_rows($tampil);
                            while ($map = mysqli_fetch_array($tampil)) { 
                        ?>

                        <div class="tab-pane fade show active" id="maps">
                            <div class="rich-list">
                                <h2 align="center"><?= $map[5] ?></h2>
                                <p class="form-control" align="center"> <?=$map[8]?></span>
                                <hr>
                                <div id="map"></div> 
                            </div>
                        </div>

                        <script>
                            function initMap() {
                                //lokasi -3.6959994,128.1786422
                                var lokasi = {lat : <?= $map[6] ?>, lng : <?= $map[7] ?> };

                                var map = new google.maps.Map(document.getElementById('map'),{
                                    zoom : 18,
                                    center : lokasi
                                });

                                var marker = new google.maps.Marker({
                                    position : lokasi,
                                    map : map,
                                    title : '<?= $map[5] ?>'
                                });
                            }
                        </script>
                        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB8I1x_4URkRfe1jwhVaFcDIekN0HLp6HM&callback=initMap"></script>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Contact End -->
