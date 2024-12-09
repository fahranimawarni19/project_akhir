<?php 
require_once 'z_config/Koneksi.php';

$nik = $_POST['nik'];
$PassBaru = md5($_POST['PassBaru']);
$PassUlang = md5($_POST['PassUlang']);


//cari pass lama
$tampil = mysqli_query($con,"SELECT pass FROM tb_pengurus WHERE nik = '$nik'");
$cek = mysqli_fetch_array($tampil);

if ($PassBaru !== $PassUlang)
{
    echo "
        <script>
          Swal.fire({
          icon: 'error',
          title: 'Gagal',
          text: 'Password Baru Tidak Sama!',
          confirmButtonText: 'Ok'
          })
        </script>
      ";
    echo "<meta http-equiv='refresh' content='1; url=admin.php?page=pengurus'>";
}
else
{
          
    $ubah = mysqli_query($con,"UPDATE tb_pengurus SET pass='$PassBaru' WHERE nik = '$nik'");

    echo "
    <script>
        Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: 'Data Berhasil Disimpan!',
        })
    </script>
          ";
    echo "<meta http-equiv='refresh' content='1; url=logout.php'>";

    

}
?>