<?php
    // include 'control/act-penjualan.php';    
    include 'model/config.php';
    include 'head.php';
    // error_reporting(0);

   
    
?>
    
<center>
      <form action="aksi-sales-order.php" method="POST">
            <div class="fieldsets-table" style="width: 90%;">    
                  <legend>TABEL PENAWARAN</legend>
                  <table class="mytableclass table table-bordered table-secondary" cellspacing="0" width="100%">
                        <thead>
                              <tr>
                                    <!-- <th class="th-sm"></th> -->
                                    <!-- <th class="th-sm">No. Penawaran</th> -->
                                    <th class="th-sm">No. Penawaran</th>
                                    <th class="th-sm">Kode Produk</th>
                                    <th class="th-sm">Nama</th>
                                    <th class="th-sm">Ukuran</th>
                                    <th class="th-sm">QTY</th>
                                    <th class="th-sm">Satuan</th>   
                                    <th class="th-sm">Harga</th>   
                                    <th class="th-sm">Total</th>   
                              </tr>
                        </thead>
                        <tbody>
                              <?php 
                                    $status = 0;
                                    $queryPen = mysqli_query($conn, "select * from tb_penawaran_dtl where status_so = '$status'");
                                    while($dataCari = mysqli_fetch_array($queryPen)){
                                          echo "
                                                <tr class='table-light'>                                                
                                                      <td><input type='checkbox' name='no_pn' value='".$dataCari['no_pn']."'>".$dataCari['no_pn']."</td>                                                           
                                                      <td name='kode_produk' value='".$dataCari['kode_produk']."'>".$dataCari['kode_produk']."</td>
                                                      <td>".$dataCari['nama_produk']."</td>
                                                      <td>".$dataCari['ukuran_panjang_produk']." X ".$dataCari['ukuran_lebar_produk']."</td>
                                                      <td>".$dataCari['qty']."</td>
                                                      <td>".$dataCari['satuan_produk']."</td>
                                                      <td>".$dataCari['harga_produk']."</td>
                                                      <td>".$dataCari['total']."</td>                 
                                                </tr>
                                          ";
                                    }
                              ?>
                        </tbody>
                  </table>
            </div>
            <button type="submit" name="button-approve" class="btn btn-info ">Terima</button>
            <a type="button" name="button-cancel" class="btn btn-danger " href="index.php">Kembali</a>
      </form>
      <div class="fieldsets-table" style="width: 90%;">    
            <legend>TABEL APPROVE SO</legend>
            <table class="mytableclass table table-bordered table-secondary" cellspacing="0" width="100%">
                  <thead>
                        <tr>
                              <!-- <th class="th-sm"></th> -->
                              <!-- <th class="th-sm">No. Penawaran</th> -->
                              <th class="th-sm">No. SO</th>
                              <th class="th-sm">No. Penawaran</th>
                              <th class="th-sm">Kode Produk</th>
                              <th class="th-sm">Nama</th>
                              <th class="th-sm">Ukuran</th>
                              <th class="th-sm">QTY</th>
                              <th class="th-sm">Satuan</th>   
                              <th class="th-sm">Harga</th>   
                              <th class="th-sm">Total</th>   
                        </tr>
                  </thead>
                  <tbody>
                        <?php 
                              $querySO = mysqli_query($conn, "select * from tb_sales_order");
                              while($dataCari = mysqli_fetch_array($querySO)){
                                    echo "
                                          <tr class='table-light'>                                                    
                                                <td>".$dataCari['no_so']."</td>
                                                <td>".$dataCari['no_pn']."</td>
                                                <td>".$dataCari['kode_produk']."</td>
                                                <td>".$dataCari['nama_produk']."</td>
                                                <td>".$dataCari['ukuran_panjang_produk']." X ".$dataCari['ukuran_lebar_produk']."</td>
                                                <td>".$dataCari['qty']."</td>
                                                <td>".$dataCari['satuan_produk']."</td>
                                                <td>".$dataCari['harga_produk']."</td>
                                                <td>".$dataCari['total']."</td>                 
                                          </tr>
                                    ";
                              }
                        ?>
                  </tbody>
            </table>
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