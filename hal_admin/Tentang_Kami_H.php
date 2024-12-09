<?php 
    require_once 'z_config/Koneksi.php';

    $id_ttng_kami = $_GET['id_tentang_kami'];

    $hapus = mysqli_query($con, "SELECT * FROM tb_tentang_kami WHERE id_tentang_kami='$id_ttng_kami'");
    
    // menghapus gambar yang lama
    $nama_gambar = mysqli_fetch_array($hapus);
    
    // Hapus foto
    $lokasi_foto = $nama_gambar['foto'];
    $hapus_gambar_foto = "img/Tentang-Kami/$lokasi_foto";
    if (file_exists($hapus_gambar_foto)) {
        unlink($hapus_gambar_foto);
    }

    // Hapus bagan
    $lokasi_bagan = $nama_gambar['bagan'];
    $hapus_gambar_bagan = "img/Tentang-Kami/$lokasi_bagan";
    if (file_exists($hapus_gambar_bagan)) {
        unlink($hapus_gambar_bagan);
    }

    $del = mysqli_query($con, "DELETE FROM tb_tentang_kami WHERE id_tentang_kami='$id_ttng_kami'");
    if ($del) {
        echo "
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: 'Data Berhasil Dihapus!',
                });
            </script>
        ";
        echo "<meta http-equiv='refresh' content='1; url=admin.php?page=info_blm'>";
    } else {
        echo "
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: 'Data Gagal Dihapus!',
                });
            </script>
        ";
        echo "<meta http-equiv='refresh' content='1; url=admin.php?page=info_blm'>";
    }
?>
