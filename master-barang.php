<?php
    // include 'control/act-penjualan.php';    
    include 'model/config.php';
    include 'head.php';
    // error_reporting(0);

   //  Kode Customer Auto
    $queryAmbilNo = mysqli_query($conn, "select MAX(kode_barang) from tb_barang");
    $ambilNo = mysqli_fetch_array($queryAmbilNo);
    $maxNoTransaksi = $ambilNo[0];
    $noTr = (int) substr($maxNoTransaksi,2,4);
    $noTr++;
    $noTransaksiBaru = "BR".sprintf("%04s",$noTr);
    
?>
    
<center>
    <form action="aksi-barang.php" method="POST">

        <div class="fieldsets-table">    
            <legend>Barang Baru</legend>
            <table border="0" class="fieldtab1">
                <tr>
                    <td>Kode</td>
                    <td width="1">:</td>
                    <td>
                        <input type="text" class="form-control" name="kode_barang" value="<?php echo $noTransaksiBaru?>"/>
                    </td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td width="1">:</td>
                    <td>
                        <input value='' type="text" class="in form-control" name="nama_barang"/>
                    </td>
                </tr>
                <tr>
                    <td>Ukuran</td>
                    <td width="1">:</td>
                    <td>
                        <input placeholder="Panjang..." value='' type="text" class="in form-control" name="ukuran_panjang_barang"/>
                    <!-- </td>
                    <td> -->
                        <input placeholder="Lebar..." value='' type="text" class="in form-control" name="ukuran_lebar_barang"/>
                    </td>
                </tr>
                <tr>
                    <td>Harga</td>
                    <td width="1">:</td>
                    <td>
                        <input value='' type="text" class="in form-control" name="harga_barang"/>
                    </td>
                </tr>
            </table>
            <table border="0" class="fieldtab3">
                <tr>
                    <td>Jenis</td>
                    <td width="1">:</td>
                    <td>
                        <input value='' type="text" class="in form-control" name="jenis_barang"/>
                    </td>
                </tr>
                <tr>
                    <td>Stok</td>
                    <td width="1">:</td>
                    <td>
                        <input value='' type="text" class="in form-control" name="stok_barang"/>
                    </td>
                </tr>
                <tr>
                    <td>Satuan</td>
                    <td width="1">:</td>
                    <td>
                        <input value='' type="text" class="in form-control" name="satuan_barang"/>
                    </td>
                </tr>
            </table>
        </div>
        <button type="submit" name="button-simpan" class="btn btn-dark ">Simpan</button>
        <button type="button" name="button-cancel" class="btn btn-danger " onclick="cancelclear()">Cancel</button>
   </form>
        <div class="fieldsets-table">
            <form action="aksi-customer.php" method="GET">
            <legend>Daftar Barang</legend>
            <table id="myTable" class="mytableclass table table-striped table-bordered table-secondary" cellspacing="0" width="100%">
                <thead>
                    <tr style="height: 8px; font-weight: bold;">
                        <th class="th-sm">Aksi</th>
                        <th class="th-sm">Kode Barang</th>
                        <th class="th-sm">Nama Barang</th>
                        <th class="th-sm">Ukuran Barang</th>
                        <th class="th-sm">Harga Barang</th>
                        <th class="th-sm">Jenis Barang</th>
                        <th class="th-sm">Stok</th>
                        <th class="th-sm">Satuan Barang</th>   
                    </tr>
                </thead>
                <tbody>
                   <?php 
                      $queryBarang = mysqli_query($conn, "select * from tb_barang");   
                      while($dataCari = mysqli_fetch_array($queryBarang)){
                            echo "
                            <tr>
                                  <td>
                                     <a name='button-edit' class='btn btn-info btn-sm' href='aksi-barang.php?aksi=edit&kode_barang=".$dataCari['kode_barang']."'>Edit</a>
                                     <a href='' class='btn btn-danger btn-sm' data-toggle='modal' data-target='#konfirmasi_hapus' data-href='aksi-barang.php?aksi=hapus&kode_barang=".$dataCari['kode_barang']."'>Hapus</a>
                                  </td>
                                  <td>".$dataCari['kode_barang']."</td>
                                  <td>".$dataCari['nama_barang']."</td>
                                  <td>".$dataCari['ukuran_panjang_barang']." X ".$dataCari['ukuran_lebar_barang']."</td>
                                  <td>".$dataCari['harga_barang']."</td>
                                  <td>".$dataCari['jenis_barang']."</td>
                                  <td>".$dataCari['stok_barang']."</td>
                                  <td>".$dataCari['satuan_barang']."</td>
                            </tr>";
                      }
                   ?>
                </tbody>
            </table>
            </form>
        </div>
    <div class="modal fade" id="konfirmasi_hapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <b>Anda yakin ingin menghapus data ini ?</b><br><br>
                    <a class="btn btn-danger btn-ok"> Hapus</a>
                    <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-close"></i> Batal</button>
                </div>
            </div>
        </div>
    </div>
</center>
<script type="text/javascript">
    $(document).ready(function(){
      $('#konfirmasi_hapus').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
      });
    })
    
    function cancelclear(){
        $(".in").val("");
    }
</script>

<?php
    include 'footer.php';
?>