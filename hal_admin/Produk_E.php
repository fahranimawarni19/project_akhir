 <?php
  require_once '../z_config/Koneksi.php';

  if($_POST['idx']){
  $id=$_POST['idx'];

  $tampil= mysqli_query($con,"SELECT * FROM tb_produk WHERE id_produk='$id'");
  while ($r= mysqli_fetch_array($tampil)) {

?>
<!-- <div class="col-sm-12">
        <h3 class="card-title" align="center"><i class="fa fa-tasks"></i> FROM EDIT DATA PRODUK</strong></h3>
</div><hr>
 -->
  <form method = "POST" action="admin.php?page=Produk_U" data-parsley-validate enctype="multipart/form-data" class="form-sample">
      <div class="modal-body">
          <div class="d-grid gap-2">
              <div class="row">
                  <div class="col-sm-4 col-lg-3">
                      <label class="col-form-label" for="kode"> Nama Produk </label>
                  </div>
                  <div class="col-sm-4 col-lg-8">
                      <input type="hidden" class="form-control border-success" id="id" value="<?=$r[0]?>" name="id_produk">
                      <input type="text" class="form-control border-success" id="nama" value="<?=$r[1]?>" name="nama" placeholder="Masukan Nama Produk..." required="">
                  </div>
              </div>
              <div class="row">
                  <div class="col-sm-4 col-lg-3">
                      <label class="col-form-label" for="ket"> Keterangan </label>
                  </div>
                  <div class="col-sm-4 col-lg-8">
                      <textarea type="text" class="form-control border-success" id="ket" value="<?=$r[2]?>" name="keterangan" required=""><?=$r[2]?></textarea>
                  </div>
              </div>
              <div class="row">
                  <div class="col-sm-4 col-lg-3">
                      <label class="col-form-label" for="foto"> Foto </label>
                  </div>
                  <div class="col-sm-4 col-lg-8">
                      <input type="file" name="foto" class="form-control">
                  </div>
              </div>
          </div>
      </div>
      <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Simpan</button> 
          <button type="reset" class="btn btn-danger">Reset</button>
      </div>
  </form>
<?php } }?>