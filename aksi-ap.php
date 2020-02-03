<?php
    include 'model/config.php';

    if(isset($_POST['button-simpan'])){
        $no_ap = $_POST['no_ap'];
        $kode_suplier = $_POST['kode_suplier'];
        $nama_suplier = $_POST['nama_suplier'];
        $no_account = $_POST['no_account'];
        $nama_account = $_POST['nama_account'];
        $jumlah_uang = $_POST['jumlah_uang'];
        $keterangan = $_POST['keterangan'];
        $tgl_ap = $_POST['tgl_ap'];
        $sisa_tagihan = $_POST['sisa_tagihan'];

        $queryApHd = mysqli_query($conn, "insert into tb_ap_hd values(
            '$no_ap',
            '$tgl_ap',
            '$kode_suplier',
            '$nama_suplier',
            '$no_account',
            '$nama_account',
            '$keterangan',
            '$jumlah_uang'
        )");

        foreach($_POST['no'] as $key => $noNo) {
            $no_btb = $_POST['no_btb'][$key];
            $tgl_btb = $_POST['tgl_btb'][$key];
            $no_po = $_POST['no_po'][$key];
            $no_so = $_POST['no_so'][$key];
            $no_sj = $_POST['no_sj'][$key];
            $jumlah_tagihan = $_POST['jumlah_tagihan'][$key];
            $diskon = $_POST['diskon'][$key];
            $total = $_POST['total'][$key];

            $queryApDtl = mysqli_query($conn, "insert into tb_ap_dtl values(
                '$no_ap',
                '$no_btb',
                '$tgl_btb',
                '$no_po',
                '$no_so',
                '$no_do',
                '$jumlah_tagihan',
                '$diskon',
                '$total',
                '$sisa_tagihan'
            )");
        }

        if($queryApHd){
            header("location: laporan-ap.php");
        } else {
            header("location: gagalHD.php");
        }

        if($queryApDtl){
            header("location: laporan-ap.php");
        } else {
            header("location: gagalDTL.php");
        }

    }
?>