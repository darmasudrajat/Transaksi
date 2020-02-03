<?php
    // include 'control/act-penjualan.php';    
    include 'model/config.php';
    // SIMPAN
    if(isset($_POST['button-simpan'])){
        $kode = $_POST['kode'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $kota = $_POST['kota'];
        $jabatan = $_POST['jabatan'];
        $pic = $_POST['pic'];
        $jenis = $_POST['jenis'];
        $no_telp = $_POST['no_telp'];
        $no_hp = $_POST['no_hp'];
        $no_fax = $_POST['no_fax'];
        $email = $_POST['email'];
        $website = $_POST['website'];

        $queryCustomer = mysqli_query($conn, "insert into tb_customer values(
            '$kode',
            '$nama',
            '$alamat',
            '$kota',
            '$jabatan',
            '$pic',
            '$jenis',
            '$no_telp',
            '$no_hp',
            '$no_fax',
            '$email',
            '$website'

        )");
        
        if($queryCustomer){
            echo "<script>
                alert('BERHASIL....');
            </script>";
            header("location: customer.php");
            
        } else {
            header("location: index.php");
            echo "<script>
                alert('Gagal..').mysqli_errno();
            </script>";
        }
    }

    // AKSI EDIT DAN HAPUS
    if(isset($_GET['aksi']) AND isset($_GET['kode'])){
        $getKode = $_GET['kode'];        
        if($_GET['aksi'] == 'edit'){
            header("location: edit-customer.php?kode=$getKode");
        }if($_GET['aksi'] == 'hapus'){
            $queryHapus = mysqli_query($conn, "delete from tb_customer where kode = '$getKode'");
            if($queryHapus){
                echo "
                    <script type='text/javascript'>
                        alert('Berhasil..');
                    </script>
                ";
                header('location: customer.php');
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
        $kode = $_POST['kode'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $kota = $_POST['kota'];
        $jabatan = $_POST['jabatan'];
        $pic = $_POST['pic'];
        $jenis = $_POST['jenis'];
        $no_telp = $_POST['no_telp'];
        $no_hp = $_POST['no_hp'];
        $no_fax = $_POST['no_fax'];
        $email = $_POST['email'];
        $website = $_POST['website'];

        $queryUpdate = mysqli_query($conn, "update tb_customer set
        nama = '$nama',
        alamat = '$alamat',
        kota = '$kota',
        pic = '$pic',
        jabatan = '$jabatan',        
        jenis = '$jenis',
        no_telp = '$no_telp',
        no_fax = '$no_fax',
        no_hp = '$no_hp',
        email = '$email',
        website = '$website'
        where kode = '$kode'");

        if($queryUpdate){
            header("location: customer.php");
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