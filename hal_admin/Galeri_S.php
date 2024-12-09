<?php
    require_once 'z_config/Koneksi.php';

    $ket = $_POST['ket_dokumentasi'];
    $foto = $_FILES['foto_dokumentasi']['name'];
    

	$simpan = mysqli_query($con,"INSERT INTO tb_dokumentasi (ket_dokumentasi, foto_dokumentasi) VALUES ('$ket','$foto')");
    move_uploaded_file($_FILES['foto_dokumentasi']['tmp_name'],"img/Dokumentasi/".$foto);

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
        echo "<meta http-equiv='refresh' content='1; url=admin.php?page=Galeri'>";
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
        echo "<meta http-equiv='refresh' content='1; url=admin.php?page=Galeri'>";
    }
?> 