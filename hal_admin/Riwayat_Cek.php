<?php 
require_once 'z_config/Koneksi.php';
require_once 'z_config/tampil_hari.php';

$id = $_GET['id_nasabah'];

// Mengambil data dari tb_penarikan berdasarkan id_nasabah
$query_penarikan = mysqli_query($con, "SELECT tb_penarikan.id_nasabah, tb_nasabah.nama, tb_nasabah.tlp, tb_tabungan.tabungan, tb_penarikan.jumlah, tb_penarikan.tanggal_tarik FROM tb_penarikan JOIN tb_tabungan ON tb_penarikan.id_tabungan = tb_tabungan.id_tabungan JOIN tb_nasabah ON tb_penarikan.id_nasabah = tb_nasabah.id_nasabah WHERE tb_penarikan.id_nasabah = '$id'");

// Menghitung total jumlah penarikan
$total_penarikan = 0;
while($r = mysqli_fetch_array($query_penarikan)) {
    $total_penarikan += $r['jumlah'];
}

// Mengambil sisa saldo dari tb_tabungan menggunakan JOIN
// Query untuk menggabungkan data dari tb_tabungan dan tb_nasabah
$tampil = mysqli_query($con,"SELECT tb_tabungan.id_tabungan, tb_tabungan.id_nasabah, tb_tabungan.tabungan, tb_nasabah.nama, tb_nasabah.alamat, tb_nasabah.tlp FROM tb_tabungan JOIN tb_nasabah ON tb_tabungan.id_nasabah = tb_nasabah.id_nasabah WHERE tb_tabungan.id_nasabah = '$id' GROUP BY tb_tabungan.id_tabungan");

$r_saldo = mysqli_fetch_array($tampil);
$sisa_saldo = $r_saldo['tabungan'];

?>

<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <div>
                 <h4 class="fs-16 fw-semibold mb-1 mb-md-2"><i class="fas fa-box"></i> Detail Riwayat <span class="text-primary"> PENARIKAN NASABAH BLM MEKAR LAHA</span></h4>
            </div>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="admin.php">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="">Riwayat</a></li>
                    <li class="breadcrumb-item"><a href="admin.php?page=Riwayat_Penarikan">Penarikan Nasabah</a></li>
                    <li class="breadcrumb-item active">Detail Riwayat Penarikan Nasabah</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="row">
  <div class="col-lg-12">
      <div class="card px-2">
        <div class="card-body">
                      
            <div class="container-fluid mt-5 d-flex justify-content-center w-100">
                <div class="col-12">
                   <table class="table dt-responsive nowrap w-100 table-hover table-striped">
                        <thead>
                            <tr bgcolor="#B6FCAC">
                                
                                <th>ID Nasabah</th>
                                <th>Nama</th>
                                <th>No Tlp</th>
                                <th class="text-center">Tanggal Penarikan</th>
                                <th class="text-center">Jumlah Penarikan</th>
                                <th class="text-center">Cetak Struk</th>
                          </tr>
                        </thead>
                        <tbody>
                         <?php
                            // Mengambil kembali data dari tb_penarikan untuk ditampilkan
                            $query_penarikan = mysqli_query($con, "SELECT tb_penarikan.id_nasabah,tb_penarikan.id_penarikan, tb_nasabah.nama, tb_nasabah.tlp, tb_tabungan.tabungan, tb_penarikan.jumlah, tb_penarikan.tanggal_tarik FROM tb_penarikan JOIN tb_tabungan ON tb_penarikan.id_tabungan = tb_tabungan.id_tabungan JOIN tb_nasabah ON tb_penarikan.id_nasabah = tb_nasabah.id_nasabah WHERE tb_penarikan.id_nasabah = '$id'");

                            // $i = 1;
                            while($r = mysqli_fetch_array($query_penarikan)) { ?>
                                <tr>
                                    
                                    <td><?php echo $r['id_nasabah']; ?></td>
                                    <td><?php echo $r['nama']; ?></td>
                                    <td><?php echo $r['tlp']; ?></td>
                                    <td class="text-center"><?php echo $r['tanggal_tarik']; ?></td>
                                    <td class="text-center"><?php echo rupiah($r['jumlah']); ?></td>
                                    <td align="center">
                                        <a href="admin.php?page=Struk&id_penarikan=<?=$r['id_penarikan']?>" class="btn btn-primary"><i class="mdi mdi-printer mr-1"></i> Print</a>
                                    </td>
                                </tr>
                        
                            
                         <?php } ?>
                        <tr>
                            <th colspan="4" class="text-right">Sisa Saldo </th>
                            <th class="text-center"><?= rupiah($sisa_saldo) ?></th>
                            <th class="text-center">
                                <a href="admin.php?page=Tabungan" class="btn btn-success"><i class="fas fa-hand-holding-usd"></i> Cek Tabungan</a>
                            </th>
                        </tr>
                        <tr>
                            
                            <td colspan="4" class="text-right">
                                
                            </td>
                            <td class="text-right mb-5">
                                <div class="container-fluid w-100">

                                    
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
             
          </div>

        </div>
    </div>
</div>
