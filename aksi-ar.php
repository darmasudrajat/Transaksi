<?php
    include 'model/config.php';

    if(isset($_POST['button-simpan'])){
        $no_ar = $_POST['no_ar'];
        $tgl_ar = $_POST['tgl_ar'];
        $no_account = $_POST['no_account'];
        $nama_account = $_POST['nama_account'];
        $jumlah_uang = $_POST['jumlah_uang'];
        $keterangan = $_POST['keterangan'];

        $queryArHd = mysqli_query($conn, "insert into tb_ar_hd values(
            '$no_ar',
            '$tgl_ar',
            '$no_account',
            '$nama_account',
            '$jumlah_uang',
            '$keterangan'
        )");

        // DETAIL
            $no_inv = $_POST['no_inv'];
            $tgl_inv = $_POST['tgl_inv'];
            $jumlah_tagihan = $_POST['tot'];
            $diskon = $_POST['diskon'];
            $total = $_POST['total'];

            $queryArDtl = mysqli_query($conn, "insert into tb_ar_dtl values(
                '$no_ar',
                '$no_inv',
                '$tgl_inv',
                '$jumlah_tagihan',
                '$diskon',
                '$total'
            )");
        

        if($queryArHd){
            header("location: laporan-ar.php");
        } else {
            header("location: gagalHD.php");
        }

        if($queryArDtl){
            header("location: laporan-ar.php");
        } else {
            header("location: gagalDTL.php");
        }

    }
?>