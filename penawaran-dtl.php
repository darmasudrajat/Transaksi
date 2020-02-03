    <?php
        // include 'control/act-penjualan.php';    
        include 'model/config.php';
        include 'head.php';
        error_reporting(0);

        $queryAmbilNo = mysqli_query($conn, "select MAX(no_pn) from tb_penawaran");
        $ambilNo = mysqli_fetch_array($queryAmbilNo);
        $maxNoTransaksi = $ambilNo[0];
        $noTr = (int) substr($maxNoTransaksi,2,4);
        $noTr++;
        $noTransaksiBaru = "PN".sprintf("%04s",$noTr);

        
        if(isset($_GET['button-isi-data'])){
        // $_SESSION['kode'] = $_GET['kode'];
        $kode = $_GET['kode'];
        // $kode_produk = $_GET['kode_produk'];
        $queryCust = mysqli_query($conn, "select * from tb_customer where kode = '$kode' ");
        // $queryProduk = mysqli_query($conn, "select * from tb_produk where kode_produk = '$kode_produk' ");
        // while($r = mysqli_fetch_array($queryProduk)){
        //     $nama_produk = $r['nama_produk'];
        //     $ukuran_panjang_produk = $r['ukuran_panjang_produk']; 
        //     $ukuran_lebar_produk = $r['ukuran_lebar_produk']; 
        //     $satuan_produk = $r['satuan_produk'];
        //     $harga_produk = $r['harga_produk'];
        // }
        while($c = mysqli_fetch_array($queryCust)){
            $nama = $c['nama'];
            $alamat = $c['alamat']; 
            $kota = $c['kota']; 
            $pic = $c['pic'];
            $no_telp = $c['no_telp'];
        }
    }
    //     if(isset($_GET['button-isi-data1'])){
    //     // $kode = $_GET['kode'];
    //     $kode_produk = $_GET['kode_produk'];
    //     // $queryCust = mysqli_query($conn, "select * from tb_customer where kode = '$kode' ");
    //     $queryProduk = mysqli_query($conn, "select * from tb_produk where kode_produk = '$kode_produk' ");
    //     while($r = mysqli_fetch_array($queryProduk)){
    //         $nama_produk = $r['nama_produk'];
    //         $ukuran_panjang_produk = $r['ukuran_panjang_produk']; 
    //         $ukuran_lebar_produk = $r['ukuran_lebar_produk']; 
    //         $satuan_produk = $r['satuan_produk'];
    //         $harga_produk = $r['harga_produk'];
    //     }
    //     // while($c = mysqli_fetch_array($queryCust)){
    //     //     $nama = $c['nama'];
    //     //     $alamat = $c['alamat']; 
    //     //     $kota = $c['kota']; 
    //     //     $pic = $c['pic'];
    //     //     $no_telp = $c['no_telp'];
    //     // }
    // }
        
        
    ?>

        
    <center>
        <!-- <link rel="stylesheet" type="text/css" href="../css/style.css" /> -->


        <form action="aksi-penawaran-dtl.php" method="post">

            <div class="fieldsets-table">    
                <legend>Penawaran</legend>
                <table border="0" class="fieldtab1">
                    
                    <tr>
                        <td>No</td>
                        <td width="1">:</td>

                        <td>
                            <input type="text" class="form-control" name="no_pn" value="<?php echo $noTransaksiBaru?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modalCariData" >Cari Customer dan Produk</button>
                        </td>
                    </tr>   
                    <tr>
                        <td>Kode</td>
                        <td width="1">:</td>

                        <td>
                            <input type="text" class="form-control" name="kode"
                            value="<?php echo $kode?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td width="1">:</td>

                        <td>
                            <input type="text" class="form-control" name="nama"
                            value="<?php echo $nama?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td width="1">:</td>

                        <td>
                            <input type="text" class="form-control" name="alamat"
                            value="<?php echo $alamat?>"/>
                        </td>
                    </tr>
                </table>
                <table class="fieldtab3">
                    <tr>
                        <td>Kota</td>
                        <td width="1">:</td>

                        <td>
                            <input type="text" class="form-control" name="kota"
                            value="<?php echo $kota?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td>PIC</td>
                        <td width="1">:</td>

                        <td>
                            <input type="text" class="form-control" name="pic"
                            value="<?php echo $pic?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td>No. Telp</td>
                        <td width="1">:</td>

                        <td>
                            <input type="text" class="form-control" name="no_telp"
                            value="<?php echo $no_telp?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td>Tanggal</td>
                        <td width="1">:</td>

                        <td>
                            <input type="date" class="form-control" name="tanggal_pn">
                        </td>
                    </tr>
                </table>
            </div>
            <div class="fieldsets-table">                
                        <!-- <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modalCariProduk" >Cari Produk</button> -->
                <legend>Produk</legend>
                    
                <table id="myTable" class="mytableclass1 table table-striped table-bordered table-secondary" cellspacing="0" width="100%">
                    <thead>
                        <tr style="height: 8px; font-weight: bold;">
                            <!-- <th class="th-sm"></th> -->
                            <th class="th-sm">Kode Produk</th>
                            <th class="th-sm">Nama Produk</th>
                            <th class="th-sm">Ukuran Produk</th>
                            <!-- <th class="th-sm">Ukuran Lebar</th> -->
                            <th class="th-sm">Qty</th>
                            <th class="th-sm">Satuan Produk</th>
                            <th class="th-sm">Harga Produk</th>
                            <!-- <th class="th-sm">Jenis Barang</th>    -->
                            <th class="th-sm">Total</th>   
                        </tr>
                    </thead>
                            
                    <tbody>
                        <?php
                            if(isset($_GET['button-isi-data'])){
                            foreach($_GET['kode_produk'] as $key){
                                $queryDapatProduk = mysqli_query($conn, "select * from tb_produk_hd where kode_produk = '$key' ");
                                $no = 1;
                                
                                while($dapatProduk = mysqli_fetch_array($queryDapatProduk)){
                                    echo "
                                        <tr>
                                            <input hidden type='text' name='no_no[]' value='".$no++."'>
                                            <td><input readonly size='20' type='text' name='kode_produk[]' value='".$dapatProduk['kode_produk']."'></td>
                                            <td><input readonly size='60' type='text' name='nama_produk[]' value='".$dapatProduk['nama_produk']."'></td>
                                            <td>
                                                <input readonly size='2' type='text' name='ukuran_panjang_produk[]' value='".$dapatProduk['ukuran_panjang_produk']."'> X 
                                                <input readonly size='2' type='text' name='ukuran_lebar_produk[]' value='".$dapatProduk['ukuran_lebar_produk']."'>
                                            </td>
                                            <td><input class='qty' size='3' type='text' name='qty[]'></td>
                                            <td><input readonly size='8' type='text' name='satuan_produk[]' value='".$dapatProduk['satuan_produk']."'></td>
                                            <td><input class='harga_produk' size='6' type='text' name='harga_produk[]' value='".$dapatProduk['harga_produk']."'></td>                 
                                            <td><input class='total' size='6' type='text' name='total[]'></td>                 
                                        </tr>";
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
            <a type="button" href="laporan-penawaran.php" class="btn btn-dark ">List Penawaran Detail</a>
                <!-- <a href="cari-penjualan.php" type="button" name="button-cancel" class="btn btn-danger ">Cancel</a> -->
        </form>
        <!-- </div> -->

        <!-- Modal -->
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
                    <form action="penawaran-dtl.php">
                    <div class="fieldsets-table">
                                <legend>TABEL CUSTOMER</legend>
                                <table class="mytableclass table table-bordered table-secondary" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <!-- <th class="th-sm"></th> -->
                                            <!-- <th class="th-sm">No. Penawaran</th> -->
                                            <th class="th-sm">Kode Customer</th>
                                            <th class="th-sm">Nama Customer</th>
                                            <th class="th-sm">Alamat</th>
                                            <th class="th-sm">Kota</th>
                                            <th class="th-sm">PIC</th>
                                            <th class="th-sm">No. Telp</th>   
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <?php 
                                                $queryCariCust = mysqli_query($conn, "select * from tb_customer");
                                                
                                                $rowArray = mysqli_num_rows($queryCariCust);
                                    
                                                if($rowArray > 0){
                                                        while($dataCari = mysqli_fetch_array($queryCariCust)){
                                                            echo "
                                                                <tr class='table-light'>
                                                                    <td><input type='checkbox' name='kode' value='".$dataCari['kode']."'>".$dataCari['kode']."</td>                                                           
                                                                    <td>".$dataCari['nama']."</td>
                                                                    <td>".$dataCari['alamat']."</td>
                                                                    <td>".$dataCari['kota']."</td>
                                                                    <td>".$dataCari['pic']."</td>
                                                                    <td>".$dataCari['no_telp']."</td>                 
                                                                </tr>
                                                            ";
                                                        }
                                                }
                                            
                                            ?>
                                    </tbody>
                                </table>
                        </div>
                        <div class="fieldsets-table">
                              <legend>TABEL PRODUK</legend>
                              <table class="mytableclass table table-bordered table-secondary" cellspacing="0" width="100%">
                                    <thead>
                                          <tr>
                                                <!-- <th class="th-sm"></th> -->
                                                <th class="th-sm">Kode Produk</th>
                                                <th class="th-sm">Nama Produk</th>
                                                <th class="th-sm">Ukuran Produk</th>
                                                <th class="th-sm">Satuan Produk</th>
                                                <th class="th-sm">Harga Produk</th>
                                                <!-- <th class="th-sm">No. Telp</th>    -->
                                          </tr>
                                    </thead>
                                    <tbody>
                                          <?php 
                                                $queryCariBarang = mysqli_query($conn, "select * from tb_produk_hd");
                                                
                                                $rowArray = mysqli_num_rows($queryCariBarang);
                                    
                                                if($rowArray > 0){
                                                      while($dataCari = mysqli_fetch_array($queryCariBarang)){
                                                            echo "
                                                            <tr class='table-light'>
                                                            
                                                                  <td><input type='checkbox' name='kode_produk[]' value='".$dataCari['kode_produk']."'>".$dataCari['kode_produk']."</td>
                                                                  <td>".$dataCari['nama_produk']."</td>
                                                                  <td>".$dataCari['ukuran_panjang_produk']." X ".$dataCari['ukuran_panjang_produk']."</td>
                                                                  <td>".$dataCari['satuan_produk']."</td>
                                                                  <td>".$dataCari['harga_produk']."</td>                 
                                                            </tr>
                                                            ";
                                                      }
                                                }
                                          
                                          ?>
                                    </tbody>
                                    
                              </table>

                        </div>
                    <div class="modal-footer">
                    <button style="margin: auto;" type="submit" name="button-isi-data" class="btn bg-primary">ISI DATA</button>
                    </div>
                    </form>
                    </div>
                </div>
            </div>
            </div>
       
        <script>
            $(document).ready(function(){
                $(".mytableclass1").keyup(sumtotal);
                function sumtotal(){
                    var qty = 0;
                    var harga = 0;
                    var total = 0;
                    var total_all = 0;

                    $(".mytableclass1 tbody tr").each(function(){
                        qty = parseNumber($(this).find('.qty').val());
                        harga = parseNumber($(this).find('.harga_produk').val());

                        total = (qty * harga);
                    $(this).find('.total').val(total);
                    total_all += total;
        
                });
                $('.totalSemua').val(total_all);
                    
                }
                function parseNumber(n){
                    var f = parseFloat(n);
                    return isNaN(f) ? 0 : f;
                }

            // });
            // $(document).ready(function(){

                // $('.mytableclass').dataTable({
            
                // });
                // $('.mytableclass1').dataTable({
            
                // });
            });
        </script>
    <!-- </form> -->

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