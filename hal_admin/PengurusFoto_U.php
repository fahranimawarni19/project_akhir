<?php
	require_once 'z_config/koneksi.php';

	$nik =$_POST['nik'];
	$Foto =$_FILES['foto']['name'];


		$hapus =mysqli_query($con,"SELECT * FROM tb_pengurus WHERE nik='$nik'");
	   // menghapus gambar yang lama
	    $nama_gambar=mysqli_fetch_array($hapus);
	    
	    $lokasi=$nama_gambar['foto'];
	    // alamat tempat foto
	    
	    $hapus_gambar="img/Pengurus/$lokasi";
	    // script untuk menghapus gambar dari folder
	    unlink($hapus_gambar);

	    $update = mysqli_query($con,"UPDATE tb_pengurus SET foto='$Foto' WHERE nik='$nik'");
		move_uploaded_file($_FILES['foto']['tmp_name'],"img/Pengurus/".$Foto);
		  
		 echo "
         <script>
         Swal.fire({
				 icon: 'success',
				 title: 'Berhasil',
				 text: 'Foto Profil Berhasil Diubah!',
				})
            </script>
        	";
        echo "<meta http-equiv='refresh' content='1; url=admin.php?page=Pengurus'>";
?>