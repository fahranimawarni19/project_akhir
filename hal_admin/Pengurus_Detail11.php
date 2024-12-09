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
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <div>
                 <h4 class="fs-16 fw-semibold mb-1 mb-md-2"> <i class=" fas fa-eye"></i> DETAIL DATA <span class="text-primary"> PENGURUS BLM MEKAR LAHA</span></h4>
            </div>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="admin.php">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="admin.php">Data Pengurus</a></li>
                    <li class="breadcrumb-item active">Detail Data Pengurus</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!--    end row -->  
<div class="col-md-12 grid-margin stretch-card">
  	<div class="card">
	    <div class="card-body">
			<div class="card">
				<div class="card-block">
					<!-- <h3 class="card-title" align="center"><i class="fa fa-tasks"></i> DETAIL DATA Pengurus <strong>BLM</strong></h3> -->
					<div class="row users-card">
						<div class="col-lg-8 col-xl-3 col-md-8">
							<div class="card rounded-card user-card">
								<div class="card-block">
									<center>	
									<div class="img-hover">
										<img class="img-fluid img-circle" src="img/Pengurus/<?=$r[10]?>" alt="tab preview" width="200">
									</div>
									</center>
								</div>
							</div><br>
							<center>
								 <a href="#" class="btn btn-success btn-block" title="Ubah Foto Profil" data-toggle="modal" data-target="#Modal-Ganti-FotoPengurus" data-id="<?=$r[0]?>">Ubah Foto Profil</button></a><br>

								<a href="admin.php?page=Pengurus" data-toggle="tooltip" data-placement="top" title="Kembali"><button class="btn btn-danger"><i class="ion-arrow-left-a"></i> Back</button></a>

								<a href="#" data-toggle="tooltip" data-placement="top" title="Ubah Hak Akses"><button class="btn btn-primary waves-effect md-trigger" data-toggle="modal" data-target="#exampleModal-4"><i class="ion-unlocked"></i> Ubah </button></a>
								<div class="form-group"><?=$Hak?></div>
							</center>
						</div>
						<div class="col-lg-8 col-xl-9 col-md-8">
							<div class="col-lg-12">
								<div class="row">
									<div class="col-lg-12 col-xl-6">
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
											</thead>
										</table>
									</div>
									<div class="col-lg-12 col-xl-6">
										<table class="table m-0">
											<thead>
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
											</thead>
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
</div>

<!-- MODAL GAANTI HAK AKSES -->
<div class="card-body">
	<div class="modal fade" id="exampleModal-4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-4" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-body">
	        <form method="POST" action="">
	          <div class="row">
		          <div class="col-md-12">
		          	<div class="alert alert-fill-info" role="alert" align="center">
				      <span>  UBAH HAK AKSES</span>
				    </div>
		            <div class="form-group row">
		              <label class="col-sm-3 col-form-label">Hak Akses</label>
		              <div class="col-sm-9">
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
	        	<button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
	        	<button type="submit" class="btn btn-info">Ubah</button>
	      	</div>
	        </form>
	      
	      </div>
	    </div>
	  </div>
	</div>
</div>
 <!-- MODAL GAANTI HAK AKSES -->
<?php } ?>

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
<!-- MODAL UBAH FOTO PROFIL -->
<div class="card-body">
  <div class="modal fade" id="Modal-Ganti-FotoPengurus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-4" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="alert alert-fill-info" role="alert" align="center">
           <span> GANTI FOTO PROFIL </span>
        </div>
        <div class="modal-body">
          <div class="PengurusFoto"></div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- MODAL UBAH FOTO PROFIL -->