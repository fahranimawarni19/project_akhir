<?php
    require_once 'z_config/Koneksi.php';

    $id =$_POST['id_kegiatan'];
    $judul =$_POST['judul'];
    $tujuan =$_POST['tujuan'];
    $ket =$_POST['keterangan'];
    $tgl =$_POST['tgl'];
    $foto_kegiatan =$_FILES['foto_kegiatan']['name'];

   if (empty($foto_kegiatan)){
        $update =mysqli_query($con, "UPDATE tb_kegiatan SET judul_kegiatan='$judul',tujuan_kegiatan='$tujuan',ket_kegiatan='$ket',tgl_kegiatan='$tgl' WHERE id_kegiatan ='$id'");
        move_uploaded_file($_FILES['foto_kegiatan']['tmp_name'],"img/Kegiatan/".$foto_kegiatan);
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
        $hapus =mysqli_query($con,"SELECT * FROM tb_kegiatan WHERE id_kegiatan ='$id'");
       // menghapus gambar yang lama
        $nama_gambar=mysqli_fetch_array($hapus);
        
        $lokasi=$nama_gambar['foto_kegiatan'];
        // alamat tempat foto_kegiatan
        $hapus_gambar="img/Kegiatan/$lokasi";
        // script untuk menghapus gambar dari folder
        unlink($hapus_gambar);
         $update =mysqli_query($con, "UPDATE tb_kegiatan SET judul_kegiatan='$judul',tujuan_kegiatan='$tujuan',ket_kegiatan='$ket',tgl_kegiatan='$tgl', foto_kegiatan='$foto_kegiatan' WHERE id_kegiatan ='$id'");
        move_uploaded_file($_FILES['foto_kegiatan']['tmp_name'],"img/Kegiatan/".$foto_kegiatan);
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