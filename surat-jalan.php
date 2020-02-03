<?php
    // include 'control/act-penjualan.php';    
    include 'model/config.php';
    include 'head.php';
    error_reporting(0);
    
    $queryAmbilNo = mysqli_query($conn, "select MAX(no_sj) from tb_sj_hd");
    $ambilNo = mysqli_fetch_array($queryAmbilNo);
    $maxNoTransaksi = $ambilNo[0];
    $noTr = (int) substr($maxNoTransaksi,3,5);
    $noTr++;
    $noTransaksiBaru = "SJ-".sprintf("%05s",$noTr);

    if(isset($_GET['button-isi-data'])){
        $no_so = $_GET['no_so'];
        $queryJoinSo = mysqli_query($conn, "select tsh.no_so, tsh.kode, tsh.nama, tsh.alamat, tsh.kota, tsd.kode_produk,
        tsd.nama_produk, tsd.ukuran_panjang_produk, tsd.ukuran_lebar_produk, tsd.qty,
        tsd.satuan_produk, tsd.total
        from tb_so_hd tsh inner join tb_so_dtl tsd on tsh.no_so = tsd.no_so
        where tsh.no_so = '$no_so' ");

        while($p = mysqli_fetch_array($queryJoinSo)){
            $kode = $p['kode'];
            $nama = $p['nama'];
            $alamat = $p['alamat'];
            $kota = $p['kota'];
            // $kode_produk = $p['kode_produk'];
            // $nama_produk = $p['nama_produk'];
            // $ukuran_panjang_produk = $p['ukuran_panjang_produk'];
            // $ukuran_lebar_produk = $p['ukuran_lebar_produk'];
            $qty = $p['qty'];
            // $satuan_produk = $p['satuan_produk'];
            // $harga_produk = $p['harga_produk'];
            // $total = $p['total'];
            // $status_so = $p['status_so'];
            $totalQty += $qty;
        }
    }
?>

    
<center>
    <form action="aksi-surat-jalan.php" method="post">
        <div class="fieldsets-table" style="width: 90%; margin-bottom: 5%;">    
            <legend>Surat Jalan</legend>
            <table border="0" style="float: left;">
                <tr>
                    <td>No. SJ</td>
                    <td>
                        <input type="text" class="in form-control" name="no_sj" value="<?php echo $noTransaksiBaru?>"/>
                    </td>
                    <td>
                        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modalCariData" >Cari SO</button>
                    </td>
                </tr>
                <tr>
                    <td>Kode Customer</td>
                    <td>
                        <input value="<?php echo $kode?>" type="text" class="in form-control" name="kode"/>
                    </td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>
                        <input value='<?php echo $nama?>' type="text" class="in form-control" name="nama"/>
                    </td> 
                </tr>
                <tr>
                    <td>Tanggal SJ</td>
                    <td>
                        <input type="date" class="in form-control" name="tgl_sj"/>
                    </td>
                </tr>
            </table>
            <table border="0" style="float: right;">
            <tr>
                    <td>Alamat</td>
                    <td>
                       <textarea name="alamat" class='form-control' cols="30" rows="3" value="<?php echo $alamat?>"><?php echo $alamat?></textarea>                    
                    </td>
                </tr>
               <tr>
                    <td>Kota</td>
                    <td>
                        <input value='<?php echo $kota?>' type="text" class="in form-control" name="kota"/>
                    </td>
                </tr>
                <tr>
                    <td>Total Qty</td>
                    <td>
                        <input value='<?php echo $totalQty?>' type="text" class="in form-control" name="total_qty"/>
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
                                    <th class="th-sm">No</th>
                                    <th class="th-sm">Kode Produk</th>
                                    <th class="th-sm">Nama Produk</th>
                                    <th class="th-sm">Ukuran Produk</th>
                                    <th class="th-sm">Qty</th>
                                    <!-- <th class="th-sm">Satuan Produk</th>
                                    <th class="th-sm">Harga Produk</th>   -->
                                    <th class="th-sm">Satuan</th>
                                    <th class="th-sm">Sub Total</th>   
                              </tr>
                        </thead>
                        
                        <tbody>
                            <?php
                                if(isset($_GET['button-isi-data'])){
                                    // foreach($_GET['no_pn'] as $key){
                                        $queryDapatPen = mysqli_query($conn, "select tsh.no_so, tsh.kode, tsh.nama, tsh.alamat, tsh.kota, tsd.kode_produk,
                                        tsd.nama_produk, tsd.ukuran_panjang_produk, tsd.ukuran_lebar_produk, tsd.qty,
                                        tsd.satuan_produk, tsd.total
                                        from tb_so_hd tsh inner join tb_so_dtl tsd on tsh.no_so = tsd.no_so
                                        where tsh.no_so = '$no_so' ");
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
                                                    <td><input size='8' type='text' name='total[]' value='".$dataCari['total']."'></td>
                                                </tr>
                                            ";
                                        }
                                    
                                }
                            ?>
                        </tbody>
                </table>
                

            <!-- RUMUSS JS -->
        </div>
            
            
            <button type="submit" name="button-simpan" class="btn btn-info ">Simpan</button>
            <a type="button" href="#laporan" class="btn btn-dark ">Laporan</a>
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
                    <form action="surat-jalan.php">
                    <div class="fieldsets-table">
                                <legend>TABEL SO</legend>
                                <table class="mytableclass table table-bordered table-secondary" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <!-- <th class="th-sm"></th> -->
                                            <!-- <th class="th-sm">No. Penawaran</th> -->
                                            <th class="th-sm">No. SO</th>
                                            <th class="th-sm">Tgl. SO</th>
                                            <th class="th-sm">Nama Customer</th>
                                            <th class="th-sm">Alamat</th>
                                            <th class="th-sm">Kota</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <?php 
                                                $queryCariPen = mysqli_query($conn, "select * from tb_so_hd");
                                                
                                                $rowArray = mysqli_num_rows($queryCariPen);
                                    
                                                if($rowArray > 0){
                                                        while($dataCari = mysqli_fetch_array($queryCariPen)){
                                                            echo "
                                                                <tr class='table-light'>
                                                                    <td><input type='checkbox' name='no_so' value='".$dataCari['no_so']."'>".$dataCari['no_so']."</td>                                                           
                                                                    <td>".$dataCari['tgl_so']."</td>
                                                                    <td>".$dataCari['nama']."</td>
                                                                    <td>".$dataCari['alamat']."</td>
                                                                    <td>".$dataCari['kota']."</td>                 
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