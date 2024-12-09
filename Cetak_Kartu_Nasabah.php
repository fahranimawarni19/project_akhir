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
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
            margin: 0;
        }
        .card {
            width: 4in;
            height: 6in;
            background: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
            text-align: center;
        }
        .card img {
            width: 150px; /* Increased width */
            height: auto;
        }
        .card h2 {
            margin: 10px 0;
        }
        .card p {
            margin: 5px 0;
            font-size: 12px;
        }
        .card table {
            margin: 10px auto;
            font-size: 14px;
            text-align: left;
            width: 100%;
        }
        .buttons {
            text-align: center;
            margin-top: 20px;
        }
        .buttons button {
            padding: 10px 20px;
            margin: 10px;
            font-size: 12px;
            cursor: pointer;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>
<body>
    <div class="card">
        <img src="img/logo/logo-dark.png" alt="Logo"> <!-- Update the path to your logo -->
        <h3>Kartu Nasabah</h3>
        <p>Jl. Nuntati Desa Laha, Dusun Air Manis, RT/RW 002/004,</p>
        <p>Kec. Teluk Ambon, Kota Ambon, Provinsi Maluku 97236</p>
        <hr>
        <br>
        <table>
            <tr>
                <td>ID Nasabah</td>
                <td>:</td>
                <td><b><?=$nasabah['id_nasabah']?></b></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><b><?=$nasabah['nama']?></b></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td><?=$nasabah['alamat']?></td>
            </tr>
            <tr>
                <td>Dusun</td>
                <td>:</td>
                <td><?=$nasabah['dusun']?></td>
            </tr>
            <tr>
                <td>RT / RW</td>
                <td>:</td>
                <td><?=$nasabah['rt_rw']?></td>
            </tr>
            <tr>
                <td>Telepon</td>
                <td>:</td>
                <td><?=$nasabah['tlp']?></td>
            </tr>
        </table>
        <div class="buttons">
            <button onclick="window.print()">Cetak Kartu</button>
            <a href="index.php"><button>Kembali</button></a>
        </div>
    </div>
</body>
</html>
