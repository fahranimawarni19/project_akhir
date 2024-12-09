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
        <img class="w-100" src="pageuser/img/kegiatan.jpg" alt="Image">
        <div class="container text-center py-5 position-absolute top-50 start-50 translate-middle">       
        </div>
    </div> 
    <br>

    <!-- Page Header End -->
   <!-- HALAMAN DATA KEGIATAN -->
    <div class="container-xl py-8">
        <div class="container">
            <?php
                require_once 'z_config/Koneksi.php';

                $tampil= mysqli_query($con,"SELECT * FROM tb_kegiatan");
                while ($r = mysqli_fetch_array($tampil)) { 
            ?>
            <div class="row lg-12">
                <div class="col-lg-2 col-md-3 wow fadeInUp" data-wow-delay="0.1s">
                    <img class="img-fluid rounded" data-wow-delay="0.1s" src="img/Kegiatan/<?=$r[5]?>">
                </div>
                <div class="col-lg-10 col-md-3 wow fadeInUp" data-wow-delay="0.3s">
                    <p class="fs-11 fw-bold text-primary"><?=$r[4]?></p>
                    <h3 class="display-13 mb-2"><?=$r[1]?></h3>
                    <p class="mb-12" align="justify"><?=$r[3]?></p>
                    
                </div>
            </div>
             <?php } ?>
        </div>
    </div>

    <!-- END HALAMAN DATA KEGIATAN -->
