<?php 
  // include 'control/act-penjualan.php';    
  include 'model/config.php';
  // include 'head.php';
  // error_reporting(0);

  if(isset($_POST['button-simpan'])){
    // HD
    $no_po = $_POST['no_po']; 
    $tgl_po = $_POST['tgl_po']; 
    $no_so = $_POST['no_so']; 
    $kode = $_POST['kode_suplier']; 
    $nama = $_POST['nama_suplier']; 
    $alamat = $_POST['alamat_suplier']; 
    $no_telp = $_POST['no_telp']; 
    $tgl_kirim = $_POST['tgl_kirim']; 
    $alamat_kirim = $_POST['alamat_kirim']; 
    $email = $_POST['email']; 
    $total_all = $_POST['total_all'];


    $queryPoHd = mysqli_query($conn, "insert into tb_po_hd values(
        '$no_po',
        '$tgl_po',
        '$no_so',
        '$kode',
        '$nama',
        '$alamat',
        '$no_telp',
        '$tgl_kirim',
        '$alamat_kirim',
        '$email',
        2,
        '$total_all'
    )");

    // ======= 
    // PO jadi error setelah tambah 2 kolom, cek lagi....

    foreach($_POST['no_no'] as $key => $noNo){
        $kodeProduk = $_POST['kode_produk'][$key];
        $kodeBarang = $_POST['kode_barang'][$key];
        $namaBarang = $_POST['nama_barang'][$key];
        $ukuran_panjang_barang = $_POST['ukuran_panjang_barang'][$key];
        $ukuran_lebar_barang = $_POST['ukuran_lebar_barang'][$key];
        $qty_barang = $_POST['qty_barang'][$key];
        $satuan_barang = $_POST['satuan_barang'][$key];
        $total = $_POST['total'][$key];
        
        $queryPoDtl = mysqli_query($conn, "insert into tb_po_dtl values(
            '$no_po',
            '$tgl_po',
            '$no_so',
            '$kodeProduk',
            '$kodeBarang',
            '$namaBarang',
            '$ukuran_panjang_barang',
            '$ukuran_lebar_barang',
            '$qty_barang',
            '$satuan_barang',
            '$total'
        )");

    }
    
    if($queryPoHd){
        header("location: laporan-po.php");
    } else {
        header("location: gagalHD.php?sasa=$dTA");
    }
    if($queryPoDtl){
        header("location: laporan-po.php");
    } else {
        header("location: gagalDTL.php?sasa=$Sall");
    }
}

?>