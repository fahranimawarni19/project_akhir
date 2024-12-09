<?php
    require_once 'z_config/Koneksi.php';

    $nik =$_POST['nik'];
    $nama =$_POST['nama'];
    $jk =$_POST['jk'];
    $Temp_L =$_POST['tempat_l'];
    $Tgl =$_POST['Tanggal_l'];
    $Jab =$_POST['jabatan'];
    $alamat =$_POST['alamat'];
    $Telp =$_POST['tlp'];
    $pass =md5($_POST['pass']);
    $hak_akses =$_POST['hak_akses'];
    $foto =$_FILES['foto']['name'];

    if(empty($nik) || empty($nama) || empty($jk) || empty($Temp_L) || empty($Tgl)||empty($Jab)||empty($alamat)||empty($Telp)||empty($pass)||empty($hak_akses)|| empty($foto) )
    {
        echo "
             <script>
                Swal.fire({
				 icon: 'warning',
				 title: 'Gagal',
				 text: 'Data Tidak Boleh Kosong!',
				})
            </script>
            ";
        echo "<meta http-equiv='refresh' content='1; url=admin.php?page=Pengurus'>";
    }
    else
    {
	$simpan = mysqli_query($con,"INSERT INTO tb_pengurus VALUES ('$nik','$nama','$jk','$Temp_L','$Tgl','$Jab','$alamat','$Telp','$pass','$hak_akses','$foto')");
	move_uploaded_file($_FILES['foto']['tmp_name'],"img/Pengurus/".$foto);

	if ($simpan) {
        echo "
             <script>
                Swal.fire({
				 icon: 'success',
				 title: 'Berhasil',
				 text: 'Data Berhasil Disimpan!',
				})
            </script>
        	";
        echo "<meta http-equiv='refresh' content='1; url=admin.php?page=Pengurus'>";
    }else
    {   
        echo "
             <script>
                Swal.fire({
				 icon: 'error',
				 title: 'Gagal',
				 text: 'Data Gagal Tersimpan!',
				})
            </script>
        	";
        echo "<meta http-equiv='refresh' content='1; url=admin.php?page=Pengurus'>";
    }
}
?> 