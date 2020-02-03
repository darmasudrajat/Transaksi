<?php
    // include 'control/act-penjualan.php';    
    include 'model/config.php';
    include 'head.php';
    error_reporting(0);
    
    $queryAmbilNo = mysqli_query($conn, "select MAX(no_btb) from tb_btb_hd");
    $ambilNo = mysqli_fetch_array($queryAmbilNo);
    $maxNoTransaksi = $ambilNo[0];
    $noTr = (int) substr($maxNoTransaksi,3,5);
    $noTr++;
    $noTransaksiBaru = "BTB".sprintf("%05s",$noTr);

    if(isset($_GET['button-isi-data'])){
        $no_po = $_GET['no_po'];
        $queryJoinPo = mysqli_query($conn, " 
            select 
            t1.no_po, t1.no_so, t1.kode_suplier, t1.nama_suplier, t1.alamat_suplier, 
            t2.kode_produk, t2.kode_barang, t2.nama_barang, t2.qty_barang
            from
            tb_po_hd t1 join tb_po_dtl t2 on t1.no_po = t2.no_po
            where t1.no_po = '$no_po'

        ");

        while($p = mysqli_fetch_array($queryJoinPo)){
            $no_so = $p['no_so'];
            $kode_suplier = $p['kode_suplier'];
            $nama_suplier = $p['nama_suplier'];
            $alamat_suplier = $p['alamat_suplier'];
            $kode_produk = $p['kode_produk'];
            $kode_barang = $p['kode_barang'];
            $nama_barang = $p['nama_barang'];
            $qty_barang = $p['qty_barang'];
        }
    }
?>

<center>
    <form action="aksi-btb.php" method="post">
        <div class="fieldsets-table">    
            <legend>Bukti Terima Barang</legend>
            <table border="0" class="fieldtab1">
                <tr>
                    <td>No. BTB</td>
                    <td width="1">:</td>
                    <td>
                        <input type="text" class="in form-control" name="no_btb" value="<?php echo $noTransaksiBaru?>"/>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>
                        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modalCariData" >Cari PO</button>
                    </td>
                </tr>
                <tr>
                    <td>Kode</td>
                    <td width="1">:</td>
                    <td>
                        <input value="<?php echo $kode_suplier?>" type="text" class="in form-control" name="kode_suplier"/>
                    </td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td width="1">:</td>

                    <td>
                        <input value='<?php echo $nama_suplier?>' type="text" class="in form-control" name="nama_suplier"/>
                    </td> 
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td width="1">:</td>

                    <td>
                       <textarea name="alamat_suplier" class='form-control' cols="30" rows="3" value="<?php echo $alamat?>"><?php echo $alamat_suplier?></textarea>                    
                    </td>
                </tr>
            </table>
            <table border="0" class="fieldtab3">
                
               <tr>
                    <td>No. PO</td>
                    <td width="1">:</td>
                    <td>
                        <input value='<?php echo $no_po?>' type="text" class="in form-control" name="no_po"/>
                    </td>
                </tr>
               <tr>
                    <td>No. SO</td>
                    <td width="1">:</td>
                    <td>
                        <input value='<?php echo $no_so?>' type="text" class="in form-control" name="no_so"/>
                    </td>
                </tr>
               <tr>
                    <td>No. DO</td>
                    <td width="1">:</td>
                    <td>
                        <input value='<?php echo $no_do?>' type="text" class="in form-control" name="no_do"/>
                    </td>
                </tr>
                <tr>
                    <td>Tgl. BTB</td>
                    <td width="1">:</td>
                    <td>
                        <input type="date" class="in form-control" name="tgl_btb"/>
                    </td>
                </tr>
               </table>
        </div>
                <div class="fieldsets-table">                
                  <legend>Detail</legend>
                  <table id="myTable" class="mytableclass table table-striped table-bordered table-secondary" cellspacing="0" width="100%">
                        <thead>
                              <tr style="height: 8px; font-weight: bold;">
                                    <th class="th-sm">No</th>
                                    <th class="th-sm">Kode Produk</th>
                                    <th class="th-sm">Kode Barang</th>
                                    <th class="th-sm">Nama Barang</th>
                                    <th class="th-sm">Qty</th>
                                    <th class="th-sm">Diterima</th>  
                                    <th class="th-sm">Total Harga</th>  
                              </tr>
                        </thead>
                        
                        <tbody>
                            <?php
                                if(isset($_GET['button-isi-data'])){
                                    // foreach($_GET['no_pn'] as $key){
                                    $queryDapatPen = mysqli_query($conn, "select * from tb_po_dtl where no_po = '$no_po' ");
                                    $no = 1;
                                    while($dataCari = mysqli_fetch_array($queryDapatPen)){
                                        echo "
                                            <tr>
                                                <td><input size='1' type='text' name='no_no[]' value='".$no++."'></td>
                                                <td><input size='9' type='text' name='kode_produk[]' value='".$dataCari['kode_produk']."'></td>
                                                <td><input size='9' type='text' name='kode_barang[]' value='".$dataCari['kode_barang']."'></td>
                                                <td><input size='75' type='text' name='nama_barang[]' value='".$dataCari['nama_barang']."'></td>
                                                <td><input size='1' type='text' name='qty_barang[]' value='".$dataCari['qty_barang']."'></td>             
                                                <td><input size='3' type='text' name='qty_diterima[]'></td>
                                                <td><input size='10' type='text' name='sub_total[]' value='".$dataCari['sub_total']."'></td>             
                                            </tr>
                                        ";

                                        $a = $dataCari['sub_total'];
                                        $total_harga += $a;
                                    }
                                }
                            ?>
                        </tbody>
                        <tfoot>
                            <td>
                                <input hidden type="text" name="total_harga" value="<?php echo $total_harga ?>" />
                            </td>
                        </tfoot>
                </table>
                

            <!-- RUMUSS JS -->
        </div>
            
            
            <button type="submit" name="button-simpan" class="btn btn-info ">Simpan</button>
            <a type="button" href="laporan-btb.php" class="btn btn-dark ">Laporan</a>
            <!-- <a href="cari-penjualan.php" type="button" name="button-cancel" class="btn btn-danger ">Cancel</a> -->
    <!-- </div> -->

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
                    <form action="btb.php">
                    <div class="fieldsets-table">
                                <legend>TABEL PO</legend>
                                <table class="mytableclass table table-bordered table-secondary" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <!-- <th class="th-sm"></th> -->
                                            <!-- <th class="th-sm">No. Penawaran</th> -->
                                            <th class="th-sm">No. PO</th>
                                            <th class="th-sm">Tgl. PO</th>
                                            <th class="th-sm">Kode Suplier</th>
                                            <th class="th-sm">Nama</th>
                                            <th class="th-sm">Alamat</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <?php 
                                                $queryCariPen = mysqli_query($conn, "select * from tb_po_hd");
                                                
                                                $rowArray = mysqli_num_rows($queryCariPen);
                                    
                                                if($rowArray > 0){
                                                        while($dataCari = mysqli_fetch_array($queryCariPen)){
                                                            echo "
                                                                <tr class='table-light'>
                                                                    <td><input type='checkbox' name='no_po' value='".$dataCari['no_po']."'>".$dataCari['no_po']."</td>                                                           
                                                                    <td>".$dataCari['tgl_po']."</td>
                                                                    <td>".$dataCari['kode_suplier']."</td>
                                                                    <td>".$dataCari['nama_suplier']."</td>               
                                                                    <td>".$dataCari['alamat_suplier']."</td>
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