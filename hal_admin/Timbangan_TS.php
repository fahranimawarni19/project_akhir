<?php
	require_once 'z_config/Koneksi.php';

	$jenis = $_POST['jenis_sampah'];
	$berat = $_POST['berat'];
	
	$sql = mysqli_query($con, "SELECT * FROM tb_sampah WHERE kode_sampah = '$jenis' && '$berat'");
	$data = mysqli_fetch_array($sql);
	
	$cari = mysqli_query($con, "SELECT COUNT(*) AS jumlah FROM tabelsementara WHERE kode_sampah = '$jenis' && '$berat'");
	$r = mysqli_fetch_assoc($cari)['jumlah'];
	

	if ($r > 0) {
		echo "
			<script>
				Swal.fire({
					icon: 'warning',
					title: 'Gagal',
					text: 'Jenis Sampah Sudah Ada!',
               		timer: 5000
				})
			</script>
		";
		echo "<meta http-equiv='refresh' content='1; url=admin.php?page=Timbangan_Nasabah'>";
	} else {
		$harga_timbang = $data[2] * $berat; // Sesuaikan dengan kolom harga dalam tabel tb_sampah
		mysqli_query($con, "INSERT INTO tabelsementara VALUES ('$data[0]','$data[1]','$berat','$harga_timbang')");
		echo "
			<script>
				Swal.fire({
					icon: 'success',
					title: 'Berhasil',
					text: 'Data Sampah Berhasil Ditambahkan!',
				})
			</script>
		";
		echo "<meta http-equiv='refresh' content='1; url=admin.php?page=Timbangan_Nasabah'>";
	}
?>
