<?php
   include 'model/config.php';

   if(isset($_POST['button-simpan'])){
      $kodeProduk = $_POST['kode_produk'];
      $namaProduk = $_POST['nama_produk'];
      $ukuranPanjangProduk = $_POST['ukuran_panjang_produk'];
      $ukuranLebarProduk = $_POST['ukuran_lebar_produk'];
      $satuanProduk = $_POST['satuan_produk'];
      $hargaProduk = $_POST['harga_produk'];

      $totalAll = $_POST['total_all'];

      $queryProduk = mysqli_query($conn, "insert into tb_produk_hd values(
         '$kodeProduk',
         '$namaProduk',
         '$ukuranPanjangProduk',
         '$ukuranLebarProduk',
         '$satuanProduk',
         '$hargaProduk',
         '$totalAll')");


      foreach($_POST['no_no'] as $key => $noNo){
         $kodeBarang = $_POST['kode_barang'][$key];
         $namaBarang = $_POST['nama_barang'][$key];
         $ukuranPanjangBarang = $_POST['ukuran_panjang_barang'][$key];
         $ukuranLebarBarang = $_POST['ukuran_lebar_barang'][$key];
         $qtyBarang = $_POST['qty_barang'][$key];
         $hargaBarang = $_POST['harga_barang'][$key];
         $jenisBarang = $_POST['jenis_barang'][$key];
         $satuanBarang = $_POST['satuan_barang'][$key];
         // $qtyBarang = $_POST['stok_barang'][$key];
         $totalHargaBarang = $_POST['total'][$key];

         $queryBahan = mysqli_query($conn, "INSERT into tb_produk_dtl values (
         '$kodeProduk','$kodeBarang','$namaBarang','$ukuranPanjangBarang',
         '$ukuranLebarBarang','$qtyBarang','$hargaBarang','$jenisBarang','$satuanBarang','$totalHargaBarang','$totalAll')");
      } 

      // JIKA GAGAL
      if(!$queryProduk){
         header("location: indasex.php");
         echo mysqli_error($conn);
      }else if(!$queryBahan){
         header("location: indsdex.php");
         echo mysqli_error($conn);
      } else {
         header("location: laporan-produk.php");
      }
      
   }

                                                                                                   // BENERIN SIMPAN NYA...

   if(isset($_POST['button-simpan-edit'])){
      $kodeProduk = $_POST['kode_produk'];
      $namaProduk = $_POST['nama_produk'];
      $ukuranPanjangProduk = $_POST['ukuran_panjang_produk'];
      $ukuranLebarProduk = $_POST['ukuran_lebar_produk'];
      $satuanProduk = $_POST['satuan_produk'];
      $hargaProduk = $_POST['harga_produk'];

      $totalAll = $_POST['total_all'];

      $queryEditProduk = mysqli_query($conn, "update tb_produk_hd set
         nama_produk = '$namaProduk',
         ukuran_panjang_produk = '$ukuranPanjangProduk',
         ukuran_lebar_produk = '$ukuranLebarProduk',
         satuan_produk = '$satuanProduk',
         harga_produk = '$hargaProduk',
         total_all = '$totalAll' where kode_produk = '$kodeProduk' ");

      // foreach($_POST['no_no'] as $key => $noNo){
      //    $kodeBarang = $_POST['kode_barang'][$key];
      //    $namaBarang = $_POST['nama_barang'][$key];
      //    $ukuranPanjangBarang = $_POST['ukuran_panjang_barang'][$key];
      //    $ukuranLebarBarang = $_POST['ukuran_lebar_barang'][$key];
      //    $qtyBarang = $_POST['qty_barang'][$key];
      //    $hargaBarang = $_POST['harga_barang'][$key];
      //    $jenisBarang = $_POST['jenis_barang'][$key];
      //    $satuanBarang = $_POST['satuan_barang'][$key];
      //    $qtyBarang = $_POST['stok_barang'][$key];
      //    $totalHargaBarang = $_POST['total'][$key];

      //    $queryBahan = mysqli_query($conn, "INSERT into tb_produk_dtl values (
      //    '$kodeProduk','$kodeBarang','$namaBarang','$ukuranPanjangBarang',
      //    '$ukuranLebarBarang','$qtyBarang','$hargaBarang','$jenisBarang','$satuanBarang','$totalHargaBarang','$totalAll')");
      // } 

      // JIKA GAGAL
      if(!$queryEditProduk){
         header("location: inadex.php");
         echo mysqli_error($conn);
      } else {
         header("location: laporan-produk.php");
      }
   }

   
?>