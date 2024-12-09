 <!-- Sweet Alert-->
    <link rel="stylesheet" href="assets/libs/sweetalert2/sweetalert2.min.css">
    <!-- Sweet Alerts js -->
    <script src="assets/libs/sweetalert2/sweetalert2.min.js"></script>
    <!-- Sweet alert init js-->
    <script src="assets/js/pages/sweet-alerts.init.js"></script>
<?php
// Mulai sesi untuk menyimpan pesan kesalahan atau konfirmasi
session_start();

// Include file koneksi database
require_once 'z_config/Koneksi.php';

// Cek apakah data form telah dikirimkan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $nik = mysqli_real_escape_string($con, $_POST['PassLama']);
    $new_password = mysqli_real_escape_string($con, $_POST['PassBaru']);
    $confirm_password = mysqli_real_escape_string($con, $_POST['PassUlang']);

    // Validasi input
    if ($new_password !== $confirm_password) {

        echo "
         <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: 'Password baru dan konfirmasi password tidak cocok!',
            })
        </script>
    ";
    echo "<meta http-equiv='refresh' content='1; url=login.php'>";
    }

    // Enkripsi password baru menggunakan MD5 atau hash lainnya
    $hashed_password = md5($new_password); // Ini menggunakan MD5, bisa diganti dengan bcrypt atau lainnya

    // Query untuk cek NIK dan jabatan admin
    $sql = "SELECT * FROM tb_pengurus WHERE nik='$nik' AND jabatan='Admin'";
    $result = mysqli_query($con, $sql);

    // Cek apakah NIK valid dan pengguna adalah admin
    if (mysqli_num_rows($result) > 0) {
        // Update password baru
        $update_sql = "UPDATE tb_pengurus SET pass='$hashed_password' WHERE nik='$nik' AND jabatan='Admin'";
        if (mysqli_query($con, $update_sql)) {
            echo "
                 <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: 'Password Berhasil Diubah',
                    })
                </script>
            ";
            echo "<meta http-equiv='refresh' content='1; url=login.php'>";
        } else {
            echo "
                <script>
                      Swal.fire({
                      icon: 'Warning',
                      title: 'Password Tidak Sesuai',
                      text: 'Terjadi kesalahan saat memperbarui password. Silakan coba lagi.',
                      showConfirmButton: true,
                      timer: 3000
                    })
                  </script>
                ";
                echo "<meta http-equiv='refresh' content='1; url=login.php'>";
        }
    } else {
        echo "
         <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: 'NIK tidak ditemukan atau bukan admin.',
            })
        </script>
    ";
    echo "<meta http-equiv='refresh' content='1; url=login.php'>";
    }
} else {
    echo "
         <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: 'Metode pengiriman tidak valid!',
            })
        </script>
    ";
    echo "<meta http-equiv='refresh' content='1; url=login.php'>";
}

// Tutup koneksi
mysqli_close($con);
?>
