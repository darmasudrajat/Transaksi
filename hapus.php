<?php
    include 'model/config.php';
        $noInput = $_GET['kode_produk'];
        $queryHapus = mysqli_query($conn, "delete from tb_produk_hd where kode_produk = '$noInput'");
        $queryHapus = mysqli_query($conn, "delete from tb_produk_dtl where kode_produk = '$noInput'");
        if($queryHapus){
           echo "
                 <script type='text/javascript'>
                    alert('Berhasil..');
                 </script>
           ";
           header('location: cari-edit-penjualan.php');
           
        } else {
           echo "
                 <script type='text/javascript'>
                    alert('Gagal..');
                 </script>
           ";
        }
    // $kodeProduk = $_GET['kode_produk'];
    // $sql = "DELETE FROM barang WHERE id=$id";
 
    // if ($koneksi->query($sql) === TRUE) {
    //     header('location:laporan-bahan-produk.php');
    // } else {
    //     echo "Gagal: " . $koneksi->error;
    // }
 
    // $koneksi->close();
?>