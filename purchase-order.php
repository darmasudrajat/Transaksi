<?php
    // include 'control/act-penjualan.php';    
    include 'model/config.php';
    include 'head.php';
    error_reporting(0);
    
    $queryAmbilNo = mysqli_query($conn, "select MAX(no_po) from tb_po_hd");
    $ambilNo = mysqli_fetch_array($queryAmbilNo);
    $maxNoTransaksi = $ambilNo[0];
    $noTr = (int) substr($maxNoTransaksi,3,5);
    $noTr++;
    $noPo = "PO-".sprintf("%05s",$noTr);

    // ======================================
    // Ganti Ngambil Data Customer jadi Suplier
    // ======================================

    if(isset($_GET['button-isi-data'])){
        $kode_suplier = $_GET['kode_suplier'];
        $querySuplier = mysqli_query($conn, "select * from tb_suplier where kode_suplier = '$kode_suplier' ");
        // $queryJoinSo = mysqli_query($conn, "select tsh.no_so, tsh.kode, tsh.nama, tsh.alamat, tsh.kota, tsh.status,
        // tsd.kode_produk, tsd.nama_produk, tpd.kode_barang, tpd.nama_barang, tpd.ukuran_panjang_barang,
        // tpd.ukuran_lebar_barang, tpd.qty_barang, tpd.satuan_barang, tpd.total_all
        // from tb_so_hd tsh join tb_so_dtl tsd on tsh.no_so = tsd.no_so
        // join tb_produk_dtl tpd on tsd.kode_produk = tpd.kode_produk
        // where tsh.no_so = '$no_so' ");
     
        
        while($s = mysqli_fetch_array($querySuplier)){
           $kode_suplier = $s['kode_suplier'];
           $nama_suplier = $s['nama_suplier'];
           $alamat_suplier = $s['alamat_suplier'];
           $no_telp = $s['no_telp'];
           $email = $s['email'];
        }
    }
?>
<center>
    <form action="proses-purchase-order.php" method="post">
        <div class="fieldsets-table">    
            <legend>Purchase Order</legend>
            <table border="0" class="fieldtab1">
                <tr>
                    <td>No. PO</td>
                    <td width="1">:</td>
                    <td>
                        <input type="text" class="in form-control" name="no_po" value="<?php echo $noPo?>"/>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>
                        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modalCariData" >Cari SO dan Suplier</button>
                    </td>
                </tr>
                <tr>
                    <td>No. SO</td>
                    <td width="1">:</td>

                    <td>
                        <input type="text" class="in form-control" name="no_so" value="<?php echo $_GET['no_so']?>"/>
                    </td>
                </tr>
                <tr>
                    <td>Suplier</td>
                    <td width="1">:</td>

                    <td>
                        <input type="text" class="in form-control" name="kode_suplier" value="<?php echo $kode_suplier?>"/>
                        <input type="text" class="in form-control" name="nama_suplier" value="<?php echo $nama_suplier?>"/>
                    </td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td width="1">:</td>

                    <td>
                        <textarea class="in form-control" name="alamat_suplier" cols="30" rows="3"><?php echo $alamat_suplier ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Tgl. PO</td>
                    <td width="1">:</td>

                    <td>
                        <input type="date" class="in form-control" name="tgl_po"/>
                    </td>
                </tr>
            </table>
            <table border="0" class="fieldtab3">
                <tr>
                    <td>Kirim</td>
                    <td width="1">:</td>

                    <td>
                        <textarea class="in form-control" name="alamat_kirim" cols="30" rows="3"></textarea>
                        <!-- <textarea name="alamat_kirim" id="alamat_kirim" cols="37" rows="5"></textarea>                     -->
                    </td>
                </tr>
                <tr>
                    <td>Tgl. Kirim</td>
                    <td width="1">:</td>
                    <td>
                        <!-- <script type="text/javascript">
                            var today = moment().format('DD-MM-YYYY');
                            document.getElementById("hari_ini").value = today;
                        </script> -->
                        <input type="date" class="in form-control" name="tgl_kirim"/>
                    </td>
                </tr>
                <tr>
                    <td>No. Telp</td>
                    <td width="1">:</td>

                    <td>
                        <input type="text" class="in form-control" name="no_telp" value="<?php echo $no_telp ?>" />
                    </td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td width="1">:</td>

                    <td>
                        <input type="text" class="in form-control" name="email" value="<?php echo $email ?>" />
                    </td>
                </tr>            
            </table>
        </div>
                <div class="fieldsets-table" style="height: 800px;">                
                  <legend>Detail Produk</legend>
                  <table id="myTable" class="mytableclass table table-striped table-bordered table-secondary" cellspacing="0" width="100%">
                        <thead>
                              <tr style="height: 8px; font-weight: bold;">
                                    <th class="th-sm">No</th>
                                    <th class="th-sm">Kode Produk</th>
                                    <th class="th-sm">Kode Barang</th>
                                    <th class="th-sm">Nama Barang</th>
                                    <th class="th-sm">Ukuran</th>
                                    <th class="th-sm">Qty</th>
                                    <th class="th-sm">Satuan</th>
                                    <th class="th-sm">Sub Total</th> 
                              </tr>
                        </thead>
                        
                        <tbody>
                              <?php
                                if(isset($_GET['button-isi-data'])){
                                        $no_so = $_GET['no_so'];
                                        $queryDapatSo = mysqli_query($conn, "select tsd.no_so, tsd.kode_produk, tpd.kode_barang, tpd.nama_barang, tpd.ukuran_panjang_barang,
                                        tpd.ukuran_lebar_barang, tpd.qty_barang, tpd.satuan_barang, tpd.total
                                        from tb_so_dtl tsd
                                        join tb_produk_dtl tpd
                                        on tsd.kode_produk = tpd.kode_produk
                                        where tsd.no_so = '$no_so' ");

                            

                                        
                                        

                                //         $queryTotalSo = mysqli_query($conn, "select tsh.no_so, tsh.kode, tsh.nama, tsh.alamat, tsh.kota, tsh.status,
                                // tsd.kode_produk, tsd.nama_produk, tpd.kode_barang, tpd.nama_barang, tpd.ukuran_panjang_barang,
                                // tpd.ukuran_lebar_barang, tpd.qty_barang, tpd.satuan_barang, tpd.total_all
                                // from tb_so_hd tsh join tb_so_dtl tsd on tsh.no_so = tsd.no_so
                                // join tb_produk_dtl tpd on tsd.kode_produk = tpd.kode_produk
                                // where tsh.no_so = '$no_so' ");

                                        $no = 1;
                                        while($dataCari = mysqli_fetch_array($queryDapatSo)){
                                                $total = $dataCari['total'];
                                                $totalAll += $total;
                                                echo "
                                                <tr>
                                                    <td><input size='2' type='text' name='no_no[]' value='".$no++."'></td>
                                                    <td><input size='6' type='text' name='kode_produk[]' value='".$dataCari['kode_produk']."'></td>
                                                    <td><input id='kdbrg' size='6' type='text' name='kode_barang[]' value='".$dataCari['kode_barang']."'></td>
                                                    <td><input size='60' type='text' name='nama_barang[]' value='".$dataCari['nama_barang']."'></td>
                                                    <td><input size='2' type='text' name='ukuran_panjang_barang[]' value='".$dataCari['ukuran_panjang_barang']."'> X <input size='2' type='text' name='ukuran_lebar_barang[]' value='".$dataCari['ukuran_lebar_barang']."'></td>
                                                    <td><input class='qty' size='3' type='text' name='qty_barang[]' value='".$dataCari['qty_barang']."'></td>
                                                    <td><input size='8'type='text' name='satuan_barang[]' value='".$dataCari['satuan_barang']."'></td>                 
                                                    <td><input class='total' size='6' type='text' name='total[]' value='".$dataCari['total']."'></td>                   
                                                </tr>
                                                ";
                                        }
                                        
                                        
                                }

                              ?>
                        </tbody>

                        <tfoot>
                        <tr>
                            <td colspan='5'><label style="float: right;font-size: 14px; font-weight: bold;">TOTAL</label></td>
                            <td colspan='2'>
                                <input class='in form-control' size='6' type='text' name='total_all' value='<?php echo $totalAll ?>' />                   
                            </td>
                        </tr>
                        </tfoot>
                </table>
                

            <!-- RUMUSS JS -->
    </div>
    <!-- <div style="padding-top: 7px;width: 20%; height: 50px; margin: 9px auto;" class="fieldsets-table">     -->
    
            <!-- <a type="submit" href="cari-penjualan.php" name="button-simpan" class="btn btn-dark ">Masukan Data</a> -->
            <button type="submit" name="button-simpan" class="btn btn-info ">Simpan</button>
            <a type="button" href="laporan-po.php" class="btn btn-dark ">Laporan</a>
            <!-- <a href="cari-penjualan.php" type="button" name="button-cancel" class="btn btn-danger ">Cancel</a> -->

    <!-- </div> -->
    
</form>
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
                    <form action="purchase-order.php" method="GET">
                    <div class="fieldsets-table">
                                <legend>TABEL SUPLIER</legend>
                                <table class="mytableclass table table-bordered table-secondary" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <!-- <th class="th-sm"></th> -->
                                            <!-- <th class="th-sm">No. Penawaran</th> -->
                                            <th class="th-sm">Kode Suplier</th>
                                            <th class="th-sm">Nama</th>
                                            <th class="th-sm">Alamat</th>
                                            <th class="th-sm">No. Telp</th>
                                            <th class="th-sm">Email</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <?php 
                                                $queryCariSup = mysqli_query($conn, "select * from tb_suplier");
                                                
                                                $rowArray = mysqli_num_rows($queryCariSup);
                                    
                                                if($rowArray > 0){
                                                        while($dataCari = mysqli_fetch_array($queryCariSup)){
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