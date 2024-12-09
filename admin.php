<?php
     session_start();
  
  if(empty($_SESSION['nik']))
  {
    echo "
      <script language=\"javascript\">
        window.location='login.php';
      </script>
    ";
  }
  else
  {
  require_once'z_config/Koneksi.php';
      $nik = $_SESSION ['nik'];
      $Jabatan = $_SESSION ['Jabatan'];

      $tampil = mysqli_query($con,"SELECT * FROM tb_pengurus WHERE nik = '$nik'");
      $r = mysqli_fetch_array($tampil);

     if ($r[9]=='Ya') {
        $Hak = "<label class=\"badge badge-success\" data-toggle=\"tooltip\" data-placement=\"bottom\" title=\"Diizinkan\"><i class=\"fa fa-check\"></i></label>";
      }else{
        $Hak = "<label class=\"badge badge-danger\" data-toggle=\"tooltip\" data-placement=\"bottom\" title=\"Tidak Diizinkan\"><i class=\"fa fa-check\"></i></label>";
      }
?>

<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Bank Sampah Bumi Lestari Maluku</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Bank Sampah" name="Bank-Sampah" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="img/logo/favicon.ico">

    <link href="assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css">

    <!-- dark layout js -->
    <script src="assets/js/pages/layout.js"></script>
    
    <!--bootstrap-wysihtml5-->
    <link rel="stylesheet" type="text/css" href="assets/libs/bootstrap-wysihtml5/bootstrap-wysihtml5.css" />

    <!-- Sweet Alert-->
    <link rel="stylesheet" href="assets/libs/sweetalert2/sweetalert2.min.css">
    <!-- Sweet Alerts js -->
    <script src="assets/libs/sweetalert2/sweetalert2.min.js"></script>
    <!-- Sweet alert init js-->
    <script src="assets/js/pages/sweet-alerts.init.js"></script>

    <!-- DataTables -->
    <link href="assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="assets/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- simplebar css -->
    <link href="assets/libs/simplebar/simplebar.min.css" rel="stylesheet">
    <!-- App Css-->
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

      <!-- slick-carousel css -->
    <link rel="stylesheet" href="assets/libs/slick-carousel/slick/slick-theme.css">
    <link rel="stylesheet" href="assets/libs/slick-carousel/slick/slick.css">

</head>

<body>

<div id="layout-wrapper">

    
    <!-- Start topbar -->
    <header id="page-topbar">
        <div class="navbar-header">
            <?php include("z_config/Header.php")?>
        </div>
    </header>
    <!-- End topbar -->

    <!-- ========== Left Sidebar Start ========== -->
    <div class="sidebar-left">
        <?php include("z_config/Menu.php")?>
        
    </div>
    <!-- Left Sidebar End -->


    <!-- Start right Content here -->

    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <?php
                    $direktori = "hal_admin";
                    $page = @$_GET['page'];
                      if($page !="")
                        include ("$direktori/$page.php");
                      else
                        include("$direktori/Dashboard.php");
                  ?>
                
            </div>
            <!-- end container-fluid -->
        </div>
        <!-- End Page-content -->

        <footer class="footer">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <script>document.write(new Date().getFullYear())</script> ©BankSampahBLM.
                    </div>
                    <div class="col-sm-6">
                        <div class="text-sm-end d-none d-sm-block">
                            Crafted with <i class="mdi mdi-heart text-danger"></i> by <a href="http://codebucks.in/" target="_blank" class="text-muted">FM</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

    </div>
    <!-- end main content-->
</div>
<!-- end layout-wrapper -->


<div class="custom-setting bg-primary pe-0 d-flex flex-column rounded-start">
    <!-- <button type="button" class="btn btn-wide border-0 text-white fs-20 avatar-sm rounded-end-0" id="light-dark-mode">
        <i class="mdi mdi-brightness-7 align-middle"></i>
        <i class="mdi mdi-white-balance-sunny align-middle"></i>
    </button> -->
    <button type="button" class="btn btn-wide border-0 text-white fs-20 avatar-sm" data-toggle="fullscreen">
        <i class="mdi mdi-arrow-expand-all align-middle"></i>
    </button>
</div>


<!-- Rightbar Sidebar -->
    <!-- <div class="offcanvas offcanvas-end" id="offcanvas-rightsidabar">
        <div class="card h-100 rounded-0" data-simplebar="init">
            <div class="card-header bg-light">
                <h6 class="card-title text-uppercase">Calender</h6>
                <div class="card-addon">
                    <button class="btn btn-label-danger" data-bs-dismiss="offcanvas">
                        <i class="fa fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="">
                    <h3 class="card-title">Company summary</h3>
                    <div class="border rounded p-2">
                        <p class="text-muted mb-2">Server Load</p>
                        <h4 class="fs-16 mb-2">489</h4>
                        <div class="progress progress-sm" style="height:4px;">
                            <div class="progress-bar bg-success" style="width: 49.4%"></div>
                        </div>
                        <p class="text-muted mb-0 mt-1">49.4% <span>Avg</span></p>
                    </div>
                    <div class="border rounded p-2">
                        <p class="text-muted mb-2">Members online</p>
                        <h4 class="fs-16 mb-2">3,450</h4>
                        <div class="progress progress-sm" style="height:4px;">
                            <div class="progress-bar bg-danger" style="width: 34.6%"></div>
                        </div>
                        <p class="text-muted mb-0 mt-1">34.6% <span>Avg</span></p>
                    </div>
                    <div class="border rounded p-2">
                        <p class="text-muted mb-2">Today's revenue</p>
                        <h4 class="fs-16 mb-2">$18,390</h4>
                        <div class="progress progress-sm" style="height:4px;">
                            <div class="progress-bar bg-warning" style="width: 20%"></div>
                        </div>
                        <p class="text-muted mb-0 mt-1">$37,578 <span>Avg</span></p>
                    </div>
                    <div class="border rounded p-2">
                        <p class="text-muted mb-2">Expected profit</p>
                        <h4 class="fs-16 mb-2">$23,461</h4>
                        <div class="progress progress-sm" style="height:4px;">
                            <div class="progress-bar bg-info" style="width: 60%"></div>
                        </div>
                        <p class="text-muted mb-0 mt-1">$23,461 <span>Avg</span></p>
                    </div>
                </div>

                <div class="mt-4">
                    <h3 class="card-title">Latest log</h3>
                    <div class="timeline">
                        <div class="timeline-item">
                            <div class="timeline-pin"><i class="marker marker-dot text-primary"></i></div>
                            <div class="timeline-content">
                                <div class="d-flex justify-content-between">
                                    <p class="mb-0">12 new users registered</p>
                                    <span class="text-muted">Just now</span>
                                </div>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-pin"><i class="marker marker-dot text-success"></i></div>
                            <div class="timeline-content">
                                <div class="d-flex justify-content-between">
                                    <p class="mb-0">System shutdown <span class="badge badge-label-success">pending</span></p>
                                    <span class="text-muted">2 mins</span>
                                </div>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-pin"><i class="marker marker-dot text-primary"></i></div>
                            <div class="timeline-content">
                                <div class="d-flex justify-content-between">
                                    <p class="mb-0">New invoice received</p>
                                    <span class="text-muted">3 mins</span>
                                </div>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-pin"><i class="marker marker-dot text-danger"></i></div>
                            <div class="timeline-content">
                                <div class="d-flex justify-content-between">
                                    <p class="mb-0">New order received <span class="badge badge-label-danger">urgent</span></p>
                                    <span class="text-muted">10 mins</span>
                                </div>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-pin"><i class="marker marker-dot text-warning"></i></div>
                            <div class="timeline-content">
                                <div class="d-flex justify-content-between">
                                    <p class="mb-0">Production server down</p>
                                    <span class="text-muted">1 hrs</span>
                                </div>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-pin"><i class="marker marker-dot text-info"></i></div>
                            <div class="timeline-content">
                                <div class="d-flex justify-content-between">
                                    <p class="mb-0">System error <a href="#">check</a></p>
                                    <span class="text-muted">2 hrs</span>
                                </div>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-pin"><i class="marker marker-dot text-secondary"></i></div>
                            <div class="timeline-content">
                                <div class="d-flex justify-content-between">
                                    <p class="mb-0">DB overloaded 80%</p>
                                    <span class="text-muted">5 hrs</span>
                                </div>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-pin"><i class="marker marker-dot text-success"></i></div>
                            <div class="timeline-content">
                                <div class="d-flex justify-content-between">
                                    <p class="mb-0">Production server up</p>
                                    <span class="text-muted">6 hrs</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <h3 class="card-title">Upcoming activities</h3>
                    <div class="timeline timeline-timed">
                        <div class="timeline-item">
                            <span class="timeline-time">10:00</span>
                            <div class="timeline-pin"><i class="marker marker-circle text-primary"></i></div>
                            <div class="timeline-content">
                                <div>
                                    <span>Meeting with</span>
                                    <div class="avatar-group ms-2">
                                        <div class="avatar avatar-circle">
                                            <img src="assets/images/users/avatar-1.png" alt="Avatar image" class="avatar-2xs" />
                                        </div>
                                        <div class="avatar avatar-circle">
                                            <img src="assets/images/users/avatar-2.png" alt="Avatar image" class="avatar-2xs" />
                                        </div>
                                        <div class="avatar avatar-circle">
                                            <img src="assets/images/users/avatar-3.png" alt="Avatar image" class="avatar-2xs" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <span class="timeline-time">12:45</span>
                            <div class="timeline-pin"><i class="marker marker-circle text-warning"></i></div>
                            <div class="timeline-content">
                                <p class="mb-0">Lorem ipsum dolor sit amit,consectetur eiusmdd tempor incididunt ut labore et dolore magna elit enim at minim veniam quis nostrud</p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <span class="timeline-time">14:00</span>
                            <div class="timeline-pin"><i class="marker marker-circle text-danger"></i></div>
                            <div class="timeline-content">
                                <p class="mb-0">Received a new feedback on <a href="#">GoFinance</a> App product.</p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <span class="timeline-time">15:20</span>
                            <div class="timeline-pin"><i class="marker marker-circle text-success"></i></div>
                            <div class="timeline-content">
                                <p class="mb-0">Lorem ipsum dolor sit amit,consectetur eiusmdd tempor incididunt ut labore et dolore magna.</p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <span class="timeline-time">17:00</span>
                            <div class="timeline-pin"><i class="marker marker-circle text-info"></i></div>
                            <div class="timeline-content">
                                <p class="mb-0">Make Deposit <a href="#">USD 700</a> o ESL.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div> -->
 <!-- end card-->
<!-- JAVASCRIPT -->
<script src="assets/libs/jquery/jquery.min.js"></script>
<script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/libs/metismenu/metisMenu.min.js"></script>
<script src="assets/libs/simplebar/simplebar.min.js"></script>
<script src="assets/libs/node-waves/waves.min.js"></script>

<!-- Required datatable js -->
<script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>

<!-- Responsive examples -->
<script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>

<!-- Datatable init js -->
<script src="assets/js/pages/datatables-base.init.js"></script>
<script src="assets/js/pages/datatables-advanced.init.js"></script>

<!-- bs custom file input plugin -->
<script src="assets/libs/bs-custom-file-input/bs-custom-file-input.min.js"></script>

<!-- apexcharts -->
<script src="assets/libs/apexcharts/apexcharts.min.js"></script>

<script src="assets/js/pages/dashboard.init.js"></script>

<script src="assets/libs/select2/js/select2.min.js"></script>

<script src="assets/js/pages/form-select2.init.js"></script>

<!-- slick-carousel js -->
<script src="assets/libs/slick-carousel/slick/slick.min.js"></script>

<!-- slick-carousel init js -->
<script src="assets/js/pages/slick-carousel.init.js"></script>

<!-- App js -->
<script src="assets/js/app.js"></script>


<!-- STAR TEXT EDITOR -->
    <script src="assets/libs/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
    <script src="assets/libs/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>

    <script>

       jQuery(document).ready(function(){
            $('.wysihtml5').wysihtml5();

            $('.summernote').summernote({
                height: 200,                 // set editor height

                minHeight: null,             // set minimum height of editor
                maxHeight: null,             // set maximum height of editor

                focus: true                 // set focus to editable area after initializing summernote
            });
        });

    </script>
<!-- END TEXT EDITOR -->

<!-- MODAL HAPUS DATA PENGURUS -->
    <script>
        function PengurusHapus(nik) {
            // Display SweetAlert confirmation dialog
            Swal.fire({
                title: 'Konfirmasi',
                text: 'Apakah Anda ingin menghapus data ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Hapus',
                cancelButtonText: 'Batal'
            }).then((result) => {
                // If user clicks 'Ya, Hapus'
                if (result.isConfirmed) {
                    // Menggunakan AJAX untuk menghapus data
                    $.ajax({
                        url: 'admin.php?page=Pengurus_H&nik=' + nik,
                        type: 'POST',
                        data: { nik: nik },
                        success: function(nik) {
                            // Jika penghapusan berhasil
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: 'Data Berhasil Dihapus!'
                            }).then((result) => {
                                // Refresh tabel setelah penghapusan berhasil
                                location.reload();
                            });
                        },
                        error: function(xhr, status, error) {
                            // Jika terjadi kesalahan
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal',
                                text: 'Terjadi kesalahan saat menghapus data!'
                            });
                        }
                    });
                }
            });
        }
    </script>
<!-- END MODAL HAPUS DATA PENGURUS -->

<!-- MODAL HAPUS DATA NASABAH -->
    <script>
        function NasabahHapus(id_nasabah) {
            // Display SweetAlert confirmation dialog
            Swal.fire({
                title: 'Konfirmasi',
                text: 'Apakah Anda ingin menghapus data ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Hapus',
                cancelButtonText: 'Batal'
            }).then((result) => {
                // If user clicks 'Ya, Hapus'
                if (result.isConfirmed) {
                    // Menggunakan AJAX untuk menghapus data
                    $.ajax({
                        url: 'admin.php?page=Nasabah_H&id_nasabah=' + id_nasabah,
                        type: 'POST',
                        data: { id_nasabah: id_nasabah },
                        success: function(id_nasabah) {
                            // Jika penghapusan berhasil
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: 'Data Berhasil Dihapus!'
                            }).then((result) => {
                                // Refresh tabel setelah penghapusan berhasil
                                location.reload();
                            });
                        },
                        error: function(xhr, status, error) {
                            // Jika terjadi kesalahan
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal',
                                text: 'Terjadi kesalahan saat menghapus data!'
                            });
                        }
                    });
                }
            });
        }
    </script>
<!-- END MODAL HAPUS DATA NASABAH -->

<!-- MODAL HAPUS DATA SAMPAH -->
    <script>
        function HapusDataSampah(kodeSampah) {
            // Display SweetAlert confirmation dialog
            Swal.fire({
                title: 'Konfirmasi',
                text: 'Apakah Anda ingin menghapus data ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Hapus',
                cancelButtonText: 'Batal'
            }).then((result) => {
                // If user clicks 'Ya, Hapus'
                if (result.isConfirmed) {
                    // Menggunakan AJAX untuk menghapus data
                    $.ajax({
                        url: 'admin.php?page=DataSampah_H&kode_sampah=' + kodeSampah,
                        type: 'POST',
                        data: { kode_sampah: kodeSampah },
                        success: function(response) {
                            // Jika penghapusan berhasil
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: 'Data Berhasil Dihapus!'
                            }).then((result) => {
                                // Refresh tabel setelah penghapusan berhasil
                                location.reload();
                            });
                        },
                        error: function(xhr, status, error) {
                            // Jika terjadi kesalahan
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal',
                                text: 'Terjadi kesalahan saat menghapus data!'
                            });
                        }
                    });
                }
            });
        }
    </script>
<!-- MODAL HAPUS DATA SAMPAH -->

<!-- MODAL HAPUS DATA PRODUK -->
    <script>
        function HapusDataProduk(id_produk) {
            // Display SweetAlert confirmation dialog
            Swal.fire({
                title: 'Konfirmasi',
                text: 'Apakah Anda ingin menghapus data ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Hapus',
                cancelButtonText: 'Batal'
            }).then((result) => {
                // If user clicks 'Ya, Hapus'
                if (result.isConfirmed) {
                    // Menggunakan AJAX untuk menghapus data
                    $.ajax({
                        url: 'admin.php?page=Produk_H&id_produk=' + id_produk,
                        type: 'POST',
                        data: { id_produk: id_produk },
                        success: function(response) {
                            // Jika penghapusan berhasil
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: 'Data Berhasil Dihapus!'
                            }).then((result) => {
                                // Refresh tabel setelah penghapusan berhasil
                                location.reload();
                            });
                        },
                        error: function(xhr, status, error) {
                            // Jika terjadi kesalahan
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal',
                                text: 'Terjadi kesalahan saat menghapus data!'
                            });
                        }
                    });
                }
            });
        }
    </script>
<!-- MODAL HAPUS DATA PRODUK -->

<!-- MODAL HAPUS DATA KEGIATAN -->
    <script>
        function HapusDataPrestasi(id_prestasi) {
            // Display SweetAlert confirmation dialog
            Swal.fire({
                title: 'Konfirmasi',
                text: 'Apakah Anda ingin menghapus data ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Hapus',
                cancelButtonText: 'Batal'
            }).then((result) => {
                // If user clicks 'Ya, Hapus'
                if (result.isConfirmed) {
                    // Menggunakan AJAX untuk menghapus data
                    $.ajax({
                        url: 'admin.php?page=Prestasi_H&id_prestasi=' + id_prestasi,
                        type: 'POST',
                        data: { id_prestasi: id_prestasi },
                        success: function(response) {
                            // Jika penghapusan berhasil
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: 'Data Berhasil Dihapus!'
                            }).then((result) => {
                                // Refresh tabel setelah penghapusan berhasil
                                location.reload();
                            });
                        },
                        error: function(xhr, status, error) {
                            // Jika terjadi kesalahan
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal',
                                text: 'Terjadi kesalahan saat menghapus data!'
                            });
                        }
                    });
                }
            });
        }
    </script>
<!-- MODAL HAPUS DATA PRODUK -->

<!-- MODAL HAPUS TABEL SEMENTARA -->
    <script>
        function TabSemenHapus(kode_sampah) {
            // Display SweetAlert confirmation dialog
            Swal.fire({
                title: 'Konfirmasi',
                text: 'Apakah Anda ingin menghapus data ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Hapus',
                cancelButtonText: 'Batal'
            }).then((result) => {
                // If user clicks 'Ya, Hapus'
                if (result.isConfirmed) {
                    // Menggunakan AJAX untuk menghapus data
                    $.ajax({
                        url: 'admin.php?page=Timbangan_HS&kode_sampah=' + kode_sampah,
                        type: 'POST',
                        data: { kode_sampah: kode_sampah },
                        success: function(kode_sampah) {
                            // Jika penghapusan berhasil
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: 'Data Berhasil Dihapus!'
                            }).then((result) => {
                                // Refresh tabel setelah penghapusan berhasil
                                location.reload();
                            });
                        },
                        error: function(xhr, status, error) {
                            // Jika terjadi kesalahan
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal',
                                text: 'Terjadi kesalahan saat menghapus data!'
                            });
                        }
                    });
                }
            });
        }
    </script>
<!-- END MODAL HAPUS TABEL SEMENTARA -->

<!-- MODAL HAPUS DATA TENTANG KAMI -->
    <script>
        function HapusTentangKami(id_tentang_kami) {
            // Display SweetAlert confirmation dialog
            Swal.fire({
                title: 'Konfirmasi',
                text: 'Apakah Anda ingin menghapus data ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Hapus',
                cancelButtonText: 'Batal'
            }).then((result) => {
                // If user clicks 'Ya, Hapus'
                if (result.isConfirmed) {
                    // Menggunakan AJAX untuk menghapus data
                    $.ajax({
                        url: 'admin.php?page=Tentang_Kami_H&id_tentang_kami=' + id_tentang_kami,
                        type: 'POST',
                        data: { id_tentang_kami: id_tentang_kami },
                        success: function(id_tentang_kami) {
                            // Jika penghapusan berhasil
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: 'Data Berhasil Dihapus!'
                            }).then((result) => {
                                // Refresh tabel setelah penghapusan berhasil
                                location.reload();
                            });
                        },
                        error: function(xhr, status, error) {
                            // Jika terjadi kesalahan
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal',
                                text: 'Terjadi kesalahan saat menghapus data!'
                            });
                        }
                    });
                }
            });
        }
    </script>
<!-- END MODAL HAPUS DATA TENTANG KAMI -->

<!-- MODAL HAPUS DATA KEGIATAN -->
    <script>
        function HapusDataKegiatan(id_kegiatan) {
            // Display SweetAlert confirmation dialog
            Swal.fire({
                title: 'Konfirmasi',
                text: 'Apakah Anda ingin menghapus data ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Hapus',
                cancelButtonText: 'Batal'
            }).then((result) => {
                // If user clicks 'Ya, Hapus'
                if (result.isConfirmed) {
                    // Menggunakan AJAX untuk menghapus data
                    $.ajax({
                        url: 'admin.php?page=Kegiatan_H&id_kegiatan=' + id_kegiatan,
                        type: 'POST',
                        data: { id_kegiatan: id_kegiatan },
                        success: function(id_kegiatan) {
                            // Jika penghapusan berhasil
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: 'Data Berhasil Dihapus!'
                            }).then((result) => {
                                // Refresh tabel setelah penghapusan berhasil
                                location.reload();
                            });
                        },
                        error: function(xhr, status, error) {
                            // Jika terjadi kesalahan
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal',
                                text: 'Terjadi kesalahan saat menghapus data!'
                            });
                        }
                    });
                }
            });
        }
    </script>
<!-- END MODAL HAPUS DATA TENTANG KAMI -->


<!-- MODAL HAPUS GALERI/DOKUMENTASI -->
    <script>
        function HapusDokumentasi(id_dokumentasi) {
            // Display SweetAlert confirmation dialog
            Swal.fire({
                title: 'Konfirmasi',
                text: 'Apakah Anda ingin menghapus data ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Hapus',
                cancelButtonText: 'Batal'
            }).then((result) => {
                // If user clicks 'Ya, Hapus'
                if (result.isConfirmed) {
                    // Menggunakan AJAX untuk menghapus data
                    $.ajax({
                        url: 'admin.php?page=Galeri_H&id_dokumentasi=' + id_dokumentasi,
                        type: 'POST',
                        data: { id_dokumentasi: id_dokumentasi },
                        success: function(id_dokumentasi) {
                            // Jika penghapusan berhasil
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: 'Data Berhasil Dihapus!'
                            }).then((result) => {
                                // Refresh tabel setelah penghapusan berhasil
                                location.reload();
                            });
                        },
                        error: function(xhr, status, error) {
                            // Jika terjadi kesalahan
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal',
                                text: 'Terjadi kesalahan saat menghapus data!'
                            });
                        }
                    });
                }
            });
        }
    </script>
<!-- END MODAL HAPUS DOKUMENTASI/GALERI -->

<!-- SCRIPT MODAL EDIT DATA PENGURUS -->
    <script type="text/javascript">
        $(document).ready(function(){
          //Modal Edit Login
          $('#Modal-Edit-Pengurus').on('show.bs.modal', function(e){
            var idx=$(e.relatedTarget).data('id');

            $.ajax({
              type : 'POST',
              url  : 'hal_admin/Pengurus_E.php',
              data : 'idx='+idx,
              success : function(data){
                $('.Edit-Pengurus').html(data);
                }
            });
          });

        });
    </script>
<!-- END SCRIPT MODAL EDIT DATA PENGURUS  -->

<!-- SCRIPT MODAL PENARIKAN TABUNGAN -->
    <script type="text/javascript">
        $(document).ready(function(){
          //Modal Edit Login
          $('#Penarikan').on('show.bs.modal', function(e){
            var idx=$(e.relatedTarget).data('id');

            $.ajax({
              type : 'POST',
              url  : 'hal_admin/Penarikan.php',
              data : 'idx='+idx,
              success : function(data){
                $('.Penarikan-Tab').html(data);
                }
            });
          });

        });
    </script>
<!-- END SCRIPT MODAL PENARIKAN TABUNGAN  -->

<!-- SCRIPT MODAL EDIT DATA NASABAH -->
    <script type="text/javascript">
        $(document).ready(function(){
          //Modal Edit Login
          $('#Modal-Edit-Nasabah1').on('show.bs.modal', function(e){
            var idx=$(e.relatedTarget).data('id');

            $.ajax({
              type : 'POST',
              url  : 'hal_admin/Nasabah_E.php',
              data : 'idx='+idx,
              success : function(data){
                $('.Edit-Nasabah1').html(data);
                }
            });
          });

        });
    </script>
<!-- END SCRIPT MODAL EDIT DATA NASABAH  -->

<!-- SCRIPT MODAL EDIT PASSWORD -->
    <script type="text/javascript">
        $(document).ready(function(){
          //Modal Edit Login
          $('#Modal-Ganti-Password1').on('show.bs.modal', function(e){
            var idx=$(e.relatedTarget).data('id');

            $.ajax({
              type : 'POST',
              url  : 'hal_admin/Ubah_Pass.php',
              data : 'idx='+idx,
              success : function(data){
                $('.Ganti-Password').html(data);
                }
            });
          });

        });
    </script>
<!-- END SCRIPT MODAL EDIT PASSWORD -->

<!-- SCRIPT MODAL EDIT FOTO -->
    <script type="text/javascript">
        $(document).ready(function(){
          //Modal Edit Login
          $('#Modal-Ganti-FotoPengurus1').on('show.bs.modal', function(e){
            var idx=$(e.relatedTarget).data('id');

            $.ajax({
              type : 'POST',
              url  : 'hal_admin/PengurusFoto.php',
              data : 'idx='+idx,
              success : function(data){
                $('.Pengurus-Ganti-Foto').html(data);
                }
            });
          });

        });
    </script>
<!-- END SCRIPT EDIT GANTI FOTO -->

<!-- SCRIPT MODAL EDIT DATA SAMPAH -->
    <script type="text/javascript">
        $(document).ready(function(){
          //Modal Edit Login
          $('#Edit-Data-Sampah1').on('show.bs.modal', function(e){
            var idx=$(e.relatedTarget).data('id');

            $.ajax({
              type : 'POST',
              url  : 'hal_admin/DataSampah_E.php',
              data : 'idx='+idx,
              success : function(data){
                $('.Data_Sampah_Edit').html(data);
                }
            });
          });

        });
    </script>

<!-- SCRIPT MODAL EDIT DATA TENTANG KAMI -->
    <script type="text/javascript">
        $(document).ready(function(){
          //Modal Edit Login
          $('#Tentang-KamiE').on('show.bs.modal', function(e){
            var idx=$(e.relatedTarget).data('id');

            $.ajax({
              type : 'POST',
              url  : 'hal_admin/Tentang_Kami_E.php',
              data : 'idx='+idx,
              success : function(data){
                $('.Tentang_Kami_Edit').html(data);
                }
            });
          });

        });
    </script>
<!-- END SCRIPT EDIT DATA TENTANG KAMI -->

<!-- SCRIPT MODAL EDIT DATA KEGIATAN-->
    <script type="text/javascript">
        $(document).ready(function(){
          //Modal Edit Kegiatan
          $('#Edit-Data-Kegiatan').on('show.bs.modal', function(e){
            var idx=$(e.relatedTarget).data('id');

            $.ajax({
              type : 'POST',
              url  : 'hal_admin/Kegiatan_E.php',
              data : 'idx='+idx,
              success : function(data){
                $('.Data-Kegiatan-Edit').html(data);
                }
            });
          });

        });
    </script>
<!-- END SCRIPT EDIT DATA KEGIATAN-->


<!-- SCRIPT MODAL EDIT DATA PRODUK-->
    <script type="text/javascript">
        $(document).ready(function(){
          //Modal Edit Login
          $('#Edit-Data-Produk1').on('show.bs.modal', function(e){
            var idx=$(e.relatedTarget).data('id');

            $.ajax({
              type : 'POST',
              url  : 'hal_admin/Produk_E.php',
              data : 'idx='+idx,
              success : function(data){
                $('.Data_Produk_Edit').html(data);
                }
            });
          });

        });
    </script>
<!-- END SCRIPT EDIT DATA PRODUK-->

<!-- SCRIPT MODAL EDIT GALERI-->
    <script type="text/javascript">
        $(document).ready(function(){
          //Modal Edit Login
          $('#Edit-Galeri').on('show.bs.modal', function(e){
            var idx=$(e.relatedTarget).data('id');

            $.ajax({
              type : 'POST',
              url  : 'hal_admin/Galeri_E.php',
              data : 'idx='+idx,
              success : function(data){
                $('.Edit-Galeri-Dok').html(data);
                }
            });
          });

        });
    </script>
<!-- END SCRIPT EDIT GALERI-->

<!-- SCRIPT MODAL EDIT GALERI-->
    <script type="text/javascript">
        $(document).ready(function(){
          //Modal Edit Login
          $('#Edit-Data-Prestasi').on('show.bs.modal', function(e){
            var idx=$(e.relatedTarget).data('id');

            $.ajax({
              type : 'POST',
              url  : 'hal_admin/Prestasi_E.php',
              data : 'idx='+idx,
              success : function(data){
                $('.Data_Prestasi_Edit').html(data);
                }
            });
          });

        });
    </script>
<!-- END SCRIPT EDIT GALERI-->


</body>

</html>
<?php
}
?>