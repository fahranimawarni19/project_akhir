<?php
// Memanggil library FPDF
require('library/fpdf.php');
require_once 'z_config/tampil_hari.php';
require_once 'z_config/Koneksi.php';

// Mendapatkan nilai dari URL
$Dari = $_GET['dari_tanggal'];
$Ke = $_GET['ke_tanggal'];

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
$pdf->Cell(0, 2, 'LAPORAN DATA TIMBANGAN', 0, 1, 'C');

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

// Menghitung lebar total tabel
$lebar_tabel = 10 + 40 + 25 + 40 + 50 + 40 + 50; // Lebar total kolom
$posisi_x = ($pageWidth - $lebar_tabel) / 2; // Posisi X agar tabel berada di tengah

// Atur posisi X
$pdf->SetX($posisi_x);

// Header tabel
$pdf->Cell(10, 7, 'NO', 1, 0, 'C', true);
$pdf->Cell(40, 7, 'Tanggal Timbangan', 1, 0, 'C', true);
$pdf->Cell(25, 7, 'Nama Nasabah', 1, 0, 'C', true);
$pdf->Cell(40, 7, 'Jenis Sampah', 1, 0, 'C', true);
$pdf->Cell(50, 7, 'Harga/Kg', 1, 0, 'C', true);
$pdf->Cell(40, 7, 'Berat Sampah / Kg', 1, 0, 'C', true);
$pdf->Cell(50, 7, 'Total Harga', 1, 1, 'C', true);

// Gaya isi tabel
$pdf->SetFont('Times', '', 10);
$no = 1;

$query = $con->prepare("SELECT t.tgl_timbangan, n.nama, s.jenis_sampah, s.harga, d.berat, (d.berat * s.harga) AS total_harga FROM tb_detail_timbangan d JOIN tb_timbangan t ON d.id_timbangan = t.id_timbangan JOIN tb_nasabah n ON t.id_nasabah = n.id_nasabah JOIN tb_sampah s ON d.kode_sampah = s.kode_sampah WHERE t.tgl_timbangan BETWEEN ? AND ? ORDER BY t.tgl_timbangan, n.nama");
$query->bind_param("ss", $Dari, $Ke);
$query->execute();
$result = $query->get_result();

$fill = false; // Variabel untuk latar belakang bergantian
$pdf->SetFillColor(240, 240, 240); // Warna latar belakang baris bergantian
$total_harga_keseluruhan = 0; // Inisialisasi total harga keseluruhan

while ($d = $result->fetch_assoc()) {
    $pdf->SetX($posisi_x); // Atur posisi X untuk setiap baris
    $pdf->Cell(10, 6, $no++, 1, 0, 'C', $fill);
    $pdf->Cell(40, 6, $d['tgl_timbangan'], 1, 0, '', $fill);  
    $pdf->Cell(25, 6, $d['nama'], 1, 0, '', $fill);
    $pdf->Cell(40, 6, $d['jenis_sampah'], 1, 0, '', $fill);
    $pdf->Cell(50, 6, rupiah($d['harga']), 1, 0, 'R', $fill);
    $pdf->Cell(40, 6, $d['berat'], 1, 0, 'R', $fill);
    $pdf->Cell(50, 6, rupiah($d['total_harga']), 1, 1, 'R', $fill);
    $fill = !$fill; // Mengubah latar belakang untuk baris berikutnya
    
    // Tambahkan total_harga ke total_harga_keseluruhan
    $total_harga_keseluruhan += $d['total_harga'];
}

// Menambahkan baris total biaya timbangan
$pdf->SetX($posisi_x); // Atur posisi X untuk total
$pdf->SetFont('Times', 'B', 10);
$pdf->Cell(205, 7, 'Total Biaya Timbangan', 1, 0, 'R', true);
$pdf->Cell(50, 7, rupiah($total_harga_keseluruhan), 1, 1, 'R', true);

// Menambahkan spasi di bawah tabel
$pdf->Ln(10);

// Menambahkan informasi rentang tanggal di bawah tabel pada bagian kanan
$pdf->SetFont('Times', '', 11);
$pdf->SetX($posisi_x + 205); // Posisi X di sebelah kanan tabel
$pdf->Cell(50, 10, 'Rentang Tanggal: ' . $Dari . ' - ' . $Ke, 0, 1, 'R');

$pdf->Output();
?>
