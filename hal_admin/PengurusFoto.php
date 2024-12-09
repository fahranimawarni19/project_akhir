<?php
  require_once '..\z_config/koneksi.php';
  if($_POST['idx']){
  $nik=$_POST['idx'];

  $tampil= mysqli_query($con,"SELECT * FROM tb_pengurus WHERE nik='$nik'");
  while ($r= mysqli_fetch_array($tampil)) {

?>

<form method="POST" action="admin.php?page=PengurusFoto_U" enctype="multipart/form-data">
    <div class="d-grid gap-3">
        <div class="row">
            <div class="col-sm-4 col-lg-3">
                <label class="col-form-label" for="hak">Ubah Foto</label>
            </div>
            <div class="col-sm-4 col-lg-8">
              <input type="hidden" class="form-control" value="<?=$r[0]?>" name="nik" readonly="">
            <input class="form-control" name="foto" type="file" id="formFile" />
            </div>
        </div>
    </div><br>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Simpan</button> 
        <button type="reset" class="btn btn-outline-danger">Reset</button>
    </div>
</form>
<?php } } ?>