<?php
    // include 'control/act-penjualan.php';    
    include 'model/config.php';
    include 'head.php';
    error_reporting(0);

    // ==============================================
    // AMBIL DATANYA APA AJA.......
    // ==============================================
    
    $queryAmbilNo = mysqli_query($conn, "select MAX(no_inv) from tb_invoice_hd");
    $ambilNo = mysqli_fetch_array($queryAmbilNo);
    $maxNoTransaksi = $ambilNo[0];
    $noTr = (int) substr($maxNoTransaksi,3,5);
    $noTr++;
    $noTransaksiBaru = "Inv".sprintf("%05s",$noTr);

    if(isset($_GET['button-isi-data'])){
        $no_sj = $_GET['no_sj'];
        $queryJoinSj = mysqli_query($conn, "select tsh.no_sj, tsh.tgl_sj, tsh.kode, tsh.nama, tsh.alamat, tsh.kota, tsh.total_qty,
            tsd.kode_produk, tsd.nama_produk, tsd.ukuran_panjang_produk, tsd.ukuran_lebar_produk,
            tsd.qty, tsd.satuan_produk, tsd.sub_total
            from tb_sj_hd tsh
            inner join tb_sj_dtl tsd
            on tsh.no_sj = tsd.no_sj where tsh.no_sj = '$no_sj' ");

        while($p = mysqli_fetch_array($queryJoinSj)){
            $tgl_sj = $p['tgl_sj'];
            $kode = $p['kode'];
            $nama = $p['nama'];
            $alamat = $p['alamat'];
            $kota = $p['kota'];
            $total_qty = $p['total_qty'];
            $sub_total = $p['sub_total'];
            $totalHarga += $sub_total;
        }
    }
?>

    
<center>
    <form action="aksi-invoice.php" method="post">
        <div class="fieldsets-table">
            <legend>Invoice</legend>
            <table border="0" class="fieldtab1">
                <tr>
                    <td>No. Inv</td>
                    <td width="1">:</td>
                    <td>
                        <input type="text" class="in form-control" name="no_inv" value="<?php echo $noTransaksiBaru?>"/>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>
                        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modalCariData" >Cari SJ</button>
                    </td>
                </tr>
                <tr>
                    <td>Kode</td>
                    <td width="1">:</td>
                    <td>
                        <input value="<?php echo $kode?>" type="text" class="in form-control" name="kode"/>
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
                    <td>Tanggal</td>
                    <td width="1">:</td>
                    <td>
                        <input type="date" class="in form-control" name="tgl_inv"/>
                    </td>
                </tr>
            </table>
            <table border="0" class="fieldtab3">
                <tr>
                    <td>Alamat</td>
                    <td width="1">:</td>
                    <td>
                       <textarea name="alamat" class='form-control' cols="30" rows="3" value="<?php echo $alamat?>"><?php echo $alamat?></textarea>                    
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
                    <td>Total Qty</td>
                    <td width="1">:</td>
                    <td>
                        <input value='<?php echo $total_qty?>' type="text" class="in form-control" name="total_qty"/>
                    </td>
                </tr>
               </table>
        </div>
                <div class="fieldsets-table">                
                  <legend>Detail</legend>
                  <table id="myTable" class="mytableclass table table-striped table-bordered table-secondary" cellspacing="0" width="100%">
                        <thead>
                              <tr style="height: 8px; font-weight: bold;">
                                    <!-- <th class="th-sm"></th> -->
                                    <th class="th-sm">No</th>
                                    <th class="th-sm">Kode Produk</th>
                                    <th class="th-sm">Nama Produk</th>
                                    <th class="th-sm">Ukuran Produk</th>
                                    <th class="th-sm">Qty</th>
                                    <!-- <th class="th-sm">Satuan Produk</th> -->
                                    <!-- <th class="th-sm">Harga Produk</th>   -->
                                    <th class="th-sm">Satuan</th>
                                    <th class="th-sm">Sub Total</th>   
                                    <!-- <th class="th-sm">Total</th>    -->
                              </tr>
                        </thead>
                        
                        <tbody>
                            <?php
                                if(isset($_GET['button-isi-data'])){
                                    // foreach($_GET['no_pn'] as $key){
                                    $queryDapatPen = mysqli_query($conn, "select tsh.no_sj, tsh.tgl_sj, tsh.kode, tsh.nama, tsh.alamat, tsh.kota, tsh.total_qty,
                                    tsd.kode_produk, tsd.nama_produk, tsd.ukuran_panjang_produk, tsd.ukuran_lebar_produk,
                                    tsd.qty, tsd.satuan_produk, tsd.sub_total
                                    from tb_sj_hd tsh
                                    inner join tb_sj_dtl tsd
                                    on tsh.no_sj = tsd.no_sj where tsh.no_sj = '$no_sj' ");
                                        
                                    $no = 1;
                                    while($dataCari = mysqli_fetch_array($queryDapatPen)){
                                        echo "
                                            <tr>
                                                <td><input type='text' name='no_no[]' value='".$no++."'></td>
                                                <td><input size='65' type='text' name='kode_produk[]' value='".$dataCari['kode_produk']."'></td>
                                                <td><input size='65' type='text' name='nama_produk[]' value='".$dataCari['nama_produk']."'></td>
                                                <td><input size='2' type='text' name='ukuran_panjang_produk[]' value='".$dataCari['ukuran_panjang_produk']."'> X <input size='2' type='text' name='ukuran_lebar_produk[]' value='".$dataCari['ukuran_lebar_produk']."'></td>
                                                <td><input size='2' type='text' name='qty[]' value='".$dataCari['qty']."'></td>
                                                <td><input size='8'type='text' name='satuan_produk[]' value='".$dataCari['satuan_produk']."'></td>                 
                                                <td><input size='8' type='text' name='sub_total[]' value='".$dataCari['sub_total']."'></td>
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
                                    <input type='text' name='total_all' value='<?php echo $totalHarga ?>'>
                                </td>
                            </tr>
                        </tfoot>
                </table>
                

            <!-- RUMUSS JS -->
        </div>
            
            
            <button type="submit" name="button-simpan" class="btn btn-info ">Simpan</button>
            <a type="button" href="laporan-invoice.php" class="btn btn-dark ">Laporan</a>
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
        <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                    <!-- <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Customer</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div> -->
                    <div class="modal-body">
                    <form action="invoice.php">
                    <div class="fieldsets-table">
                                <legend>TABEL SJ</legend>
                                <table class="mytableclass table table-bordered table-secondary" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <!-- <th class="th-sm"></th> -->
                                            <!-- <th class="th-sm">No. Penawaran</th> -->
                                            <th class="th-sm">No. SJ</th>
                                            <th class="th-sm">Tgl. SJ</th>
                                            <th class="th-sm">Nama Customer</th>
                                            <th class="th-sm">Alamat</th>
                                            <th class="th-sm">Kota</th>
                                            <th class="th-sm">Total Qty</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <?php 
                                                $queryCariPen = mysqli_query($conn, "select * from tb_sj_hd");
                                                
                                                $rowArray = mysqli_num_rows($queryCariPen);
                                    
                                                if($rowArray > 0){
                                                        while($dataCari = mysqli_fetch_array($queryCariPen)){
                                                            echo "
                                                                <tr class='table-light'>
                                                                    <td><input type='checkbox' name='no_sj' value='".$dataCari['no_sj']."'>".$dataCari['no_sj']."</td>                                                           
                                                                    <td>".$dataCari['tgl_sj']."</td>
                                                                    <td>".$dataCari['nama']."</td>
                                                                    <td>".$dataCari['alamat']."</td>
                                                                    <td>".$dataCari['kota']."</td>                 
                                                                    <td>".$dataCari['total_qty']."</td>                 
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