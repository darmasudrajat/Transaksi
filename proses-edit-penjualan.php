<?php
   include 'model/config.php';

   if(isset($_POST['button-simpan-edit'])){
      $kodeProduk = $_POST['kode_produk'];
      $namaProduk = $_POST['nama_produk'];
      $ukuranPanjangProduk = $_POST['ukuran_panjang_produk'];
      $ukuranLebarProduk = $_POST['ukuran_lebar_produk'];
      $satuanProduk = $_POST['satuan_produk'];
      $hargaProduk = $_POST['harga_produk'];

      $queryProduk = mysqli_query($conn, "UPDATE tb_produk SET
         nama_produk = '$namaProduk',
         ukuran_panjang_produk = '$ukuranPanjangProduk',
         ukuran_lebar_produk = '$ukuranLebarProduk',
         satuan_produk = '$satuanProduk',
         harga_produk = '$hargaProduk' where kode_produk = '$kodeProduk' ");

      $totalAll = $_POST['total_all'];

    //   LOOPING SIMPAN BARANG
      foreach($_POST['no_no'] as $key => $noNo){
         $kodeBarang = $_POST['kode_barang'][$key];
         $namaBarang = $_POST['nama_barang'][$key];
         $ukuranPanjangBarang = $_POST['ukuran_panjang_barang'][$key];
         $ukuranLebarBarang = $_POST['ukuran_lebar_barang'][$key];
         $qtyBarang = $_POST['qty_barang'][$key];
         $satuanBarang = $_POST['satuan_barang'][$key];
         $hargaBarang = $_POST['harga_barang'][$key];
         $jenisBarang = $_POST['jenis_barang'][$key];
         $totalHargaBarang = $_POST['total'][$key];
         
         $queryBahanProduk = mysqli_query($conn, "UPDATE tb_bahan_produk 
                    set kode_barang='$kodeBarang',
                    nama_barang='$namaBarang',
                    ukuran_panjang_barang='$ukuranPanjangBarang',
                    ukuran_lebar_barang='$ukuranLebarBarang',
                    qty_barang='$qtyBarang',
                    satuan_barang='$satuanBarang',
                    harga_barang='$hargaBarang',
                    jenis_barang='$jenisBarang',
                    total='$totalHargaBarang',
                    total_all='$totalAll' where kode_produk = '$kodeProduk' ");
      } 
      if($queryBahanProduk){
         header("location: cari-edit-penjualan.php");
         echo "
            <script>
               alert('BERHASIL..');
            </script>
         ";
      } else {
         // header("location: inasdsad.php");
         echo "
            Error:
         ".mysqli_errno($conn);
         echo mysqli_error($conn);
      }
      
   }else {
      header("location: index2.php");
      echo "
         <script>
            alert('GAGAL..');
         </script>
      ";
   }

  
?>