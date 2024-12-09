<?php 
	require_once 'z_config/Koneksi.php';

	$id = $_GET['id_prestasi'];

	

	$hapus =mysqli_query($con,"SELECT * FROM tb_prestasi WHERE id_prestasi='$id'");
       // menghapus gambar yang lama
    $nama_gambar=mysqli_fetch_array($hapus);
    
    $lokasi=$nama_gambar['foto'];
    // alamat tempat foto
    $hapus_gambar="img/Prestasi/$lokasi";
    // script untuk menghapus gambar dari folder
    unlink($hapus_gambar);

	$del = mysqli_query($con,"DELETE FROM tb_prestasi WHERE id_prestasi='$id'");
	if ($del) {
		 echo "
             <script>
                Swal.fire({
                 icon: 'success',
                 title: 'Berhasil',
                 text: 'Data Berhasil Dihapus!',
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
                text: 'Data Gagal Dihapus!',
                })
            </script>
        	";
        echo "<meta http-equiv='refresh' content='1; url=admin.php?page=Info_blm'>";
	}
 ?>
 