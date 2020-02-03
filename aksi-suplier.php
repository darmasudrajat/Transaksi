<?php
    // include 'control/act-penjualan.php';    
    include 'model/config.php';
    // SIMPAN
    if(isset($_POST['button-simpan'])){
        $kode = $_POST['kode_suplier'];
        $nama = $_POST['nama_suplier'];
        $alamat = $_POST['alamat_suplier'];
        // $kota = $_POST['kota'];
        // $jabatan = $_POST['jabatan'];
        // $pic = $_POST['pic'];
        // $jenis = $_POST['jenis'];
        $no_telp = $_POST['no_telp'];
        // $no_hp = $_POST['no_hp'];
        // $no_fax = $_POST['no_fax'];
        $email = $_POST['email'];
        // $website = $_POST['website'];

        $queryCustomer = mysqli_query($conn, "insert into tb_suplier values(
            '$kode',
            '$nama',
            '$alamat',
            '$no_telp',
            '$email'

        )");
        
        if($queryCustomer){
            echo "
                alert('BERHASIL....')";
            
            header("location: master-suplier.php");
            
        } else {
            header("location: index.php");
            echo "<script>
                alert('Gagal..').mysqli_errno();
            </script>";
        }
    }

    // AKSI EDIT DAN HAPUS
    if(isset($_GET['aksi']) AND isset($_GET['kode_suplier'])){
        $getKode = $_GET['kode_suplier'];        
        if($_GET['aksi'] == 'edit'){
            header("location: edit-suplier.php?kode_suplier=$getKode");
        }if($_GET['aksi'] == 'hapus'){
            $queryHapus = mysqli_query($conn, "delete from tb_suplier where kode_suplier = '$getKode'");
            if($queryHapus){
                echo "
                    <script type='text/javascript'>
                        alert('Berhasil..');
                    </script>
                ";
                header('location: master-suplier.php');
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
        $kode = $_POST['kode_suplier'];
        $nama = $_POST['nama_suplier'];
        $alamat = $_POST['alamat_suplier'];
        // $kota = $_POST['kota'];
        // $jabatan = $_POST['jabatan'];
        // $pic = $_POST['pic'];
        // $jenis = $_POST['jenis'];
        $no_telp = $_POST['no_telp'];
        // $no_hp = $_POST['no_hp'];
        // $no_fax = $_POST['no_fax'];
        $email = $_POST['email'];
        // $website = $_POST['website'];

        $queryUpdate = mysqli_query($conn, "update tb_suplier set
        nama_suplier = '$nama',
        alamat_suplier = '$alamat',
        no_telp = '$no_telp',
        email = '$email'
        where kode_suplier = '$kode'");

        if($queryUpdate){
            header("location: master-suplier.php");
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