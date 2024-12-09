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

<!-- Page Header Start -->
   <style type="text/css">
        .position-relative {
            position: relative;
        }

        .position-absolute {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .w-100 {
            width: 100%;
        }

        .text-white {
            color: white;
        }

        .breadcrumb {
            background: rgba(0, 0, 0, 0.5); /* Optional: Add a semi-transparent background for better text readability */
            padding: 10px;
            border-radius: 5px;
        }

        .breadcrumb-item {
            font-size: 1rem; /* Adjust font size as needed */
        }
    </style>
    <div class="container-fluid py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container position-relative" data-wow-delay="0.1s"> 
        <img class="w-100" src="pageuser/img/pengurus2.jpg" alt="Image">
        <div class="container text-center py-5 position-absolute top-50 start-50 translate-middle">       
        </div>
    </div> 
    <br>
    <!-- Page Header End -->

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
    <br>
    <br>


<?php } ?>

<?php
 $tampil = mysqli_query($con,"SELECT * FROM tb_pengurus");
  $cek = mysqli_num_rows($tampil);

?>        

    <!-- Informasi Dashboard -->
    <div class="container-fluid facts my-5 py-5" data-parallax="scroll" data-image-src="pageuser/img/Slide-1.jpg">
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

<!-- Menampilkan struktur organisasi -->

    <?php
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
                         <?php  while ($r = mysqli_fetch_array($tampil)) { ?>
                        <div class="testimonial-item">
                            
                            <table width="100%">
                                <tr>
                                    <td rowspan="5">
                                        <img class="img-fluid rounded mb-3" src="img/Pengurus/<?=$r[10]?>" alt="">
                                    </td>
                                </tr>
                                <tr>
                                    <td> Nama</td>
                                    <td> :</td>
                                    <td> <?=$r[1]?></td>
                                </tr>
                                <tr>
                                    <td> Jabatan</td>
                                    <td> :</td>
                                    <td> <?=$r[5]?></td>
                                </tr>
                                <tr>
                                    <td> Alamat</td>
                                    <td> :</td>
                                    <td> <?=$r[6]?></td>
                                </tr>
                                <tr>
                                    <td> No.Tlp</td>
                                    <td> :</td>
                                    <td> <?=$r[7]?></td>
                                </tr>
                            </table>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- End Struktur Organisasi -->

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

