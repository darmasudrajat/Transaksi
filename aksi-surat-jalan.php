<?php 
  // include 'control/act-penjualan.php';    
  include 'model/config.php';
  // include 'head.php';
  // error_reporting(0);

  if(isset($_POST['button-simpan'])){
    // HD
    $no_sj = $_POST['no_sj'];
    $tgl_sj = $_POST['tgl_sj'];
   //  $no_so = $_POST['no_so'];    
    // $no_pn = $_POST['no_pn'];
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $kota = $_POST['kota'];
   //  $tgl_kirim = $_POST['tgl_kirim'];
   //  $alamat_kirim = $_POST['alamat_kirim'];
    $total_qty = $_POST['total_qty'];

    $querySjHd = mysqli_query($conn, "insert into tb_sj_hd values(
        '$no_sj',
        '$tgl_sj',
        '$kode',
        '$nama',
        '$alamat',
        '$kota',
        '$total_qty'
    )");

    foreach($_POST['no_no'] as $key => $noNo){
        $kodeProduk = $_POST['kode_produk'][$key];
        $namaProduk = $_POST['nama_produk'][$key];
        $ukuran_panjang_produk = $_POST['ukuran_panjang_produk'][$key];
        $ukuran_lebar_produk = $_POST['ukuran_lebar_produk'][$key];
        $qty = $_POST['qty'][$key];
        $satuan_produk = $_POST['satuan_produk'][$key];
        $total = $_POST['total'][$key];
        
        $querySjDtl = mysqli_query($conn, "insert into tb_sj_dtl values(
            '$no_sj',
            '$kodeProduk',
            '$namaProduk',
            '$ukuran_panjang_produk',
            '$ukuran_lebar_produk',
            '$qty',
            '$satuan_produk',
            '$total'
        )");

    }
    
    if($querySjHd){
      header("location: print-sj.php?noSJ=$no_sj");      
    } else {
        header("location: gagalHD.php");
    }
    if($querySjDtl){
      header("location: print-sj.php?noSJ=$no_sj");      
      
    } else {
        header("location: gagalDtl.php");
    }
}

?>