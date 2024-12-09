<?php

    require_once 'z_config/Koneksi.php';
    $tampil = mysqli_query($con,"SELECT * FROM tb_produk");
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
        <img class="w-100" src="pageuser/img/new.jpg" alt="Image">
        <div class="container text-center py-5 position-absolute top-50 start-50 translate-middle">
            <h1 class="display-3 text-white mb-4 animated slideInDown">Produk BLM</h1>
            
        </div>
    </div>
    <!-- Page Header End -->


<!-- Produk Bank Sampah -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h1 class="display-5 mb-5">Echo Produk Bank Sampah Bumi Lestari Maluku Mekar Laha</h1>
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