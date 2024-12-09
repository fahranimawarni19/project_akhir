<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <div>
                 <h4 class="fs-16 fw-semibold mb-1 mb-md-2"> <i class=" fas fa-users"></i> DATA <span class="text-primary"> PENGURUS BLM MEKAR LAHA</span></h4>
            </div>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="admin.php">Dashboard</a></li>
                    <li class="breadcrumb-item active"> Data Pengurus </li>
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
                <button class="btn btn-primary" data-bs-original-title="Tambah Data Pengurus" data-bs-toggle="modal" data-bs-target="#TambahDataPengurus"><i class=" fas fa-user-plus"></i> Tambah Data</button>
            </div>
            <!-- MODAL TAMBAH DATA PENGURUS -->
                <div class="modal fade" id="TambahDataPengurus">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Forum Tambah Data Pengurus</h5><button type="button" class="btn btn-sm btn-label-danger btn-icon" data-bs-dismiss="modal"><i class="mdi mdi-close"></i></button>
                            </div>
                            <form method = "POST" action="admin.php?page=Pengurus_S" data-parsley-validate enctype="multipart/form-data" class="form-sample">
                                <div class="modal-body">
                                    <div class="d-grid gap-2">
                                        <div class="row">
                                            <div class="col-sm-4 col-lg-3">
                                                <label class="col-form-label" for="nik">NIK</label>
                                            </div>
                                            <div class="col-sm-4 col-lg-8">
                                                <input type="text" class="form-control border-success" id="nik" name="nik" placeholder="Masukan NIK Anda" required="">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4 col-lg-3">
                                                <label class="col-form-label" for="nama">Nama Lengkap</label>
                                            </div>
                                            <div class="col-sm-4 col-lg-8">
                                                <input type="text" class="form-control border-success" id="nama" name="nama" placeholder="Masukan Nama Lengkap Anda" required="">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4 col-lg-3">
                                                <label class="col-form-label" for="jk">Jenis Kelamin</label>
                                            </div>
                                            <div class="col-sm-4 col-lg-8">
                                                <select class="form-control m-b-10 border-success" id="jk" name="jk" required="">
                                                    <option value="no data"> -- Pilih -- </option>
                                                    <option value="L"> Laki-Laki </option>
                                                    <option value="P"> Perempuan </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4 col-lg-3">
                                                <label class="col-form-label" for="Tem_L">Tempat Lahir</label>
                                            </div>
                                            <div class="col-sm-4 col-lg-8">
                                                <input type="text" class="form-control border-success" id="Tem_L" name="tempat_l" placeholder="Masukan Tempat Lahir Anda" required="">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4 col-lg-3">
                                                <label class="col-form-label" for="Tan_L">Tanggal Lahir</label>
                                            </div>
                                            <div class="col-sm-4 col-lg-8">
                                                <input type="date" class="form-control border-success" id="Tan_L" name="Tanggal_l" placeholder="Masukan Tanggal Lahir Anda" required="">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4 col-lg-3">
                                                <label class="col-form-label" for="jbtn">Jabatan</label>
                                            </div>
                                            <div class="col-sm-4 col-lg-8">
                                                <select class="form-control m-b-10 border-success" id="jbtn" name="jabatan" required="">
                                                  <option> -- Pilih -- </option>
                                                  <option> Admin </option>
                                                  <option> Ketua </option>
                                                  <option> Sekretaris </option>
                                                  <option> Bendahara </option>
                                                  <option> Anggota </option>
                                                </select>
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
                                                <label class="col-form-label" for="tlp">No Telp</label>
                                            </div>
                                            <div class="col-sm-4 col-lg-8">
                                                 <input type="text" class="form-control border-success" id="tlp" name="tlp" placeholder="Masukan No Tlp" required="">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4 col-lg-3">
                                                <label class="col-form-label" for="pass">Password</label>
                                            </div>
                                            <div class="col-sm-4 col-lg-8">
                                                 <input type="password" name="pass" class="form-control border-success" placeholder="Masukan Pass" required="" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4 col-lg-3">
                                                <label class="col-form-label" for="foto">Foto</label>
                                            </div>
                                            <div class="col-sm-4 col-lg-8">
                                                <input type="hidden" class="form-control" name="hak_akses" value="Tidak">
                                                <input class="form-control" name="foto" type="file" id="formFile" />
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
            <!-- END MODAL TAMBAH DATA PENGURUS -->

            <!-- TABEL DATA PENGURUS -->
                <div class="card-body">
                    <table id="datatable" class="table table-hover table-bordered table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>nik</th>
                                <th>Nama</th>
                                <th>Jabatan</th>
                                <th>Hak Akses</th>
                                <th>Foto</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                              require_once 'z_config/Koneksi.php';
                              $No = 1;
                              $tampil = mysqli_query($con,"SELECT * FROM tb_pengurus");
                              $cek = mysqli_num_rows($tampil);
                              while ($r = mysqli_fetch_array($tampil)) {

                                if ($r[9]=='Ya') {
                                  $Hak = "<label class=\"badge badge-primary\" data-bs-toggle=\"tooltip\" data-bs-placement=\"right\" data-bs-original-title=\"Diizinkan\"><i class=\"fas fa-check\"></i></label>";
                                }else{
                                  $Hak = "<label class=\"badge badge-danger\" data-bs-toggle=\"tooltip\" data-bs-placement=\"right\" data-bs-original-title=\"Tidak Diizinkan\"><i class=\"fas fa-check\"></i></label>";
                                }

                                echo "
                                  <tr>
                                    <td>$No</td>
                                    <td>$r[0]</td>
                                    <td>$r[1]</td>
                                    <td>$r[5]</td>
                                    <td>$Hak</td>
                                    <td><img src=\"img/Pengurus/$r[10]\" alt=\"Foto Profil\" class=\"avatar-2xs\"></td>
                                    <td>
                                        <div class=\"btn-group me-2\">
                                            <button class=\"btn btn-primary\"> Aksi </button>
                                            <button class=\"btn btn-primary dropdown-toggle dropdown-toggle-split\" data-bs-toggle=\"dropdown\"></button>
                                            <div class=\"dropdown-menu\">
                                                <a href='admin.php?page=Pengurus_Detail&nik=$r[0]' class=\"dropdown-item\">Lihat Detail</a>

                                                <a href='' class=\"dropdown-item\" data-bs-toggle=\"modal\" data-bs-target='#Modal-Edit-Pengurus' data-id='$r[0]'>Edit</a>

                                                <a class=\"dropdown-item\" onclick=\"PengurusHapus('$r[0]');\">Hapus</a>

                                               

                                                <div class=\"dropdown-divider\"></div>
                                                <a href=\"\" class=\"dropdown-item\" data-bs-toggle=\"modal\" data-bs-target='#Modal-Ganti-Password1' data-id='$r[0]'>Ubah Password</a>
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
            <!-- END TABEL DATA PENGURUS -->
        </div>
    </div>
</div>
<!-- end row -->

<!-- MODAL EDIT DATA PENGURUS -->
    <div class="modal fade" id="Modal-Edit-Pengurus">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Forum Edit Data Pengurus</h5><button type="button" class="btn btn-sm btn-label-danger btn-icon" data-bs-dismiss="modal"><i class="mdi mdi-close"></i></button>
                </div>
                <div class="modal-body">
                    <div class="Edit-Pengurus"></div>
                </div>
            </div>
        </div>
    </div>
<!-- END MODAL EDIT DATA PENGURUS -->

<!-- MODAL UBAH PASSWORD -->
    <div class="modal fade" id="Modal-Ganti-Password1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Forum Ubah Password</h5><button type="button" class="btn btn-sm btn-label-danger btn-icon" data-bs-dismiss="modal"><i class="mdi mdi-close"></i></button>
                </div>
                <div class="modal-body">
                    <div class="Ganti-Password"></div>
                </div>
            </div>
        </div>
    </div>
<!-- END MODAL UBAH PASSWORD -->

