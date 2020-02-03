<?php
    // include 'control/act-penjualan.php';    
    include 'model/config.php';
    include 'head.php';
    // error_reporting(0);
    $no_pn = $_GET['no_pn'];
    $query = mysqli_query($conn, "select * from tb_penawaran where no_pn = '$no_pn'");
    while($r = mysqli_fetch_array($query)){
       $kode = $r['kode'];
       $nama = $r['nama'];
       $alamat = $r['alamat'];
       $kota = $r['kota'];
       $pic = $r['pic'];
       $no_telp = $r['no_telp'];
       $tanggal_pn = $r['tanggal_pn'];
    }
?>

    
<center>
    <!-- <link rel="stylesheet" type="text/css" href="../css/style.css" /> -->
    <form action="aksi-penawaran.php" method="post">

    <div class="fieldsets-table">    
      <legend>Penawaran</legend>
            <table border="0" style="float: left;">
                <tr>
                    <td>No. Penawaran</td>
                    <td>
                        <input type="text" class="form-control" name="no_pn"
                        value="<?php echo $no_pn?>"/>
                    </td>
                    <!-- <td>
                        <a href="cari-customer.php" type="button" class="btn btn-outline-primary">Cari Customer</a>
                    </td> -->
                    </tr>
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
               <table>
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
                        <input type="date" class="form-control" name="tanggal_pn" value="<?php echo $tanggal_pn?>">
                    </td>
                </tr>
               </table>
                

            <!-- RUMUSS JS -->
    </div>
    <!-- <div style="padding-top: 7px;width: 20%; height: 50px; margin: 9px auto;" class="fieldsets-table">     -->
    
            <!-- <a type="submit" href="cari-penjualan.php" name="button-simpan" class="btn btn-dark ">Masukan Data</a> -->
            <button type="submit" name="button-simpan-edit" class="btn btn-info ">Simpan</button>
            <a type="button" href="penawaran-hd.php" class="btn btn-dark ">Cancel</a>
            <!-- <a href="cari-penjualan.php" type="button" name="button-cancel" class="btn btn-danger ">Cancel</a> -->

    <!-- </div> -->
    
</form>
</center>
<?php
include 'footer.php';
?>