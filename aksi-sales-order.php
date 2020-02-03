<?php 
    // include 'control/act-penjualan.php';    
    include 'model/config.php';
    // include 'head.php';
    // error_reporting(0);

    if(isset($_POST['button-simpan'])){
        // CUSTOMER
        $no_so = $_POST['no_so'];
        $tgl_so = $_POST['tgl_so'];
        $no_pn = $_POST['no_pn'];
        $kode = $_POST['kode'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $kota = $_POST['kota'];

        $status = 1;

        $total_all = $_POST['total_all'];

        $querySoHd = mysqli_query($conn, "insert into tb_so_hd values(
            '$no_so',
            '$tgl_so',
            '$no_pn',
            '$kode',
            '$nama',
            '$alamat',
            '$kota',
            '1'
        )");

        foreach($_POST['no_no'] as $key => $noNo){
            $kodeProduk = $_POST['kode_produk'][$key];
            $namaProduk = $_POST['nama_produk'][$key];
            $ukuran_panjang_produk = $_POST['ukuran_panjang_produk'][$key];
            $ukuran_lebar_produk = $_POST['ukuran_lebar_produk'][$key];
            $qty = $_POST['qty'][$key];
            $satuan_produk = $_POST['satuan_produk'][$key];
            $harga_produk = $_POST['harga_produk'][$key];
            $total = $_POST['total'][$key];
            
            $querySoDtl = mysqli_query($conn, "insert into tb_so_dtl values(
                '$no_so',
                '$kodeProduk',
                '$namaProduk',
                '$ukuran_panjang_produk',
                '$ukuran_lebar_produk',
                '$qty',
                '$satuan_produk',
                '$harga_produk',
                '$total',
                '$total_all'
            )");
        }
        
        if($querySoHd){
            header("location: laporan-sales-order.php");
        } else {
            header("location: gagalHD.php");
        }if($querySoDtl){
            header("location: laporan-sales-order.php");
        } else {
            header("location: gagalDtl.php");
        }
    }

    // AKSI EDIT DAN HAPUS
    if(isset($_GET['aksi']) AND isset($_GET['no_so'])){
        $getKode = $_GET['no_so'];
        if($_GET['aksi'] == 'edit'){
            header("location: edit-sales-order.php?no_so=$getKode");
        } if($_GET['aksi'] == 'hapus'){
            $queryDelete = mysqli_query($conn, "
                delete tb_so_hd, tb_so_dtl 
                from tb_so_hd
                inner join tb_so_dtl
                on tb_so_hd.no_so = tb_so_dtl.no_so
                where tb_so_hd.no_so = '$getKode'
            ");
            if($queryDelete){
                echo "
                    <script type='text/javascript'>
                        alert('Berhasil..');
                    </script>
                ";
                header('location: laporan-sales-order.php');
            } else {
                echo "
                    <script type='text/javascript'>
                        alert('Gagal..');
                    </script>
                ";
                header('location: laporan-sales-order.php');
            }
        }
    }

    // SIMPAN EDITAN
    if(isset($_POST['button-simpan-edit'])){
        $no_so = $_POST['no_so'];

        // HEADER
        $tgl_so = $_POST['tgl_so'];
        $no_pn = $_POST['no_pn'];
        $kode = $_POST['kode'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $kota = $_POST['kota'];

        $queryUpdateHd = mysqli_query($conn, "
            update tb_so_hd set
            tgl_so = '$tgl_so',
            no_pn = '$no_pn',
            kode = '$kode',
            nama = '$nama',
            alamat = '$alamat',
            kota = '$kota'
            where no_so = '$no_so'
        ");

        // DETAIL
        $kode_produk = $_POST['kode_produk'];
        $nama_produk = $_POST['nama_produk'];
        $ukuran_panjang_produk = $_POST['ukuran_panjang_produk'];
        $ukuran_lebar_produk = $_POST['ukuran_lebar_produk'];
        $qty = $_POST['qty'];
        $satuan_produk = $_POST['satuan_produk'];
        $harga_produk = $_POST['harga_produk'];
        $total = $_POST['total'];
        $total_all = $_POST['total_all'];

        $queryUpdateDetail = mysqli_query($conn, "
            update tb_so_dtl set
            kode_produk = '$kode_produk',
            nama_produk = '$nama_produk',
            ukuran_panjang_produk = '$ukuran_panjang_produk',
            ukuran_lebar_produk = '$ukuran_lebar_produk',
            qty = '$qty',
            satuan_produk = '$satuan_produk',
            harga_produk = '$harga_produk',
            total = '$total',
            total_all = '$total_all'
            where no_so = '$no_so'
        ");
        
        if(!$queryUpdateHd or !$queryUpdateDetail){
            echo "
                <script type='text/javascript'>
                    alert('Gagal..');
                </script>
            ";
            header("location: ind.php");
        } else {
            echo "
                <script type='text/javascript'>
                    alert('Berhasil..');
                </script>
            ";
            header("location: laporan-sales-order.php");
        }
    }

    // FORM EDIT NYA BELUM.......

?>