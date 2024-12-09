<?php
    require_once 'z_config/Koneksi.php';

    $nama= $_POST['nama'];
    $keterangan = $_POST['keterangan'];
    $tahun = $_POST['tahun'];
    $foto = $_FILES['foto']['name'];
    

	$simpan = mysqli_query($con,"INSERT INTO tb_prestasi (nama, keterangan, tahun, foto) VALUES ('$nama','$keterangan','$tahun','$foto')");
    move_uploaded_file($_FILES['foto']['tmp_name'],"img/Prestasi/".$foto);

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