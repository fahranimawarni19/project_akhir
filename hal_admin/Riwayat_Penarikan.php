<?php
    require_once 'z_config/Koneksi.php';
    require_once 'z_config/tampil_hari.php';

    // Perform the join query

$query = mysqli_query($con, "SELECT tb_penarikan.id_nasabah, tb_nasabah.nama, tb_nasabah.tlp, tb_tabungan.tabungan, SUM(tb_penarikan.jumlah) AS total_penarikan, MAX(tb_penarikan.tanggal_tarik) AS terakhir_tarik FROM tb_penarikan JOIN tb_tabungan ON tb_penarikan.id_tabungan = tb_tabungan.id_tabungan JOIN tb_nasabah ON tb_penarikan.id_nasabah = tb_nasabah.id_nasabah GROUP BY tb_penarikan.id_nasabah");

?>

<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <div>
                 <h4 class="fs-16 fw-semibold mb-1 mb-md-2"> <i class="fas fa-bookmark"></i> DATA RIWAYAT <span class="text-primary"> PENARIKAN NASABAH BLM MEKAR LAHA</span></h4>
            </div>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="admin.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Tabungan Nasabah </li>
                </ol>
            </div>
        </div>
    </div>
</div>



<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"><i class=" fas fa-fax"></i> Riwayat Penarikan </h4>
            </div>
            <div class="card-body">


                <table class="table dt-responsive nowrap w-100 table-hover table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID Nasbah</th>
                            <th>Nama</th>
                            <th>Saldo</th>
                            <th>Jumlah Penarikan</th>
                            <th>Terakhir Penarikan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (mysqli_num_rows($query) > 0) {?>

                        <?php
                        $no = 1; 
                        while ($r = mysqli_fetch_array($query)) { ?>
                          <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $r['id_nasabah']; ?></td>
                                <td><?php echo $r['nama']; ?></td>
                                <td><?php echo rupiah($r['tabungan']); ?></td>
                                <td><?php echo rupiah($r['total_penarikan']); ?></td>
                                <td><?php echo $r['terakhir_tarik']; ?></td>
                                <td>
                                    <a href="admin.php?page=Riwayat_Cek&id_nasabah=<?=$r['id_nasabah']?>"><button type="button" class="btn btn-success btn-sm">Cek Riwayat</button>
                                    </a>
                                </td>

                          </tr>  
                           
                        <?php 
                                }
                            } else {
                                echo "<tr><td colspan='8'>No records found</td></tr>";
                            }
                        ?>
                    </tbody>
                </table>

            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div>