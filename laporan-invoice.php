<?php
   include 'model/config.php';
   include 'head.php';
?>
<center>
      <form id="form-cari-barang" action="edit-so.php" method="GET">
            <div class="fieldsets-table">
                  <legend>DAFTAR INVOICE</legend>
                  <table id="myTable" class="mytableclass table table-bordered table-secondary" cellspacing="0" width="100%">
                  <thead class="black">
                        <tr>
                            <th>Aksi</th>
                            <th>No. Inv</th>
                            <th>Tgl. Inv</th>
                            <!-- <th>No. PN</th> -->
                            <th>Kode Cust</th>
                            <th>Nama Cust</th>
                            <th>Alamat</th>
                            <th>Total Qty</th>
                            <th>Kode Produk</th>   
                            <th>Nama Produk</th>   
                            <th>Ukuran</th>   
                            <th>Qty</th>   
                            <th>Satuan</th>   
                            <th>Sub Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $query = mysqli_query($conn, "select * from tb_invoice_hd t1 inner join tb_invoice_dtl t2 on t1.no_inv = t2.no_inv");
                        
                        
                        $rowProduk = mysqli_num_rows($query);
                        // $rowBarang = mysqli_num_rows($queryBarang);
                        
                              if($rowProduk > 0){
                                    while($dataCari = mysqli_fetch_array($query)){
                                          echo "
                                          <tr class='table-light'>
                                                <td>
                                                      <a name='button-edit' class='btn btn-info btn-sm' href='aksi-sales-order.php?aksi=edit&no_so=".$dataCari['no_inv']."'>Edit</a>
                                                      <a href='' class='btn btn-danger btn-sm' data-toggle='modal' data-target='#konfirmasi_hapus' data-href='aksi-sales-order.php?aksi=hapus&no_so=".$dataCari['no_inv']."'>Hapus</a>
                                                </td>
                                                <td>".$dataCari['no_inv']."</td>                
                                                <td>".$dataCari['tgl_inv']."</td>
                                                <td>".$dataCari['kode']."</td>                
                                                <td>".$dataCari['nama']."</td>                
                                                <td>".$dataCari['alamat']."</td>                
                                                <td>".$dataCari['total_qty']."</td>                
                                                <td>".$dataCari['kode_produk']."</td>                
                                                <td>".$dataCari['nama_produk']."</td>                
                                                <td>".$dataCari['ukuran_panjang_produk']." X ".$dataCari['ukuran_lebar_produk']."</td>                          
                                                <td>".$dataCari['qty']."</td>                    
                                                <td>".$dataCari['satuan_produk']."</td>
                                                <td>".$dataCari['sub_total']."</td>         
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