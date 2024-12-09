<?php
require_once 'z_config/Koneksi.php';
require_once 'z_config/tampil_hari.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_tabungan = $_POST['id_tabungan'];
    $id_nasabah = $_POST['id_nasabah'];
    $tanggal_tarik = $_POST['Tanggal_tarik'];
    $metod = $_POST['metod_penarikan'];
    $jumlah = $_POST['penarikan'];

    // Retrieve current balance
    $result = mysqli_query($con, "SELECT tabungan FROM tb_tabungan WHERE id_tabungan='$id_tabungan'");
    $row = mysqli_fetch_assoc($result);

    if ($row) {
        $saldo = $row['tabungan'];

        if ($jumlah <= $saldo) {
            // Update tb_tabungan with the new balance
            $new_balance = $saldo - $jumlah;
            mysqli_query($con, "UPDATE tb_tabungan SET tabungan='$new_balance' WHERE id_tabungan='$id_tabungan'");

            // Insert into tb_penarikan
            mysqli_query($con, "INSERT INTO tb_penarikan (id_tabungan, id_nasabah, tanggal_tarik, tabungan,metod_penarikan, jumlah) 
                                VALUES ('$id_tabungan', '$id_nasabah', '$tanggal_tarik', '$new_balance','$metod', '$jumlah')");

            // Redirect or show success message
             echo "
             <script>
                Swal.fire({
                 icon: 'success',
                 title: 'Berhasil',
                 text: 'Penarikan berhasil' ,
                })
            </script>
            ";
            echo "<meta http-equiv='refresh' content='2; url=admin.php?page=Tabungan'>";
            // echo "Penarikan berhasil. Saldo baru: " . rupiah($new_balance);

        } else {
            echo "
             <script>
                  Swal.fire({
                  icon: 'Warning',
                  title: 'Saldo Tidak Cukup',
                  text: 'Maaf Saldo tidak cukup untuk melakukan penarikan',
                  timer: 3000
                })
              </script>
            ";
            // Show error message
            echo "<meta http-equiv='refresh' content='4; url=admin.php?page=Tabungan'>";
        }
    } else {

        echo "
            <script>
                  Swal.fire({
                  icon: 'error',
                  title: 'Tidak Ada ID',
                  text: 'ID tabungan tidak ditemukan',
                  showConfirmButton: true,
                })
              </script>
            ";
            echo "<meta http-equiv='refresh' content='4; url=admin.php?page=Tabungan'>";
    }
} else {
    echo "
    <script>
          Swal.fire({
          icon: 'error',
          title: 'Valid',
          text: 'Mohon Maaf Data Anda Tidak Falid'
        })
      </script>
    ";
    echo "<meta http-equiv='refresh' content='4; url=admin.php?page=Tabungan'>";
}
?>
