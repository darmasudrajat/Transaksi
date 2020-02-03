<?php
    // include 'control/act-penjualan.php';    
    include 'model/config.php';
    // SIMPAN
    if(isset($_POST['button-simpan'])){
        $no_pn = $_POST['no_pn'];
        $kode = $_POST['kode'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $kota = $_POST['kota'];
        $pic = $_POST['pic'];
        $no_telp = $_POST['no_telp'];
        $tanggal_pn = $_POST['tanggal_pn'];
        
        $queryCustomer = mysqli_query($conn, "insert into tb_penawaran values(
            '$no_pn',
            '$kode',
            '$nama',
            '$alamat',
            '$kota',
            '$pic',
            '$no_telp',
            '$tanggal_pn'
        )");
        
        if($queryCustomer){
            echo "<script>
                alert('BERHASIL....');
            </script>";
            header("location: penawaran-hd.php");
            
        } else {
            header("location: index.php");
            echo "<script>
                alert('Gagal..').mysqli_errno();
            </script>";
        }
    }

    // AKSI EDIT DAN HAPUS
    if(isset($_GET['aksi']) AND isset($_GET['no_pn'])){
        $getKode = $_GET['no_pn'];        
        if($_GET['aksi'] == 'edit'){
            header("location: edit-penawaran.php?no_pn=$getKode");
        }if($_GET['aksi'] == 'hapus'){
            $queryHapus = mysqli_query($conn, "delete from tb_penawaran where no_pn = '$getKode'");
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
        $kode = $_POST['kode'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $kota = $_POST['kota'];
        $pic = $_POST['pic'];
        $no_telp = $_POST['no_telp'];
        $tanggal_pn = $_POST['tanggal_pn'];
        
        $queryUpdate = mysqli_query($conn, "update tb_penawaran set
        kode = '$kode',
        nama = '$nama',
        alamat = '$alamat',
        kota = '$kota',
        pic = '$pic',
        no_telp = '$no_telp',
        tanggal_pn = '$tanggal_pn'
        where no_pn = '$no_pn'");

        if($queryUpdate){
            header("location: cari-edit-penawaran.php");
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