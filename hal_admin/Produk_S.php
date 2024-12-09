<?php
    require_once 'z_config/Koneksi.php';

    $nama=$_POST['nama'];
    $keterangan=$_POST['keterangan'];
    $foto=$_FILES['foto']['name'];
    

	$simpan = mysqli_query($con,"INSERT INTO tb_produk (nama_produk, keterangan, foto) VALUES ('$nama','$keterangan','$foto')");
    move_uploaded_file($_FILES['foto']['tmp_name'],"img/Produk/".$foto);

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