<?php
    // include 'control/act-penjualan.php';    
    include 'model/config.php';
    // SIMPAN
    if(isset($_POST['button-simpan'])){
        $kode_barang = $_POST['kode_barang'];
        $nama_barang = $_POST['nama_barang'];
        $ukuran_panjang_barang = $_POST['ukuran_panjang_barang'];
        $ukuran_lebar_barang = $_POST['ukuran_lebar_barang'];
        $harga_barang = $_POST['harga_barang'];
        $jenis_barang = $_POST['jenis_barang'];
        $stok_barang = $_POST['stok_barang'];
        $satuan_barang = $_POST['satuan_barang'];

        $queryBarang = mysqli_query($conn, "insert into tb_barang values(
            '$kode_barang',
            '$nama_barang',
            '$ukuran_panjang_barang',
            '$ukuran_lebar_barang',
            '$harga_barang',
            '$jenis_barang',
            '$stok_barang',
            '$satuan_barang')");
        
        if($queryBarang){
            echo "<script>
                alert('BERHASIL....');
            </script>";
            header("location: master-barang.php");
            
        } else {
            header("location: index.php");
            echo "<script>
                alert('Gagal..').mysqli_errno();
            </script>";
        }
    }

    // AKSI EDIT DAN HAPUS
    if(isset($_GET['aksi']) AND isset($_GET['kode_barang'])){
        $getKode = $_GET['kode_barang'];        
        if($_GET['aksi'] == 'edit'){
            header("location: edit-barang.php?kode_barang=$getKode");
        }if($_GET['aksi'] == 'hapus'){
            $queryHapus = mysqli_query($conn, "delete from tb_barang where kode_barang = '$getKode'");
            if($queryHapus){
                echo "
                    <script type='text/javascript'>
                        alert('Berhasil..');
                    </script>
                ";
                header('location: master-barang.php');
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
        $kode_barang = $_POST['kode_barang'];
        $nama_barang = $_POST['nama_barang'];
        $ukuran_panjang_barang = $_POST['ukuran_panjang_barang'];
        $ukuran_lebar_barang = $_POST['ukuran_lebar_barang'];
        $harga_barang = $_POST['harga_barang'];
        $jenis_barang = $_POST['jenis_barang'];
        $stok_barang = $_POST['stok_barang'];
        $satuan_barang = $_POST['satuan_barang'];

        $queryUpdate = mysqli_query($conn, "update tb_barang set
        nama_barang = '$nama_barang',
        ukuran_panjang_barang = '$ukuran_panjang_barang',
        ukuran_lebar_barang = '$ukuran_lebar_barang',
        harga_barang = '$harga_barang',
        jenis_barang = '$jenis_barang',        
        stok_barang = '$stok_barang',
        satuan_barang = '$satuan_barang' where kode_barang='$kode_barang'");

        if($queryUpdate){
            header("location: master-barang.php");
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