<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <div>
                 <h4 class="fs-16 fw-semibold mb-1 mb-md-2"> <i class="fas fa-box"></i> LAPORAN TIMBANGAN SAMPAH <span class="text-primary"> BLM MEKAR LAHA</span></h4>
            </div>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="admin.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Laporan Timbangan </li>
                </ol>
            </div>
        </div>
    </div>
</div>

<?php


require_once 'z_config/Koneksi.php';
require_once 'z_config/tampil_hari.php';

// Query untuk menggabungkan data dari tb_tabungan dan tb_nasabah


?>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form action="admin.php?page=Filter_Timbangan" method="POST">
                    <div class="row align-items-end">
                        <div class="col-xl-3">
                            <div class="mb-3">
                                <label class="form-label" for="showEasing">Dari Tanggal</label>
                                <input id="showEasing" type="date" placeholder="swing, linear" class="input-mini form-control" name="dari_tanggal">
                            </div>
                        </div>
                        
                        <div class="col-xl-3">
                            <div class="mb-3">
                                <label class="form-label" for="showDuration">Ke Tanggal</label>
                                <input id="showDuration" type="date" placeholder="ms" class="input-mini form-control" name="ke_tanggal">
                            </div>
                        </div>

                        <div class="col-xl-3">
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary" id="showtoast">
                                    <i class="mdi mdi-sort-bool-descending-variant"></i> Filter Laporan
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
                <div class="card-header justify-content-between">
                    <h4 class="card-title"><i class="fas fa-book-open"></i> Rekapan Timbangan Sampah </h4>
                    <div class="card-addon dropdown">
                         <a href="C_lap_Timbangan_All.php" class="btn btn-success btn-fw"><i class="mdi mdi-printer mr-1"></i> Cetak Laporan</a>
                    </div>
                </div>
            <div class="card-body">
                <table id="scroll-sidebar-datatable" class="table dt-responsive nowrap w-100 table-hover table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal Timbangan</th>
                            <th>Nama Nasabah</th>
                            <th>Jenis Sampah</th>
                            <th>Harga / KG</th>
                            <th>Berat</th>
                            <th>Total Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once 'z_config/Koneksi.php';
                        require_once 'z_config/tampil_hari.php';

                        // Query untuk menggabungkan data dari tb_detail_timbangan, tb_timbangan, tb_nasabah, dan tb_sampah
                        $query = mysqli_query($con,"SELECT t.tgl_timbangan,  n.nama, s.jenis_sampah,  s.harga, d.berat,  (d.berat * s.harga) AS total_harga FROM tb_detail_timbangan d JOIN   tb_timbangan t ON d.id_timbangan = t.id_timbangan JOIN tb_nasabah n ON t.id_nasabah = n.id_nasabah JOIN tb_sampah s ON d.kode_sampah = s.kode_sampah ORDER BY  t.tgl_timbangan, n.nama");

                        if ($query) {
                            $no = 1;
                            while ($row = mysqli_fetch_assoc($query)) {?>
                                <tr>
                                    <td><?=$no++?></td>
                                    <td> <?=$row['tgl_timbangan'] ?></td>
                                    <td><?=$row['nama']?></td>
                                    <td><?=$row['jenis_sampah']?> </td>
                                    <td><?=rupiah($row['harga'])?> </td>
                                    <td><?=$row['berat']?> KG</td>
                                    <td><?=rupiah($row['total_harga'])?> </td>
                                </tr>
                            <?php }
                        } else {
                            echo "<tr><td colspan='8'>Data tidak ditemukan</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>

            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div>
    
</div>