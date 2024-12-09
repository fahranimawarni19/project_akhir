<?php 

        require_once 'z_config/Koneksi.php';
        date_default_timezone_set('Asia/Jakarta');

        $hari = date("l"); // "l" akan menampilkan nama hari dalam bahasa Inggris (contoh: Monday)
        $tanggal = date("d"); // "d" akan menampilkan tanggal dalam format dua digit (01 hingga 31)
        $bulan = date("F"); // "F" akan menampilkan nama bulan dalam bahasa Inggris (contoh: January)
        $tahun = date("Y");

        // Mengonversi nama hari dan bulan ke bahasa Indonesia
        $hari_i = array(
            'Sunday' => 'Minggu',
            'Monday' => 'Senin',
            'Tuesday' => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday' => 'Kamis',
            'Friday' => 'Jumat',
            'Saturday' => 'Sabtu'
        );

        $bulan_i = array(
            'January' => 'Januari',
            'February' => 'Februari',
            'March' => 'Maret',
            'April' => 'April',
            'May' => 'Mei',
            'June' => 'Juni',
            'July' => 'Juli',
            'August' => 'Agustus',
            'September' => 'September',
            'October' => 'Oktober',
            'November' => 'November',
            'December' => 'Desember'
        );

        function rupiah($angka){
          $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
          return $hasil_rupiah;
          }

        // Mengganti nama hari dan bulan dengan versi Bahasa Indonesia
        $hari = $hari_i[$hari];
        $bulan = $bulan_i[$bulan];

        //qury untuk menampilkan data Timbangan nasabah secara kesuluruan berdasarkan id Timbangan   
?>
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <div>
                 <h4 class="fs-16 fw-semibold mb-1 mb-md-2"> <i class="fas fa-box"></i> DETAIL TIMBANGAN <span class="text-primary"> NASABAH BLM MEKAR LAHA</span></h4>
            </div>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="admin.php">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="admin.php?page=Timbangan_Nasabah">Timbangan Nasabah</a></li>
                    <li class="breadcrumb-item active">Detail Timbangan Nasabah </li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="row">
  <div class="col-lg-12">
      <div class="card px-2">
        <?php
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
            <h3 class="text-right my-5"><i class="fas fa-user-tag"></i> Nasabah <?=$r['nama']?></h3>
            <hr>
          </div>
          <div class="container-fluid d-flex justify-content-between">
            <div class="col-lg-3 pl-0">
                <table>
                    <tr>
                    <th> ID Nasabah </th>
                    <td> : </td>
                    <td><?=$r['id_nasabah']?></td>
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
            <div class="col-lg-3 pl-0">
              <p class="mb-0 mt-5"><?=$hari?> <?= $tanggal?> <?=$bulan?> <?=$tahun?></p>
            </div>
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
                <a href="C_lap_Timbangan.php?id_nasabah=<?=$r['id_nasabah']?>" class="btn btn-primary float-right mt-4 ml-2"><i class="mdi mdi-printer mr-1"></i> Print</a>
                <a href="admin.php?page=Tabungan" class="btn btn-success float-right mt-4"><i class="fas fa-hand-holding-usd"></i> Cek Tabungan</a>
              </div>
          </div>
      </div>
  </div>
</div>
<?php } ?>