<?php
    require_once 'z_config/Koneksi.php';

	$nik =$_POST['nik'];
    $nama =$_POST['nama'];
    $jk =$_POST['jk'];
    $Temp_L =$_POST['tempat_l'];
    $Tgl =$_POST['Tanggal_l'];
    $Jab =$_POST['jabatan'];
    $alamat =$_POST['alamat'];
    $Telp =$_POST['tlp'];
	$Foto =$_FILES['foto']['name'];

   if (empty($Foto)){
        $update =mysqli_query($con, "UPDATE tb_pengurus SET nama='$nama',jk='$jk',tempat_l='$Temp_L',tanggal_l='$Tgl',jabatan='$Jab',alamat='$alamat',tlp='$Telp' WHERE nik='$nik'");
        move_uploaded_file($_FILES['foto']['tmp_name'],"img/Pengurus/".$Foto);
         echo "
            <script>
                Swal.fire({
                 icon: 'success',
                 title: 'Berhasil',
                 text: 'Data Berhasil Diubah!',
                })
            </script>
            ";
        echo "<meta http-equiv='refresh' content='1; url=admin.php?page=Pengurus'>";
        }
        else
        {
        $hapus =mysqli_query($con,"SELECT * FROM tb_pengurus WHERE nik='$nik'");
       // menghapus gambar yang lama
        $nama_gambar=mysqli_fetch_array($hapus);
        
        $lokasi=$nama_gambar['foto'];
        // alamat tempat foto
        $hapus_gambar="img/Pengurus/$lokasi";
        // script untuk menghapus gambar dari folder
        unlink($hapus_gambar);
         $update =mysqli_query($con, "UPDATE tb_pengurus SET nama='$nama',jk='$jk',tempat_l='$Temp_L',tanggal_l='$Tgl',jabatan='$Jab',alamat='$alamat',tlp='$Telp',foto='$Foto' WHERE nik='$nik'");
       move_uploaded_file($_FILES['foto']['tmp_name'],"img/Pengurus/".$Foto);
          
         echo "
              <script>
                Swal.fire({
                 icon: 'success',
                 title: 'Berhasil',
                 text: 'Data Berhasil Diubah!',
                })
            </script>
            ";
        echo "<meta http-equiv='refresh' content='1; url=admin.php?page=Pengurus'>";
        }
?>