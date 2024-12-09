<?php
  require_once '../z_config/koneksi.php';
  if($_POST['idx']){
  $id=$_POST['idx'];

  $tampil= mysqli_query($con,"SELECT * FROM tb_sampah WHERE kode_sampah='$id'");
  while ($r= mysqli_fetch_array($tampil)) {

?>

<form method="POST" action="admin.php?page=DataSampah_U" data-parsley-validate enctype="multipart/form-data">
    <div class="modal-body">
        <div class="d-grid gap-2">
            <div class="row">
                <div class="col-sm-4 col-lg-3">
                    <label class="col-form-label" for="jenis"> Jenis Sampah </label>
                </div>
                <div class="col-sm-4 col-lg-8">
                    <input type="hidden" class="form-control" name="kode_sampah" value="<?=$r[0]?>" required="">
                    <input type="text" class="form-control border-success" id="jenis" name="jenis_sampah" value="<?=$r[1]?>" placeholder="Masukan Jenis Sampah..." required="">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 col-lg-3">
                    <label class="col-form-label" for="harga"> Harga Sampah </label>
                </div>
                <div class="col-sm-4 col-lg-8">
                    <input type="text" class="form-control border-success" id="harga" name="harga" value="<?=$r[2]?>" placeholder="Masukan Harga Sampah /Kg..." required="">
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Simpan</button> 
        <button type="reset" class="btn btn-danger">Reset</button>
    </div>
</form>

<?php } } ?>