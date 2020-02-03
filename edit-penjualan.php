<?php
    // include 'control/act-penjualan.php';    
    include 'model/config.php';
    include 'head.php';
    // error_reporting(0);
    // $queryAmbilNo = mysqli_query($conn, "select MAX(No_Input) from tb_bahan_produk");
    // $ambilNo = mysqli_fetch_array($queryAmbilNo);
    // $maxNoTransaksi = $ambilNo[0];
    // $noTr = (int) substr($maxNoTransaksi,2,4);
    // $noTr++;
    // $noTransaksiBaru = "IN".sprintf("%04s",$noTr);
    
    if(isset($_GET['kode_produk'])){
        // PRODUK
        $kode_produk = $_GET['kode_produk'];
        $queryEditProduk = mysqli_query($conn, "select * from tb_produk_hd where kode_produk='$kode_produk'");
        $rowP = mysqli_fetch_array($queryEditProduk);
        $nama_produk = $rowP['nama_produk'];
        $ukuran_panjang_produk = $rowP['ukuran_panjang_produk'];
        $ukuran_lebar_produk = $rowP['ukuran_lebar_produk'];
        $satuan_produk = $rowP['satuan_produk'];
        $harga_produk = $rowP['harga_produk'];
        $total_all = $rowP['total_all'];

        // BARANG 
        $queryEditBahanProduk = mysqli_query($conn, "select * from tb_produk_dtl where kode_produk='$kode_produk' ");
        $rowBP = mysqli_fetch_array($queryEditBahanProduk);
        $kode_barang = $rowBP['kode_barang'];
        $nama_barang = $rowBP['nama_barang'];
        $ukuran_panjang_barang = $rowBP['ukuran_panjang_barang'];
        $ukuran_lebar_barang = $rowBP['ukuran_lebar_barang'];
        $qty_barang = $rowBP['qty_barang'];
        $satuan_barang = $rowBP['satuan_barang'];
        $harga_barang = $rowBP['harga_barang'];
        $jenis_barang = $rowBP['jenis_barang'];
        $total = $rowBP['total'];
        $total_all = $rowBP['total_all'];
    }

    
?>

<center>
    <!-- <link rel="stylesheet" type="text/css" href="../css/style.css" /> -->
    <form action="proses-input-penjualan.php" method="post">

    <div class="fieldsets-table" style="width: 60%; margin-bottom: 5%;">    
            <legend>Edit Produk</legend>
            <table border="0" style="float: left;">
                <tr>
                    <td>Kode Produk</td>
                    <td>
                        <input type="text" class="in form-control" name="kode_produk" value="<?php echo $kode_produk?>"/>
                    </td>
                </tr>
                <tr>
                    <td>Nama Produk</td>
                    <td>
                        <input type="text" class="in form-control" name="nama_produk" value="<?php echo $nama_produk?>"/>
                    </td>
                </tr>
                <tr>
                    <td>Ukuran Produk</td>
                    <td>
                        <input placeholder="Panjang..." value="<?php echo $ukuran_panjang_produk?>" type="text" class="in form-control" name="ukuran_panjang_produk" />
                    </td>
                    <td>
                        <input placeholder="Lebar..." value="<?php echo $ukuran_lebar_produk?>" type="text" class="in form-control" name="ukuran_lebar_produk" />
                    </td>
                </tr>
            </table>
            <table border="0" style="float: right;">
               <tr>
                    <td>Satuan Produk</td>
                    <td>
                        <input value="<?php echo $satuan_produk?>" type="text" class="in form-control" name="satuan_produk"/>
                    </td>
                </tr>
                <tr>
                    <td>Harga Produk</td>
                    <td>
                        <input type="text" class="in form-control" value="<?php echo $harga_produk?>" name="harga_produk"/>
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
                                    <th class="th-sm">Kode Bahan</th>
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
                                    $queryBarang = mysqli_query($conn, "select * from tb_produk_dtl where kode_produk = '$kode_produk' ");
                                    
                                    
                                        $no = 1;
                                          while($dataCari = mysqli_fetch_array($queryBarang)){
                                                echo "
                                                <tr>
                                                    <input hidden type='text' name='no_no[]' value='".$no++."'>
                                                    <td><input readonly size='6' type='text' name='kode_barang[]' value='".$dataCari['kode_barang']."'></td>
                                                    <td><input readonly size='65' type='text' name='nama_barang[]' value='".$dataCari['nama_barang']."'></td>
                                                    <td><input readonly size='2' type='text' name='ukuran_panjang_barang[]' value='".$dataCari['ukuran_panjang_barang']."'> X <input size='2' type='text' name='ukuran_lebar_barang[]' value='".$dataCari['ukuran_lebar_barang']."'></td>
                                                    <td><input readonly class='qty_barang' size='3' type='text' name='qty_barang[]' value='".$dataCari['qty_barang']."'></td>
                                                    <td><input readonly size='8' class='harga_barang' type='text' name='harga_barang[]' value='".$dataCari['harga_barang']."'></td>
                                                    <td><input readonly size='8' type='text' name='jenis_barang[]' value='".$dataCari['jenis_barang']."'></td>
                                                    <td><input readonly size='8'type='text' name='satuan_barang[]' value='".$dataCari['satuan_barang']."'></td>                 
                                                    <td><input readonly class='total' size='6' type='text' name='total[]' value='".$dataCari['total']."'></td>                   
                                                </tr>
                                                ";
                                          }
                                    
                              
                              ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan='3'><label style="float: right;font-size: 14px; font-weight: bold;">TOTAL</label></td>
                            <td colspan='6'>
                                <input type='text' readonly value='<?php $r['total_all'] ?>' name='total_all' class='totalSemua'>
                            </td>
                        </tr>
                        </tfoot>
                </table>
    
    </div>
        <button type="submit" name="button-simpan-edit" class="btn btn-info ">Simpan</button>
        <a type="button" href="cari-edit-penjualan.php" class="btn btn-dark ">List Bahan Produk</a>

    <!-- JAVASCRIPT -->
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
</center>

<?php
    include 'footer.php';
?>