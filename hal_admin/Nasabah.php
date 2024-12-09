<?php
    $tanggal = date("d-m-Y");
  $kode = date("is");
?>
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <div>
                 <h4 class="fs-16 fw-semibold mb-1 mb-md-2"> <i class="fas fa-address-card"></i> DATA <span class="text-primary"> NASABAH BLM MEKAR LAHA</span></h4>
            </div>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="admin.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Data Nasabah </li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!--    end row -->
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <button class="btn btn-primary" data-bs-original-title="Tambah Data Nasabah" data-bs-toggle="modal" data-bs-target="#TambahDataNasabah"><i class=" fas fa-user-plus"></i> Tambah Data</button>
            </div>
             
            <!-- MODAL TAMBAH DATA NASABAH -->
                <div class="modal fade" id="TambahDataNasabah">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Forum Tambah Data Nasabah</h5><button type="button" class="btn btn-sm btn-label-danger btn-icon" data-bs-dismiss="modal"><i class="mdi mdi-close"></i></button>
                            </div>
                            <form method = "POST" action="admin.php?page=Nasabah_S" data-parsley-validate enctype="multipart/form-data" class="form-sample">
                                <div class="modal-body">
                                    <div class="d-grid gap-2">
                                        <div class="row">
                                            <div class="col-sm-4 col-lg-3">
                                                <label class="col-form-label" for="nama">Nama Lengkap</label>
                                            </div>
                                            <div class="col-sm-4 col-lg-8">
                                                <input type="hidden" class="form-control border-success" id="nik" name="id_nasabah" value="<?php echo "NBLM-$kode";?>" readonly>

                                                <input type="text" class="form-control border-success" id="nik" name="nama" placeholder="Masukan Nama Lengkap Anda" required="">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4 col-lg-3">
                                                <label class="col-form-label" for="alamat">Alamat</label>
                                            </div>
                                            <div class="col-sm-4 col-lg-8">
                                                <textarea class="form-control border-success" id="alamat" name="alamat" required=""></textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4 col-lg-3">
                                                <label class="col-form-label" for="Dusun">Dusun</label>
                                            </div>
                                            <div class="col-sm-4 col-lg-4">
                                                <input type="text" class="form-control border-success" id="nama" name="dusun" placeholder="Masukan Dusun" required="">
                                            </div>
                                            <div class="col-sm-4 col-lg-4">
                                                <input type="text" class="form-control border-success" id="rt_rw" name="rt_rw" placeholder="Masukan RT/RW" required="">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4 col-lg-3">
                                                <label class="col-form-label" for="tlp">No Telp</label>
                                            </div>
                                            <div class="col-sm-4 col-lg-8">
                                                 <input type="text" class="form-control border-success" id="tlp" name="tlp" placeholder="Masukan No Tlp" required="">
                                                  <input type="hidden" class="form-control border-success" value="<?=$tanggal?>" id="tgl" name="tgl_daftar" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Simpan</button> 
                                    <button type="reset" class="btn btn-outline-danger">Reset</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            <!-- END MODAL TAMBAH DATA NASABAH -->

            <!-- TABEL DATA NASABAH -->
                <div class="card-body">
                    <table id="scroll-sidebar-datatable" class="table dt-responsive nowrap w-100 table-hover table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID Nasabah</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Dusun</th>
                                <th>RT/RW</th> 
                                <th>No Tlpn</th> 
                                <th>Aksi</th>
                            </tr>
                        </thead>
                         <tbody>
                            <?php
                              require_once 'z_config/Koneksi.php';
                              $No = 1;
                              $tampil = mysqli_query($con,"SELECT * FROM tb_nasabah");
                              $cek = mysqli_num_rows($tampil);
                              while ($r = mysqli_fetch_array($tampil)) {

                                echo "
                                  <tr>
                                    <td>$No</td>
                                    <td>$r[0]</td>
                                    <td>$r[1]</td>
                                    <td>$r[2]</td>
                                    <td>$r[3]</td>
                                    <td>$r[4]</td>
                                    <td>$r[5]</td>
                                    <td>
                                        <div class=\"btn-group me-2\">
                                            <button class=\"btn btn-primary\"> Aksi </button>
                                            <button class=\"btn btn-primary dropdown-toggle dropdown-toggle-split\" data-bs-toggle=\"dropdown\"></button>
                                            <div class=\"dropdown-menu\">
                                                <a href='' class=\"dropdown-item\" data-bs-toggle=\"modal\" data-bs-target='#Modal-Edit-Nasabah1' data-id='$r[0]'>Edit</a>

                                                <a class=\"dropdown-item\" onclick=\"NasabahHapus('$r[0]');\">Hapus</a>

                                            </div>
                                        </div>
                                    </td>
                                  </tr>
                                ";
                                $No++;
                              }
                            ?>
                          </tbody>
                    </table>
                </div>
            <!-- END TABEL DATA NASABAH -->
        </div>
    </div>
</div>
<!-- end row -->

<!-- MODAL EDIT DATA NASABAH -->
    <div class="modal fade" id="Modal-Edit-Nasabah1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Forum Edit Data Nasabah</h5><button type="button" class="btn btn-sm btn-label-danger btn-icon" data-bs-dismiss="modal"><i class="mdi mdi-close"></i></button>
                </div>
                <div class="modal-body">
                    <div class="Edit-Nasabah1"></div>
                </div>
            </div>
        </div>
    </div>
<!-- END MODAL EDIT DATA NASABAH -->

