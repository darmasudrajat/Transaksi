<?php
    // include 'control/act-penjualan.php';    
    include 'model/config.php';
    include 'head.php';
    error_reporting(0);

   //  Kode Customer Auto
    // $queryAmbilNo = mysqli_query($conn, "select MAX(kode_produk) from tb_produk");
    // $ambilNo = mysqli_fetch_array($queryAmbilNo);
    // $maxNoTransaksi = $ambilNo[0];
    // $noTr = (int) substr($maxNoTransaksi,3,5);
    // $noTr++;
    // $noTransaksiBaru = "PRD".sprintf("%05s",$noTr);

    if(isset($_GET['kode_produk'])){
        $kode_produk = $_GET['kode_produk'];
    }

    
?>
    
<center>
    <form action="aksi-produk.php" method="POST">

        <div class="fieldsets-table" style="width: 65%;">    
            <legend>Produk Baru</legend>
            <table border="0" style="float: left;">
                <tr>
                    <td>Kode Produk</td>
                    <td>
                        <input type="text" class="in form-control" name="kode_produk" value="<?php echo $kode_produk?>"/>
                    </td>
                    <td>
                    <a href="cari-bahan-produk.php" type="button" class="btn btn-outline-primary">Cari Produk</a>
                    </td>
                    
                </tr>
                <tr>
                    <td>Nama Produk</td>
                    <td>
                        <input value='' type="text" class="in form-control" name="nama_produk"/>
                    </td>
                </tr>
                <tr>
                    <td>Ukuran</td>
                    <td>
                        <input placeholder="Panjang..." value='' type="text" class="in form-control" name="ukuran_panjang_produk" />
                    </td>
                    <td>
                        <input placeholder="Lebar..." value='' type="text" class="in form-control" name="ukuran_lebar_produk" />
                    </td>
                </tr>
            </table>
            <table border="0" style="float: right;">
               <tr>
                    <td>Satuan Produk</td>
                    <td>
                        <input value='' type="text" class="in form-control" name="satuan_produk"/>
                    </td>
                </tr>
                <tr>
                    <td>Harga</td>
                    <td>
                        <input value='' type="text" class="in form-control" name="harga_produk"/>
                    </td>
                </tr>
               </table>
        </div>
   
        <button type="submit" name="button-simpan" class="btn btn-dark ">Simpan</button>
        <a href="master-produk.php" type="button" name="button-cancel" class="btn btn-danger ">Cancel</a>
   </form>
        <div class="fieldsets-table">
            <form action="aksi-produk.php" method="post">
            <legend>Bahan Produk</legend>
            <table id="myTable" class="mytableclass table table-striped table-bordered table-secondary" cellspacing="0" width="100%">
                <thead>
                    <tr style="height: 8px; font-weight: bold;">
                        <th class="th-sm">Kode Barang</th>
                        <th class="th-sm">Nama Barang</th>
                        <th class="th-sm">Ukuran Barang</th>
                        <th class="th-sm">Qty Barang</th>
                        <th class="th-sm">Satuan Barang</th>
                        <th class="th-sm">Harga Barang</th>  
                        <th class="th-sm">Jenis Barang</th>  
                        <th class="th-sm">Total</th>  
                    </tr>
                </thead>
                <tbody>
                   <?php 
                      $queryBarang = mysqli_query($conn, "select * from tb_bahan_produk where kode_produk = '$kode_produk'");   
                      while($dataCari = mysqli_fetch_array($queryBarang)){
                            echo "
                            <tr>
                                  <td>".$dataCari['kode_barang']."</td>
                                  <td>".$dataCari['nama_barang']."</td>
                                  <td>".$dataCari['ukuran_panjang_barang']." X ".$dataCari['ukuran_lebar_barang']."</td>
                                  <td>".$dataCari['qty_barang']."</td>
                                  <td>".$dataCari['satuan_barang']."</td>
                                  <td>".$dataCari['harga_barang']."</td>
                                  <td>".$dataCari['jenis_barang']."</td>
                                  <td>".$dataCari['total']."</td>
                            </tr>";
                      }
                   ?>
                </tbody>
            </table>
            </form>
        </div>
</center>
<script type="text/javascript">
    $(document).ready(function(){
      $('#konfirmasi_hapus').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
      });
    })
    
    function cancelclear(){
        $(".in").val("");
    }
</script>

<?php
    include 'footer.php';
?>