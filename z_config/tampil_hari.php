    <?php

         function rupiah($angka){
          $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
          return $hasil_rupiah;
          }
                
        $hari = date("l"); // "l" akan menampilkan nama hari dalam bahasa Inggris (contoh: Monday)
        $tanggal = date("d"); // "d" akan menampilkan tanggal dalam format dua digit (01 hingga 31)
        $bulan = date("F"); // "F" akan menampilkan nama bulan dalam bahasa Inggris (contoh: January)
        $tahun = date("Y");

        // Mengonversi nama hari dan bulan ke bahasa Indonesia
        $hari_i = array(
            'Sunday' => 'Minggu',
            'Monday' => 'Senin',
            'Tuesday' => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday' => 'Kamis',
            'Friday' => 'Jumat',
            'Saturday' => 'Sabtu'
        );

        $bulan_i = array(
            'January' => 'Januari',
            'February' => 'Februari',
            'March' => 'Maret',
            'April' => 'April',
            'May' => 'Mei',
            'June' => 'Juni',
            'July' => 'Juli',
            'August' => 'Agustus',
            'September' => 'September',
            'October' => 'Oktober',
            'November' => 'November',
            'December' => 'Desember'
        );

        // Mengganti nama hari dan bulan dengan versi Bahasa Indonesia
        $hari = $hari_i[$hari];
        $bulan = $bulan_i[$bulan];

        $hari_ini = "$hari, $tanggal $bulan $tahun";

?>