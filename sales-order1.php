<?php
    // include 'control/act-penjualan.php';    
    include 'model/config.php';
    include 'head.php';
    error_reporting(0);
    
    $queryAmbilNo = mysqli_query($conn, "select MAX(no_so) from tb_so_hd");
    $ambilNo = mysqli_fetch_array($queryAmbilNo);
    $maxNoTransaksi = $ambilNo[0];
    $noTr = (int) substr($maxNoTransaksi,3,5);
    $noTr++;
    $noTransaksiBaru = "SO-".sprintf("%05s",$noTr);

    if(isset($_GET['button-isi-data'])){
        $no_pn = $_GET['no_pn'];
        $queryJoinPen = mysqli_query($conn, "select tp.no_pn, kode, nama, alamat, kota, kode_produk,
            nama_produk, ukuran_panjang_produk, ukuran_lebar_produk, qty, satuan_produk, 
            harga_produk, total, total_all, status_so from tb_penawaran tp inner join tb_penawaran_dtl tpd on tp.no_pn = tpd.no_pn where tp.no_pn = '$no_pn' ");

        while($p = mysqli_fetch_array($queryJoinPen)){
            $kode = $p['kode'];
            $nama = $p['nama'];
            $alamat = $p['alamat'];
            $kota = $p['kota'];
            // $kode_produk = $p['kode_produk'];
            // $nama_produk = $p['nama_produk'];
            // $ukuran_panjang_produk = $p['ukuran_panjang_produk'];
            // $ukuran_lebar_produk = $p['ukuran_lebar_produk'];
            // $qty = $p['qty'];
            // $satuan_produk = $p['satuan_produk'];
            // $harga_produk = $p['harga_produk'];
            // $total = $p['total'];
            $status_so = $p['status_so'];
            $total_all = $p['total_all'];
        }
    }
?>

    
<center>
    <form action="aksi-sales-order.php" method="post">
        <div class="fieldsets-table">    
            <legend>Sales  Order</legend>
            <table border="0" class="fieldtab1">
                <tr>
                    <td>No. SO</td>
                    <td width="1">:</td>

                    <td>
                        <input type="text" class="in form-control" name="no_so" value="<?php echo $noTransaksiBaru?>"/>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>
                        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modalCariData" >Cari Penawaran</button>
                    </td>
                </tr>
                <tr>
                    <td>No. PN</td>
                    <td width="1">:</td>
                    <td>
                        <input value="<?php echo $no_pn?>" type="text" class="in form-control" name="no_pn"/>
                    </td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td width="1">:</td>
                    <td>
                        <input value='<?php echo $nama?>' type="text" class="in form-control" name="nama"/>
                    </td> 
                </tr>
                <tr>
                    <td>Tgl. SO</td>
                    <td width="1">:</td>

                    <td>
                        <input type="date" class="in form-control" name="tgl_so"/>
                    </td>
                </tr>
            </table>
            <table border="0" style="float: right;">
            <tr>
                    <td>Kode</td>
                    <td width="1">:</td>
                    <td>
                        <input value='<?php echo $kode?>' type="text" class="in form-control" name="kode"/>
                    </td>
                </tr>
            <tr>
                    <td>Alamat</td>
                    <td width="1">:</td>
                    <td>
                        <input value='<?php echo $alamat?>' type="text" class="in form-control" name="alamat"/>
                    </td>
                </tr>
               <tr>
                    <td>Kota</td>
                    <td width="1">:</td>
                    <td>
                        <input value='<?php echo $kota?>' type="text" class="in form-control" name="kota"/>
                    </td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td width="1">:</td>

                    <td>
                        <input value='<?php echo $status_so?>' type="text" class="in form-control" name="status_so"/>
                    </td>
                </tr>
               </table>
        </div>
                <div class="fieldsets-table" style="height: 510px;">                
                  <legend>Detail</legend>
                  <table id="myTable" class="mytableclass table table-striped table-bordered table-secondary" cellspacing="0" width="100%">
                        <thead>
                              <tr style="height: 8px; font-weight: bold;">
                                    <!-- <th class="th-sm"></th> -->
                                    <!-- <th class="th-sm">No. Penawaran</th> -->
                                    <th class="th-sm">Kode Produk</th>
                                    <th class="th-sm">Nama Produk</th>
                                    <th class="th-sm">Ukuran Produk</th>
                                    <th class="th-sm">Qty</th>
                                    <th class="th-sm">Satuan Produk</th>
                                    <th class="th-sm">Harga Produk</th>  
                                    <!-- <th class="th-sm">Satuan</th> -->
                                    <th class="th-sm">Total</th>   
                              </tr>
                        </thead>
                        
                        <tbody>
                            <?php
                                if(isset($_GET['button-isi-data'])){
                                    // foreach($_GET['no_pn'] as $key){
                                        $queryDapatPen = mysqli_query($conn, "select * from tb_penawaran_dtl where no_pn = '$no_pn' ");
                                        $no = 1;
                                        while($dataCari = mysqli_fetch_array($queryDapatPen)){
                                            echo "
                                                <tr>
                                                    <input hidden type='text' name='no_no[]' value='".$no++."'>
                                                    <td><input size='65' type='text' name='kode_produk[]' value='".$dataCari['kode_produk']."'></td>
                                                    <td><input size='65' type='text' name='nama_produk[]' value='".$dataCari['nama_produk']."'></td>
                                                    <td><input size='2' type='text' name='ukuran_panjang_produk[]' value='".$dataCari['ukuran_panjang_produk']."'> X <input size='2' type='text' name='ukuran_lebar_produk[]' value='".$dataCari['ukuran_lebar_produk']."'></td>
                                                    <td><input size='2' type='text' name='qty[]' value='".$dataCari['qty']."'></td>
                                                    <td><input size='8'type='text' name='satuan_produk[]' value='".$dataCari['satuan_produk']."'></td>                 
                                                    <td><input size='8' class='harga_produk' type='text' name='harga_produk[]' value='".$dataCari['harga_produk']."'></td>
                                                    <td><input size='8' type='text' name='total[]' value='".$dataCari['total']."'></td>
                                                </tr>
                                            ";
                                        }
                                    
                                }
                            ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan='3'><label style="float: right;font-size: 14px; font-weight: bold;">TOTAL</label></td>
                            <td colspan='6'>
                                <input type='text' name='total_all' class='totalSemua' value = "<?php echo $total_all?>">
                            </td>
                        </tr>
                        </tfoot>
                </table>
                

            <!-- RUMUSS JS -->
        </div>
            
            
            <button type="submit" name="button-simpan" class="btn btn-info ">Simpan</button>
            <a type="button" href="laporan-sales-order.php" class="btn btn-dark ">Laporan</a>
            <!-- <a href="cari-penjualan.php" type="button" name="button-cancel" class="btn btn-danger ">Cancel</a> -->
    <!-- </div> -->
    <script>
        // $(document).ready(function(){
        //     $(".mytableclass").keyup(sumtotal);
        //     function sumtotal(){
        //         var qty = 0;
        //         var harga = 0;
        //         var subtotal = 0;
        //         var total = 0;

        //         $(".mytableclass tbody tr").each(function(){
        //             qty = parseNumber($(this).find('.qty_barang').val());
        //             harga = parseNumber($(this).find('.harga_barang').val());

        //             subtotal = (qty * harga);

        //             $(this).find('.total').val(subtotal);
        //             total += subtotal;
        //         });
        //         $('.totalSemua').val(total);
        //     }
        //     function parseNumber(n){
        //         var f = parseFloat(n);
        //         return isNaN(f) ? 0 : f;
        //     }
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

    <!-- Modal -->
    <div class="modal fade" id="modalCariData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                    <!-- <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Customer</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div> -->
                    <div class="modal-body">
                    <form action="sales-order1.php">
                    <div class="fieldsets-table">
                                <legend>TABEL PENAWARAN</legend>
                                <table class="mytableclass table table-bordered table-secondary" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <!-- <th class="th-sm"></th> -->
                                            <!-- <th class="th-sm">No. Penawaran</th> -->
                                            <th class="th-sm">No. Penawaran</th>
                                            <th class="th-sm">Kode Customer</th>
                                            <th class="th-sm">Nama</th>
                                            <th class="th-sm">Alamat</th>
                                            <th class="th-sm">Kota</th>
                                            <th class="th-sm">No. Telp</th>   
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <?php 
                                                $queryCariPen = mysqli_query($conn, "select * from tb_penawaran");
                                                
                                                $rowArray = mysqli_num_rows($queryCariPen);
                                    
                                                if($rowArray > 0){
                                                        while($dataCari = mysqli_fetch_array($queryCariPen)){
                                                            echo "
                                                                <tr class='table-light'>
                                                                    <td><input type='checkbox' name='no_pn' value='".$dataCari['no_pn']."'>".$dataCari['no_pn']."</td>                                                           
                                                                    <td>".$dataCari['kode']."</td>
                                                                    <td>".$dataCari['nama']."</td>
                                                                    <td>".$dataCari['alamat']."</td>
                                                                    <td>".$dataCari['kota']."</td>
                                                                    <td>".$dataCari['no_telp']."</td>                 
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

</center>
<?php
include 'footer.php';
?>

<!-- 
    

 -->