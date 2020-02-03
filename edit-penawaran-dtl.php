<?php
    // include 'control/act-penjualan.php';    
    include 'model/config.php';
    include 'head.php';
    // error_reporting(0);

    if(isset($_GET['no_pn'])){

        $no_pn = $_GET['no_pn'];
        // $kode_produk = $_GET['kode_produk'];
        $queryPenawaran = mysqli_query($conn, "select * from tb_penawaran where no_pn = '$no_pn' ");
        $p = mysqli_fetch_array($queryPenawaran);
            $kode = $p['kode'];
            $nama = $p['nama'];
            $alamat = $p['alamat'];
            $kota = $p['kota'];
            $pic = $p['pic'];
            $no_telp = $p['no_telp'];
            $tanggal_pn = $p['tanggal_pn'];

            
        $queryPenawaranDtl = mysqli_query($conn, "select * from tb_penawaran_dtl where no_pn = '$no_pn' ");
        $pd = mysqli_fetch_array($queryPenawaranDtl);
            $kode_produk = $pd['kode_produk'];
            $nama_produk = $pd['nama_produk'];
            $ukuran_panjang_produk = $pd['ukuran_panjang_produk']; 
            $ukuran_lebar_produk = $pd['ukuran_lebar_produk']; 
            $qty = $pd['qty'];
            $total = $pd['total'];
            $satuan_produk = $pd['satuan_produk'];
            $harga_produk = $pd['harga_produk'];
            $total_all = $pd['total_all'];
    }
?>

<center>
    <form action="aksi-penawaran-dtl.php" method="post">
        <div class="fieldsets-table">    
            <legend>Edit Penawaran</legend>
            <table border="0" class="fieldtab1">
                <tr>
                    <td>No</td>
                    <td width="1">:</td>
                    <td>
                        <input type="text" class="form-control" name="no_pn"
                        value="<?php echo $no_pn?>"/>
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
                        <input type="date" class="form-control" name="tanggal_pn" value="<?php echo $tanggal_pn?>">
                    </td>
                </tr>
        </table>
    </div>
                <div class="fieldsets-table">                
                  <legend>Produk</legend>
                  <table id="myTable" class="mytableclass table table-striped table-bordered table-secondary" cellspacing="0" width="100%">
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
                                 $queryProduk = mysqli_query($conn, "select * from tb_penawaran_dtl where no_pn = '$no_pn' ");
                                 $no = 1;
                                 while($dataCari = mysqli_fetch_array($queryProduk)){
                                    echo "
                                        <tr>
                                            <input hidden type='text' name='no_no[]' value='".$no++."'>
                                            <td><input readonly size='60' type='text' name='kode_produk[]' value='".$dataCari['kode_produk']."'></td>
                                            <td><input readonly size='60' type='text' name='nama_produk[]' value='".$dataCari['nama_produk']."'></td>
                                            <td>
                                                <input readonly size='2' type='text' name='ukuran_panjang_produk[]' value='".$dataCari['ukuran_panjang_produk']."'> X 
                                                <input readonly size='2' type='text' name='ukuran_lebar_produk[]' value='".$dataCari['ukuran_lebar_produk']."'>
                                            </td>
                                            <td><input class='qty' size='3' type='text' name='qty[]' value='".$dataCari['qty']."'></td>
                                            <td><input readonly size='8' type='text' name='satuan_produk[]' value='".$dataCari['satuan_produk']."'></td>
                                            <td><input class='harga_produk' size='6' type='text' name='harga_produk[]' value='".$dataCari['harga_produk']."'></td>                 
                                            <td><input class='total' size='4' type='text' name='total[]' value='".$dataCari['total']."'></td>                 
                                            
                                        </tr>";
                                 }             
                              
                              ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan='1'><label style="float: right;font-size: 14px; font-weight: bold;">TOTAL</label></td>
                            <td colspan='6'>
                                <input type='text' readonly name='total_all' class='total' value='<?php echo $total_all ?>'>
                            </td>
                        </tr>
                        </tfoot>
                </table>
                

            <!-- RUMUSS JS -->
    </div>
    <!-- <div style="padding-top: 7px;width: 20%; height: 50px; margin: 9px auto;" class="fieldsets-table">     -->
    
            <!-- <a type="submit" href="cari-penjualan.php" name="button-simpan" class="btn btn-dark ">Masukan Data</a> -->
            <button type="submit" name="button-simpan-edit" class="btn btn-info ">Simpan</button>
            <a type="button" href="cari-penawaran-dtl.php" class="btn btn-danger ">Batal</a>
            <!-- <a href="cari-penjualan.php" type="button" name="button-cancel" class="btn btn-danger ">Cancel</a> -->

    <!-- </div> -->
    <script>
        $(document).ready(function(){
            $(".mytableclass").keyup(sumtotal);
            function sumtotal(){
                var qty = 0;
                var harga = 0;
                var total = 0;

                $(".mytableclass tbody tr").each(function(){
                    qty = parseNumber($(this).find('.qty').val());
                    harga = parseNumber($(this).find('.harga_produk').val());

                     total = (qty * harga);

                });
                $(this).find('.total').val(total);
                
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