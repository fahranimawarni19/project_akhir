<?php
// Ambil data dari Riwayat_Cek.php
require_once 'z_config/Koneksi.php';
require_once 'z_config/tampil_hari.php';

$id = $_GET['id_penarikan']; // Pastikan id_penarikan diambil dengan benar dari URL

// Query untuk mendapatkan data penarikan sesuai dengan ID penarikan
$query_penarikan = mysqli_query($con, "SELECT tb_penarikan.id_nasabah, tb_nasabah.nama, tb_nasabah.tlp, tb_penarikan.metod_penarikan, tb_penarikan.jumlah, tb_penarikan.tanggal_tarik FROM tb_penarikan JOIN tb_nasabah ON tb_penarikan.id_nasabah = tb_nasabah.id_nasabah WHERE tb_penarikan.id_penarikan = '$id'");

// Mengambil data pertama dari hasil query (asumsi hanya satu data karena Struk.php umumnya untuk satu transaksi)
$r = mysqli_fetch_array($query_penarikan);

// Query untuk mendapatkan sisa saldo nasabah
$tampil = mysqli_query($con, "SELECT tb_tabungan.id_tabungan, tb_tabungan.id_nasabah, tb_tabungan.tabungan, tb_nasabah.nama, tb_nasabah.alamat, tb_nasabah.tlp FROM tb_tabungan JOIN tb_nasabah ON tb_tabungan.id_nasabah = tb_nasabah.id_nasabah WHERE tb_tabungan.id_nasabah = '{$r['id_nasabah']}' GROUP BY tb_tabungan.id_tabungan");

$r_saldo = mysqli_fetch_array($tampil);
$sisa_saldo = $r_saldo['tabungan'];
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Cetak Struk || Penarikan</title>
        <link rel="shortcut icon" href="img/logo/favicon.ico">

        <link href="assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css">

        <!-- dark layout js -->
        <script src="assets/js/pages/layout.js"></script>

         <!-- Sweet Alert-->
        <link rel="stylesheet" href="assets/libs/sweetalert2/sweetalert2.min.css">
        <!-- Sweet Alerts js -->
        <script src="assets/libs/sweetalert2/sweetalert2.min.js"></script>
        <!-- Sweet alert init js-->
        <script src="assets/js/pages/sweet-alerts.init.js"></script>

        <!-- DataTables -->
        <link href="assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />

        <!-- Responsive datatable examples -->
        <link href="assets/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" type="text/css" />

        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- simplebar css -->
        <link href="assets/libs/simplebar/simplebar.min.css" rel="stylesheet">
        <!-- App Css-->
        <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
        <style>
            body {
                font-family: Arial, sans-serif;
            }
            .invoice-box {
                max-width: 500px;
                margin: auto;
                padding: 30px;
                border: 1px solid #eee;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
                font-size: 16px;
                line-height: 24px;
                color: #555;
            }
            .invoice-box table {
                width: 100%;
                line-height: inherit;
                text-align: left;
            }
            .invoice-box table td {
                padding: 5px;
                vertical-align: top;
            }
            .invoice-box table tr td:nth-child(2) {
                text-align: right;
            }
            .invoice-box table tr.top table td {
                padding-bottom: 20px;
            }
            .invoice-box table tr.top table td.title {
                font-size: 45px;
                line-height: 45px;
                color: #333;
            }
            .invoice-box table tr.information table td {
                padding-bottom: 40px;
            }
            .invoice-box table tr.heading td {
                background: #eee;
                border-bottom: 1px solid #ddd;
                font-weight: bold;
            }
            .invoice-box table tr.details td {
                padding-bottom: 20px;
            }
            .invoice-box table tr.item td {
                border-bottom: 1px solid #eee;
            }
            .invoice-box table tr.item.last td {
                border-bottom: none;
            }
            .invoice-box table tr.total td:nth-child(2) {
                border-top: 2px solid #eee;
                font-weight: bold;
            }
        </style>
    </head>
   
    <body>
        <div class="row">
            <div class="col-lg-12">
                <div class="card px-9">
                    <div class="card-body">
                        <div class="container-fluid mt-2 d-flex justify-content-center w-100">
                            <div class="col-12">
                                <div class="invoice-box">
                                    <table>
                                        <tr class="top">
                                            <td colspan="2">
                                                <table>
                                                    <tr>
                                                        <td class="title">
                                                            <h2>Invoice</h2>
                                                        </td>
                                                        <td>
                                                            ID_Nasabah : <?=$r['id_nasabah']?> <br>
                                                            Created: <?php echo date('d F Y'); ?><br>
                                                            Status: Penarikan
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr class="information">
                                            <td colspan="2">
                                                <table>
                                                    <tr>
                                                        <td>
                                                            Nama Nasabah:<br>
                                                            <?php echo $r['nama']; ?>
                                                        </td>
                                                        <td>
                                                            Bank Sampah<br>
                                                            JI. Nuntati Desa Laha<br>
                                                            Kec. Teluk Ambon, Kota Ambon
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr class="heading">
                                            <td>
                                                Metode Pembayaran
                                            </td>
                                            <td>
                                                Jumlah
                                            </td>
                                        </tr>
                                        <tr class="details">
                                            <td>
                                                <?=$r['metod_penarikan']?>
                                            </td>
                                            <td>
                                                <?php echo rupiah($r['jumlah']); ?>
                                            </td>
                                        </tr>
                                        <tr class="heading">
                                            <td>
                                                Keterangan
                                            </td>
                                            <td>
                                            </td>
                                        </tr>
                                        <tr class="item last">
                                            <td>
                                                Penarikan Dana
                                            </td>
                                            <td>
                                                <?php echo rupiah($r['jumlah']); ?>
                                            </td>
                                        </tr>
                                        <tr class="total">
                                            <td></td>
                                            <td>
                                                Total: <?php echo rupiah($r['jumlah']); ?>
                                            </td>
                                        </tr>
                                        <tr class="heading">
                                            <td></td>
                                            <td>
                                                Sisa Saldo: <?php echo rupiah($sisa_saldo); ?>
                                            </td>
                                        </tr>
                                    </table>
                                    <a href="javascript:window.print()" class="btn btn-primary float-right mt-4 ml-2"><i class="mdi mdi-printer mr-1"></i> Print</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Masukkan semua script JavaScript yang Anda perlukan di sini -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>

        <!-- Required datatable js -->
        <script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>

        <!-- Responsive examples -->
        <script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>

        <!-- Datatable init js -->
        <script src="assets/js/pages/datatables-base.init.js"></script>
        <script src="assets/js/pages/datatables-advanced.init.js"></script>

        <!-- bs custom file input plugin -->
        <script src="assets/libs/bs-custom-file-input/bs-custom-file-input.min.js"></script>

        <!-- apexcharts -->
        <script src="assets/libs/apexcharts/apexcharts.min.js"></script>

        <script src="assets/js/pages/dashboard.init.js"></script>

        <script src="assets/libs/select2/js/select2.min.js"></script>

        <script src="assets/js/pages/form-select2.init.js"></script>

        <!-- App js -->
        <script src="assets/js/app.js"></script>
    </body>
</html>
