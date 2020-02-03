<?php
   include 'model/config.php';
   include 'head.php';
   error_reporting(0);

?>
<center>
      <form id="form-cari-barang" action="edit-so.php" method="GET">
            <div class="fieldsets-table">
                  <legend>DAFTAR AR</legend>
                  <table id="myTable" class="mytableclass table table-bordered table-secondary" cellspacing="0" width="100%">
                  <thead class="black">
                        <tr>
                            <th>Aksi</th>
                            <th>No. AR</th>
                            <th>Tgl. AR</th>
                            <th>No. Account</th>
                            <th>Nama Account</th>
                            <th>Jumlah Uang</th>   
                            <th>Keterangan</th>
                            <th>No. Inv</th>   
                            <th>Tgl. Inv</th>   
                            <th>Jumlah Tagihan</th>   
                            <th>Diskon</th> 
                            <th>Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $query = mysqli_query($conn, "select * from tb_ar_hd t1 inner join tb_ar_dtl t2 on t1.no_ar = t2.no_ar");
                        
                        
                        $rowProduk = mysqli_num_rows($query);
                        // $rowBarang = mysqli_num_rows($queryBarang);
                        
                              if($rowProduk > 0){
                                    while($dataCari = mysqli_fetch_array($query)){
                                          echo "
                                          <tr class='table-light'>

                                                <td>
                                                      <a name='button-edit' class='btn btn-info btn-sm' href='aksi-sales-order.php?aksi=edit&no_so=".$dataCari['no_so']."'>Edit</a>
                                                      <a href='' class='btn btn-danger btn-sm' data-toggle='modal' data-target='#konfirmasi_hapus' data-href='aksi-sales-order.php?aksi=hapus&no_so=".$dataCari['no_so']."'>Hapus</a>
                                                </td>
                                                <td>".$dataCari['no_ar']."</td>                
                                                <td>".$dataCari['tgl_ar']."</td>                
                                                <td>".$dataCari['no_account']."</td>                
                                                <td>".$dataCari['nama_account']."</td>                
                                                <td>".$dataCari['jumlah_uang']."</td>                
                                                <td>".$dataCari['keterangan']."</td>                
                                                <td>".$dataCari['no_inv']."</td>
                                                <td>".$dataCari['tgl_inv']."</td>
                                                <td>".$dataCari['jumlah_tagihan']."</td>                    
                                                <td>".$dataCari['diskon']."</td>
                                                <td>".$dataCari['total']."</td>        
                                          </tr>
                                          ";
                                    }
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
            <script type="text/javascript">
                  $(document).ready(function(){
                        $('#konfirmasi_hapus').on('show.bs.modal', function(e) {
                              $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
                        });
                  })
            </script>
      </form>
</center>
<?php
   include 'footer.php';
?>