<?php
   include 'model/config.php';
   include 'head.php';
?>
<center>
      <form id="form-cari-barang" action="edit-penjualan.php" method="GET">
            <div class="fieldsets-table">
                  <legend>Laporan Bahan Produk</legend>
                  <table class="mytableclass table table-bordered table-secondary " cellspacing="0" width="100%">
                  <thead class="black">
                        <tr>
                              <!-- <th></th> -->
                              <th>No Input</th>
                              <th>Kode Produk</th>
                              <th class="th-sm">Nama Produk</th>
                              <th class="th-sm">Ukuran Produk</th>
                              <!-- <th class="th-sm">Ukuran Lebar</th>    -->
                              <th class="th-sm">Satuan Produk</th>   
                              <th class="th-sm">Harga Produk</th>   
                              <th class="th-sm">Kode Barang</th>   
                              <th class="th-sm">Nama Barang</th>   
                              <th class="th-sm">Ukuran Barang</th>   
                              <!-- <th class="th-sm">Ukuran Lebar</th>    -->
                              <th class="th-sm">Qty Barang</th>   
                              <th class="th-sm">Satuan Barang</th>   
                              <th class="th-sm">Harga Barang</th>   
                              <th class="th-sm">Jenis Barang</th>   
                              <th class="th-sm">Total</th>   
                              <th class="th-sm">Total Semua</th>   
                        </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $queryLaporan = mysqli_query($conn, "select * from tb_bahan_produk ORDER BY No_Input DESC");
                        
                        $row = mysqli_num_rows($queryLaporan);
                        
                              if($row > 0){
                        while($dataCari = mysqli_fetch_array($queryLaporan)){
                              echo "
                              <tr class='table-light'>
                                    
                                    <td>".$dataCari['No_Input']."</td>
                                    <td>".$dataCari['kode_produk']."</td>
                                    <td>".$dataCari['nama_produk']."</td>
                                    <td>".$dataCari['ukuran_panjang_produk']." x ".$dataCari['ukuran_lebar_produk']."</td>                 
                                    <td>".$dataCari['satuan_produk']."</td>                 
                                    <td>".$dataCari['harga_produk']."</td>                 
                                    <td>".$dataCari['kode_barang']."</td>                 
                                    <td>".$dataCari['nama_barang']."</td>        
                                    <td>".$dataCari['ukuran_panjang_barang']." x ".$dataCari['ukuran_lebar_barang']."</td>                                                     
                                    <td>".$dataCari['qty_barang']."</td>                 
                                    <td>".$dataCari['satuan_barang']."</td>                 
                                    <td>".$dataCari['harga_barang']."</td>                 
                                    <td>".$dataCari['jenis_barang']."</td>                 
                                    <td>".$dataCari['total']."</td>                 
                                    <td>".$dataCari['total_all']."</td>                 
                              </tr>
                              ";
                        }
                        }
                  
                        ?>
                        </tbody>
                  </table>
            </div>
            <script type="text/javascript">
    $(document).ready(function(){
      // var aa = 
        $('.mytableclass').dataTable({

                // fixedHeader: true,
                // columnDefs: [{
                //       orderable: true,
                //       // className: 'select-checkbox',
                //       targets: 0
                // }],
                // select: {
                //       style: 'os',
                //       selector: 'td:first-child'
                // }
        });
      
      // $('#button-isi-data').click(function(){
      //       var selData = table.rows(".selected").data();
      //       alert(selData.length);
    });
      // });
</script>
        <!-- <button type="submit" name="button-isi-data" class="btn bg-primary">ISI DATA</button> -->
    </form>
</center>
<?php
   include 'footer.php';
?>