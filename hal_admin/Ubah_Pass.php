<?php
  require_once '..\z_config/Koneksi.php';
  if($_POST['idx']){
  $nik=$_POST['idx'];

  $tampil= mysqli_query($con,"SELECT * FROM tb_pengurus WHERE nik='$nik'");
  $r= mysqli_fetch_array($tampil);
     
?>

<form class="form-horizontal"method="POST" action="admin.php?page=Pengurus_Pass_U" enctype="multipart/form-data">
    <div class="modal-body">
        <div class="d-grid gap-3">
            <div class="row">
                <!-- <div class="col-sm-4 col-lg-3">
                    <label class="col-form-label" for="nama">Password Lama</label>
                </div> -->
                <div class="col-sm-4 col-lg-8">
                    <input type="hidden" class="form-control" name="nik" value="<?=$r[0]?>" readonly="">
                    <!-- <input type="text" class="form-control" name="PassLama" placeholder="Masukan Password Lama" required=""> -->
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 col-lg-3">
                    <label class="col-form-label" for="Tem_L">Password Baru</label>
                </div>
                <div class="col-sm-4 col-lg-8">
                    <input type="password" class="form-control"  name="PassBaru" placeholder="Masukan Password Baru" required="">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 col-lg-3">
                    <label class="col-form-label" for="Tem_L">Ulangi Pass Baru</label>
                </div>
                <div class="col-sm-4 col-lg-8">
                    <input type="Password" class="form-control" name="PassUlang" placeholder="Masukan Ulang Password Baru" required="">
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Simpan</button> 
        <button type="reset" class="btn btn-outline-danger">Reset</button>
    </div>
</form>
<?php } ?>