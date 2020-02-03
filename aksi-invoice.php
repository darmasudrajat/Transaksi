<?php 
    include 'model/config.php';
    // error_reporting(0);

    if(isset($_POST['button-simpan'])){
        $no_inv = $_POST['no_inv'];
        $tgl_inv = $_POST['tgl_inv'];
        $kode = $_POST['kode'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $kota = $_POST['kota'];
        $total_qty = $_POST['total_qty'];
        $total_all = $_POST['total_all'];

        $queryInvoiceHd = mysqli_query($conn, "insert into tb_invoice_hd values(
            '$no_inv',
            '$tgl_inv',
            '$kode',
            '$nama',
            '$alamat',
            '$kota',
            '$total_qty'
        )");

        foreach($_POST['no_no'] as $key => $noNo){
            $kode_produk = $_POST['kode_produk'][$key];
            $nama_produk = $_POST['nama_produk'][$key];
            $ukuran_panjang_produk = $_POST['ukuran_panjang_produk'][$key];
            $ukuran_lebar_produk = $_POST['ukuran_lebar_produk'][$key];
            $qty = $_POST['qty'][$key];
            $satuan_produk = $_POST['satuan_produk'][$key];
            $sub_total = $_POST['sub_total'][$key];
            // $total_all = $_POST['total_all'][$key];

            $queryInvoiceDtl = mysqli_query($conn, "insert into tb_invoice_dtl values(
                '$no_inv',
                '$kode_produk',
                '$nama_produk',
                '$ukuran_panjang_produk',
                '$ukuran_lebar_produk',
                '$qty',
                '$satuan_produk',
                '$sub_total',
                '$total_all'
            )");
        }

        if($queryInvoiceHd){
            header("location: laporan-invoice.php");
        } else {
            header("location: gagalHD.php");
        }
        if($queryInvoiceDtl){
            header("location: laporan-invoice.php");
        } else {
            header("location: gagalDTL.php");
        }
    }
?>