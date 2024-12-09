<?php
    require_once 'z_config/Koneksi.php';

    $id = $_POST['id_tentang_kami'];
    $head1 = $_POST['heading_sejarah'];
    $isi = $_POST['isi_sejarah'];
    $visi = $_POST['visi'];
    $misi = $_POST['misi'];
    $ket = $_POST['keterangan'];
    $lat = $_POST['lat'];
    $lang = $_POST['lang'];
    $alamat = $_POST['alamat'];
    $bagan = $_FILES['bagan']['name'];
    $foto = $_FILES['foto']['name'];

    if (empty($foto) && empty($bagan)) {
        $update = mysqli_query($con, "UPDATE tb_tentang_kami SET heading_sejarah='$head1', isi_sejarah='$isi', visi='$visi', misi='$misi', keterangan='$ket', lat='$lat', lang='$lang', alamat='$alamat' WHERE id_tentang_kami='$id'");
        move_uploaded_file($_FILES['bagan']['tmp_name'], "img/Tentang-Kami/" . $bagan);
        move_uploaded_file($_FILES['foto']['tmp_name'], "img/Tentang-Kami/" . $foto);
        echo "
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: 'Data Berhasil Diubah!',
                });
            </script>
        ";
        echo "<meta http-equiv='refresh' content='1; url=admin.php?page=info_blm'>";
    } else {
        $hapus = mysqli_query($con, "SELECT * FROM tb_tentang_kami WHERE id_tentang_kami='$id'");
        
        // Menghapus gambar yang lama
        $nama_gambar = mysqli_fetch_array($hapus);

        // Hapus foto lama
        if (!empty($nama_gambar['foto'])) {
            $lokasi_foto = $nama_gambar['foto'];
            $hapus_gambar_foto = "img/Tentang-Kami/$lokasi_foto";
            if (file_exists($hapus_gambar_foto)) {
                unlink($hapus_gambar_foto);
            }
        }

        // Hapus bagan lama
        if (!empty($nama_gambar['bagan'])) {
            $lokasi_bagan = $nama_gambar['bagan'];
            $hapus_gambar_bagan = "img/Tentang-Kami/$lokasi_bagan";
            if (file_exists($hapus_gambar_bagan)) {
                unlink($hapus_gambar_bagan);
            }
        }

        $update = mysqli_query($con, "UPDATE tb_tentang_kami SET heading_sejarah='$head1', isi_sejarah='$isi', visi='$visi', misi='$misi', keterangan='$ket', lat='$lat', lang='$lang', alamat='$alamat', bagan='$bagan', foto='$foto' WHERE id_tentang_kami='$id'");
        move_uploaded_file($_FILES['bagan']['tmp_name'], "img/Tentang-Kami/" . $bagan);
        move_uploaded_file($_FILES['foto']['tmp_name'], "img/Tentang-Kami/" . $foto);
        
        echo "
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: 'Data Berhasil Diubah!',
                });
            </script>
        ";
        echo "<meta http-equiv='refresh' content='1; url=admin.php?page=info_blm'>";
    }
?>
