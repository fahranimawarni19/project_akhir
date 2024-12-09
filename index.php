<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Bank Sampah Bumi Lestari Maluku Mekar Laha</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link rel="shortcut icon" href="img/logo/favicon.ico">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;500&display=swap" rel="stylesheet">



    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="pageuser/lib/animate/animate.min.css" rel="stylesheet">
    <link href="pageuser/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="pageuser/lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="pageuser/css/bootstrap.min.css" rel="stylesheet">

    <!-- STRART SWEETALERT2 -->
  <link rel="stylesheet" href="pageuser/sweet2/sweetalert2.min.css">
  <script src="pageuser/sweet2/sweetalert2.min.js"></script>
  <!-- END SWEETALERT2 -->

   <!-- DataTables -->
    <link href="assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="assets/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" type="text/css" />

    <!-- Template Stylesheet -->
    <link href="pageuser/css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <div class="container-fluid bg-dark text-light px-0 py-2">
        <div class="row gx-0 d-none d-lg-flex">
            <div class="col-lg-7 px-5 text-start">
                <div class="h-100 d-inline-flex align-items-center me-4">
                    <span class="fa fa-phone-alt me-2"></span>
                    <a class="btn btn-link text-light" href="https://api.whatsapp.com/send/?phone=6281240691238&text&type=phone_number&app_absent=0">+62 821-9996-5654 (Ibu Tini)</a>
                </div>
                <div class="h-100 d-inline-flex align-items-center">
                    <span class="far fa-envelope me-2"></span>
                    <span>bumilestarimaluku9@gmail.com</span>
                </div>
            </div>
            <div class="col-lg-5 px-5 text-end">
                <div class="h-100 d-inline-flex align-items-center mx-n2">
                    <span>Follow Us:</span>
                    <a class="btn btn-link text-light" href="https://m.youtube.com/watch?si=97wz3oa06W8fUUd7&fbclid=PAZXh0bgNhZW0CMTEAAaanDIiySlvUG11vfBh6gXolWbeEEPIZ1w8FFNvlSPscs9xQAK4-jG50Flg_aem_mt4HhdBqC5dIAEF3fap4nw&v=iyMcUxP8TYQ&feature=youtu.be"><i class="fab fa-youtube"></i></a>
                    <a class="btn btn-link text-light" href="https://www.instagram.com/banksampah_blm.mekarlaha?igsh=eHh6dmpqNG05cXlx"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0">
        <?php include("z_config/User_Menu.php")?>
    </nav>
    <!-- Navbar End -->


    <!-- Carousel Start -->
   <!-- ======= Hero Section ======= -->
 

      <?php
        $direktori = "hal_user";
        $page = @$_GET['page'];
          if($page !="")
            include ("$direktori/$page.php");
          else
            include("$direktori/Beranda.php");
      ?>



    <!-- Bagian bawah start -->
    <div class="container-fluid bg-dark text-light footer mt-5 py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-6 col-md-6">
                    <h4 class="text-white mb-4">Alamat Kami</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>JI. Nuntati Desa Laha, Dusun Air Manis, RT/RW 002/004, Kec. Teluk Ambon, Kota Ambon, Provinsi Maluku 97236</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+62 821-9996-5654 (Ibu Tini)</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>banksampahblm@gmail.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-square btn-outline-light rounded-circle me-2" href="https://m.youtube.com/watch?si=97wz3oa06W8fUUd7&fbclid=PAZXh0bgNhZW0CMTEAAaanDIiySlvUG11vfBh6gXolWbeEEPIZ1w8FFNvlSPscs9xQAK4-jG50Flg_aem_mt4HhdBqC5dIAEF3fap4nw&v=iyMcUxP8TYQ&feature=youtu.be"><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-2" href="https://www.instagram.com/banksampah_blm.mekarlaha?igsh=eHh6dmpqNG05cXlx"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-4">Info BLM</h4>
                    <a class="btn btn-link" href="index.php?page=Tentang_Kami">Tentang Kami</a>
                    <a class="btn btn-link" href="index.php?page=Timbangan">Timbangan Sampah</a>
                    <!-- <a class="btn btn-link" href="#" class="dropdown-item">Berita & Publiksi</a> -->
                    <a class="btn btn-link" href="index.php?page=Prestasi_BLM">Prestasi BLM</a>
                    <a class="btn btn-link" href="index.php?page=Galeri" >Galeri</a>
                    <a class="btn btn-link" href="index.php?page=Produk">Produk</a>
                    <a class="btn btn-link" href="index.php?page=Program">Program</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <img src="img/logo/PT_Pertamina.png" width="100%" ><br><br>
                    <h5 class="text-white mb-4">Program CSR PT Pertamina Patra Niaga Aviation Fuel Terminal Pattimura</h5>
                </div>
            </div>
        </div>
    </div>
    <!-- bagian bawah end -->


    <!-- Copyright Start -->
    <div class="container-fluid copyright py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a class="border-bottom" href="https://bumilestarimalukulaha.com/">Bank Sampah Bumi Lestari Maluku</a>.
                </div>
                <div class="col-md-6 text-center text-md-end">
                   
                    <!-- Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML FM</a> -->
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright End -->


   <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries/link javascript -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="pageuser/lib/wow/wow.min.js"></script>
    <script src="pageuser/lib/easing/easing.min.js"></script>
    <script src="pageuser/lib/waypoints/waypoints.min.js"></script>
    <script src="pageuser/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="pageuser/lib/counterup/counterup.min.js"></script>
    <script src="pageuser/lib/parallax/parallax.min.js"></script>
    <script src="pageuser/lib/isotope/isotope.pkgd.min.js"></script>
    <script src="pageuser/lib/lightbox/js/lightbox.min.js"></script>

    <!-- Required datatable js/database jv codingan pemanggilan dalam folder-->
<script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>

<!-- Responsive examples/pembagi data jika mencapai maksimum -->
<script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>

<!-- Datatable init js -->
<script src="assets/js/pages/datatables-base.init.js"></script>
<script src="assets/js/pages/datatables-advanced.init.js"></script>

    <!-- Template Javascript -->
    <script src="pageuser/js/main.js"></script>
</body>

</html>