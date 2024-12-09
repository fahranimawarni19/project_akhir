<?php
    require_once 'z_config/Koneksi.php';

    $head1=$_POST['heading_sejarah'];
    $isi=$_POST['isi_sejarah'];
    $visi=$_POST['visi'];
    $misi=$_POST['misi'];
    $ket=$_POST['keterangan'];
    $lat=$_POST['lat'];
    $lang=$_POST['lang'];
    $alamat=$_POST['alamat'];
    $bagan=$_FILES['bagan']['name'];
    $foto=$_FILES['foto']['name'];
    

	$simpan = mysqli_query($con,"INSERT INTO tb_tentang_kami (heading_sejarah,isi_sejarah,visi,misi,keterangan,lat,lang,alamat,bagan,foto) VALUES ('$head1','$isi','$visi','$misi','$ket','$lat','$lang','$alamat','$bagan','$foto')");
    move_uploaded_file($_FILES['bagan']['tmp_name'],"img/Tentang-Kami/".$bagan);
    move_uploaded_file($_FILES['foto']['tmp_name'],"img/Tentang-Kami/".$foto);

	if ($simpan) {
        echo "
             <script>
                Swal.fire({
				 icon: 'success',
				 title: 'Berhasil',
				 text: 'Data Berhasil Disimpan!',
				})
            </script>
        	";
        echo "<meta http-equiv='refresh' content='1; url=admin.php?page=Info_blm'>";
    }else
    {   
        echo "
             <script>
                Swal.fire({
				 icon: 'error',
				 title: 'Gagal',
				 text: 'Data Gagal Tersimpan!',
				})
            </script>
        	";
        echo "<meta http-equiv='refresh' content='1; url=admin.php?page=Info_blm'>";
    }
?> 