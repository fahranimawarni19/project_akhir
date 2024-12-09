<?php

    function rupiah($angka){
        $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
        return $hasil_rupiah;
    }
?>

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <div>
                 <h4 class="fs-16 fw-semibold mb-1 mb-md-2"> <i class=" fas fa-cogs"></i> Kelola Informasi<span class="text-primary"> BLM MEKAR LAHA</span></h4>
            </div>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="admin.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Info BLM </li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- end page title -->


<!-- <div class="row">
    <div class="col-xl-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex">
                    <div class="flex-shrink-0 avatar avatar-xs avatar-label-danger">
                        <i class="fas fa-chart-line fs-18"></i>
                    </div>
                    <div class="flex-grow-1 ms-2">
                        <h4 class="fs-14 mb-1">Total Earning</h4>
                        <p class="text-muted fs-12 mb-0">From previous period</p>
                    </div>
                    <p class="text-muted mb-0">5,40,549</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex">
                    <div class="flex-shrink-0 avatar avatar-xs avatar-label-info">
                        <i class="fas fa-crown fs-16"></i>
                    </div>
                    <div class="flex-grow-1 ms-2">
                        <h4 class="fs-14 mb-1">Sales</h4>
                        <p class="text-muted fs-12 mb-0">From previous period</p>
                    </div>
                    <p class="text-muted mb-0">1,205,677</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex">
                    <div class="flex-shrink-0 avatar avatar-xs avatar-label-warning">
                        <i class="fas fa-chart-bar fs-18"></i>
                    </div>
                    <div class="flex-grow-1 ms-2">
                        <h4 class="fs-14 mb-1">Purchase</h4>
                        <p class="text-muted fs-12 mb-0">From previous period</p>
                    </div>
                    <p class="text-muted mb-0">48,430,039</p>
                </div>
            </div>
        </div>
    </div>
</div> -->

 <div class="row">
    <div class="col-xxl-8">
        <div class="row">
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-header justify-content-between">
                        <div class="card-icon text-muted"><i class="fas fa-laptop-code fs14"></i></div>
                        <h3 class="card-title">Data Jenis Sampah</h3>
                        <div class="card-addon dropdown">
                             <a href="" class="btn btn-success btn-fw" data-bs-toggle="modal" data-bs-target="#Tambah-Data-Sampah"> <i class=" fa fa-plus"></i> Tambah Data</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="tab-content p-0" id="income-tabContent">
                           <table id="scroll-sidebar-datatable" class="table dt-responsive nowrap w-100 table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Sampah</th>
                                        <th>Jenis Sampah</th>
                                        <th>Harga / Kg</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                      require_once 'z_config/Koneksi.php';

                                      $No = 1;
                                      $tampil = mysqli_query($con,"SELECT * FROM tb_sampah");
                                      while ($r = mysqli_fetch_array($tampil)) {

                                        echo "
                                          <tr>
                                            <td>$No</td>
                                            <td>$r[0]</td>
                                            <td>$r[1]</td>
                                            <td> <strong>".rupiah($r[2])."</strong></td>
                                            <td>
                                            <a data-bs-toggle=\"modal\" data-bs-target='#Edit-Data-Sampah1' data-id='$r[0]'><button type=\"button\" class=\"btn btn-icons btn-rounded btn-success\"><i class=\"mdi mdi-pencil\"></i></button></a>

                                            <button type=\"button\" class=\"btn btn-icons btn-rounded btn-danger\" onclick=\"HapusDataSampah('$r[0]');\">
                                                <i class=\"mdi mdi-delete\"></i>
                                            </button>

                                            </td>
                                          </tr>
                                        ";
                                        $No++;
                                      }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- <div class="card">
                    <div class="card-header justify-content-between">
                        <div class="card-icon text-muted"><i class="fas fa-sort-amount-up fs-14"></i></div>
                        <h4 class="card-title">Berita</h4>
                        <div class="card-addon dropdown">
                            <a href="" class="btn btn-success btn-fw" data-bs-toggle="modal" data-bs-target="#Tambah-Data-Berita"> <i class=" fa fa-plus"></i> Tambah Data</a>
                        </div>
                    </div>
                    <div class="card-body">
                       
                    </div>
                </div> -->

                <div class="card">
                    <div class="card-header justify-content-between">
                        <div class="card-icon text-muted"><i class=" fas fa-laptop fs14"></i></div>
                        <h3 class="card-title">Kegiatan BLM</h3>
                        <div class="card-addon dropdown">
                            <a href="" class="btn btn-success btn-fw" data-bs-toggle="modal" data-bs-target="#Tambah-Data-Kegiatan"> <i class=" fa fa-plus"></i> Tambah Data</a>
                        </div>
                    </div>
                    <div class="card-body">
                       <table class="table mb-0">
                            <thead class="table-primary">
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Tanggal</th>
                                    <th>Foto</th>
                                    <th>Aksi</th>
                                </tr>
    
                          <tbody>
                            <?php
                              require_once 'z_config/Koneksi.php';
                              $No = 1;
                              $tampil = mysqli_query($con,"SELECT * FROM tb_kegiatan");
                              $cek = mysqli_num_rows($tampil);
                              while ($r = mysqli_fetch_array($tampil)) {
                                echo "
                                  <tr>
                                    <td>$No</td>
                                    <td>$r[1]</td>
                                    <td>$r[4]</td>
                                    <td><img src=\"img/Kegiatan/$r[5]\" alt=\"Foto\" class=\"avatar-2xs\"></td>
                                    <td>
                                  
                                     <a data-bs-toggle=\"modal\" data-bs-target='#Edit-Data-Kegiatan' data-id='$r[0]'><button type=\"button\" class=\"btn btn-icons btn-rounded btn-success\"><i class=\"mdi mdi-pencil\"></i></button></a>

                                            <button type=\"button\" class=\"btn btn-icons btn-rounded btn-danger\" onclick=\"HapusDataKegiatan('$r[0]');\">
                                                <i class=\"mdi mdi-delete\"></i>
                                            </button>
                                       </td>
                                  </tr>

                                ";
                                $No++;
                              }
                            ?>
                          </tbody>

                        </table>
                    </div>
                </div>

            </div>

            <div class="col-xl-6">
                <div class="card">
                    <div class="card-header">
                        <div class="card-icon text-muted"><i class=" fas fa-recycle"></i></div>
                        <h3 class="card-title">Produk BLM Mekar Laha</h3>
                        <div class="card-addon dropdown">
                            <a href="" class="btn btn-success btn-fw" data-bs-toggle="modal" data-bs-target="#Tambah-Data-Produk"> <i class=" fa fa-plus"></i> Tambah Data</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table mb-0">
                            <thead class="table-primary">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Produk</th>
                                    <th>Foto</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                           <tbody>
                            <?php
                              require_once 'z_config/Koneksi.php';
                              $No = 1;
                              $tampil = mysqli_query($con,"SELECT * FROM tb_produk");
                              $cek = mysqli_num_rows($tampil);
                              while ($r = mysqli_fetch_array($tampil)) {
                                echo "
                                  <tr>
                                    <td>$No</td>
                                    <td>$r[1]</td>
                                    <td><img src=\"img/Produk/$r[3]\" alt=\"Foto Profil\" class=\"avatar-2xs\"></td>
                                    <td>
                                  
                                     <a data-bs-toggle=\"modal\" data-bs-target='#Edit-Data-Produk1' data-id='$r[0]'><button type=\"button\" class=\"btn btn-icons btn-rounded btn-success\"><i class=\"mdi mdi-pencil\"></i></button></a>

                                            <button type=\"button\" class=\"btn btn-icons btn-rounded btn-danger\" onclick=\"HapusDataProduk('$r[0]');\">
                                                <i class=\"mdi mdi-delete\"></i>
                                            </button>
                                       </td>
                                  </tr>
                                ";
                                $No++;
                              }
                            ?>
                          </tbody>
                        </table>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <div class="card-icon text-muted"><i class="fas fa-trophy fs14"></i></div>
                        <h3 class="card-title">Prestasi / Penghargaan</h3>
                        <div class="card-addon">
                            <div class="dropdown">
                                 <a href="" class="btn btn-success btn-fw" data-bs-toggle="modal" data-bs-target="#Tambah-Data-Prestasi"> <i class=" fa fa-plus"></i> Tambah Data</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table mb-0">
                            <thead class="table-primary">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Prestasi</th>
                                    <th>Tahun</th>
                                    <th>Foto</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                              require_once 'z_config/Koneksi.php';
                              $No = 1;
                              $tampil = mysqli_query($con,"SELECT * FROM tb_prestasi");
                              $cek = mysqli_num_rows($tampil);
                              while ($r = mysqli_fetch_array($tampil)) {
                                echo "
                                  <tr>
                                    <td>$No</td>
                                    <td>$r[1]</td>
                                    <td>$r[3]</td>
                                    <td><img src=\"img/Prestasi/$r[4]\" alt=\"Foto Prestasi\" class=\"avatar-2xs\"></td>
                                    <td>
                                  
                                     <a data-bs-toggle=\"modal\" data-bs-target='#Edit-Data-Prestasi' data-id='$r[0]'><button type=\"button\" class=\"btn btn-icons btn-rounded btn-success\"><i class=\"mdi mdi-pencil\"></i></button></a>

                                            <button type=\"button\" class=\"btn btn-icons btn-rounded btn-danger\" onclick=\"HapusDataPrestasi('$r[0]');\">
                                                <i class=\"mdi mdi-delete\"></i>
                                            </button>
                                       </td>
                                  </tr>
                                ";
                                $No++;
                              }
                            ?>
                          </tbody>
                        </table>
                    </div>
                </div>
            </div>
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


    <div class="card">
        <div class="card-header card-header-bordered">
            <div class="card-icon text-muted"><i class="fas fa-map-marked-alt fs-14"></i></div>
            <h3 class="card-title">GOOGLE MAPS</h3>
            <div class="card-addon">
                <div class="nav nav-pills card-nav" id="user-tab">
                    <a class="nav-item nav-link active" id="user-manager-tab" data-bs-toggle="tab" href="#maps"> <i class="fas fa-map fs14"></i> Maps</a>
                    <a class="nav-item nav-link" id="user-employee-tab" data-bs-toggle="tab" href="#data-maps"><i class="fas fa-info-circle fs14"></i> Tentang Kami</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <?php 
                require_once 'z_config/Koneksi.php';
                $tampil = mysqli_query($con,"SELECT * FROM tb_tentang_kami");
                $cek = mysqli_num_rows($tampil);
                while ($map = mysqli_fetch_array($tampil)) 
            { ?>
            <div class="tab-content p-0" id="user-tabContent">
                <div class="tab-pane fade show active" id="maps">
                    <div class="rich-list">
                        <h2 align="center"><?= $map[5] ?></h2><hr>
                        <div id="map"></div> 
                    </div>
                </div>

                <script>
                    function initMap() {
                        //lokasi -3.6959994,128.1786422
                        var lokasi = {lat : <?=$map[6]?>, lng : <?=$map[7]?> }

                        var map = new google.maps.Map(document.getElementById('map'),{
                            zoom : 18,
                            center : lokasi
                        });

                        var marker = new google.maps.Marker({
                            position : lokasi,
                            map : map,
                            title : '<?=$map[5]?>'
                        })
                    }
                </script>
                <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB8I1x_4URkRfe1jwhVaFcDIekN0HLp6HM&callback=initMap"></script>
                <?php } ?>
                    <div class="tab-pane fade" id="data-maps">
                        <div class="rich-list">
                            
                            <div class="card">
                                <div class="card-body">
                                    <div class="row row-cols-1 row-cols-md-12 g-12">
                                    
                                        <div class="col">
                                            <div class="card portlet h-100 border">
                                                <div class="card-body">
                                                    <form method="POST" action="admin.php?page=Tentang_Kami_S" data-parsley-validate enctype="multipart/form-data">
                                                        <div class="d-grid gap-3">
                                                            <div class="row">
                                                                <label for="head" class="col-sm-2 col-form-label">Heading Sejarah</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text"  class="form-control" id="head" name="heading_sejarah" placeholder="Masukan Judul" />
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <label for="isi" class="col-sm-2 col-form-label">Isi Sejarah</label>
                                                                <div class="col-sm-10">
                                                                    <textarea class="form-control" id="isi" name="isi_sejarah"> </textarea>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <label for="visi" class="col-sm-2 col-form-label">Visi</label>
                                                                <div class="col-sm-10">
                                                                    <textarea class="wysihtml5 form-control border-primary" id="visi" name="visi" required=""></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <label for="misi" class="col-sm-2 col-form-label">Misi</label>
                                                                <div class="col-sm-10">
                                                                    <textarea class="wysihtml5 form-control border-primary" id="misi" name="misi"> </textarea>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <label for="Ket" class="col-sm-2 col-form-label">Keterangan</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text"  class="form-control" id="Ket" name="keterangan" placeholder="Masukan Keterangan Lokasi" />
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <label for="lat" class="col-sm-2 col-form-label">Lat</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control" id="lat" name="lat" placeholder="Ex:-3.6959994" />
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <label for="lang" class="col-sm-2 col-form-label">Lang</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control" id="lang" name="lang" placeholder="Ex:128.1786422" />
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                                                <div class="col-sm-10">
                                                                    <textarea class="form-control" id="alamat" name="alamat"> </textarea>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <label for="bagan" class="col-sm-2 col-form-label">Bagan</label>
                                                                <div class="col-sm-10">
                                                                     <input type="file" class="form-control" id="bagan" name="bagan" />
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <label for="foto" class="col-sm-2 col-form-label">Foto Lokasi</label>
                                                                <div class="col-sm-10">
                                                                     <input type="file" class="form-control" id="lang" name="foto" />
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <label for="foto" class="col-sm-2 col-form-label"></label>
                                                                <div class="col-sm-10">
                                                                    <button type="submit" class="btn btn-primary">Simpan</button> 
                                                                    <button type="reset" class="btn btn-danger">Reset</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                 <div class="card-body">
                                                    <table class="table mb-0">
                                                        <thead class="table-primary">
                                                            <tr>
                                                                <!-- <th>No</th> -->
                                                                <th>Visi</th>
                                                                <th>Misi</th>
                                                                <th>Alamat</th>
                                                                <th>Aksi</th>
                                                            </tr>
                                                        </thead>
                                                       <tbody>
                                                       <?php
                                                          require_once 'z_config/Koneksi.php';
                                                          $No = 1;
                                                          $tampil = mysqli_query($con,"SELECT * FROM tb_tentang_kami");
                                                          $cek = mysqli_num_rows($tampil);
                                                          while ($r = mysqli_fetch_array($tampil)) {
                                                            echo "
                                                              <tr>
                                                                <td>$r[3]</td>
                                                                <td>$r[4]</td>
                                                                <td>$r[8]</td>
                                                                <td>
                                                              
                                                                 <a data-bs-toggle=\"modal\" data-bs-target='#Tentang-KamiE' data-id='$r[0]'><button type=\"button\" class=\"btn btn-icons btn-rounded btn-success\"><i class=\"mdi mdi-pencil\"></i></button></a>

                                                                        <button type=\"button\" class=\"btn btn-icons btn-rounded btn-danger\" onclick=\"HapusTentangKami('$r[0]');\">
                                                                            <i class=\"mdi mdi-delete\"></i>
                                                                        </button>
                                                                   </td>
                                                              </tr>
                                                            ";
                                                            $No++;
                                                          }
                                                        ?>
                                                      </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- STAR MODAL TAMBAH DATA SAMPAH-->
     <div class="modal fade" id="Tambah-Data-Sampah">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Forum Tambah Data Sampah</h5><button type="button" class="btn btn-sm btn-label-danger btn-icon" data-bs-dismiss="modal"><i class="mdi mdi-close"></i></button>
                </div>
                 <form method="POST" action="admin.php?page=Data_Sampah_S" data-parsley-validate enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="d-grid gap-2">
                            <div class="row">
                                <div class="col-sm-4 col-lg-3">
                                    <label class="col-form-label" for="kode"> Kode Sampah </label>
                                </div>
                                <div class="col-sm-4 col-lg-8">
                                    <input type="text" class="form-control border-success" id="kode" name="kode_sampah" placeholder="Masukan Kode Sampah..." required="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 col-lg-3">
                                    <label class="col-form-label" for="jenis"> Jenis Sampah </label>
                                </div>
                                <div class="col-sm-4 col-lg-8">
                                    <input type="text" class="form-control border-success" id="jenis" name="jenis_sampah" placeholder="Masukan Jenis Sampah..." required="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 col-lg-3">
                                    <label class="col-form-label" for="harga"> Harga Sampah </label>
                                </div>
                                <div class="col-sm-4 col-lg-8">
                                    <input type="text" class="form-control border-success" id="harga" name="harga" placeholder="Masukan Harga Sampah /Kg..." required="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button> 
                        <button type="reset" class="btn btn-danger">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<!-- END MODAL TAMBAH DATA SAMPAH-->

<!-- STAR MODAL TAMBAH DATA PRODUK-->
     <div class="modal fade" id="Tambah-Data-Produk">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Forum Tambah Data Produk</h5><button type="button" class="btn btn-sm btn-label-danger btn-icon" data-bs-dismiss="modal"><i class="mdi mdi-close"></i></button>
                </div>
                 <form method = "POST" action="admin.php?page=Produk_S" data-parsley-validate enctype="multipart/form-data" class="form-sample">
                    <div class="modal-body">
                        <div class="d-grid gap-2">
                            <div class="row">
                                <div class="col-sm-4 col-lg-3">
                                    <label class="col-form-label" for="kode"> Nama Produk </label>
                                </div>
                                <div class="col-sm-4 col-lg-8">
                                    <input type="text" class="form-control border-success" id="nama" name="nama" placeholder="Masukan Nama Produk..." required="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 col-lg-3">
                                    <label class="col-form-label" for="ket"> Keterangan </label>
                                </div>
                                <div class="col-sm-4 col-lg-8">
                                    <textarea type="text" class="form-control border-success" id="ket" name="keterangan" required=""></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 col-lg-3">
                                    <label class="col-form-label" for="foto"> Foto </label>
                                </div>
                                <div class="col-sm-4 col-lg-8">
                                    <input type="file" name="foto" class="form-control" required="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button> 
                        <button type="reset" class="btn btn-danger">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<!-- END MODAL TAMBAH DATA PRODUK-->

<!-- STAR MODAL EDIT DATA SAMPAH-->
     <div class="modal fade" id="Edit-Data-Sampah1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Forum Edit Data Sampah</h5><button type="button" class="btn btn-sm btn-label-danger btn-icon" data-bs-dismiss="modal"><i class="mdi mdi-close"></i></button>
                </div>
                <div class="modal-body">
                    <div class="Data_Sampah_Edit"></div>
                </div>
            </div>
        </div>
    </div>
<!-- END MODAL EDIT DATA SAMPAH-->

<!-- STAR MODAL TAMBAH DATA PRESTASI-->
     <div class="modal fade" id="Tambah-Data-Prestasi">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Forum Tambah Data Prestasi</h5><button type="button" class="btn btn-sm btn-label-danger btn-icon" data-bs-dismiss="modal"><i class="mdi mdi-close"></i></button>
                </div>
                 <form method = "POST" action="admin.php?page=Prestasi_S" data-parsley-validate enctype="multipart/form-data" class="form-sample">
                    <div class="modal-body">
                        <div class="d-grid gap-2">
                            <div class="row">
                                <div class="col-sm-4 col-lg-3">
                                    <label class="col-form-label" for="kode"> Nama Prestasi </label>
                                </div>
                                <div class="col-sm-4 col-lg-8">
                                    <input type="text" class="form-control border-success" id="nama" name="nama" placeholder="Masukan Nama Prestasi..." required="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 col-lg-3">
                                    <label class="col-form-label" for="ket"> Keterangan </label>
                                </div>
                                <div class="col-sm-4 col-lg-8">
                                    <textarea type="text" class="form-control border-success" id="ket" name="keterangan" required=""></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 col-lg-3">
                                    <label class="col-form-label" for="foto"> Tahun </label>
                                </div>
                                <div class="col-sm-4 col-lg-8">
                                    <input type="date" name="tahun" class="form-control" required="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 col-lg-3">
                                    <label class="col-form-label" for="foto"> Foto </label>
                                </div>
                                <div class="col-sm-4 col-lg-8">
                                    <input type="file" name="foto" class="form-control" required="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button> 
                        <button type="reset" class="btn btn-danger">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<!-- END MODAL TAMBAH DATA PRESTASI-->

<!-- STAR MODAL EDIT DATA PRESTASI-->
     <div class="modal fade" id="Edit-Data-Prestasi">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Forum Edit Data Prestasi</h5><button type="button" class="btn btn-sm btn-label-danger btn-icon" data-bs-dismiss="modal"><i class="mdi mdi-close"></i></button>
                </div>
                <div class="modal-body">
                    <div class="Data_Prestasi_Edit"></div>
                </div>
            </div>
        </div>
    </div>
<!-- END MODAL EDIT DATA PRESTASI-->

<!-- STAR MODAL EDIT DATA PRODUK-->
     <div class="modal fade" id="Edit-Data-Produk1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Forum Edit Data Produk</h5><button type="button" class="btn btn-sm btn-label-danger btn-icon" data-bs-dismiss="modal"><i class="mdi mdi-close"></i></button>
                </div>
                <div class="modal-body">
                    <div class="Data_Produk_Edit"></div>
                </div>
            </div>
        </div>
    </div>
<!-- END MODAL EDIT DATA PRODUK-->


<!-- STAR MODAL EDIT DATA Maps/Tentang Kami-->
    <div class="modal fade" id="Tentang-KamiE">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Data Tentang Kami</h5><button type="button" class="btn btn-sm btn-label-danger btn-icon" data-bs-dismiss="modal"><i class="mdi mdi-close"></i></button>
                </div>
                <div class="modal-body">
                    <div class="Tentang_Kami_Edit"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<!-- END MODAL EDIT DATA MAPS/TENTANG KAMI-->


<!-- STAR MODAL TAMBAH DATA KEGIATAN-->
     <div class="modal fade" id="Tambah-Data-Kegiatan">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Forum Tambah Data Kegiatan</h5><button type="button" class="btn btn-sm btn-label-danger btn-icon" data-bs-dismiss="modal"><i class="mdi mdi-close"></i></button>
                </div>
                 <form method = "POST" action="admin.php?page=Kegiatan_S" data-parsley-validate enctype="multipart/form-data" class="form-sample">
                    <div class="modal-body">
                        <div class="d-grid gap-2">
                            <div class="row">
                                <div class="col-sm-4 col-lg-3">
                                    <label class="col-form-label" for="judul"> Judul Kegiatan </label>
                                </div>
                                <div class="col-sm-4 col-lg-8">
                                    <input type="text" class="form-control border-success" id="judul" name="judul_kegiatan" placeholder="Masukan Judul Kegiatan..." required="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 col-lg-3">
                                    <label class="col-form-label" for="tujuan"> Tujuan Kegiatan </label>
                                </div>
                                <div class="col-sm-4 col-lg-8">
                                   <textarea class="wysihtml5 form-control border-primary" id="tujuan" name="tujuan_kegiatan"> </textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 col-lg-3">
                                    <label class="col-form-label" for="ket"> Keterangan Kegiatan </label>
                                </div>
                                <div class="col-sm-4 col-lg-8">
                                   <textarea class="wysihtml5 form-control border-primary" id="ket" name="ket_kegiatan"> </textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 col-lg-3">
                                    <label class="col-form-label" for="tgl"> Tanggal Kegiatan </label>
                                </div>
                                <div class="col-sm-4 col-lg-8">
                                    <input type="date" name="tgl_kegiatan" class="form-control" required="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 col-lg-3">
                                    <label class="col-form-label" for="foto"> Foto </label>
                                </div>
                                <div class="col-sm-4 col-lg-8">
                                    <input type="file" name="foto_kegiatan" class="form-control" required="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button> 
                        <button type="reset" class="btn btn-danger">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<!-- END MODAL TAMBAH DATA PRESTASI-->

<!-- STAR MODAL EDIT DATA KEGIATAN-->
    <div class="modal fade" id="Edit-Data-Kegiatan">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Data Kegiatan</h5><button type="button" class="btn btn-sm btn-label-danger btn-icon" data-bs-dismiss="modal"><i class="mdi mdi-close"></i></button>
                </div>
                <div class="modal-body">
                    <div class="Data-Kegiatan-Edit"></div>
                </div>
            </div>
        </div>
    </div>
<!-- END MODAL EDIT KEGIATAN-->