      <link rel="stylesheet" type="text/css" href="..\assets/libs/bootstrap-wysihtml5/bootstrap-wysihtml5.css" />
    <script src="..\assets/libs/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
    <script src="..\assets/libs/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>

    <script>

       jQuery(document).ready(function(){
            $('.wysihtml5').wysihtml5();

            $('.summernote').summernote({
                height: 200,                 // set editor height

                minHeight: null,             // set minimum height of editor
                maxHeight: null,             // set maximum height of editor

                focus: true                 // set focus to editable area after initializing summernote
            });
        });

    </script>

 <?php
  require_once '../z_config/Koneksi.php';

  if($_POST['idx']){
  $id=$_POST['idx'];

  $tampil= mysqli_query($con,"SELECT * FROM tb_tentang_kami WHERE id_tentang_kami='$id'");
  while ($r= mysqli_fetch_array($tampil)) {

?>    
    <form method="POST" action="admin.php?page=Tentang_Kami_U" data-parsley-validate enctype="multipart/form-data">
        <div class="d-grid gap-2">
            <div class="row">
                <label for="head" class="col-sm-2 col-form-label">Heading Sejarah</label>
                <div class="col-sm-7">
                    <input type="hidden"  class="form-control" id="head" name="id_tentang_kami" value="<?=$r[0]?>" />
                    <input type="text"  class="form-control" id="head" name="heading_sejarah" placeholder="Masukan Judul" value="<?=$r[1]?>" />
                </div>
            </div>
            <div class="row">
                <label for="isi" class="col-sm-2 col-form-label">Isi Sejarah</label>
                <div class="col-sm-7">
                    <textarea class="form-control" id="isi" name="isi_sejarah"  value="<?=$r[2]?>"  > <?=$r[2]?></textarea>
                </div>
            </div>
            <div class="row">
                <label for="visi" class="col-sm-2 col-form-label">Visi</label>
                <div class="col-sm-7">
                    <textarea class="wysihtml5 form-control" id="visi" name="visi"  value="<?=$r[3]?>" ><?=$r[3]?> </textarea>
                </div>
            </div>
            <div class="row">
                <label for="misi" class="col-sm-2 col-form-label">Misi</label>
                <div class="col-sm-7">
                    <textarea class="wysihtml5 form-control" id="misi" name="misi"  value="<?=$r[4]?>" ><?=$r[4]?> </textarea>
                </div>
            </div>
            <div class="row">
                <label for="Ket" class="col-sm-2 col-form-label">Keterangan</label>
                <div class="col-sm-7">
                    <input type="text"  class="form-control" id="Ket" name="keterangan"  value="<?=$r[5]?>"  placeholder="Masukan Keterangan Lokasi" />
                </div>
            </div>
            <div class="row">
                <label for="lat" class="col-sm-2 col-form-label">Lat</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" id="lat" name="lat" placeholder="Ex:-3.6959994"  value="<?=$r[6]?>"  />
                </div>
            </div>
            <div class="row">
                <label for="lang" class="col-sm-2 col-form-label">Lang</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" id="lang" name="lang" placeholder="Ex:128.1786422"  value="<?=$r[7]?>"  />
                </div>
            </div>
            <div class="row">
                <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-7">
                    <textarea class="form-control" id="alamat" name="alamat"  value="<?=$r[8]?>" ><?=$r[8]?> </textarea>
                </div>
            </div>
            <div class="row">
                <label for="bagan" class="col-sm-2 col-form-label">Bagan</label>
                <div class="col-sm-7">
                     <input type="file" class="form-control" id="bagan" name="bagan"  />
                </div>
            </div>

            <div class="row">
                <label for="foto" class="col-sm-2 col-form-label">Foto Lokasi</label>
                <div class="col-sm-7">
                     <input type="file" class="form-control" id="lang" name="foto" />
                </div>
            </div>
            <div class="row">
                <label for="foto" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-7">
                    <button type="submit" class="btn btn-primary">Simpan</button> 
                    <button type="reset" class="btn btn-danger">Reset</button>
                </div>
            </div>
        </div>
    </form>
<?php } } ?>