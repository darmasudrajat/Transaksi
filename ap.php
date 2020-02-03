<?php
    // include 'control/act-penjualan.php';    
    include 'model/config.php';
    include 'head.php';
    error_reporting(0);
    
    $queryAmbilNo = mysqli_query($conn, "select MAX(no_ap) from tb_ap_hd");
    $ambilNo = mysqli_fetch_array($queryAmbilNo);
    $maxNoTransaksi = $ambilNo[0];
    $noTr = (int) substr($maxNoTransaksi,3,5);
    $noTr++;
    $noTransaksiBaru = "AP-".sprintf("%05s",$noTr);

    if(isset($_GET['button-isi-data'])){
        $no_btb = $_GET['no_btb'];
        $queryJoinPo = mysqli_query($conn, " 
            select t1.no_btb, t1.tgl_btb, t1.no_po,
            t1.no_so, t1.no_sj, t1.kode_suplier, t1.nama_suplier, t1.alamat_suplier, sum(t2.total_harga) as tagihan from tb_btb_hd t1 inner join 
            tb_btb_dtl t2 on t1.no_btb = t2.no_btb where
            t1.no_btb = '$no_btb'
        ");

        while($p = mysqli_fetch_array($queryJoinPo)){
            $no_btb = $p['no_btb'];
            $tgl_btb = $p['tgl_btb'];
            $no_po = $p['no_po'];
            $no_so = $p['no_so'];
            $no_sj = $p['no_sj'];
            $tagihan = $p['tagihan'];
            $kode_suplier = $p['kode_suplier'];
            $nama_suplier = $p['nama_suplier'];
            $alamat_suplier = $p['alamat_suplier'];
        }
    }
?>

<center>
    <form class="proses" action="aksi-ap.php" method="post">
        <div class="fieldsets-table">    
            <legend>AP</legend>
            <table border="0" class="fieldtab1">
                <tr>
                    <td>No. AP</td>
                    <td width="1">:</td>
                    <td>
                        <input type="text" class="in form-control" name="no_ap" value="<?php echo $noTransaksiBaru?>"/>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>
                        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modalCariData" >Cari BTB</button>
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
                    <td>Account</td>
                    <td width="1">:</td>
                    <td>
                        <select class="form-control" name="nama_account">
                            <option value="">Pilih Account</option>
                            <?php
                                $querySelect = mysqli_query($conn, "select * from tb_account order by nama_account ASC");
                                while($r = mysqli_fetch_array($querySelect)){
                                    echo "<option value='$r[nama_account]'>$r[nama_account]</option>";
                                    $no_account = $r['no_account'];
                                }
                            ?>
                        </select>
                        <input hidden type="text" name="no_account" value="<?php echo $no_account ?>" />
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>
                        <input type="text" class="jumlah_uang in form-control" name="jumlah_uang" placeholder="Masukan Jumlah Uang" />
                    </td>
                </tr>
            </table>
            <table border="0" class="fieldtab3">
                 
               <tr>
                    <td>Keterangan</td>
                    <td width="1">:</td>
                    <td>
                        <textarea class="form-control" name="keterangan"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Tanggal AP</td>
                    <td width="1">:</td>

                    <td>
                        <input type="date" class="in form-control" name="tgl_ap"/>
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
                                    <th class="th-sm">No. BTB</th>
                                    <th class="th-sm">Tgl. BTB</th>
                                    <th class="th-sm">No. PO</th>
                                    <th class="th-sm">No. SO</th>
                                    <th class="th-sm">No. SJ</th>  
                                    <th class="th-sm">Tagihan</th>  
                                    <th class="th-sm">Diskon</th>  
                                    <th class="th-sm">Total</th>  
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php
                                if(isset($_GET['button-isi-data'])){
                                    // foreach($_GET['no_pn'] as $key){
                                    $queryDapatPen = mysqli_query($conn, "
                                        select t1.no_btb, t1.tgl_btb, t1.no_po,
                                        t1.no_so, t1.no_sj, sum(t2.total_harga) as jumlah_tagihan from tb_btb_hd t1 inner join 
                                        tb_btb_dtl t2 on t1.no_btb = t2.no_btb where
                                        t1.no_btb = '$no_btb'
                                    ");
                                    $no = 1;
                                    while($dataCari = mysqli_fetch_array($queryDapatPen)){
                                        echo "
                                            <tr>
                                                <td><input size='2' type='text' name='no[]' value='".$no++."'></td>
                                                <td><input size='10' type='text' name='no_btb[]' value='".$dataCari['no_btb']."'></td>
                                                <td><input size='10' type='text' name='tgl_btb[]' value='".$dataCari['tgl_btb']."'></td>
                                                <td><input size='10' type='text' name='no_po[]' value='".$dataCari['no_po']."'></td>
                                                <td><input size='10' type='text' name='no_so[]' value='".$dataCari['no_so']."'></td>             
                                                <td><input size='10' type='text' name='no_sj[]' value='".$dataCari['no_sj']."'></td>             
                                                <td><input size='10' type='text' class='tagihan' name='jumlah_tagihan[]' value='".$dataCari['jumlah_tagihan']."'></td>             
                                                <td><input size='5' type='text' name='diskon[]' class='diskon'></td>
                                                <td><input size='5' type='text' name='total[]' class='total'></td>
                                            </tr>
                                        ";
                                    }
                                }
                            ?>
                        </tbody>
                        <tfoot>
                            <td colspan="4" align="right" ><b>Sisa</b></td>
                            <td colspan="4">
                                <input type="text" name="sisa_tagihan" class="sisa_tagihan" />
                            </td>
                        </tfoot>
                </table>
                

            <!-- RUMUSS JS -->
        </div>
            
            
            <button type="submit" name="button-simpan" class="btn btn-info ">Simpan</button>
            <a type="button" href="laporan-ap.php" class="btn btn-dark ">Laporan</a>
            <!-- <a href="cari-penjualan.php" type="button" name="button-cancel" class="btn btn-danger ">Cancel</a> -->
    <!-- </div> -->

</form>

<!-- SCRIPT JS OTOMATISASI -->
<script type="text/javascript">
    $(document).ready(function(){
            $(".proses").keyup(sumtotal);
            function sumtotal(){
                var tagihan = 0;
                var diskon = 0;
                // var total = 0;
                // var sisa_tagihan = 0;
                jumlah_uang = parseNumber($(this).find('.jumlah_uang').val());
                tagihan = parseNumber($(this).find('.tagihan').val());
                diskon = parseNumber($(this).find('.diskon').val());
                $(".mytableclass tbody tr").each(function(){
                    
                    
                    dskn = (tagihan * diskon)/100;
                    ttl = tagihan - dskn;

                    $(this).find('.total').val(ttl);

                });

                sisa_tagihan = jumlah_uang-ttl;
                $(this).find('.sisa_tagihan').val(sisa_tagihan);
            }
            function parseNumber(n){
                var f = parseFloat(n);
                return isNaN(f) ? 0 : f;
            }

        });

        // OTOMATISASINYA BELUM BENER, PERHITUNGAN MASIH ERROR
        // INI DULU JNGN KEMANA",, NTR LUPA

</script>

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
                    <form action="ap.php">
                    <div class="fieldsets-table">
                                <legend>TABEL BTB</legend>
                                <table class="mytableclass table table-bordered table-secondary" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <!-- <th class="th-sm"></th> -->
                                            <!-- <th class="th-sm">No. Penawaran</th> -->
                                            <th class="th-sm">No. BTB</th>
                                            <th class="th-sm">Tgl. BTB</th>
                                            <th class="th-sm">No. PO</th>
                                            <th class="th-sm">No. SO</th>
                                            <th class="th-sm">No. SJ</th>
                                            <th class="th-sm">Kode Suplier</th>
                                            <th class="th-sm">Nama</th>
                                            <th class="th-sm">Alamat</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <?php 
                                                $queryCariPen = mysqli_query($conn, "select * from tb_btb_hd");
                                                
                                                $rowArray = mysqli_num_rows($queryCariPen);
                                    
                                                if($rowArray > 0){
                                                        while($dataCari = mysqli_fetch_array($queryCariPen)){
                                                            echo "
                                                                <tr class='table-light'>
                                                                    <td><input type='checkbox' name='no_btb' value='".$dataCari['no_btb']."'>".$dataCari['no_btb']."</td>                                                           
                                                                    <td>".$dataCari['tgl_btb']."</td>
                                                                    <td>".$dataCari['no_po']."</td>
                                                                    <td>".$dataCari['no_so']."</td>
                                                                    <td>".$dataCari['no_sj']."</td>
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