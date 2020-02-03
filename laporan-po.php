<?php
   include 'model/config.php';
   include 'head.php';
?>
<center>
      <form id="form-cari-barang" action="edit-so.php" method="GET">
            <div class="fieldsets-table">
                  <legend>DAFTAR PURCHASE ORDER</legend>
                  <table id="myTable" class="mytableclass table table-bordered table-secondary" cellspacing="0" width="100%">
                  <thead class="black">
                        <tr>
                              <th>Aksi</th>
                              <th>No. PO</th>
                              <th>Tgl. PO </th>
                              <th>No. SO</th>
                              <th>Nama Suplier</th>
                              <!-- <th>Alamat Suplier</th> -->
                              <th>No. Telp</th>
                              <th>Tgl. Kirim</th>
                              <th>Kode Produk</th>   
                              <th>Kode Barang</th>   
                              <th>Nama Barang</th>   
                              <th>Ukuran</th>   
                              <th>Qty</th>   
                              <th>Satuan</th>   
                              <!-- <th>Harga</th>    -->
                              <!-- <th>Jenis Barang</th>    -->
                              <th>Sub Total</th>   
                              <!-- <th>Total</th>    --> 
                        </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $query = mysqli_query($conn, "select * from tb_po_hd t1 inner join tb_po_dtl t2 on t1.no_po = t2.no_po");
                        
                        
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
                                                <td>".$dataCari['no_po']."</td>                
                                                <td>".$dataCari['tgl_po']."</td>                
                                                <td>".$dataCari['no_so']."</td>                
                                                <td>".$dataCari['nama_suplier']."</td>                
                                                <td>".$dataCari['no_telp']."</td>                
                                                <td>".$dataCari['tgl_kirim']."</td>                
                                                <td>".$dataCari['kode_produk']."</td>                
                                                <td>".$dataCari['kode_barang']."</td>                
                                                <td>".$dataCari['nama_barang']."</td>                
                                                <td>".$dataCari['ukuran_panjang_barang']." X ".$dataCari['ukuran_lebar_barang']."</td>                          
                                                <td>".$dataCari['qty_barang']."</td>                    
                                                <td>".$dataCari['satuan_barang']."</td>             
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