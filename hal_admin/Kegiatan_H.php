<?php 
    require_once 'z_config/Koneksi.php';

    $id = $_GET['id_kegiatan'];

    $hapus = mysqli_query($con, "SELECT * FROM tb_kegiatan WHERE id_kegiatan='$id'");
    
    // menghapus gambar yang lama
    $nama_gambar = mysqli_fetch_array($hapus);
    
    // Hapus foto
    $lokasi_foto = $nama_gambar['foto'];
    $hapus_gambar_foto = "img/Kegiatan/$lokasi_foto";
    if (file_exists($hapus_gambar_foto)) {
        unlink($hapus_gambar_foto);
    }

    $del = mysqli_query($con, "DELETE FROM tb_kegiatan WHERE id_kegiatan='$id'");
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
