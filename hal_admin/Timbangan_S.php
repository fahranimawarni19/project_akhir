<?php
require_once 'z_config/Koneksi.php';

$id_tab = $_POST['id_timbangan'];
$id_nas = $_POST['id_nasabah'];
$tgl_t = $_POST['tgl_timbangan'];
$ket = "Nabung";

// Insert ke tb_timbangan
$query = mysqli_query($con, "INSERT INTO tb_timbangan VALUES ('$id_tab', '$id_nas', '$tgl_t', '$ket')");

if($query) {
    // Pilih data dari tabelsementara
    $detail = mysqli_query($con, "SELECT * FROM tabelsementara");

    $total_harga = 0;

    while($d = mysqli_fetch_array($detail)) {
        $total_harga += (int)$d['total_harga'];
        // Insert ke tb_detail_timbangan
        $simpan = mysqli_query($con, "INSERT INTO tb_detail_timbangan VALUES('$id_tab', '$d[0]', '$d[2]', '$d[3]')");
    }

    // Cek apakah id_nasabah sudah ada di tb_tabungan
    $check_existing = mysqli_query($con, "SELECT tabungan FROM tb_tabungan WHERE id_nasabah = '$id_nas'");
    if(mysqli_num_rows($check_existing) > 0) {
        // Jika ada, update data yang sudah ada
        $existing_data = mysqli_fetch_assoc($check_existing);
        $new_tabungan = $existing_data['tabungan'] + $total_harga;
        $update_tabungan = mysqli_query($con, "UPDATE tb_tabungan SET tabungan = '$new_tabungan' WHERE id_nasabah = '$id_nas'");
    } else {
        // Jika tidak ada, insert data baru
        $simpan_tabungan = mysqli_query($con, "INSERT INTO tb_tabungan (id_nasabah, tabungan) VALUES ('$id_nas', '$total_harga')");
    }

    // Kosongkan tabelsementara
    $hapus = mysqli_query($con, "TRUNCATE tabelsementara");

    echo "
         <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: 'Data Berhasil Disimpan!',
            })
        </script>
    ";
    echo "<meta http-equiv='refresh' content='1; url=admin.php?page=Timbangan_Nasabah'>";
} else {
    echo "
         <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: 'Data Gagal Disimpan!',
            })
        </script>
    ";
    echo "<meta http-equiv='refresh' content='1; url=admin.php?page=Timbangan_Nasabah'>";
}
?>
