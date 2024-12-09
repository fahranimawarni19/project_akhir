<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <div>
                 <h4 class="fs-16 fw-semibold mb-1 mb-md-2"> <i class=" fas fa-users"></i> Galeri <span class="text-primary"> BLM MEKAR LAHA</span></h4>
            </div>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="admin.php">Dashboard</a></li>
                    <li class="breadcrumb-item active"> Galeri </li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header card-header-bordered">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Tambah-Dokuementasi"><i class="fas fa-plus-square"></i> Tambah Dokumentasi</button>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-sm-6">
                        <div class="card-body">
                            <div class="tab-content p-0" id="income-tabContent">
                               <table id="scroll-sidebar-datatable" class="table dt-responsive nowrap w-100 table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Keterangan</th>
                                            <th>Foto</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                          require_once 'z_config/Koneksi.php';
                                        $No = 1;
                                          $tampil = mysqli_query($con,"SELECT * FROM tb_dokumentasi");
                                          $cek = mysqli_num_rows($tampil);
                                          while ($r = mysqli_fetch_array($tampil)) {

                                            echo "
                                              <tr>
                                                <td>$No</td>
                                                <td>$r[1]</td>
                                                <td><img src=\"img/Dokumentasi/$r[2]\" alt=\"Foto Dokumentasi\" class=\"avatar-2xs\"></td>
                                               <td>
                                                    <a data-bs-toggle=\"modal\" data-bs-target='#Edit-Galeri' data-id='$r[0]'><button type=\"button\" class=\"btn btn-icons btn-rounded btn-success\"><i class=\"mdi mdi-pencil\"></i></button></a>

                                                    <button type=\"button\" class=\"btn btn-icons btn-rounded btn-danger\" onclick=\"HapusDokumentasi('$r[0]');\">
                                                        <i class=\"mdi mdi-delete\"></i>
                                                    </button>

                                                    </td>
                                              </tr>
                                            ";
                                            $No++;
                                          }
                                         
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        

                        <div class="slider slider-for">
                            <?php
                              require_once 'z_config/Koneksi.php';
                            $No = 1;
                              $tampil = mysqli_query($con,"SELECT * FROM tb_dokumentasi");
                              $cek = mysqli_num_rows($tampil);
                              while ($r = mysqli_fetch_array($tampil)) {
                        ?>
                            <div>
                                <div class="card mb-0">
                                    <img data-lazy src="img/Dokumentasi/<?=$r[2]?>" class="card-img" alt="" />
                                </div>
                            </div>
                        <?php } ?>
                        </div>
                        
                        <div class="slider slider-nav mt-3">
                            <?php
                          require_once 'z_config/Koneksi.php';
                        $No = 1;
                          $tampil = mysqli_query($con,"SELECT * FROM tb_dokumentasi");
                          $cek = mysqli_num_rows($tampil);
                          while ($r = mysqli_fetch_array($tampil)) {

                            ?>

                            <div>
                                <div class="card mb-0">
                                    <img data-lazy src="img/Dokumentasi/<?=$r[2]?>" class="card-img" alt="" />
                                </div>
                            </div>
                             <?php } ?>
                        </div>
                   
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- STAR MODAL TAMBAH DOKUMENTASI -->
    <div class="modal fade" id="Tambah-Dokuementasi">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data Dokumentasi</h5><button type="button" class="btn btn-sm btn-label-danger btn-icon" data-bs-dismiss="modal"><i class="mdi mdi-close"></i></button>
                </div>
                <div class="modal-body" >
                    <form method = "POST" action="admin.php?page=Galeri_S" data-parsley-validate enctype="multipart/form-data" class="d-grid gap-2">
                            <div class="row">
                                <label for="ket" class="col-sm-2 col-form-label">Keterangan</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="ket_dokumentasi"> </textarea>
                                </div>
                            </div>
                            <div class="row">
                                <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" id="foto" name="foto_dokumentasi" />
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-sm-10 offset-sm-2">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <button type="reset" class="btn btn-danger">Reset</button>
                                </div>
                            </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
<!-- END MODAL TAMBAH DOKUMENTASI -->

<!-- STAR MODAL EDIT DOKUMENTASI -->
    <div class="modal fade" id="Edit-Galeri">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Data Dokumentasi</h5><button type="button" class="btn btn-sm btn-label-danger btn-icon" data-bs-dismiss="modal"><i class="mdi mdi-close"></i></button>
                </div>
                <div class="modal-body" >
                    <div class="Edit-Galeri-Dok"></div>
                </div>
            </div>
        </div>
    </div>
<!-- END MODAL EDIT DOKUMENTASI -->