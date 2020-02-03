<?php
    // include 'control/act-penjualan.php';    
    include 'model/config.php';
    error_reporting(0);
    // SIMPAN

    // $status = 0;

    if(isset($_POST['button-simpan'])){
        // CUSTOMER
        $no_pn = $_POST['no_pn'];
        $kode = $_POST['kode'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $kota = $_POST['kota'];
        $pic = $_POST['pic'];
        $no_telp = $_POST['no_telp'];
        $tanggal_pn = $_POST['tanggal_pn'];

        $total_all = $_POST['total_all'];

        $querySimpanPenawaran = mysqli_query($conn, "insert into tb_penawaran values(
            '$no_pn',
            '$kode',
            '$nama',
            '$alamat',
            '$kota',
            '$pic',
            '$no_telp',
            '$tanggal_pn'
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
            
            $querySimpanPenawaranDtl = mysqli_query($conn, "insert into tb_penawaran_dtl values(
                '$no_pn',
                '$kodeProduk',
                '$namaProduk',
                '$ukuran_panjang_produk',
                '$ukuran_lebar_produk',
                '$qty',
                '$satuan_produk',
                '$harga_produk',
                '$total',
                '$total_all',
                '$status'
            )");

        }
        
        if(!$querySimpanPenawaran){
            
            header("location: 3434.php");
            
        } else if(!$querySimpanPenawaranDtl){
            header("location: 3434.php");

        } else {
            header("location: laporan-penawaran.php");
        }
    }

    // AKSI EDIT DAN HAPUS
    if(isset($_GET['aksi']) AND isset($_GET['no_pn'])){
        $getKode = $_GET['no_pn'];        
        if($_GET['aksi'] == 'edit'){
            header("location: edit-penawaran-dtl.php?no_pn=$getKode");
        }if($_GET['aksi'] == 'hapus'){
            $queryHapus = mysqli_query($conn, "delete from tb_penawaran where no_pn = '$getKode'");
            $queryHapus1 = mysqli_query($conn, "delete from tb_penawaran_dtl where no_pn = '$getKode'");
            if($queryHapus){
                echo "
                    <script type='text/javascript'>
                        alert('Berhasil..');
                    </script>
                ";
                header('location: cari-edit-penawaran.php');
            } else {
                echo "
                    <script type='text/javascript'>
                        alert('Gagal..');
                    </script>
                ";
            }
        }else {
            echo "
                <script type='text/javascript'>
                    alert('Gagal..');
                </script>
            ";
        }
    }

    // SIMPAN EDIT
   if(isset($_POST['button-simpan-edit'])){
        $no_pn = $_POST['no_pn'];
        // HEADER
        $kode = $_POST['kode'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $kota = $_POST['kota'];
        $pic = $_POST['pic'];
        $no_telp = $_POST['no_telp'];
        $tanggal_pn = $_POST['tanggal_pn'];

        $queryUpdatePenawaran = mysqli_query($conn, "update tb_penawaran set
        kode = '$kode',
        nama = '$nama',
        alamat = '$alamat',
        kota = '$kota',
        pic = '$pic',
        no_telp = '$no_telp',
        tanggal_pn = '$tanggal_pn'
        where no_pn = '$no_pn'");

        // DETAIL
        $kode_produk = $_POST['kode_produk'];
        $nama_produk = $_POST['nama_produk'];
        $ukuran_panjang_produk = $_POST['ukuran_panjang_produk'];
        $ukuran_lebar_produk = $_POST['ukuran_lebar_produk'];
        $qty = $_POST['qty'];
        $satuan_produk = $_POST['satuan_produk'];
        $harga_produk = $_POST['harga_produk'];
        $total = $_POST['total'];
        
        $queryUpdatePenawaranDtl = mysqli_query($conn, "update tb_penawaran_dtl set
        kode_produk = '$kode_produk',
        nama_produk = '$nama_produk',
        ukuran_panjang_produk = '$ukuran_panjang_produk',
        ukuran_lebar_produk = '$ukuran_lebar_produk',
        qty = '$qty',
        satuan_produk = '$satuan_produk',
        harga_produk = '$harga_produk',
        total = '$total'
        where no_pn = '$no_pn'");

        if($queryUpdatePenawaranDtl){
            header("location: laporan-penawaran.php");
        } if($queryUpdatePenawaran) {
            header('location: laporan-penawaran.php');
        }else {
            header("location: index.php");
        }
    }
?>

<?php
    include 'footer.php';
?>