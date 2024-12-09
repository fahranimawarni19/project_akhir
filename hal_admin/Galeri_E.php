 <?php
  require_once '..\z_config/Koneksi.php';

  if($_POST['idx']){
  $id_dok=$_POST['idx'];

  $tampil= mysqli_query($con,"SELECT * FROM tb_dokumentasi WHERE id_dokumentasi='$id_dok'");
  while ($r= mysqli_fetch_array($tampil)) {

?>

<form method = "POST" action="admin.php?page=Galeri_U" data-parsley-validate enctype="multipart/form-data" class="d-grid gap-2">
        <div class="row">
            <label for="ket" class="col-sm-2 col-form-label">Keterangan</label>
            <div class="col-sm-10">
            	 <input type="hidden" class="form-control" id="foto" name="id_dokumentasi" value="<?=$r[0]?>"/>
                <textarea class="form-control" name="ket_dokumentasi" value="<?=$r[1]?>"><?=$r[1]?></textarea>
            </div>
        </div>
        <div class="row">
            <label for="foto" class="col-sm-2 col-form-label">Foto</label>
            <div class="col-sm-10">
                <input type="file" class="form-control" id="foto" name="foto_dokumentasi"/>
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-10 offset-sm-2">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="reset" class="btn btn-danger">Reset</button>
            </div>
        </div>
</form>
<?php } } ?>