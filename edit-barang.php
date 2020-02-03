<?php
    // include 'control/act-penjualan.php';    
    include 'model/config.php';
    include 'head.php';
    // error_reporting(0);

   //  Kode Customer Auto
    $kode_barang = $_GET['kode_barang'];
    $editBarang = mysqli_query($conn, "select * from tb_barang where kode_barang='$kode_barang'");
    $r = mysqli_fetch_array($editBarang);
    $nama_barang = $r['nama_barang'];
    $ukuran_panjang_barang = $r['ukuran_panjang_barang'];
    $ukuran_lebar_barang = $r['ukuran_lebar_barang'];
    $harga_barang = $r['harga_barang'];
    $jenis_barang = $r['jenis_barang'];
    $stok_barang = $r['stok_barang'];
    $satuan_barang = $r['satuan_barang'];
?>
    
<center>
    <form action="aksi-barang.php" method="post">
        <div class="fieldsets-table">    
            <legend>Edit Barang</legend>
            <table border="0" style="float: left;">
                <tr>
                    <td>Kode</td>
                    <td width="1">:</td>
                    <td>
                        <input type="text" class="form-control" name="kode_barang" value="<?php echo $kode_barang?>"/>
                    </td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td width="1">:</td>
                    <td>
                        <input type="text" class="form-control" name="nama_barang" value="<?php echo $nama_barang?>"/>
                    </td>
                </tr>
                <tr>
                    <td>Ukuran</td>
                    <td width="1">:</td>
                    <td>
                        <input type="text" class="form-control" name="ukuran_panjang_barang" value="<?php echo $ukuran_panjang_barang?>"/>
                  
                        <input type="text" class="form-control" name="ukuran_lebar_barang" value="<?php echo $ukuran_lebar_barang?>"/>
                    </td>
                </tr>
                <tr>
                    <td>Harga</td>
                    <td width="1">:</td>
                    <td>
                        <input type="text" class="form-control" name="harga_barang" value="<?php echo $harga_barang?>"/>
                    </td>
                </tr>
            </table>
            <table border="0" style="float: right;">

                <tr>
                    <td>Jenis</td>
                    <td width="1">:</td>
                    <td>
                        <input type="text" class="form-control" name="jenis_barang" value="<?php echo $jenis_barang?>"/>
                    </td>
                </tr>
                <tr>
                    <td>Stok</td>
                    <td width="1">:</td>
                    <td>
                        <input type="text" class="form-control" name="stok_barang" value="<?php echo $stok_barang?>"/>
                    </td>
                </tr>
                <tr>
                    <td>Satuan</td>
                    <td width="1">:</td>
                    <td>
                        <input type="text" class="form-control" name="satuan_barang" value="<?php echo $satuan_barang?>"/>
                    </td>
                </tr>
            </table>
        </div>
        <button type="submit" name="button-simpan-edit" class="btn btn-dark ">Simpan</button>
        <a type="submit" href="master-barang.php" class="btn btn-danger ">Cancel</a>
    </form>
</center>
<?php
    include 'footer.php';
?>