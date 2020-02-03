<?php
    // include 'control/act-penjualan.php';    
    include 'model/config.php';
    // SIMPAN
    if(isset($_POST['button-simpan'])){
        $kode_produk = $_POST['kode_produk'];
        $nama_produk = $_POST['nama_produk'];
        $ukuran_panjang_produk = $_POST['ukuran_panjang_produk'];
        $ukuran_lebar_produk = $_POST['ukuran_lebar_produk'];
        $satuan_produk = $_POST['satuan_produk'];
        $harga_produk = $_POST['harga_produk'];

        
        $queryProduk = mysqli_query($conn, "insert into tb_produk values(
            '',
            '$kode_produk',
            '$nama_produk',
            '$ukuran_panjang_produk',
            '$ukuran_lebar_produk',
            '$satuan_produk',
            '$harga_produk'
        )");
        
        if($queryProduk){     
           
            echo "<script>
                alert('BERHASIL....');
            </script>";
            header("location: master-produk.php");
            
        } else {
            header("location: index.php");
            echo "<script>
                alert('Gagal..').mysqli_errno();
            </script>";
        }
    }

    // AKSI EDIT MASTER    
    if(isset($_GET['aksi']) AND isset($_GET['kode'])){
        $getKode = $_GET['kode'];        
        if($_GET['aksi'] == 'edit'){
            header("location: edit-produk.php?kode=$getKode");
        }if($_GET['aksi'] == 'hapus'){
            $queryHapus = mysqli_query($conn, "delete from tb_produk where kode_produk = '$getKode'");
            if($queryHapus){
                echo "
                    <script type='text/javascript'>
                        alert('Berhasil..');
                    </script>
                ";
                header('location: master-produk.php');
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
        $kode = $_POST['kode_produk'];
        $nama = $_POST['nama_produk'];
        $ukuran_panjang_produk = $_POST['ukuran_panjang_produk'];
        $ukuran_lebar_produk = $_POST['ukuran_lebar_produk'];
        $satuan_produk = $_POST['satuan_produk'];
        $harga_produk = $_POST['harga_produk'];

        $queryUpdate = mysqli_query($conn, "update tb_produk set
        nama_produk = '$nama',
        ukuran_panjang_produk = '$ukuran_panjang_produk',
        ukuran_lebar_produk = '$ukuran_lebar_produk',
        satuan_produk = '$satuan_produk',
        harga_produk = '$harga_produk'
        where kode_produk = '$kode'");

        if($queryUpdate){
            header("location: master-produk.php");
        } else {
            header("location: index.php");
        }
    }
?>
    
<center>
    <!-- <link rel="stylesheet" type="text/css" href="../css/style.css" /> -->
    
<?php
include 'footer.php';
?>