<?php
    require_once 'z_config/Koneksi.php';

    $id_dok = $_POST['id_dokumentasi'];
    $ket = $_POST['ket_dokumentasi'];
    $foto = $_FILES['foto_dokumentasi']['name'];

    if (empty($foto)) {
        // Jika tidak ada foto baru yang diunggah, hanya update keterangan
        $update = mysqli_query($con, "UPDATE tb_dokumentasi SET ket_dokumentasi='$ket' WHERE id_dokumentasi='$id_dok'");
        
        if ($update) {
            echo "
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: 'Data Berhasil Diubah!',
                    })
                </script>
            ";
            echo "<meta http-equiv='refresh' content='1; url=admin.php?page=Galeri'>";
        } else {
            echo "
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: 'Data Gagal Diubah!',
                    })
                </script>
            ";
        }
    } else {
        // Jika ada foto baru yang diunggah
        $hapus = mysqli_query($con, "SELECT * FROM tb_dokumentasi WHERE id_dokumentasi='$id_dok'");
        $nama_gambar = mysqli_fetch_array($hapus);
        $lokasi = $nama_gambar['foto_dokumentasi'];
        $hapus_gambar = "img/Dokumentasi/$lokasi";
        
        // Menghapus gambar lama dari folder jika ada
        if (file_exists($hapus_gambar)) {
            unlink($hapus_gambar);
        }
        
        // Update dengan foto baru
        $update = mysqli_query($con, "UPDATE tb_dokumentasi SET ket_dokumentasi='$ket', foto_dokumentasi='$foto' WHERE id_dokumentasi='$id_dok'");
        move_uploaded_file($_FILES['foto_dokumentasi']['tmp_name'], "img/Dokumentasi/".$foto);
        
        if ($update) {
            echo "
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: 'Data Berhasil Diubah!',
                    })
                </script>
            ";
            echo "<meta http-equiv='refresh' content='1; url=admin.php?page=Galeri'>";
        } else {
            echo "
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: 'Data Gagal Diubah!',
                    })
                </script>
            ";
        }
    }
?>
