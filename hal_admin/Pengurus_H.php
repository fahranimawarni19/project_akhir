<?php 
	require_once 'z_config/Koneksi.php';

	$nik = $_GET['nik'];

	

	$hapus =mysqli_query($con,"SELECT * FROM tb_Pengurus WHERE nik='$nik'");
       // menghapus gambar yang lama
    $nama_gambar=mysqli_fetch_array($hapus);
    
    $lokasi=$nama_gambar['foto'];
    // alamat tempat foto
    $hapus_gambar="img/Pengurus/$lokasi";
    // script untuk menghapus gambar dari folder
    unlink($hapus_gambar);

	$del = mysqli_query($con,"DELETE FROM tb_Pengurus WHERE nik='$nik'");
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
        echo "<meta http-equiv='refresh' content='1; url=admin.php?page=Pengurus'>";
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
        echo "<meta http-equiv='refresh' content='1; url=admin.php?page=Pengurus'>";
	}
 ?>
 