  <?php

    require_once 'z_config/Koneksi.php';
    $tampil = mysqli_query($con,"SELECT * FROM tb_prestasi");
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
        <img class="w-100" src="pageuser/img/prestasi1.jpg" alt="Image">
        <div class="container text-center py-5 position-absolute top-50 start-50 translate-middle">            
        </div>
    </div> 
    <!-- Page Header End -->


    <!-- Team Start -->
    <div class="container-xl py-2">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="fs-5 fw-bold text-primary"> <i class="fa fa-award fa-1x text-primary mb-2"></i> Prestasi</p>
                <h2 class="display-18 mb-5">Bank Sampah Bumi Lestari Maluku Mekar Laha</h2>
            </div>
            <div class="row g-4">
                 <?php while ($r = mysqli_fetch_array($tampil)) 
                { ?>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item rounded">
                        <img class="img-fluid" src="img/Prestasi/<?=$r[4]?>" alt="">
                        <div class="team-text">
                            <h4 class="mb-15"><?=$r[1]?></h4>
                            <p class="text-primary"><?=$r[2]?></p>
                            <div class="team-social d-flex">
                               Tahun :  <?=$r[3]?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            </div>
        </div>
    </div>
    <!-- Team End -->
