<?php
  require_once 'z_config/Koneksi.php';
  $kode = date("dis");

  function rupiah($angka){
  $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
  return $hasil_rupiah;
  }

  $tanggal = date("d-m-Y");
  //include("inc/koneksi.php"); 
  $sql = mysqli_query($con,"SELECT * FROM tb_sampah order by jenis_sampah");
?>

<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <div>
                 <h4 class="fs-16 fw-semibold mb-1 mb-md-2"> <i class="fas fa-balance-scale"></i> DATA TIMBANGAN <span class="text-primary"> NASABAH BLM MEKAR LAHA</span></h4>
            </div>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="admin.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Timbangan Nasabah </li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="row">
                <div class="col-12">
                    <div class="card-header card-header-bordered">
                        <h3 class="card-title"><i class=" fas fa-user-tag"></i> Tambah Timbangan Nasabah</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-5">
                                <form class="form-sample" method="POST" action="admin.php?page=Timbangan_S">
                                    <div class="d-grid gap-2">
                                        <div class="row">
                                            <div class="col-sm-2 col-lg-4">
                                                
                                            </div>
                                            <div class="col-sm-4 col-lg-8">
                                               <div class="badge badge-success">Masukan Sampah Ke Keranjang Terlebih Dahulu!</div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-2 col-lg-4">
                                                <label class="col-form-label" for="nik">Nasabah</label>
                                            </div>
                                            <div class="col-sm-4 col-lg-8">
                                               <input type="hidden" class="form-control border-primary" name="id_timbangan" value="Tab-<?=$kode?>" required>
                                                <select id="select2-2" class="form-control border-primary" name="id_nasabah" style="width:100%">
                                                <option value="noname">-- Pilih Nasabah ---</option>
                                                  <?php
                                                  require_once 'z_config/Koneksi.php';
                                                  $tampil = mysqli_query($con,"SELECT * FROM tb_nasabah");
                                                  while ($r = mysqli_fetch_array($tampil)) 
                                                  {
                                                    echo"
                                                      <option value='$r[0]'>$r[1]</option>
                                                    ";
                                                  }
                                                ?>
                                              </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-2 col-lg-4">
                                                <label class="col-form-label" for="nik">Tanggal Timbang</label>
                                            </div>
                                            <div class="col-sm-4 col-lg-8">
                                                <input type="date" class="form-control border-primary" name="tgl_timbangan" value="" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-2 col-lg-4">
                                                
                                            </div>
                                            <div class="col-sm-4 col-lg-8">
                                              <button type="submit" class="btn btn-primary">Simpan</button> 
                                                <button type="reset" class="btn btn-success">Reset</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="col-md-7">
                                <div class="alert fade show border-0 rounded-0 mb-0 p-0 d-block" role="alert">
                                    <div class="card">
                                        <div class="card-header card-header-bordered">
                                            <h3 class="card-title"><i class="fas fa-recycle"></i> Jenis Data Sampah</h3>
                                            <div class="card-addon">
                                                <div class="btn-group">
                                                    <button class="btn btn-flat-primary btn-icon" data-bs-toggle="collapse" data-bs-target="#collapseExample3" aria-expanded="false" aria-controls="collapseExample">
                                                        <i class="fa fa-angle-down"></i>
                                                    </button>
                                                    <button class="btn btn-flat-primary btn-icon" data-bs-dismiss="alert" aria-label="Close">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body collapse show" id="collapseExample3">
                                            <!-- Timbangan TS artinya Timbangan Tambah Sementara -->
                                            <form method="POST" action="admin.php?page=Timbangan_TS" class="form-sample">
                                                <div class="d-grid gap-2">
                                                    <div class="row">
                                                        <div class="col-sm-3 col-lg-4">
                                                            <label class="col-form-label" for="jenis">Jenis Sampah</label>
                                                        </div>
                                                        <div class="col-sm-3 col-lg-8">
                                                           <input type="hidden" class="form-control border-primary" name="id_timbangan" value="Tab-<?=$kode?>" required>
                                                            <select id="select2-1" class="form-control border-primary" name="jenis_sampah" style="width:100%">
                                                            <option value="noname" >-- Jenis Sampah ---</option>
                                                              <?php if (mysqli_num_rows($sql) > 0){ ?>
                                                                <?php while($row = mysqli_fetch_array($sql)){ ?>
                                                                  <option value="<?php echo $row ['kode_sampah']?>"><?php echo $row ['jenis_sampah']?></option>
                                                                <?php } ?>
                                                              <?php } ?>
                                                          </select>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-3 col-lg-4">
                                                            <label class="col-form-label" for="nik">Berat</label>
                                                        </div>
                                                        <div class="col-sm-3 col-lg-8">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" name="berat" placeholder="Masukan Berat Sampah" /> <span class="input-group-text" id="basic-addon2">/KG</span>
                                                            </div>    
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-3 col-lg-4">
                                                            
                                                        </div>
                                                        <div class="col-sm-3 col-lg-8">
                                                          <button type="submit" class="btn btn-primary">Tambahkan</button> 
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-header card-header-bordered">
                                    <h3 class="card-title"><i class="fas fa-weight-hanging"></i> Keranjang Sampah</h3>
                                    <div class="card-addon">
                                        <button class="btn btn-label-info btn-icon" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                            <i class="fa fa-angle-down"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body collapse show" id="collapseExample">
                                    <table class="table table-primary">
                                        <thead>
                                          <tr>
                                            <th>No</th>
                                            <th>Jenis Sampah</th>
                                            <th>Berat/Kg</th>
                                            <th>Harga</th>
                                            <th>Aksi</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <?php
                                            require_once 'z_config/Koneksi.php';
                                            $No = 1;
                                            $total=0;
                                            $tampil = mysqli_query($con, "SELECT * FROM tabelsementara");
                                            while ($r = mysqli_fetch_array($tampil)) { ?>
                                          <?php 
                                            echo "

                                                <tr>
                                                    <td>$No</td>
                                                    <td>$r[1]</td>
                                                    <td>$r[2]</td>
                                          "?>
                                                    <td><?php echo rupiah($r[3]); ?></td>
                                                    <?php echo"

                                                    <td>
                                                        <a onclick=\"TabSemenHapus('$r[0]');\"><button type=\"button\" class=\"btn btn-danger btn-sm\">Hapus</button>
                                                        </a>
                                                    </td>
                                                </tr>
                                              ";
                                              $total += $r[3];
                                              $No++;
                                            }
                                            ?>
                                            <tr>
                                              <th colspan="3">Biaya Timbangan</th>
                                              <th><?php echo rupiah($total);?></th>
                                              <th></th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card">
                <div class="card-header card-header-bordered">
                    <h3 class="card-title"><i class="fas fa-server"></i> Data Timbangan</h3>
                    <div class="card-addon">
                        <button class="btn btn-label-info btn-icon" data-bs-toggle="collapse" data-bs-target="#collapseExample1" aria-expanded="false" aria-controls="collapseExample">
                            <i class="fa fa-angle-down"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body collapse show" id="collapseExample1">
                    <table id="scroll-sidebar-datatable" class="table dt-responsive nowrap w-100 table-hover table-striped">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>ID Timbangan</th>
                            <th>ID Nasabah</th>
                            <th>Nama Nasabah</th>
                            <th>Tanggal Timbangan</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                         <?php 

                          // Query untuk mengambil data dari dua tabel dengan JOIN
                          $No = 1;
                          $tampil = mysqli_query($con,"SELECT tb_timbangan.id_timbangan, tb_timbangan.id_nasabah, tb_timbangan.tgl_timbangan, tb_timbangan.ket,
                          tb_nasabah.nama, tb_nasabah.alamat, tb_nasabah.dusun, tb_nasabah.rt_rw, tb_nasabah.tlp
                          FROM tb_timbangan INNER JOIN tb_nasabah ON tb_timbangan.id_nasabah = tb_nasabah.id_nasabah GROUP BY tb_timbangan.id_nasabah");

                          $cek = mysqli_num_rows($tampil);
                                    
                              if ($cek > 0) {
                              // Output data dari setiap baris
                              while ($r = mysqli_fetch_array($tampil)) {

                                 if ($r['ket']=='Nabung') {
                                  # code...
                                  $ket="<div class=\"badge badge-success\">Menabung</div>";
                                }else{
                                  
                                  $ket="<div class=\"badge badge-warning\">Penarikan</div>";
                                }
                                  echo "
                                  <tr>
                                    <td>$No</td>
                                    <td>$r[id_timbangan]</td>
                                    <td>$r[id_nasabah]</td>
                                    <td>$r[nama]</td>
                                    <td>$r[tgl_timbangan]</td>
                                    <td>$ket</td>
                                    <td>
                                      <a href='admin.php?page=Timbangan_Nasabah_Detail&id_nasabah=$r[id_nasabah]' type=\"button\" class=\"btn btn-primary btn-fw\"> <i class=\"mdi mdi-eye\"></i> Cek Detail </a>
                                    </td>

                                  </tr>";
                              $No++;
                              }
                              
                          } else {
                              echo "<tr><td colspan='7'>Tidak ada hasil</td></tr>";
                            
                          }
                          ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>

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
