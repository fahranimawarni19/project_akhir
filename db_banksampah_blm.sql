-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2024 at 11:26 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_banksampah_blm`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabelsementara`
--

CREATE TABLE `tabelsementara` (
  `kode_sampah` varchar(50) NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_berita`
--

CREATE TABLE `tb_berita` (
  `id_berita` int(100) NOT NULL,
  `judul_berita` varchar(100) NOT NULL,
  `ket_berita` text NOT NULL,
  `foto_berita` varchar(50) NOT NULL,
  `waktu_berita` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_timbangan`
--

CREATE TABLE `tb_detail_timbangan` (
  `berat` varchar(50) NOT NULL,
  `total_harga` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_detail_timbangan`
--

INSERT INTO `tb_detail_timbangan` (`id_timbangan`, `kode_sampah`, `berat`, `total_harga`) VALUES
('Tab-135423', 'E2', '25.1', '25100'),
('Tab-135423', 'E3', '10', '5000'),
('Tab-135647', 'B1', '10.2', '40800'),
('Tab-135647', 'B2', '6.3', '6300'),
('Tab-130853', 'E2', '3.9', '3900'),
('Tab-130853', 'E3', '6.3', '3150'),
('Tab-130853', 'E4', '2.4', '2880'),
('Tab-131023', 'E2', '8.1', '8100'),
('Tab-131023', 'E3', '2.8', '1400'),
('Tab-131330', 'E2', '13.4', '13400'),
('Tab-131330', 'E5', '5', '2500'),
('Tab-131530', 'B2', '29.2', '29200'),
('Tab-131530', 'D3', '2.5', '2500'),
('Tab-131530', 'D4', '9.8', '19600'),
('Tab-131602', 'D3', '3', '3000'),
('Tab-131909', 'A2', '13', '52000'),
('Tab-131909', 'E2', '35', '35000'),
('Tab-132018', 'B4', '9', '27000'),
('Tab-132018', 'E4', '11', '13200'),
('Tab-132156', 'D1', '23', '11500'),
('Tab-132156', 'E2', '2.5', '2500'),
('Tab-132717', 'C1', '25', '25000'),
('Tab-132809', 'A1', '10.4', '31200'),
('Tab-132809', 'E1', '1', '3000');

-- --------------------------------------------------------

--
-- Table structure for table `tb_dokumentasi`
--

CREATE TABLE `tb_dokumentasi` (
  `id_dokumentasi` int(11) NOT NULL,
  `ket_dokumentasi` text NOT NULL,
  `foto_dokumentasi` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_dokumentasi`
--

INSERT INTO `tb_dokumentasi` (`id_dokumentasi`, `ket_dokumentasi`, `foto_dokumentasi`) VALUES
(8, 'Pengurus BLM Mekar Laha Menuju 2025 Bersinar', 'IMG_5604.JPG'),
(9, ' Mengetahui proses pembuat eco product', 'IMG_5501.JPG'),
(10, ' Dewan juri pihak ADWI', 'IMG_5515.JPG'),
(11, ' Pengurus BLM Mengikuti Pameran ADWI', 'PAMERAN.jpg'),
(12, ' Kunjungan Komunitas Peduli Sampah', 'Screenshot 2024-09-13 102153.png'),
(13, ' Pengiriman Sampah Karton ', 'Screenshot 2024-09-13 102238.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kegiatan`
--

CREATE TABLE `tb_kegiatan` (
  `id_kegiatan` int(100) NOT NULL,
  `judul_kegiatan` varchar(100) NOT NULL,
  `tujuan_kegiatan` text NOT NULL,
  `ket_kegiatan` text NOT NULL,
  `tgl_kegiatan` varchar(15) NOT NULL,
  `foto_kegiatan` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_kegiatan`
--

INSERT INTO `tb_kegiatan` (`id_kegiatan`, `judul_kegiatan`, `tujuan_kegiatan`, `ket_kegiatan`, `tgl_kegiatan`, `foto_kegiatan`) VALUES
(14, 'Adwi Excellence Awards', 'Mendapatkan Penghargaan ADWI Atau Ajang Desa Wisata Indonesia, Desa Laha masuk dalam kategori 50 Besar Desa Wisata di Indonesia', 'Bank Sampah Bumi Lestari Maluku&nbsp;adalah inisiatif yang mendapatkan pengakuan tinggi dalam penilaian juri Adwi, khususnya dalam kategori resiliensi. Program ini menggabungkan prinsip pengelolaan limbah yang efisien dengan pendekatan berkelanjutan, berfokus pada pengumpulan, pemilahan, dan daur ulang sampah untuk mengurangi dampak lingkungan. Bank Sampah Bumi Lestari Maluku tidak hanya berperan dalam mengurangi volume sampah di tempat pembuangan akhir, tetapi juga memberdayakan komunitas lokal melalui program edukasi dan pemberdayaan ekonomi, seperti tukar sampah dengan barang atau uang. Dengan mengintegrasikan nilai-nilai keberlanjutan dan pemberdayaan masyarakat, serta melibatkan budaya lokal Maluku, inisiatif ini menciptakan dampak positif yang signifikan dan berkelanjutan, menjadikannya contoh yang menginspirasi dan layak mendapatkan apresiasi dalam penilaian ini.', '2024-09-11', 'IMG_5553.JPG'),
(15, 'GenBI Study Tour', 'Membangun Generasi Mudah yang Peduli dan Paham akan Sampah', 'Genbi Study Tour ke Bank Sampah Bumi Lestari Maluku merupakan kegiatan edukatif yang dirancang untuk memberikan wawasan mendalam kepada anggota Genbi (Generasi Baru Indonesia) mengenai praktik pengelolaan sampah yang berkelanjutan. Dalam kegiatan ini, peserta akan mengunjungi Bank Sampah Bumi Lestari Maluku untuk mempelajari cara efektif dalam mengelola dan mendaur ulang sampah. Kegiatan ini meliputi observasi langsung terhadap proses pemilahan dan pengolahan sampah, diskusi dengan pengelola mengenai tantangan dan inovasi, serta sesi tanya jawab untuk memperdalam pemahaman tentang dampak lingkungan dan pemberdayaan komunitas. Study tour ini bertujuan untuk meningkatkan kesadaran dan komitmen peserta terhadap keberlanjutan lingkungan, serta mendorong penerapan pengetahuan yang diperoleh dalam proyek atau inisiatif di komunitas atau kampus mereka.', '2024-06-29', '1709.jpg'),
(17, 'Kunjungan Mahasiswa Rotterdam University', 'Mengatasi permasalahan sampah skala Internasional', 'Kunjungan Mahasiswa Belanda dari Rotterdam University ke Bank Sampah Bumi Lestari Maluku yang bertujuan untuk memperkenalkan mahasiswa internasional pada praktik pengelolaan sampah yang berkelanjutan di Maluku. Selama kunjungan ini, mahasiswa akan mendapatkan wawasan langsung tentang proses pengumpulan, pemilahan, dan daur ulang sampah yang diterapkan oleh Bank Sampah Bumi Lestari. Mereka akan berpartisipasi dalam tur fasilitas, berdialog dengan pengelola mengenai tantangan dan solusi dalam pengelolaan limbah, serta mengikuti diskusi dan workshop untuk berbagi ide dan pengalaman. Kegiatan ini tidak hanya memberikan perspektif internasional tentang keberlanjutan, tetapi juga membuka peluang untuk kolaborasi dan pertukaran pengetahuan antara institusi pendidikan dan komunitas lokal, serta memperkuat hubungan budaya antara Belanda dan Indonesia.', '2024-08-31', 'Roterdam.jpg'),
(18, 'Poltekkes Kemenkes Maluku Berkunjung', 'Menjadi pemateri terkait pengelolaan sampah limbah', 'Poltekkes Kemenkes Maluku&nbsp;memberi kesempatan kepada&nbsp;Bank Sampah Bumi Lestari Maluku untuk menjadi pemateri dalam workshop pembuatan cermin hias. Dalam acara ini, Bank Sampah akan berbagi keahlian tentang cara mengolah bahan daur ulang, seperti cermin bekas dan rak telur, menjadi cermin hias yang praktis dan ekonomis. Workshop ini bertujuan untuk memberikan edukasi tentang teknik daur ulang, mengajarkan keterampilan praktis kepada peserta, dan mempromosikan keberlanjutan melalui pemanfaatan bahan bekas. Dengan partisipasi Bank Sampah, acara ini diharapkan dapat meningkatkan kesadaran masyarakat tentang pentingnya pengelolaan sampah dan mendorong praktik daur ulang yang kreatif.', '2024-02-08', 'poltekes.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_nasabah`
--

CREATE TABLE `tb_nasabah` (
  `id_nasabah` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `dusun` varchar(100) NOT NULL,
  `rt_rw` varchar(20) NOT NULL,
  `tlp` varchar(50) NOT NULL,
  `tgl_daftar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_nasabah`
--

INSERT INTO `tb_nasabah` (`id_nasabah`, `nama`, `alamat`, `dusun`, `rt_rw`, `tlp`, `tgl_daftar`) VALUES
('NBLM-0548', 'Pertamina AFT Pattimura', 'Laha', 'Air Sakula', '02/01', '081277634551', '10-09-2024'),
('NBLM-0714', 'Wa Maani B Rumbia', 'Laha', 'Air Manis', '02/04', '081244890078', '10-09-2024'),
('NBLM-4546', 'La Duken', 'Laha', 'Air Manis', '01/04', '0812465908852', '10-09-2024'),
('NBLM-4651', 'Wa Ramsia', 'Laha', 'Air Manis', '02/04', '08167890543', '10-09-2024'),
('NBLM-4738', 'Nene Lita', 'Laha', 'Air Manis', '01/04', '081564890023', '10-09-2024'),
('NBLM-4821', 'Wa Erne', 'Laha', 'Air Manis', '02/04', '081344677390', '10-09-2024'),
('NBLM-4854', 'Wa Ramla', 'Laha', 'Mateo', '01/01', '081246890631', '10-09-2024'),
('NBLM-4934', 'Suci Ramadhani Wally', 'Laha', 'Air Manis', '02/04', '081243672390', '10-09-2024'),
('NBLM-5039', 'Rajab', 'Laha', 'Air Manis', '02/04', '082197869680', '10-09-2024'),
('NBLM-5113', 'Fitri Baria', 'Laha', 'Kampung Baru', '03/03', '081243690879', '10-09-2024'),
('NBLM-5226', 'La Mini', 'Laha', 'Air Manis', '01/04', '081349096570', '10-09-2024'),
('NBLM-5453', 'Sari Ayu', 'Laha', 'Air Manis', '02/04', '082239375937', '10-09-2024'),
('NBLM-5526', 'Jumaia Wally', 'Laha', 'Air Manis', '02/04', '082240987765', '13-09-2024'),
('NBLM-5854', 'Wa Ramsia', 'Laha', 'Air Manis', '02/04', '081428975677', '10-09-2024'),
('NBLM-5947', 'Hasan Uluputy', 'Waiheru', 'Air Salak', '09/07', '081245908766', '10-09-2024');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penarikan`
--

CREATE TABLE `tb_penarikan` (
  `id_penarikan` int(40) NOT NULL,
  `id_tabungan` int(40) NOT NULL,
  `id_nasabah` varchar(40) NOT NULL,
  `tanggal_tarik` varchar(50) NOT NULL,
  `tabungan` varchar(100) NOT NULL,
  `metod_penarikan` varchar(100) NOT NULL,
  `jumlah` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_penarikan`
--

INSERT INTO `tb_penarikan` (`id_penarikan`, `id_tabungan`, `id_nasabah`, `tanggal_tarik`, `tabungan`, `metod_penarikan`, `jumlah`) VALUES
(10, 15, 'NBLM-4651', 'Jumat, 13 September 2024', '100', 'Transfer Bank', '30000');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengurus`
--

CREATE TABLE `tb_pengurus` (
  `nik` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jk` varchar(20) NOT NULL,
  `tempat_l` varchar(100) NOT NULL,
  `tanggal_l` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `tlp` varchar(20) NOT NULL,
  `pass` varchar(500) NOT NULL,
  `hak_akses` varchar(20) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_pengurus`
--

INSERT INTO `tb_pengurus` (`nik`, `nama`, `jk`, `tempat_l`, `tanggal_l`, `jabatan`, `alamat`, `tlp`, `pass`, `hak_akses`, `foto`) VALUES
('81028029233', 'Wa Nurlia', 'P', 'Nusaniwe', '1975-01-08', 'Anggota', '  Air Manis RT 02 RW 004  ', '081267576345', '591c1b2176c32835ec03cc2227277407', 'Tidak', 'IMG_1445.JPG'),
('8104011905980001', 'Harno', 'L', 'Haruku', '1998-05-19', 'Admin', '  Waiheru  ', '082350212818', 'b0f8b3e58f093359fe1af416b5ea8ed6', 'Ya', 'Squidward_Tentacles.svg.png'),
('8171045904020003', 'Fahrani Mawarni', 'P', 'Ambon', '2002-04-19', 'Admin', '    Laha Air Manis RT 002 RW 04 Teluk Ambon    ', '081240691238', '56e97047a413a32006fb12e0d5f99ad7', 'Ya', 'WhatsApp Image 2024-09-10 at 23.35.42_f3273222.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_prestasi`
--

CREATE TABLE `tb_prestasi` (
  `id_prestasi` int(50) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `keterangan` text NOT NULL,
  `tahun` varchar(50) NOT NULL,
  `foto` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_prestasi`
--

INSERT INTO `tb_prestasi` (`id_prestasi`, `nama`, `keterangan`, `tahun`, `foto`) VALUES
(14, 'Nusantara CSR Awards 2022', 'Bank Sampah Bumi Lestari Maluku meraih Nusantara CSR Awards 2022 sebagai pemenang program CSR terbaik', '2022-11-10', 'Screenshot 2024-06-28 124705.png'),
(15, 'Gold Category of Climate Changes Mitigation and Adaptation', 'Sebagai pemenang kategori Emas dalam mitigasi dan adaptasi perubahan iklim.', '2022-06-22', 'gold.jpg'),
(16, 'Platinum Awards ', 'Membuktikan upaya luar biasa dalam mengurangi limbah dan meningkatkan keberlanjutan lingkungan.', '2022-08-13', 'Screenshot 2024-06-28 122345.png'),
(17, 'Nusantara CSR Awards 2022', 'Sertifikat penghargaan yang menjadi bukti keterlibatan Bank Sampah dalam program CSR ', '2022-08-26', 'Screenshot 2024-06-28 125136.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id_produk` int(50) NOT NULL,
  `nama_produk` varchar(60) NOT NULL,
  `keterangan` text NOT NULL,
  `foto` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_produk`
--

INSERT INTO `tb_produk` (`id_produk`, `nama_produk`, `keterangan`, `foto`) VALUES
(10, 'Spice Manise Candle', 'Spice Manise Candle adalah lilin aromaterapi khas Maluku yang menggunakan limbah minyak jelantah yang telah diproses ulang sebagai bahan dasarnya. Lilin ini menggabungkan aroma rempah-rempah hangat seperti kayu manis dan cengkih menciptakan suasana yang nyaman dan menenangkan', 'Spice Manise Candle.jpg'),
(11, 'Cermin Hias', 'Cermin hias berbahan dasar cermin dan rak telur adalah contoh inovasi daur ulang yang mengubah sampah menjadi barang berguna dan estetis. ', 'Cermin hias .jpg'),
(12, 'Eco Enzyme', 'Eco enzyme adalah produk ramah lingkungan yang terbuat dari fermentasi bahan organik, seperti buah, sayur, dan gula. Proses ini menghasilkan campuran enzim, asam organik, dan nutrisi yang dapat digunakan untuk berbagai keperluan, seperti pembersihan, penyuburan tanah, dan pengelolaan sampah. ', 'Eco enzyme.jpg'),
(13, 'Kompos Organik', 'Kompos organik adalah hasil dari proses penguraian bahan-bahan organik seperti sisa makanan, daun kering, rumput, dan limbah kebun oleh mikroorganisme dan dekomposer alami. Kompos organik membantu mengurangi volume sampah yang dikirim ke tempat pembuangan akhir dan mendukung praktik pertanian berkelanjutan yang lebih ramah lingkungan.', 'Kompos organik.jpg'),
(14, 'Sofa Botik', 'Sofa Botik adalah produk inovatif yang menggabungkan desain modern dengan prinsip keberlanjutan dan kenyamanan. Terbuat dari bahan daur ulang atau ramah lingkungan, seperti serat sintetis yang diolah dari limbah plastik atau bahan organik.', 'Sofa Botik.jpg'),
(15, 'Spice Lestari Soap ', 'Sabun padat ini diproduksi dengan metode yang sama seperti sabun konvensional, tetapi menggunakan minyak jelantah sebagai bahan dasar, membuatnya lebih ramah lingkungan dan berkelanjutan.', 'Screenshot 2024-09-13 055034.png'),
(16, 'Tas Kulit Minyak', 'Tas ini merupakan produk unik yang memanfaatkan bekas bungkusan minyak kelapa 2 kg sebagai bahan dasar, diolah menjadi tas berkualitas dengan sentuhan budaya lokal. ', 'Tas Mijel.jpg'),
(17, 'Sofbrick (Sofa Ecobrick) ', 'Sofa ini adalah inovasi berkelanjutan yang memanfaatkan ecobrick, yaitu botol plastik yang diisi dengan sampah plastik dan telah mendapatkan sertifikasi internasional.  memberikan struktur yang kuat dan tahan lama sambil mendukung upaya pengurangan limbah plastik. ', 'Screenshot 2024-09-13 060014.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sampah`
--

CREATE TABLE `tb_sampah` (
  `kode_sampah` varchar(50) NOT NULL,
  `jenis_sampah` varchar(50) NOT NULL,
  `harga` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_sampah`
--

INSERT INTO `tb_sampah` (`kode_sampah`, `jenis_sampah`, `harga`) VALUES
('A1', 'Botol Biru', '3000'),
('A2', 'Botol Putih', '4000'),
('B1', 'Gelas Aqua', '4000'),
('B2', 'Gelas Warna', '1000'),
('B3', 'Blowing Sortir Warna', '3000'),
('B4', 'Blowing Sortir Putih', '3000'),
('C1', 'PP Keras', '1000'),
('C2', 'PP Keras Nat 1/Bening', '1.200'),
('D1', 'Damar', '500'),
('D2', 'Daunan PE 1', '1000'),
('D3', 'Tutup Botol', '1000'),
('D4', 'Tutup Galon', '2000'),
('E1', 'Galon', '3000'),
('E2', 'HVS', '1000'),
('E3', 'Buram', '500'),
('E4', 'Buku Tulis', '1200'),
('E5', 'Kulit', '500');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tabungan`
--

CREATE TABLE `tb_tabungan` (
  `id_tabungan` int(30) NOT NULL,
  `id_nasabah` varchar(100) NOT NULL,
  `tabungan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_tabungan`
--

INSERT INTO `tb_tabungan` (`id_tabungan`, `id_nasabah`, `tabungan`) VALUES
(15, 'NBLM-4651', '157000'),
(16, 'NBLM-5526', '47100'),
(17, 'NBLM-4546', '9930'),
(18, 'NBLM-5039', '96500'),
(19, 'NBLM-5226', '18900'),
(20, 'NBLM-4738', '51300'),
(21, 'NBLM-4934', '14750'),
(22, 'NBLM-0714', '81000'),
(23, 'NBLM-5453', '110900'),
(24, 'NBLM-5113', '25000'),
(25, 'NBLM-0548', '34200');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tentang_kami`
--

CREATE TABLE `tb_tentang_kami` (
  `id_tentang_kami` int(30) NOT NULL,
  `heading_sejarah` text NOT NULL,
  `isi_sejarah` text NOT NULL,
  `visi` text NOT NULL,
  `misi` text NOT NULL,
  `keterangan` text NOT NULL,
  `lat` varchar(50) NOT NULL,
  `lang` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `bagan` varchar(80) NOT NULL,
  `foto` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_tentang_kami`
--

INSERT INTO `tb_tentang_kami` (`id_tentang_kami`, `heading_sejarah`, `isi_sejarah`, `visi`, `misi`, `keterangan`, `lat`, `lang`, `alamat`, `bagan`, `foto`) VALUES
(8, 'Sejarah Bank Sampah Bumi Lestari Maluku Mekar Laha', '                           Pada awal tahun 2018, Direktur Bank Sampah Bumi Lestari Maluku beserta pendirinya melakukan survei di Desa Laha. Saat itu, Desa Laha terlihat dipenuhi tumpukan sampah yang berserakan di tepi pantai. Menyaksikan kondisi tersebut, hati mereka tergerak untuk menjadi agen perubahan dalam pengelolaan sampah di negeri Laha. Dengan dukungan perangkat desa, Dinas Kesehatan Lingkungan, dan pihak-pihak berwenang lainnya, terwujudlah berdirinya Bank Sampah Bumi Lestari Maluku ini.\r\nBank Sampah Bumi Maluku Lestari (BLM) merupakan bank sampah percontohan di kota Ambon yang diinisiasi oleh para kader posyandu Negeri Laha. Berawal dari semangat lima orang ibu posyandu di tahun 2018, pengelolaan sampah di desa mulai dilakukan meski dalam jumlah yang masih kecil. Bank Sampah BLM disahkan oleh Dinas Lingkungan Hidup Kota Ambon pada tahun 2019 dan mulai mendapatkan pendampingan dari PT Pertamina DPPU Pattimura pada tahun 2020.', '\"Organisasi yang Berperan Mewujudkan Masyarakat Peduli Terhadap Kebersihan Lingkungan dan Kota Ambon Bebas Sampah\"', '<ol><li>Sosialisasi pengelolaan sampah kepada masyarakat di Kota Ambon.</li><li>Melakukan studi banding ke tempat pengolahan sampah percontohan.</li><li>Membangun organisasi yang kuat dengan meningkatkan kapasitas SDM melalui pelatihan-pelatihan.</li></ol>', 'BANK SAMPAH BUMI LESTARI MALUKU', '-3.715790', '128.087925', ' JI. Nuntati Desa Laha, Dusun Air Manis, RT/RW 002/004, Kec. Teluk Ambon, Kota Ambon, Provinsi Maluku 97236                          ', 'struktur organisasi.jpg', 'mamaola.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_timbangan`
--

CREATE TABLE `tb_timbangan` (
  `id_timbangan` varchar(50) NOT NULL,
  `id_nasabah` varchar(80) NOT NULL,
  `tgl_timbangan` varchar(30) NOT NULL,
  `ket` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_timbangan`
--

INSERT INTO `tb_timbangan` (`id_timbangan`, `id_nasabah`, `tgl_timbangan`, `ket`) VALUES
('Tab-130853', 'NBLM-4546', '2024-08-06', 'Nabung'),
('Tab-131023', 'NBLM-5039', '2024-08-06', 'Nabung'),
('Tab-131330', 'NBLM-5226', '2024-08-07', 'Nabung'),
('Tab-131530', 'NBLM-4738', '2024-08-07', 'Nabung'),
('Tab-131602', 'NBLM-5226', '2024-08-07', 'Nabung'),
('Tab-131909', 'NBLM-5039', '2022-02-16', 'Nabung'),
('Tab-132018', 'NBLM-4651', '2019-04-13', 'Nabung'),
('Tab-132156', 'NBLM-4934', '2024-08-08', 'Nabung'),
('Tab-132246', 'NBLM-0714', '2024-08-13', 'Nabung'),
('Tab-132340', 'NBLM-4651', '2024-08-14', 'Nabung'),
('Tab-132631', 'NBLM-5453', '2024-09-09', 'Nabung'),
('Tab-132717', 'NBLM-5113', '2024-08-22', 'Nabung'),
('Tab-132809', 'NBLM-0548', '2024-08-09', 'Nabung'),
('Tab-135423', 'NBLM-4651', '2024-08-05', 'Nabung'),
('Tab-135647', 'NBLM-5526', '2024-08-05', 'Nabung'),
('Tab-165406', 'NBLM-5229', '2024-05-16', 'Nabung'),
('Tab-243411', 'NBLM-1041', '2024-07-23', 'Nabung'),
('Tab-265849', 'NBLM-0658', '2024-07-26', 'Nabung'),
('Tab-311836', 'NBLM-4428', '2024-05-31', 'Nabung'),
('Tab-312047', 'NBLM-0812', '2024-05-31', 'Nabung');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabelsementara`
--
ALTER TABLE `tabelsementara`
  ADD PRIMARY KEY (`kode_sampah`);

--
-- Indexes for table `tb_berita`
--
ALTER TABLE `tb_berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `tb_dokumentasi`
--
ALTER TABLE `tb_dokumentasi`
  ADD PRIMARY KEY (`id_dokumentasi`);

--
-- Indexes for table `tb_kegiatan`
--
ALTER TABLE `tb_kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- Indexes for table `tb_nasabah`
--
ALTER TABLE `tb_nasabah`
  ADD PRIMARY KEY (`id_nasabah`);

--
-- Indexes for table `tb_penarikan`
--
ALTER TABLE `tb_penarikan`
  ADD PRIMARY KEY (`id_penarikan`);

--
-- Indexes for table `tb_pengurus`
--
ALTER TABLE `tb_pengurus`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `tb_prestasi`
--
ALTER TABLE `tb_prestasi`
  ADD PRIMARY KEY (`id_prestasi`);

--
-- Indexes for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `tb_sampah`
--
ALTER TABLE `tb_sampah`
  ADD PRIMARY KEY (`kode_sampah`);

--
-- Indexes for table `tb_tabungan`
--
ALTER TABLE `tb_tabungan`
  ADD PRIMARY KEY (`id_tabungan`);

--
-- Indexes for table `tb_tentang_kami`
--
ALTER TABLE `tb_tentang_kami`
  ADD PRIMARY KEY (`id_tentang_kami`);

--
-- Indexes for table `tb_timbangan`
--
ALTER TABLE `tb_timbangan`
  ADD PRIMARY KEY (`id_timbangan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_berita`
--
ALTER TABLE `tb_berita`
  MODIFY `id_berita` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_dokumentasi`
--
ALTER TABLE `tb_dokumentasi`
  MODIFY `id_dokumentasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_kegiatan`
--
ALTER TABLE `tb_kegiatan`
  MODIFY `id_kegiatan` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_penarikan`
--
ALTER TABLE `tb_penarikan`
  MODIFY `id_penarikan` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_prestasi`
--
ALTER TABLE `tb_prestasi`
  MODIFY `id_prestasi` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id_produk` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tb_tabungan`
--
ALTER TABLE `tb_tabungan`
  MODIFY `id_tabungan` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tb_tentang_kami`
--
ALTER TABLE `tb_tentang_kami`
  MODIFY `id_tentang_kami` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
