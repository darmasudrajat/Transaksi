<?php
    // include 'control/act-penjualan.php';    
    include 'model/config.php';
    include 'head.php';
    // error_reporting(0);

   //  Kode Customer Auto
    $kode = $_GET['kode_suplier'];
    $editCust = mysqli_query($conn, "select * from tb_suplier where kode_suplier='$kode'");
    $r = mysqli_fetch_array($editCust);
    $nama = $r['nama_suplier'];
    $alamat = $r['alamat_suplier'];
    $no_telp = $r['no_telp'];
    // $kota = $r['kota'];
    // $pic = $r['pic'];
    // $jabatan = $r['jabatan'];
    // $no_hp = $r['no_hp'];
    // $jenis = $r['jenis'];
    // $no_fax = $r['no_fax'];
    $email = $r['email'];
    // $website = $r['website'];

?>
    
<center>
    <!-- <link rel="stylesheet" type="text/css" href="../css/style.css" /> -->
    <form action="aksi-suplier.php" method="post">

    <div class="fieldsets-table">    
      <legend>Edit Suplier</legend>
            <table border="0" class="fieldtab1">
                <tr>
                    <td>Kode</td>
                    <td width="1">:</td>
                    <td>
                        <input type="text" class="form-control" name="kode_suplier" value="<?php echo $kode?>"/>
                    </td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td width="1">:</td>
                    <td>
                        <input type="text" class="form-control" name="nama_suplier" value="<?php echo $nama?>"/>
                    </td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td width="1">:</td>

                    <td>
                        <input type="text" class="form-control" name="alamat_suplier" value="<?php echo $alamat?>"/>
                    </td>
                </tr>
                
            </table>
            
            <table border="0" class="fieldtab2">
            
                <tr>
                    <td>Email</td>
                    <td width="1">:</td>

                    <td>
                        <input type="text" class="form-control" name="email" value="<?php echo $email?>"/>
                    </td>
                    <td>
                        <!-- <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#myModal">Cari Produk</button> -->
                    </td>
                </tr>
                <tr>
                    <td>No. Telp</td>
                    <td width="1">:</td>
                    <td>
                        <input type="text" class="form-control" name="no_telp" value="<?php echo $no_telp?>"/>
                    </td>
                </tr>
                <!-- <tr>
                    <td>PIC</td>
                    <td>
                        <input type="text" class="form-control" name="pic" value="<?php //echo $pic?>"/>
                    </td>
                </tr>
                <tr>
                    <td>Jabatan</td>
                    <td>
                        <input type="text" class="form-control" name="jabatan" value="<?php //echo $jabatan?>"/>
                    </td>
                </tr>
                <tr>
                    <td>No. HP</td>
                    <td>
                        <input type="text" class="form-control" name="no_hp" value="<?php //echo $no_hp?>"/>
                    </td>
                </tr> -->
            </table>
        </div>
        <!-- <div class="fieldsets-table" style="width: 300px; font-size: 16px;">
            <table border="0" style="float: center;">
                <tr>
                    <td>Jenis</td>
                    <td>
                        <input type="text" class="form-control" name="jenis" value="<?php //echo $jenis?>"/>
                    </td>
                </tr>
                <tr>
                    <td>No. Fax</td>
                    <td>
                        <input type="text" class="form-control" name="no_fax" value="<?php //echo $no_fax?>"/>
                    </td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>
                        <input type="text" class="form-control" name="email" value="<?php //echo $email?>"/>
                    </td>
                </tr>
                <tr>
                    <td>Website</td>
                    <td>
                        <input type="text" class="form-control" name="website" value="<?php //echo $website?>"/>
                    </td>
                </tr>
            </table>
        </div> -->
        <button type="submit" name="button-simpan-edit" class="btn btn-dark ">Simpan</button>
        <a type="submit" href="master-suplier.php" class="btn btn-danger ">Cancel</a>
</script>
</form>

</center>
<?php
include 'footer.php';
?>