 <?php
  require_once '..\z_config/Koneksi.php';
  require_once '..\z_config/tampil_hari.php';

  if($_POST['idx']){
  $id_tab=$_POST['idx'];

  $tampil= mysqli_query($con,"SELECT * FROM tb_tabungan WHERE id_tabungan='$id_tab'");
  while ($r= mysqli_fetch_array($tampil)) {

?>

<form method = "POST" action="admin.php?page=Penarikan_S" data-parsley-validate enctype="multipart/form-data" class="form-sample">
<div class="modal-body">
    <div class="d-grid gap-2">
        <div class="row">
            <div class="col-sm-4 col-lg-3">
                <label class="col-form-label" for="id">ID Nasabah</label>
            </div>
            <div class="col-sm-4 col-lg-8">
                <input type="hidden" class="form-control" id="nik" name="id_tabungan"  value="<?=$r[0]?>" readonly>
                <input type="text" class="form-control" id="id" name="id_nasabah"  value="<?=$r[1]?>" readonly>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 col-lg-3">
                <label class="col-form-label" for="tgl">Tanggal</label>
            </div>
            <div class="col-sm-4 col-lg-8">
                <input type="text" class="form-control" id="tgl" name="Tanggal_tarik" value="<?=$hari_ini?>" readonly>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 col-lg-3">
                <label class="col-form-label" for="tabungan">Saldo</label>
            </div>
            <div class="col-sm-4 col-lg-8">
                <input type="text" class="form-control" id="tabungan" name="tabungan" value="<?=rupiah($r[2])?>"  readonly>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 col-lg-3">
                <label class="col-form-label" for="tabungan">Metode Penarikan</label>
            </div>
            <div class="col-sm-4 col-lg-8">
                <select class="form-control" name="metod_penarikan" required>
                    <option>Transfer Bank</option>
                    <option>Cash / Tunai</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 col-lg-3">
                <label class="col-form-label" for="jumlah">Jumlah</label>
            </div>
            <div class="col-sm-4 col-lg-8">
                <input type="text" class="form-control border-success" id="jumlah" name="penarikan" placeholder="Masukan Jumlah Penarikan" required>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="submit" class="btn btn-primary">Tarik</button> 
    <button type="reset" class="btn btn-outline-danger">Reset</button>
</div>
</form>

<?php } } ?>