<?php

    require_once 'z_config/Koneksi.php';
    $tampil = mysqli_query($con,"SELECT * FROM tb_dokumentasi");
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
        <img class="w-100" src="pageuser/img/genbi.jpg" alt="Image">
        <div class="container text-center py-5 position-absolute top-50 start-50 translate-middle">       
        </div>
    </div> 
    <br>
    <!-- Page Header End -->


    <!-- Projects Start -->
    <div class="container-xxl py-1">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h4 class="display-13 mb-4">Dokumentasi Kegiatan Bank Sampah Bumi Lestari Maluku Mekar Laha</h4>
            </div>
            <div class="row g-4 portfolio-container">
                <?php while ($r = mysqli_fetch_array($tampil)) 
                { ?>
                <div class="col-lg-4 col-md-6 portfolio-item first wow fadeInUp" data-wow-delay="0.1s">
                    <div class="portfolio-inner rounded">
                        <img class="img-fluid" src="img/Dokumentasi/<?=$r[2]?>" alt="">
                        <div class="team-text">
                            <table>
                                <tr align="center">
                                    <th><p class="text-primary" align="center"><?=$r[1]?></p></th>
                                </tr>
                            </table>
                                                        
                        </div>
                        <div class="portfolio-text">
                            <div class="d-flex">
                                <a class="btn btn-lg-square rounded-circle mx-2" href="img/Dokumentasi/<?=$r[2]?>" data-lightbox="portfolio" title="<?=$r[1]?>"><i class="fa fa-eye"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
                
            </div>
        </div>
    </div>
<!-- Projects End -->