<?php
    require_once 'z_config/Koneksi.php';

    $judul=$_POST['judul_kegiatan'];
    $tujuan=$_POST['tujuan_kegiatan'];
    $ket=$_POST['ket_kegiatan'];
    $tgl=$_POST['tgl_kegiatan'];
    $Foto=$_FILES['foto_kegiatan']['name'];
    

	$simpan = mysqli_query($con,"INSERT INTO tb_kegiatan (judul_kegiatan,tujuan_kegiatan,ket_kegiatan,tgl_kegiatan,foto_kegiatan) VALUES ('$judul','$tujuan','$ket','$tgl','$Foto')");
    move_uploaded_file($_FILES['foto_kegiatan']['tmp_name'],"img/Kegiatan/".$Foto);

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