<?php
    // include 'control/act-penjualan.php';    
    include 'model/config.php';
    include 'head.php';
    // error_reporting(0);

   //  Kode Customer Auto
    $kode = $_GET['kode'];
    $editCust = mysqli_query($conn, "select * from tb_customer where kode='$kode'");
    $r = mysqli_fetch_array($editCust);
    $nama = $r['nama'];
    $alamat = $r['alamat'];
    $no_telp = $r['no_telp'];
    $kota = $r['kota'];
    $pic = $r['pic'];
    $jabatan = $r['jabatan'];
    $no_hp = $r['no_hp'];
    $jenis = $r['jenis'];
    $no_fax = $r['no_fax'];
    $email = $r['email'];
    $website = $r['website'];

?>
    
<center>
    <!-- <link rel="stylesheet" type="text/css" href="../css/style.css" /> -->
    <form action="aksi-customer.php" method="post">
    <div class="fieldsets-table">    
      <legend>Edit Customer</legend>
            <table border="0" style="float: left;">
                <tr>
                    <td>Kode</td>
                    <td width="1">:</td>
                    <td>
                        <input type="text" class="form-control" name="kode"
                        value="<?php echo $kode?>"/>
                    </td>
                    <td>
                        <!-- <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#myModal">Cari Produk</button> -->
                    </td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td width="1">:</td>
                    <td>
                        <input type="text" class="form-control" name="nama" value="<?php echo $nama?>"/>
                    </td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td width="1">:</td>
                    <td>
                        <input type="text" class="form-control" name="alamat" value="<?php echo $alamat?>"/>
                    </td>
                </tr>
                <tr>
                    <td>No. Telp</td>
                    <td width="1">:</td>
                    <td>
                        <input type="text" class="form-control" name="no_telp" value="<?php echo $no_telp?>"/>
                    </td>
                </tr>
            </table>
            <table border="0" style="float: right;">
                <tr>
                    <td>Kota</td>
                    <td width="1">:</td>
                    <td>
                        <input type="text" class="form-control" name="kota" value="<?php echo $kota?>"/>
                    </td>
                    <td>
                        <!-- <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#myModal">Cari Produk</button> -->
                    </td>
                </tr>
                <tr>
                    <td>PIC</td>
                    <td width="1">:</td>
                    <td>
                        <input type="text" class="form-control" name="pic" value="<?php echo $pic?>"/>
                    </td>
                </tr>
                <tr>
                    <td>Jabatan</td>
                    <td width="1">:</td>
                    <td>
                        <input type="text" class="form-control" name="jabatan" value="<?php echo $jabatan?>"/>
                    </td>
                </tr>
                <tr>
                    <td>No. HP</td>
                    <td width="1">:</td>
                    <td>
                        <input type="text" class="form-control" name="no_hp" value="<?php echo $no_hp?>"/>
                    </td>
                </tr>
            </table>
        </div>
        <div class="fieldsets-table">
            <table border="0" style="float: center;">
                <tr>
                    <td>Jenis</td>
                    <td width="1">:</td>
                    <td>
                        <input type="text" class="form-control" name="jenis" value="<?php echo $jenis?>"/>
                    </td>
                </tr>
                <tr>
                    <td>No. Fax</td>
                    <td width="1">:</td>
                    <td>
                        <input type="text" class="form-control" name="no_fax" value="<?php echo $no_fax?>"/>
                    </td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td width="1">:</td>
                    <td>
                        <input type="text" class="form-control" name="email" value="<?php echo $email?>"/>
                    </td>
                </tr>
                <tr>
                    <td>Website</td>
                    <td width="1">:</td>
                    <td>
                        <input type="text" class="form-control" name="website" value="<?php echo $website?>"/>
                    </td>
                </tr>
            </table>
        </div>
        <button type="submit" name="button-simpan-edit" class="btn btn-dark ">Simpan</button>
        <a type="submit" href="customer.php" class="btn btn-danger ">Cancel</a>
</script>
</form>

</center>
<?php
include 'footer.php';
?>