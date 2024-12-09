 <?php
  require_once '..\z_config/Koneksi.php';

  if($_POST['idx']){
  $id=$_POST['idx'];

  $tampil= mysqli_query($con,"SELECT * FROM tb_Nasabah WHERE id_nasabah='$id'");
  while ($r= mysqli_fetch_array($tampil)) {

?>
<form method = "POST" action="admin.php?page=Nasabah_U" data-parsley-validate enctype="multipart/form-data" class="form-sample">
    <div class="modal-body">
        <div class="d-grid gap-2">
            <div class="row">
                <div class="col-sm-4 col-lg-3">
                    <label class="col-form-label" for="nama">Nama Lengkap</label>
                </div>
                <div class="col-sm-4 col-lg-8">
                     <input type="hidden" class="form-control border-success" id="nik" name="id_nasabah" value="<?=$r[0]?>" readonly>

                    <input type="text" class="form-control border-success" id="nik" name="nama" placeholder="Masukan Nama Lengkap Anda" value="<?=$r[1]?>" required="">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 col-lg-3">
                    <label class="col-form-label" for="alamat">Alamat</label>
                </div>
                <div class="col-sm-4 col-lg-8">
                    <textarea class="form-control border-success" id="alamat" name="alamat" value="<?=$r[2]?>" required=""><?=$r[2]?></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 col-lg-3">
                    <label class="col-form-label" for="Dusun">Dusun</label>
                </div>
                <div class="col-sm-4 col-lg-4">
                    <input type="text" class="form-control border-success" id="nama" name="dusun" placeholder="Masukan Dusun" value="<?=$r[3]?>" required="">
                </div>
                <div class="col-sm-4 col-lg-4">
                    <input type="text" class="form-control border-success" value="<?=$r[4]?>" id="rt_rw" name="rt_rw" placeholder="Masukan RT/RW" required="">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 col-lg-3">
                    <label class="col-form-label" for="tlp">No Telp</label>
                </div>
                <div class="col-sm-4 col-lg-8">
                     <input type="text" class="form-control border-success" id="tlp" name="tlp" placeholder="Masukan No Tlp" value="<?=$r[5]?>" required="">
                     <input type="hidden" class="form-control border-success" value="<?=$r[6]?>" id="tgl" name="tgl_daftar" readonly>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button> 
        <button type="reset" class="btn btn-outline-danger">Reset</button>
    </div>
</form>

<?php } } ?>