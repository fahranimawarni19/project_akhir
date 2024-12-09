<?php
    // Require the connection file
    require_once 'z_config/Koneksi.php';

    // Mengambil nilai dari array POST
    $kode = $_POST['kode_sampah'];
    $jenis = $_POST['jenis_sampah'];
    $harga = $_POST['harga'];

    // Mengecek apakah jenis_sampah yang diberikan sudah ada di database
    $cek_jenis_sampah = mysqli_query($con, "SELECT * FROM tb_sampah WHERE jenis_sampah = '$jenis'");
    $cek = mysqli_num_rows($cek_jenis_sampah);

    if ($cek > 0) {
        // Jika jenis_sampah sudah ada, minta pengguna untuk memasukkan jenis sampah yang berbeda
        echo "
             <script>
                Swal.fire({
                 icon: 'error',
                 title: 'Gagal',
                 text: 'Maaf Jenis Sampah Sudah Ada! Masukkan Jenis Sampah Lain.',
                })
            </script>
            ";
        // Redirect kembali ke halaman formulir setelah 2 detik
        echo "<meta http-equiv='refresh' content='2; url=admin.php?page=info_blm'>";
    } else {
        // Masukkan data ke dalam database jika jenis_sampah unik
        $simpan = mysqli_query($con,"INSERT INTO tb_sampah VALUES ('$kode','$jenis','$harga')");

        // Periksa apakah penambahan berhasil
        if ($simpan) {
            // Jika berhasil, tampilkan pesan kesuksesan menggunakan SweetAlert
            echo "
                 <script>
                    Swal.fire({
                     icon: 'success',
                     title: 'Berhasil',
                     text: 'Data Berhasil Disimpan!',
                    })
                </script>
                ";
            // Redirect ke admin.php setelah 1 detik
            echo "<meta http-equiv='refresh' content='1; url=admin.php?page=info_blm'>";
        } else {
            // Jika penambahan gagal, tampilkan pesan kesalahan menggunakan SweetAlert
            echo "
                 <script>
                    Swal.fire({
                     icon: 'error',
                     title: 'Gagal',
                     text: 'Data Gagal Tersimpan!',
                    })
                </script>
                ";
            // Redirect ke admin.php setelah 1 detik
            echo "<meta http-equiv='refresh' content='1; url=admin.php?page=info_blm'>";
        }
    }
?>
