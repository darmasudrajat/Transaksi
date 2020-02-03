<?php
    // include 'control/act-penjualan.php';    
    include 'model/config.php';
    include 'head.php';
    error_reporting(0);
    
    $queryAmbilNo = mysqli_query($conn, "select MAX(no_ar) from tb_ar_hd");
    $ambilNo = mysqli_fetch_array($queryAmbilNo);
    $maxNoTransaksi = $ambilNo[0];
    $noTr = (int) substr($maxNoTransaksi,3,5);
    $noTr++;
    $noTransaksiBaru = "AR-".sprintf("%05s",$noTr);

    if(isset($_GET['button-isi-data'])){
        $no_inv = $_GET['no_inv'];
        $queryJoinPo = mysqli_query($conn, " select * from tb_invoice_hd
        ");

        while($p = mysqli_fetch_array($queryJoinPo)){
            $no_inv = $p['no_inv'];
            $tgl_inv = $p['tgl_inv'];
            $kode = $p['kode'];
            $nama = $p['nama'];
            // $alamat = $p['alamat'];
            // $kode_produk = $p['kode_produk'];
            // $nama_produk = $p['nama_produk'];
            // $sub_total = $p['sub_total'];
            // $total_all = $p['total_all'];
        }
    }
?>

<center>
    <form class="proses" action="aksi-ar.php" method="post">
        <div class="fieldsets-table">    
            <legend>AR</legend>
            <table border="0" class="fieldtab1">
                <tr>
                    <td>No. AR</td>
                    <td width="1">:</td>
                    <td>
                        <input type="text" class="in form-control" name="no_ar" value="<?php echo $noTransaksiBaru?>"/>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>
                        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modalCariData" >Cari Invoice</button>
                    </td>
                </tr>
                <tr>
                    <td>Kode</td>
                    <td width="1">:</td>
                    <td>
                        <input value="<?php echo $kode?>" type="text" class="in form-control" name="kode_customer"/>
                    </td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td width="1">:</td>
                    <td>
                        <input value='<?php echo $nama?>' type="text" class="in form-control" name="nama_customer"/>
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
                    <td>Ket</td>
                    <td width="1">:</td>
                    <td>
                        <textarea class="form-control" name="keterangan"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Tgl. AR</td>
                    <td width="1">:</td>
                    <td>
                        <input type="date" class="in form-control" name="tgl_ar"/>
                    </td>
                </tr>
            </table>
        </div>
                <div class="fieldsets-table">                
                    <legend>Detail AR</legend>
                    <table id="myTable" class="mytableclass table table-striped table-bordered table-secondary" cellspacing="0" width="100%">
                        <thead>
                            <tr style="height: 8px; font-weight: bold;">
                                <!-- <th class="th-sm">No</th> -->
                                <th class="th-sm">No. Inv</th>
                                <th class="th-sm">Tgl. Inv</th>
                                <th class="th-sm">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if(isset($_GET['button-isi-data'])){
                                    // foreach($_GET['no_pn'] as $key){
                                    $queryDapatPen = mysqli_query($conn, "
                                    select t1.no_inv, t1.tgl_inv, t2.kode_produk, t2.nama_produk, t2.sub_total,
                                    sum(t2.sub_total) as tot
                                    from tb_invoice_hd t1 inner join tb_invoice_dtl t2
                                    on t1.no_inv = t2.no_inv where t1.no_inv = '$no_inv'
                                    ");

                                    
                                    // $no = 1;
                                    while($dataCari = mysqli_fetch_array($queryDapatPen)){
                                        echo "
                                            <tr>
                                                <td><input size='10' type='text' name='no_inv' value='".$dataCari['no_inv']."'></td>
                                                <td><input size='10' type='text' name='tgl_inv' value='".$dataCari['tgl_inv']."'></td>
                                                <td><input size='10' type='text' name='tot' class='tot' value='".$dataCari['tot']."'></td>
                                            </tr>
                                        ";

                                    }
                                }
                            ?>
                        </tbody>
                        <tfoot>
                            
                            <tr>
                                
                                
                            </tr>
                            <tr>
                                <td colspan="2" align="right" ><b>Lebih/Kurang</b>
                                    <input type="text" name="sisa" class="lebih_kurang" />
                                </td>
                                <td colspan="3" align="right" ><b>Diskon</b>
                                    <input type="text" name="diskon" class="diskon" />
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3" align="right" ><b>Grand Total</b>
                                    <input type="text" name="total" class="total" />
                                </td>
                            </tr>
                        </tfoot>
                </table>
                

            <!-- RUMUSS JS -->
        </div>
            
            
            <button type="submit" name="button-simpan" class="btn btn-info ">Simpan</button>
            <a type="button" href="laporan-ar.php" class="btn btn-dark ">Laporan</a>
            <!-- <a href="cari-penjualan.php" type="button" name="button-cancel" class="btn btn-danger ">Cancel</a> -->
    <!-- </div> -->

</form>

<!-- SCRIPT JS OTOMATISASI -->
<script type="text/javascript">
    $(document).ready(function(){
            $(".proses").keyup(sumtotal);
            function sumtotal(){
                var tot = 0;
                var diskon = 0;
                // var total = 0;
                // var sisa_tot = 0;
                jumlah_uang = parseNumber($(this).find('.jumlah_uang').val());
                tot = parseNumber($(this).find('.tot').val());
                diskon = parseNumber($(this).find('.diskon').val());
                $(".mytableclass").each(function(){
                    dskn = (tot * diskon)/100;
                    ttl = tot - dskn;
                    $(this).find('.total').val(ttl);
                    
                });
                sisa = jumlah_uang-ttl;
                $(this).find('.lebih_kurang').val(sisa);
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
                    <form action="ar.php">
                    <div class="fieldsets-table">
                                <legend>TABEL BTB</legend>
                                <table class="mytableclass table table-bordered table-secondary" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <!-- <th class="th-sm"></th> -->
                                            <!-- <th class="th-sm">No. Penawaran</th> -->
                                            <th class="th-sm">No. INV</th>
                                            <th class="th-sm">Tgl. INV</th>
                                            <th class="th-sm">Nama</th>
                                            <!-- <th class="th-sm">Total</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <?php 
                                                $queryCariPen = mysqli_query($conn, "
                                                select * from tb_invoice_hd
                                                ");
                                                
                                                $rowArray = mysqli_num_rows($queryCariPen);
                                    
                                                if($rowArray > 0){
                                                        while($dataCari = mysqli_fetch_array($queryCariPen)){
                                                            echo "
                                                                <tr class='table-light'>
                                                                    <td><input type='checkbox' name='no_inv' value='".$dataCari['no_inv']."'>".$dataCari['no_inv']."</td>                                                           
                                                                    <td>".$dataCari['tgl_inv']."</td>
                                                                    <td>".$dataCari['nama']."</td>
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


