<?php
   include 'model/config.php';
   include 'head.php';
   error_reporting(0);
?>
<center>
      <form id="form-cari-barang" action="edit-so.php" method="GET">
            <div class="fieldsets-table">
                  <legend>DAFTAR AP</legend>
                  <table id="myTable" class="mytableclass table table-bordered table-secondary" cellspacing="0" width="100%">
                  <thead class="black">
                        <tr>
                            <th>Aksi</th>
                            <th>No. AP</th>
                            <th>Tgl. AP</th>
                            <th>Nama Suplier</th>
                            <th>Nama Account</th>
                            <!-- <th>Keterangan</th> -->
                            <th>Jumlah Uang</th>   
                            <th>No. BTB</th>   
                            <th>Tgl. BTB</th>   
                            <th>No. PO</th>   
                            <th>No. SO</th>   
                            <th>No. DO</th>   
                            <th>Jumlah Tagihan</th>   
                            <th>Diskon</th> 
                            <th>Total</th> 
                        </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $query = mysqli_query($conn, "select * from tb_ap_hd t1 inner join tb_ap_dtl t2 on t1.no_ap = t2.no_ap");
                        
                        
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
                                                <td>".$dataCari['no_ap']."</td>                
                                                <td>".$dataCari['tgl_ap']."</td>                
                                                <td>".$dataCari['nama_suplier']."</td>                
                                                <td>".$dataCari['nama_account']."</td>            
                                                <td>".$dataCari['jumlah_uang']."</td>                
                                                <td>".$dataCari['no_btb']."</td>
                                                <td>".$dataCari['tgl_btb']."</td>
                                                <td>".$dataCari['no_po']."</td>
                                                <td>".$dataCari['no_so']."</td>
                                                <td>".$dataCari['no_do']."</td>
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
      // });
</script>
        <!-- <button type="submit" name="button-isi-data" class="btn bg-primary">ISI DATA</button> -->
    </form>
</center>
<?php
   include 'footer.php';
?>