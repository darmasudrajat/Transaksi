<?php
    // include 'control/act-penjualan.php';    
    include 'model/config.php';
    include 'head.php';
    error_reporting(0);
    
    $queryAmbilNo = mysqli_query($conn, "select MAX(no_pn) from tb_penawaran");
    $ambilNo = mysqli_fetch_array($queryAmbilNo);
    $maxNoTransaksi = $ambilNo[0];
    $noTr = (int) substr($maxNoTransaksi,2,4);
    $noTr++;
    $noTransaksiBaru = "PN".sprintf("%04s",$noTr);
    
    // if(isset($_GET['kode_produk']) AND isset($_GET['kode_barang'])){
    //     $kodeProduk = $_GET['kode_produk'];
    //     $queryKodeProduk = mysqli_query($conn, "select * from tb_produk where kode_produk='$kodeProduk' ");
    //     $row = mysqli_fetch_array($queryKodeProduk);
    //     $nama_produk = $row['nama_produk'];
    //     $ukuran_panjang_produk = $row['ukuran_panjang_produk'];
    //     $ukuran_lebar_produk = $row['ukuran_lebar_produk'];
    //     $satuan_produk = $row['satuan_produk'];
    //     $harga_produk = $row['harga_produk'];
    // ARRAY 
?>

    
<center>
    <!-- <link rel="stylesheet" type="text/css" href="../css/style.css" /> -->
    <form action="aksi-penawaran.php" method="post">

    <div class="fieldsets-table" style="width: 850px;">    
      <legend>Penawaran</legend>
            <table border="0" style="float: left;">
                <tr>
                    <td>No. Penawaran</td>
                    <td>
                        <input type="text" class="form-control" name="no_pn"
                        value="<?php echo $noTransaksiBaru?>"/>
                    </td>
                    <td>
                        <a href="cari-penawaran-barang.php" type="button" class="btn btn-outline-primary">Cari Customer Produk</a>
                    </td>
                    </tr>
                     <?php
                     include 'model/config.php';
                        if(isset($_GET['button-isi-data'])){
                           $kode=$_GET['kode'];
                           $query = mysqli_query($conn, "select * from tb_customer where kode = '$kode'");
                           while($r = mysqli_fetch_array($query)){
                           $nama = $r['nama'];
                           $alamat = $r['alamat'];
                           $kota = $r['kota'];
                           $pic = $r['pic'];
                           $no_telp = $r['no_telp'];
                           }
                        }
                     ?>
                <tr>
                    <td>Kode Customer</td>
                    <td>
                        <input type="text" class="form-control" name="kode"
                        value="<?php echo $kode?>"/>
                    </td>
                </tr>
                <tr>
                    <td>Nama Customer</td>
                    <td>
                        <input type="text" class="form-control" name="nama"
                        value="<?php echo $nama?>"/>
                    </td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>
                        <input type="text" class="form-control" name="alamat"
                        value="<?php echo $alamat?>"/>
                    </td>
                </tr>
               </table>
               <table style="float: right;">
               <tr>
                    <td>Kota</td>
                    <td>
                        <input type="text" class="form-control" name="kota"
                        value="<?php echo $kota?>"/>
                    </td>
                </tr>
                <tr>
                    <td>PIC</td>
                    <td>
                        <input type="text" class="form-control" name="pic"
                        value="<?php echo $pic?>"/>
                    </td>
                </tr>
                <tr>
                    <td>No. Telp</td>
                    <td>
                        <input type="text" class="form-control" name="no_telp"
                        value="<?php echo $no_telp?>"/>
                    </td>
                </tr>
                <tr>
                    <td>Tanggal</td>
                    <td>
                        <input type="date" class="form-control" name="tanggal_pn">
                    </td>
                </tr>
               </table>
                

            <!-- RUMUSS JS -->
    </div>
    <!-- <div style="padding-top: 7px;width: 20%; height: 50px; margin: 9px auto;" class="fieldsets-table">     -->
    
            <!-- <a type="submit" href="cari-penjualan.php" name="button-simpan" class="btn btn-dark ">Masukan Data</a> -->
            <button type="submit" name="button-simpan" class="btn btn-info ">Simpan</button>
            <a type="button" href="cari-edit-penawaran.php" class="btn btn-dark ">List Penawaran</a>
            <!-- <a href="cari-penjualan.php" type="button" name="button-cancel" class="btn btn-danger ">Cancel</a> -->

    <!-- </div> -->
    
</form>
</center>
<?php
include 'footer.php';
?>