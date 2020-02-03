<?php
    // include 'control/act-penjualan.php';    
    include 'model/config.php';
    include 'head.php';
    // error_reporting(0);

   //  Kode Customer Auto
    $kode = $_GET['kode'];
    $editProduk = mysqli_query($conn, "select * from tb_produk where kode_produk='$kode'");
    $r = mysqli_fetch_array($editProduk);
    $nama = $r['nama_produk'];
    $ukuran_panjang_produk = $r['ukuran_panjang_produk'];
    $ukuran_lebar_produk = $r['ukuran_lebar_produk'];
    $satuan_produk = $r['satuan_produk'];
    $harga_produk = $r['harga_produk'];
?>
    
<center>
    <!-- <link rel="stylesheet" type="text/css" href="../css/style.css" /> -->
    <form action="aksi-produk.php" method="post">

    <div class="fieldsets-table" style="width: 80%; font-size: 16px;">    
      <legend>Edit Produk</legend>
            <table border="0" style="float: left;">
                <tr>
                    <td>Kode Produk</td>
                    <td>
                        <input type="text" class="form-control" name="kode_produk" value="<?php echo $kode?>"/>
                    </td>
                </tr>
                <tr>
                    <td>Nama Produk</td>
                    <td>
                        <input type="text" class="form-control" name="nama_produk" value="<?php echo $nama?>"/>
                    </td>
                </tr>
                <tr>
                    <td>Ukuran Produk</td>
                    <td>
                        <input placeholder="Panjang..." type="text" class="form-control" name="ukuran_panjang_produk" value="<?php echo $ukuran_panjang_produk?>"/>
                    </td>
                    <td>
                        <input placeholder="Lebar..." type="text" class="form-control" name="ukuran_lebar_produk" value="<?php echo $ukuran_lebar_produk?>"/>
                    </td>
                </tr>
            </table>
            <table border="0" style="float: right;">
                <tr>
                    <td>Satuan Produk</td>
                    <td>
                        <input type="text" class="form-control" name="satuan_produk" value="<?php echo $satuan_produk?>"/>
                    </td>
                </tr>
                <tr>
                    <td>Harga Produk</td>
                    <td>
                        <input type="text" class="form-control" name="harga_produk" value="<?php echo $harga_produk?>"/>
                    </td>
                </tr>
            </table>
         </div>
         <button type="submit" name="button-simpan-edit" class="btn btn-dark ">Simpan</button>
         <a type="submit" href="master-produk.php" class="btn btn-danger ">Cancel</a>

   
</script>
</form>
</center>
<?php
include 'footer.php';
?>