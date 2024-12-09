<?php
require_once 'z_config/Koneksi.php';

// Get the id_nasabah from the URL parameters
$id_nasabah = $_GET['id_nasabah'];

// Fetch nasabah details from the database
$query = mysqli_query($con, "SELECT * FROM tb_nasabah WHERE id_nasabah = '$id_nasabah'");
$nasabah = mysqli_fetch_assoc($query);

if (!$nasabah) {
    echo "
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: 'Data Nasabah Tidak Ditemukan!',
        });
    </script>";
    echo "<meta http-equiv='refresh' content='1; url=index.php?page=Dashboard'>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Kartu Nasabah</title>
    <link rel="stylesheet" href="path/to/your/css/styles.css"> <!-- Include your CSS here -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>
<body>
    <div class="card">
        <h2>Kartu Nasabah</h2>
        <p><strong>ID Nasabah:</strong> <?php echo $nasabah['id_nasabah']; ?></p>
        <p><strong>Nama:</strong> <?php echo $nasabah['nama']; ?></p>
        <p><strong>Alamat:</strong> <?php echo $nasabah['alamat']; ?></p>
        <p><strong>Dusun:</strong> <?php echo $nasabah['dusun']; ?></p>
        <p><strong>RT/RW:</strong> <?php echo $nasabah['rt_rw']; ?></p>
        <p><strong>Telepon:</strong> <?php echo $nasabah['tlp']; ?></p>
    </div>
    <button onclick="window.print()">Cetak Kartu</button>
</body>
</html>
