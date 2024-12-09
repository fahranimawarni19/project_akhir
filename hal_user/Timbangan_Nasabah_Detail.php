
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-3 text-white mb-4 animated slideInDown">Detail Data Timbangan</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <!-- <li class="breadcrumb-item"><a href="index.php?page=Dashboard">Dashboard</a></li> -->
                    <li class="breadcrumb-item"><a href="index.php?page=Timbangan">Timbangan Sampah</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detail Timbangan</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

   
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-2 align-items-center">
                <div class="row">
                    <div class="col-lg-12">
                      <div class="card px-2">
                        <?php

                        require_once 'z_config/Koneksi.php';
                        require_once 'z_config/tampil_hari.php';


                        $id=$_GET['id_nasabah'];

                        $No = 1;
                        $cari = mysqli_query($con,"SELECT tb_timbangan.id_timbangan, tb_timbangan.tgl_timbangan, tb_nasabah.id_nasabah, tb_nasabah.nama, tb_nasabah.alamat, tb_nasabah.dusun, tb_nasabah.rt_rw, tb_nasabah.tlp FROM tb_timbangan INNER JOIN tb_nasabah ON tb_timbangan.id_nasabah = tb_nasabah.id_nasabah WHERE tb_timbangan.id_nasabah = '$id'");
                        $r = mysqli_fetch_array($cari);
                        $jml = mysqli_num_rows($cari);


                        if ($jml == 0) {
                            echo "<div class=\"alert alert-danger\">
                                    Data Tidak ditemukan
                                </div>";
                        } else {
                        ?>
                      <div class="card-body">
                          <div class="container-fluid">
                            <h3 class="text-right my-5">Riwayat Timbangan Nasabah</h3>
                            <hr>
                          </div>
                          <div class="container-fluid d-flex justify-content-between">
                            <div class="col-lg-8 pl-0">
                                <table>
                                    <tr>
                                    <th> ID Nasabah </th>
                                    <td> : </td>
                                    <td><?=$r['id_nasabah']?> / <b><?=$r['nama']?></b> </td>
                                </tr>
                                <tr>
                                    <th> ID Timbangan </th>
                                    <td> : </td>
                                    <td><?=$r['id_timbangan']?></td>
                                </tr>
                                </table>
                            </div>
                            
                          </div>
                          <div class="container-fluid d-flex justify-content-between">
                            
                          </div>
                            <div class="container-fluid mt-5 d-flex justify-content-center w-100">
                                <div class="col-12">
                                   <table class="table dt-responsive nowrap w-100 table-hover table-striped">
                                        <thead>
                                            <tr bgcolor="#B6FCAC">
                                                <th>No</th>
                                                <th>Tanggal Timbang</th>
                                                <th>Jenis Sampah</th>
                                                <th class="text-center">Berat Sampah / Kg</th>
                                                <th class="text-center">Harga/Kg</th>
                                                <th class="text-center">Total Harga</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                            <?php 

                                            $total=0;
                                            // Output data dari setiap baris
                                           $tampil = mysqli_query($con,"SELECT * FROM tb_nasabah AS n JOIN tb_timbangan AS t ON n.id_nasabah = t.id_nasabah JOIN tb_detail_timbangan AS dt ON t.id_timbangan = dt.id_timbangan JOIN tb_sampah AS s ON dt.kode_sampah = s.kode_sampah WHERE n.id_nasabah = '$id'");
                                            while($rn = mysqli_fetch_array($tampil)) {

                                                $tanggal = date("l, j F Y", strtotime($rn['tgl_timbangan']));
                                                foreach ($hari_i as $en => $id) {
                                                    $tanggal = str_replace($en, $id, $tanggal);
                                                }
                                                foreach ($bulan_i as $en => $id) {
                                                    $tanggal = str_replace($en, $id, $tanggal);
                                                }
                                            echo"
                                            <tr>
                                                <td>$No</td>
                                                <td>$tanggal</td>
                                                <td>$rn[jenis_sampah]</td>
                                                <td class=\"text-center\" >$rn[berat]</td>
                                                "; ?>

                                                <td class="text-right"><?=rupiah($rn['harga']);?></td>
                                                <td class="text-right"><?=rupiah($rn['total_harga']);?></td>
                                            <?php echo "
                                            </tr>

                                            ";
                                            $No++;
                                            $total += $rn['total_harga'];
                                            
                                          }
                                        ?>
                                        <tr>
                                            <th colspan="5" class="text-right">Total Biaya Timbangan : </th>
                                            <th class="text-right mb-5"><?php echo rupiah($total);?></th>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                              <!-- <div class="container-fluid mt-2 w-100">
                                <h4 class="text-right mb-5">Total Timbangan: </h4>
                                <hr>
                              </div> -->
                              
                              <div class="container-fluid w-100">
                                <a href="index.php?page=Timbangan" class="btn btn-primary float-right mt-4 ml-2"><i class="mdi mdi-printer mr-1"></i> Kembali</a>
                              </div>
                          </div>
                      </div>
                  </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>