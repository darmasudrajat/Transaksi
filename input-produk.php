<?php
    // include 'control/act-penjualan.php';    
    include 'model/config.php';
    include 'head.php';
    // error_reporting(0);
    
    $queryAmbilNo = mysqli_query($conn, "select MAX(kode_produk) from tb_produk_hd");
    $ambilNo = mysqli_fetch_array($queryAmbilNo);
    $maxNoTransaksi = $ambilNo[0];
    $noTr = (int) substr($maxNoTransaksi,3,5);
    $noTr++;
    $kodeProduk = "PRD".sprintf("%05s",$noTr);
    
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
    <form action="proses-input-penjualan.php" method="post">
        <div class="fieldsets-table">    
            <legend>Produk Baru</legend>
            <table border="0" class="fieldtab1">
                <tr>
                    <td>Kode</td>
                    <td width="1">:</td>

                    <td>
                        <input type="text" class="in form-control" name="kode_produk" value="<?php echo $kodeProduk?>"/>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>
                        <button type="button" data-toggle="modal" data-target="#modalCariData" class="btn btn-outline-primary">Cari Bahan</button>
                    </td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td width="1">:</td>

                    <td>
                        <input value='' type="text" class="in form-control" name="nama_produk"/>
                    </td>
                </tr>
                <tr>
                    <td>Ukuran</td>
                    <td width="1">:</td>

                    <td>
                        <input placeholder="Panjang..." value='' type="text" class="in form-control" name="ukuran_panjang_produk" />
                    
                        <input placeholder="Lebar..." value='' type="text" class="in form-control" name="ukuran_lebar_produk" />
                    </td>
                </tr>
            </table>
            <table border="0" class="fieldtab3">
                <tr>
                    <td>Satuan</td>
                    <td width="1">:</td>
                    <td>
                        <input value='' type="text" class="in form-control" name="satuan_produk"/>
                    </td>
                </tr>
                <tr>
                    <td>Harga</td>
                    <td width="1">:</td>
                    <td>
                        <input value='' type="text" class="in form-control" name="harga_produk"/>
                    </td>
                </tr>
            </table>
        </div>
                <div class="fieldsets-table" style="height: 510px;">                
                  <legend>Bahan</legend>
                  <table id="myTable" class="mytableclass table table-striped table-bordered table-secondary" cellspacing="0" width="100%">
                        <thead>
                              <tr style="height: 8px; font-weight: bold;">
                                    <!-- <th class="th-sm"></th> -->
                                    <th class="th-sm">Kode Barang</th>
                                    <th class="th-sm">Nama</th>
                                    <th class="th-sm">Ukuran</th>
                                    <th class="th-sm">Qty</th>
                                    <th class="th-sm">Harga</th>
                                    <th class="th-sm">Jenis</th>  
                                    <th class="th-sm">Satuan</th>
                                    <th class="th-sm">Total</th>   
                              </tr>
                        </thead>
                        
                        <tbody>
                              <?php
                                if(isset($_GET['button-isi-data'])){
                                    foreach($_GET['kode_barang'] as $key){

                                    $queryBarang = mysqli_query($conn, "select * from tb_barang where kode_barang ='$key'");
                                    
                                        $no = 1;
                                          while($dataCari = mysqli_fetch_array($queryBarang)){
                                                echo "
                                                <tr>
                                                    <input hidden type='text' name='no_no[]' value='".$no++."'>
                                                    <td><input id='kdbrg' size='6' type='text' name='kode_barang[]' value='".$dataCari['kode_barang']."'></td>
                                                    <td><input size='65' type='text' name='nama_barang[]' value='".$dataCari['nama_barang']."'></td>
                                                    <td>
                                                        <input size='2' type='text' name='ukuran_panjang_barang[]' value='".$dataCari['ukuran_panjang_barang']."'> 
                                                        X 
                                                        <input size='2' type='text' name='ukuran_lebar_barang[]' value='".$dataCari['ukuran_lebar_barang']."'>
                                                    </td>
                                                    <td><input class='qty_barang' size='3' type='text' name='qty_barang[]'></td>
                                                    <td><input size='8' class='harga_barang' type='text' name='harga_barang[]' value='".$dataCari['harga_barang']."'></td>
                                                    <td><input size='8' type='text' name='jenis_barang[]' value='".$dataCari['jenis_barang']."'></td>
                                                    <td><input size='8'type='text' name='satuan_barang[]' value='".$dataCari['satuan_barang']."'></td>                 
                                                    <td><input class='total' size='6' type='text' name='total[]'></td>                   
                                                </tr>
                                                ";
                                          }
                                        }
                                    }
                              
                              ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan='3'><label style="float: right;font-size: 14px; font-weight: bold;">TOTAL</label></td>
                            <td colspan='6'>
                                <input type='text' name='total_all' class='totalSemua'>
                            </td>
                        </tr>
                        </tfoot>
                </table>
                

            <!-- RUMUSS JS -->
    </div>
    <!-- <div style="padding-top: 7px;width: 20%; height: 50px; margin: 9px auto;" class="fieldsets-table">     -->
    
            <!-- <a type="submit" href="cari-penjualan.php" name="button-simpan" class="btn btn-dark ">Masukan Data</a> -->
            <button type="submit" name="button-simpan" class="btn btn-info ">Simpan</button>
            <a type="button" href="laporan-produk.php" class="btn btn-dark ">List Bahan Produk</a>
            <!-- <a href="cari-penjualan.php" type="button" name="button-cancel" class="btn btn-danger ">Cancel</a> -->
    </form>

    <div class="modal fade" id="modalCariData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                    <!-- <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Customer</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div> -->
                    <div class="modal-body">
                    <form id="form-cari-barang" action="input-produk.php" method="GET">
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
                        <legend>TABEL BAHAN</legend>
                        <table class="mytableclass table table-bordered table-secondary" cellspacing="0" width="100%">
                              <thead>
                                    <tr>
                                          <!-- <th class="th-sm"></th> -->
                                          <th class="th-sm">Kode Bahan</th>
                                          <th class="th-sm">Nama Bahan</th>
                                          <th class="th-sm">Ukuran Panjang</th>
                                          <!-- <th class="th-sm">Ukuran Lebar</th> -->
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
        
                    </div>
                </div>
            </div>
            </div>
    
    <script>
        $(document).ready(function(){
            $(".mytableclass").keyup(sumtotal);
            function sumtotal(){
                var qty = 0;
                var harga = 0;
                var subtotal = 0;
                var total = 0;

                $(".mytableclass tbody tr").each(function(){
                    qty = parseNumber($(this).find('.qty_barang').val());
                    harga = parseNumber($(this).find('.harga_barang').val());

                    subtotal = (qty * harga);

                    $(this).find('.total').val(subtotal);
                    total += subtotal;
                });
                $('.totalSemua').val(total);
            }
            function parseNumber(n){
                var f = parseFloat(n);
                return isNaN(f) ? 0 : f;
            }

        });
        // $(".table-light").keyup(function(){
        //     var qty = parseInt($(".qty_barang").val())
        //     var harga = parseInt($(".harga_barang").val())

        //     var total = qty * harga;
        //     $(".total").attr("value", total)

        //     var all =+ total;
        //     $(".totalSemua").attr("value", all);

        // });
</script>
</form>

<!-- <SCRIPT>
            // $(document).ready(function(){
            //     total();
            //     $('.qty_barang').change(function() {
            //         total();
            //     });
            //     $('.total').change(function() {
            //         total();
            //     });               
            // });

            // function total()
            // {
            //     var sum = 0;
            //     $('#myTable> tbody  > tr').each(function() {
            //         var qtyBarang = document.getElementByClass('qty_barang').val();
            //         var price = document.getElementByClass('harga_barang').val();
            //         var tot = document.getElementByClass('total');
                    // var qtyBarang = $(this).find('.qty_barang').val();
                    // var price = $(this).find('.harga_barang').val();
                    
            //         var amount = (qtyBarang*price);
            //         sum+=amount;
            //         document.getElementByClass('total').value = amount;
            //     });
            //     $('#totalSemua').text(sum);
            // }
// </SCRIPT> -->
</center>
<?php
include 'footer.php';
?>

<!-- GUDANG:
    1.  INPUT STOK > MEMBERI MERK PADA KERTAS YG
        BELUM ADA MERK NYA DI TABEL KERTAS_MERK? -->