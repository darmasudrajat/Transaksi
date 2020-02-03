
<?php
   include 'model/config.php';
   include 'head.php';
?>

      <center>
            <form id="form-cari-penawaran-produk" action="purchase-order.php" method="GET">
                  <!-- <div class="fieldsets-table">
                        <legend>TABEL PRODUK</legend>
                        <table class="mytableclass table table-bordered table-secondary " cellspacing="0" width="100%">
                        <thead>
                              <tr>
                                    <th></th>
                                    <th>Kode Produk</th>
                                    <th class="th-sm">Nama Produk</th>
                                    <th class="th-sm">Ukuran Panjang</th>
                                    <th class="th-sm">Ukuran Lebar</th>   
                                    <th class="th-sm">Satuan Produk</th>   
                                    <th class="th-sm">Harga Produk</th>   
                              </tr>
                              </thead>
                              <tbody> -->
                              <?php 
                              // $queryCustomer = mysqli_query($conn, "select * from tb_produk");
                              
                              // $row = mysqli_num_rows($queryCustomer);
                              
                              //       if($row > 0){
                              // while($dataCari = mysqli_fetch_array($queryCustomer)){
                              //       echo "
                              //       <tr class='table-light'>
                                          
                              //             <td><input type='checkbox' name='kode_produk' value='".$dataCari['kode_produk']."'>".$dataCari['kode_produk']."</td>
                              //             <td>".$dataCari['nama_produk']."</td>
                              //             <td>".$dataCari['ukuran_panjang_produk']."</td>
                              //             <td>".$dataCari['ukuran_lebar_produk']."</td>                 
                              //             <td>".$dataCari['satuan_produk']."</td>                 
                              //             <td>".$dataCari['harga_produk']."</td>                 
                              //       </tr>
                              //       ";
                              // }
                              // }
                        
                              ?>
                              <!-- </tbody>
                        
                        </table>
                  </div> -->
                  <div class="fieldsets-table">
                        <legend>TABEL SUPLIER</legend>
                        <table class="mytableclass table table-bordered table-secondary" cellspacing="0" width="100%">
                              <thead>
                                    <tr>
                                          <!-- <th class="th-sm"></th> -->
                                          <!-- <th class="th-sm">No. Penawaran</th> -->
                                          <th class="th-sm">Kode Suplier</th>
                                          <th class="th-sm">Nama Suplier</th>
                                          <th class="th-sm">Alamat</th>
                                          <th class="th-sm">No. Telp</th>  
                                          <th class="th-sm">Email</th>  
                                    </tr>
                              </thead>
                              <tbody>
                                    <?php 
                                          $querySupl = mysqli_query($conn, "select * from tb_suplier");
                                          
                                          $rowArray = mysqli_num_rows($querySupl);
                              
                                          if($rowArray > 0){
                                                while($dataCari = mysqli_fetch_array($querySupl)){
                                                      echo "
                                                      <tr class='table-light'>
                                                      
                                                            <td><input type='checkbox' name='kode_suplier' value='".$dataCari['kode_suplier']."'>".$dataCari['kode_suplier']."</td>                                                           
                                                            <td>".$dataCari['nama_suplier']."</td>
                                                            <td>".$dataCari['alamat_suplier']."</td>
                                                            <td>".$dataCari['no_telp']."</td>
                                                            <td>".$dataCari['email']."</td>
                                                        </tr>
                                                      ";
                                                }
                                          }
                                    
                                    ?>
                              </tbody>
                        </table>
                  </div>
                  <div class="fieldsets-table">
                        <legend>TABEL SALES ORDER</legend>
                        <table class="mytableclass table table-bordered table-secondary" cellspacing="0" width="100%">
                              <thead>
                                    <tr>
                                          <!-- <th class="th-sm"></th> -->
                                          <th class="th-sm">No. SO</th>
                                          <th class="th-sm">Kode Produk</th>
                                          <th class="th-sm">Kode Barang</th>
                                          <th class="th-sm">Nama Barang</th>
                                          <th class="th-sm">Ukuran</th>
                                          <th class="th-sm">Satuan</th>
                                          <th class="th-sm">Harga</th>
                                          <!-- <th class="th-sm">No. Telp</th>    -->
                                    </tr>
                              </thead>
                              <tbody>
                                    <?php 
                                          // $queryTest = mysqli_query($conn, "select ")
                                          $querySO = mysqli_query($conn, "select * from tb_sales_order tso inner join tb_bahan_produk tbp on tso.kode_produk = tbp.kode_produk ");
                                          
                                          $rowArray = mysqli_num_rows($querySO);
                              
                                          if($rowArray > 0){
                                                while($dataCari = mysqli_fetch_array($querySO)){
                                                      echo "
                                                      <tr class='table-light'>
                                                      
                                                            <td><input type='checkbox' name='kode_produk' value='".$dataCari['kode_produk']."'>".$dataCari['no_so']."</td>
                                                            <td>".$dataCari['kode_produk']."</td>
                                                            <td>".$dataCari['kode_barang']."</td>
                                                            <td>".$dataCari['nama_barang']."</td>
                                                            <td>".$dataCari['ukuran_panjang_barang']." X ".$dataCari['ukuran_panjang_barang']."</td>
                                                            <td>".$dataCari['satuan_barang']."</td>
                                                            <td>".$dataCari['harga_barang']."</td>                 
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