<?php
    require_once 'z_config/Koneksi.php';

    $id =$_POST['kode_sampah'];
	$jenis =$_POST['jenis_sampah'];
    $harga =$_POST['harga'];
   
         $update =mysqli_query($con,"UPDATE tb_sampah SET jenis_sampah='$jenis',harga='$harga' WHERE kode_sampah='$id'");

         if ($update) {
        echo "
             <script>
                Swal.fire({
                 icon: 'success',
                 title: 'Berhasil',
                 text: 'Data Berhasil Diupdate!',
                })
            </script>
            ";
        echo "<meta http-equiv='refresh' content='1; url=admin.php?page=info_blm'>";
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
        echo "<meta http-equiv='refresh' content='1; url=admin.php?page=info_blm'>";
    }
    
?>