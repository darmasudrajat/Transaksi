<?php
    include 'model/config.php';

    error_reporting(0);

    if(isset($_POST['button-simpan'])){
        $no_btb = $_POST['no_btb'];
        $tgl_btb = $_POST['tgl_btb'];
        $no_po = $_POST['no_po'];
        $no_so = $_POSTp['no_so'];
        $no_do = $_POST['no_do'];
        $kode_suplier = $_POST['kode_suplier'];
        $nama_suplier = $_POST['nama_suplier'];
        $alamat_suplier = $_POST['alamat_suplier'];
        $total_harga = $_POST['total_harga'];

        $queryBtbHd = mysqli_query($conn, "insert into tb_btb_hd values(
            '$no_btb',
            '$tgl_btb',
            '$no_po',
            '$no_so',
            '$no_do',
            '$kode_suplier',
            '$nama_suplier',
            '$alamat_suplier'
        )");

        foreach($_POST['no_no'] as $key => $noNo){
            $kode_produk = $_POST['kode_produk'][$key];
            $kode_barang = $_POST['kode_barang'][$key];
            $nama_barang = $_POST['nama_barang'][$key];
            $qty_barang = $_POST['qty_barang'][$key];
            $qty_diterima = $_POST['qty_diterima'][$key];

            $queryBtbDtl = mysqli_query($conn, "insert into tb_btb_dtl values(
                '$no_btb',
                '$kode_produk',
                '$kode_barang',
                '$nama_barang',
                '$qty_barang',
                '$qty_diterima',
                '$total_harga'
            )");
        }

        if($queryBtbHd){
            header("location: laporan-btb.php");
        } else {
            header("location: gagalHD.php");
        }
        if($queryBtbDtl){
            header("location: laporan-btb.php");
        } else {
            header("location: gagalDtl.php");
        }
    }

    // print-btb.php?noBtb=$no_btb
// print-btb.php?noBtb=$no_btb