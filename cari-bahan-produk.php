
<?php
   include 'model/config.php';
   include 'head.php';
?>

      <center>
            <form id="form-cari-bahan-produk" action="input-penjualan.php" method="GET">                  
                  <div class="fieldsets-table">
                        <legend>TABEL BAHAN</legend>
                        <table class="mytableclass table table-bordered table-secondary" cellspacing="0" width="100%">
                              <thead>
                                 <tr style="height: 8px; font-weight: bold;">
                                       <!-- <th class="th-sm">Kode Produk</th> -->
                                       <th class="th-sm">Kode Bahan</th>
                                       <th class="th-sm">Nama Bahan</th>
                                       <th class="th-sm">Ukuran Bahan</th>
                                       <!-- <th class="th-sm">Qty Bahan</th> -->
                                       <th class="th-sm">Harga Bahan</th>  
                                       <th class="th-sm">Jenis Bahan</th>  
                                       <th class="th-sm">Stok Bahan</th>  
                                       <th class="th-sm">Satuan Bahan</th>  
                                 </tr>
                              </thead>
                              <tbody>
                                    <?php 
                                          $queryBarang = mysqli_query($conn, "select * from tb_barang");
                                          
                                          $rowArray = mysqli_num_rows($queryBarang);
                              
                                          if($rowArray > 0){
                                                while($dataCari = mysqli_fetch_array($queryBarang)){
                                                      echo "
                                                      <tr class='table-light'>
                                                            <td><input type='checkbox' name='kode_barang[]' value='".$dataCari['kode_barang']."'>".$dataCari['kode_barang']."</td>
                                                            <td>".$dataCari['nama_barang']."</td>
                                                            <td>".$dataCari['ukuran_panjang_barang']." X ".$dataCari['ukuran_lebar_barang']."</td>
                                                            <td>".$dataCari['harga_barang']."</td>                                                            
                                                            <td>".$dataCari['jenis_barang']."</td>
                                                            <td>".$dataCari['stok_barang']."</td>                 
                                                            <td>".$dataCari['satuan_barang']."</td>
                                                      </tr>
                                                      ";
                                                }
                                          }
                                    
                                    ?>
                              </tbody>
                        </table>
                  </div>
                  <button type="submit" name="button-isi-data" class="btn bg-primary">ISI DATA</button>
            </form>

            
      </center>
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
<?php
   include 'footer.php';
?>