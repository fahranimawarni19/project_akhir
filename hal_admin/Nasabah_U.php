<?php
    require_once 'z_config/Koneksi.php';

	$id =$_POST['id_nasabah'];
    $nama =$_POST['nama'];
    $alamat =$_POST['alamat'];
    $dusun =$_POST['dusun'];
    $rt_rw =$_POST['rt_rw'];
    $tlp =$_POST['tlp'];
    $tgl =$_POST['tgl_daftar'];

   
         $update =mysqli_query($con, "UPDATE tb_nasabah SET nama='$nama',alamat='$alamat',dusun='$dusun',rt_rw='$rt_rw',tlp='$tlp',tgl_daftar='$tgl' WHERE id_nasabah='$id'");
          
         echo "
              <script>
                Swal.fire({
                 icon: 'success',
                 title: 'Berhasil',
                 text: 'Data Berhasil Diubah!',
                })
            </script>
            ";
        echo "<meta http-equiv='refresh' content='1; url=admin.php?page=Nasabah'>";
        
?>