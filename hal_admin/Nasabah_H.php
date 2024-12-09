<?php 
	require_once 'z_config/Koneksi.php';

	$id = $_GET['id_nasabah'];


	$del = mysqli_query($con,"DELETE FROM tb_nasabah WHERE id_nasabah='$id'");
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
        echo "<meta http-equiv='refresh' content='1; url=admin.php?page=Nasabah'>";
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
        echo "<meta http-equiv='refresh' content='1; url=admin.php?page=Nasabah'>";
	}
 ?>
 