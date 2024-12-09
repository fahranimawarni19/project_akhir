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
        echo "<meta http-equiv='refresh' content='1; url=index1.php?page=Dosen_T'>";
    }
    else
    {
	$simpan = mysqli_query($con,"INSERT INTO tb_dosen VALUES ('$NIDN','$Nama','$Jk','$Temp_L','$Tgl','$Jab','$Agama','$Alamat','$Telp','$Email','$Pass','$Hak','$Foto')");
	move_uploaded_file($_FILES['Foto']['tmp_name'],"img/Dosen/".$Foto);

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
        echo "<meta http-equiv='refresh' content='1; url=index1.php?page=Dosen'>";
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
        echo "<meta http-equiv='refresh' content='1; url=index.php?page=Dosen'>";
    }

    {
        echo "
             <script>
                Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: 'Data Gagal Dihapus!',
                })
            </script>
            ";
        echo "<meta http-equiv='refresh' content='1; url=index1.php?page=Dosen'>";
    }