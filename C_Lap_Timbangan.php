<?php
// Memanggil library FPDF
require('library/fpdf.php');
require_once 'z_config/tampil_hari.php';
require_once 'z_config/Koneksi.php';

// Instance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('L', 'mm', 'A4');
$pdf->AddPage();

// Menambahkan margin untuk header
$pdf->SetMargins(10, 10);

// Menghitung posisi tengah halaman untuk logo
$pageWidth = $pdf->GetPageWidth();
$logoWidth = 50;
$logoX = ($pageWidth - $logoWidth) / 2;

// Menambahkan logo lebih tinggi di halaman
$pdf->Image('img/logo/logo-dark.png', $logoX, 5, 50); // Ganti dengan path logo yang benar

// Menambahkan alamat perusahaan dan nomor telepon di bawah logo
$pdf->SetFont('Times', 'B', 13);
$pdf->Ln(25); // Tambahkan jarak antara logo dan teks
$pdf->Cell(0, 10, 'BANK SAMPAH BUMI LESTARI MALAUKU', 0, 1, 'C');

$pdf->SetFont('Times', '', 11);
$pdf->Cell(0, 5, 'JI. Nuntati Desa Laha, Dusun Air Manis, RT/RW 002/004, Kec. Teluk Ambon, Kota Ambon, Provinsi Maluku 97236', 0, 1, 'C');
$pdf->Cell(0, 5, 'Telp: +62 821-9996-5654 (Ibu Tini)', 0, 1, 'C');

// Menambahkan spasi antara header dan judul tabel
$pdf->Ln(13);


// Menempatkan teks "DATA TIMBANGAN NASABAH" di tengah halaman
$pdf->SetFont('Times', 'B', 13);
$pdf->Cell(0, 2, 'REKAPAN DATA TIMBANGAN NASABAH', 0, 1, 'C');

// Menambahkan informasi hari, tanggal, tahun, dan jam sekarang
// Mengatur zona waktu ke Indonesia Timur (WIT)
date_default_timezone_set('Asia/Jayapura');
$jam = date('H:i:s'); // Jam
$pdf->SetFont('Times', '', 11);
$pdf->Cell(0, 10, $hari_ini . ' / '.$jam, 0, 1, 'C');

$pdf->Ln(2); // Menambahkan spasi sebelum tabel

// Gaya header tabel
$pdf->SetFillColor(200, 200, 200); // Warna latar belakang header
$pdf->SetTextColor(0, 0, 0); // Warna teks header
$pdf->SetDrawColor(50, 50, 100); // Warna garis header
$pdf->SetLineWidth(0.3); // Lebar garis header
$pdf->SetFont('Times', 'B', 10);
$pdf->Cell(10, 7, 'NO', 1, 0, 'C', true);
$pdf->Cell(25, 7, 'ID Nasabah', 1, 0, 'C', true);
$pdf->Cell(50, 7, 'Tanggal Timbangan', 1, 0, 'C', true);
$pdf->Cell(40, 7, 'Jenis Sampah', 1, 0, 'C', true);
$pdf->Cell(40, 7, 'Berat Sampah / Kg', 1, 0, 'C', true);
$pdf->Cell(50, 7, 'Harga/Kg', 1, 0, 'C', true);
$pdf->Cell(50, 7, 'Total Harga', 1, 1, 'C', true); // Perubahan di sini, dari 0 ke 1

// Gaya isi tabel
$pdf->SetFont('Times', '', 10);

$no = 1;
$id = mysqli_real_escape_string($con, $_GET['id_nasabah']);

$data = mysqli_query($con, "SELECT n.id_nasabah, t.tgl_timbangan, s.jenis_sampah, SUM(d.berat) AS berat, s.harga, SUM(d.berat * s.harga) AS total_harga FROM tb_detail_timbangan d JOIN tb_timbangan t ON d.id_timbangan = t.id_timbangan JOIN tb_sampah s ON d.kode_sampah = s.kode_sampah JOIN tb_nasabah n ON t.id_nasabah = n.id_nasabah WHERE n.id_nasabah = '$id' GROUP BY n.id_nasabah, t.tgl_timbangan, s.jenis_sampah, s.harga ORDER BY n.id_nasabah, t.tgl_timbangan ");

$fill = false; // Variabel untuk latar belakang bergantian
$pdf->SetFillColor(240, 240, 240); // Warna latar belakang baris bergantian
$total_harga_keseluruhan = 0; // Inisialisasi total harga keseluruhan

while ($d = mysqli_fetch_array($data)) {
    $pdf->Cell(10, 6, $no++, 1, 0, 'C', $fill);
    $pdf->Cell(25, 6, $d['id_nasabah'], 1, 0, '', $fill);
    $pdf->Cell(50, 6, $d['tgl_timbangan'], 1, 0, '', $fill);  
    $pdf->Cell(40, 6, $d['jenis_sampah'], 1, 0, '', $fill);
    $pdf->Cell(40, 6, rupiah($d['berat']), 1, 0, 'R', $fill);
    $pdf->Cell(50, 6, rupiah($d['harga']), 1, 0, 'R', $fill);
    $pdf->Cell(50, 6, rupiah($d['total_harga']), 1, 1, 'R', $fill); // Perubahan di sini, dari 0 ke 1
    $fill = !$fill; // Mengubah latar belakang untuk baris berikutnya
    
    // Tambahkan total_harga ke total_harga_keseluruhan
    $total_harga_keseluruhan += $d['total_harga'];
}

// Menambahkan baris total biaya timbangan
$pdf->SetFont('Times', 'B', 10);
$pdf->Cell(215, 7, 'Total Biaya Timbangan', 1, 0, 'R', true);
$pdf->Cell(50, 7, rupiah($total_harga_keseluruhan), 1, 1, 'R', true);

// Menambahkan spasi di bawah tabel
$pdf->Ln(10);

$pdf->Output();
?>
