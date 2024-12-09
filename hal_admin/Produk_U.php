<?php
    require_once 'z_config/Koneksi.php';

    $id =$_POST['id_produk'];
    $nama =$_POST['nama'];
    $ket =$_POST['keterangan'];
    $Foto =$_FILES['foto']['name'];

   if (empty($Foto)){
        $update =mysqli_query($con, "UPDATE tb_produk SET nama_produk='$nama',keterangan='$ket' WHERE id_produk ='$id'");
        move_uploaded_file($_FILES['foto']['tmp_name'],"img/Produk/".$Foto);
         echo "
            <script>
                Swal.fire({
                 icon: 'success',
                 title: 'Berhasil',
                 text: 'Data Berhasil Diubah!',
                })
            </script>
            ";
        echo "<meta http-equiv='refresh' content='1; url=admin.php?page=info_blm'>";
        }
        else
        {
        $hapus =mysqli_query($con,"SELECT * FROM tb_produk WHERE id_produk ='$id'");
       // menghapus gambar yang lama
        $nama_gambar=mysqli_fetch_array($hapus);
        
        $lokasi=$nama_gambar['foto'];
        // alamat tempat foto
        $hapus_gambar="img/Produk/$lokasi";
        // script untuk menghapus gambar dari folder
        unlink($hapus_gambar);
         $update =mysqli_query($con, "UPDATE tb_produk SET nama_produk='$nama',keterangan='$ket', foto='$Foto'WHERE id_produk ='$id'");
       move_uploaded_file($_FILES['foto']['tmp_name'],"img/Produk/".$Foto);
          
         echo "
              <script>
                Swal.fire({
                 icon: 'success',
                 title: 'Berhasil',
                 text: 'Data Berhasil Diubah!',
                })
            </script>
            ";
        echo "<meta http-equiv='refresh' content='1; url=admin.php?page=info_blm'>";
        }
?>