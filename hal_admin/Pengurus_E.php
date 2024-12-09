 <?php
  require_once '..\z_config/Koneksi.php';

  if($_POST['idx']){
  $nik=$_POST['idx'];

  $tampil= mysqli_query($con,"SELECT * FROM tb_pengurus WHERE nik='$nik'");
  while ($r= mysqli_fetch_array($tampil)) {

?>
<form method = "POST" action="admin.php?page=Pengurus_U" data-parsley-validate enctype="multipart/form-data" class="form-sample">
    <div class="modal-body">
        <div class="d-grid gap-2">
            <div class="row">
                <div class="col-sm-4 col-lg-3">
                    <label class="col-form-label" for="nik">NIK</label>
                </div>
                <div class="col-sm-4 col-lg-8">
                    <input type="text" class="form-control border-success" id="nik" name="nik" placeholder="Masukan NIK Anda" value="<?=$r[0]?>" readonly>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 col-lg-3">
                    <label class="col-form-label" for="nama">Nama Lengkap</label>
                </div>
                <div class="col-sm-4 col-lg-8">
                    <input type="text" class="form-control border-success" id="nama" name="nama" placeholder="Masukan Nama Lengkap Anda" value="<?=$r[1]?>" required="">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 col-lg-3">
                    <label class="col-form-label" for="jk">Jenis Kelamin</label>
                </div>
                <div class="col-sm-4 col-lg-8">
                    <select class="form-control m-b-10 border-success" id="jk" name="jk" required="">
                        <option value="<?=$r[2]?>"> <?=$r[2]?> </option>
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
                    <input type="text" class="form-control border-success" id="Tem_L" name="tempat_l" placeholder="Masukan Tempat Lahir Anda" value="<?=$r[3]?>" required="">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 col-lg-3">
                    <label class="col-form-label" for="Tan_L">Tanggal Lahir</label>
                </div>
                <div class="col-sm-4 col-lg-8">
                    <input type="date" class="form-control border-success" id="Tan_L" name="Tanggal_l" placeholder="Masukan Tanggal Lahir Anda" value="<?=$r[4]?>" required="">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 col-lg-3">
                    <label class="col-form-label" for="jbtn">Jabatan</label>
                </div>
                <div class="col-sm-4 col-lg-8">
                    <select class="form-control m-b-10 border-success" id="jbtn" name="jabatan" required="">
                      <option value="<?=$r[5]?>"> <?=$r[5]?> </option>
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
                    <textarea class="form-control border-success" id="alamat" name="alamat" value="<?=$r[0]?>" required=""> <?=$r[6]?> </textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 col-lg-3">
                    <label class="col-form-label" for="tlp">No Telp</label>
                </div>
                <div class="col-sm-4 col-lg-8">
                     <input type="text" class="form-control border-success" id="tlp" name="tlp" placeholder="Masukan No Tlp" value="<?=$r[7]?>" required="">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 col-lg-3">
                    <label class="col-form-label" for="foto">Foto</label>
                </div>
                <div class="col-sm-4 col-lg-8">
                    <input class="form-control" name="foto" value="<?=$r[10]?>" type="file" id="formFile" />
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Simpan</button> 
        <button type="reset" class="btn btn-outline-danger">Reset</button>
    </div>
</form

<?php } } ?>