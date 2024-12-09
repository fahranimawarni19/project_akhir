<?php
    require_once 'z_config/Koneksi.php';

    $nik = $_GET['nik'];
    $tampil = mysqli_query($con,"SELECT * FROM tb_pengurus WHERE nik = '$nik'");
    $cek = mysqli_num_rows($tampil);
    while ($r = mysqli_fetch_array($tampil)){

        if ($r[9]=='Ya') {
          $Hak = "<div class=\"badge badge-success\"><i class=\"fa fa-check\"></i> Mampunyai Hak Akses</div>";
        }else{
          $Hak = "<div class=\"badge badge-danger\"><i class=\"fa fa-times\"></i> Tidak Mampunyai Hak Akses</div>";
        }
?>

<!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <div>
                     <h4 class="fs-16 fw-semibold mb-1 mb-md-2"> <i class=" fas fa-eye"></i> DETAIL DATA <span class="text-primary"> PENGURUS BLM MEKAR LAHA</span></h4>
                </div>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="admin.php">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="admin.php?page=Pengurus">Data Pengurus</a></li>
                        <li class="breadcrumb-item active">Detail Data Pengurus</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
<!-- end page title -->

    <div class="row">
        <div class="col-xl-3">
            <div class="card overflow-hidden">
                <div class="bg-primary-subtle">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <div class="text-primary p-3 mb-3">
                                <h5 class="text-primary">Welcome Back !</h5>
                                <p class="mb-0">It will seem like simplified</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="align-self-end">
                                <img src="assets/images/contact.png" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="row align-items-end">
                        <div class="col-sm-12">
                            <div class="avatar-md mb-3 mt-n4">
                                <img src="img/Pengurus/<?=$r[10]?>" alt="" class="img-fluid avatar-circle bg-light p-2 border-2 border-primary">
                            </div>
                            <h5 class="fs-16 mb-1 text-truncate"><?=$r[1]?></h5>
                            <p class="text-muted mb-0 text-truncate"><?=$r[5]?></p>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end card -->
        </div>

        <div class="col-xl-9">

            <div class="card">
                <div class="card-header">
                    <a href="#" class="btn btn-success btn-block" title="Ubah Foto Profil" data-bs-toggle="modal" data-bs-target="#Modal-Ganti-FotoPengurus1"  data-id="<?=$r[0]?>"><i class=" fas fa-image"></i> Ubah Foto Profil</a> &nbsp;&nbsp;

                    <a href="#" data-toggle="tooltip" data-placement="top" title="Ubah Hak Akses"><button class="btn btn-success waves-effect md-trigger" data-bs-toggle="modal" data-bs-target="#Modal-Ganti-Akses"><i class="fas fa-people-arrows"></i> Ubah Hak Akses</button></a>
                </div>
                <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="row">nik / NIP</th>
                                    <td><?=$r[0]?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Nama Lengakp</th>
                                    <td><?=$r[1]?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Jenis Kelamin</th>
                                    <td><?=$r[2]?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Tempat Lahir</th>
                                    <td><?=$r[3]?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Tanggal Lahir</th>
                                    <td><?=$r[4]?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Jabatan</th>
                                    <td><?=$r[5]?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Alamat</th>
                                    <td><?=$r[6]?></td>
                                </tr>
                                <tr>
                                    <th scope="row">No Telp</th>
                                    <td><?=$r[7]?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Hak Akses</th>
                                    <td><?=$Hak?></td>
                                </tr>
                            </thead>
                        </table>
                </div>
            </div>
        </div>
    </div>

<!-- MODAL GAANTI HAK AKSES -->
    <div class="modal fade" id="Modal-Ganti-Akses">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"> UBAH HAK AKSES</h5><button type="button" class="btn btn-sm btn-label-danger btn-icon" data-bs-dismiss="modal"><i class="mdi mdi-close"></i></button>
                </div>
                <form method="POST" action="">
                    <div class="modal-body">
                        <div class="d-grid gap-3">
                            <div class="row">
                                <div class="col-sm-4 col-lg-3">
                                    <label class="col-form-label" for="hak">Hak Akses</label>
                                </div>
                                <div class="col-sm-4 col-lg-8">
                                   <input type="hidden" class="form-control" name="nik" value="<?=$r[0]?>" readonly="">
                                    <select class="form-control" name="hak_akses" required="">
                                      <option value="<?=$r[9]?>"><?=$r[9]?></option>
                                      <option value="Ya">Izinkan</option>
                                      <option value="Tidak">Tidak</option>
                                    </select>
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
<!-- MODAL GAANTI HAK AKSES -->
 <?php } ?>

<!-- SCRIP PHP UBAH HAK AKSES -->
      <?php 
         if (isset($_POST['nik']) && isset($_POST['hak_akses'])){

        $nik = $_POST['nik'];
        $Hak = $_POST['hak_akses'];
         //simpan
         $simpan = mysqli_query($con,"UPDATE tb_pengurus SET hak_akses='$Hak' WHERE nik='$nik'");
            echo "
                 <script>
                    Swal.fire({
                     icon: 'success',
                     title: 'Berhasil',
                     text: 'Data Hak Akses Berhasil Diubah',
                    })
                </script>
                ";
            echo "<meta http-equiv='refresh' content='1; url=admin.php?page=Pengurus'>";
        }
    ?>
<!-- END SCRIP PHP UBAH HAK AKSES -->

<!-- MODAL UBAH FOTO PROFIL -->
    <div class="modal fade" id="Modal-Ganti-FotoPengurus1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"> UBAH FOTO PROFIL</h5><button type="button" class="btn btn-sm btn-label-danger btn-icon" data-bs-dismiss="modal"><i class="mdi mdi-close"></i></button>
                </div>
                <div class="modal-body">
                  <div class="Pengurus-Ganti-Foto"></div>
                </div>
            </div>
        </div>
    </div>
<!-- MODAL UBAH FOTO PROFIL -->