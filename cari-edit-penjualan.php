<?php
   include 'model/config.php';
   include 'head.php';
?>
<center>
      <form id="form-cari-barang" action="edit-penjualan.php" method="GET">
            <div class="fieldsets-table">
                  <legend>DAFTAR PRODUK</legend>
                  <table style="font-size: 14px;" class="mytableclass table table-bordered table-secondary" cellspacing="0" width="100%">
                  <thead class="black">
                        <tr>
                              <!-- <th></th> -->
                              <th>Aksi</th>
                              <!-- <th>No Input</th> -->
                              <th>Kode Produk</th>
                              <!-- <th class="th-sm">Kode Barang</th> -->
                              <th class="th-sm">Nama Produk</th>
                              <!-- <th class="th-sm">Nama Barang</th> -->
                              <th class="th-sm">Ukuran</th>   
                              <!-- <th class="th-sm">Qty Barang</th>    -->
                              <th class="th-sm">Satuan Produk</th>   
                              <th class="th-sm">Harga Produk</th>   
                              <!-- <th class="th-sm">Jenis Barang</th>    -->
                              <!-- <th class="th-sm">Sub Total</th>    -->
                              <th class="th-sm">Total</th>   
                        </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $queryProduk = mysqli_query($conn, "select * from tb_produk_hd ");
                        
                        
                        $rowProduk = mysqli_num_rows($queryProduk);
                        // $rowBarang = mysqli_num_rows($queryBarang);
                        
                              if($rowProduk > 0){
                                    while($dataCari = mysqli_fetch_array($queryProduk)){
                                          echo "
                                          <tr class='table-light'>

                                                <td>
                                                      <a class='btn btn-info btn-sm' href='edit-penjualan.php?kode_produk=".$dataCari['kode_produk']."'>Edit</a>
                                                      <a name='tombol_hapus' href='' class='btn btn-danger btn-sm' data-toggle='modal' data-target='#konfirmasi_hapus' data-href='hapus.php?kode_produk=".$dataCari['kode_produk']."'>Hapus</a>
                                                </td>
                                                <td>".$dataCari['kode_produk']."</td>                
                                                <td>".$dataCari['nama_produk']."</td>                
                                                <td>".$dataCari['ukuran_panjang_produk']." X ".$dataCari['ukuran_lebar_produk']."</td>                          
                                                <td>".$dataCari['satuan_produk']."</td>                    
                                                <td>".$dataCari['harga_produk']."</td>             
                                                <td>".$dataCari['total_all']."</td>             
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
        $('.mytableclass').dataTable({
                  
                // fixedHeader: true,
                // columnDefs: [{
                //       orderable: true,
                //       // className: 'select-checkbox',
                //       targets: 0
                // }],
                // select: {
                //       style: 'os',
                //       selector: 'td:first-child'
                // }
        });
//         $(document).ready(function(){
//             $('#myModal').on('show.bs.modal', function (e) {
//                   var rowid = $(e.relatedTarget).data('id');
//                   //menggunakan fungsi ajax untuk pengambilan data
//                   $.ajax({
//                   type : 'get',
//                   url : 'edit-penjualan.php',
//                   data :  'rowid='+ rowid,
//                   success : function(data){
//                   $('.fetched-data').html(data);//menampilkan data ke dalam modal
//                   }
//                   });
//          });
//     });
    });
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