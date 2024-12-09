<?php
require_once 'z_config/Koneksi.php';

$id = $_POST['id_nasabah'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$dusun = $_POST['dusun'];
$rt_rw = $_POST['rt_rw'];
$tlp = $_POST['tlp'];
$tgl = $_POST['tgl_daftar'];

$simpan = mysqli_query($con, "INSERT INTO tb_nasabah VALUES ('$id','$nama','$alamat','$dusun','$rt_rw','$tlp','$tgl')");

if ($simpan) {
   
    echo "
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: 'Pendaftaran Berhasil!',
                onClose: () => {
                    window.location.href = 'Cetak_Kartu_Nasabah.php?id_nasabah=$id';
                }
            });
        </script>
    ";
} else {
    echo "
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: 'Pendaftaran Data Gagal Tersimpan! Coba Lagi',
            });
        </script>
    ";
    echo "<meta http-equiv='refresh' content='1; url=index.php?page=Dashboard'>";
}
?>
