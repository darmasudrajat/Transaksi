<?php
   include 'model/config.php';
   include 'head.php';
?>
<center>
      <form id="form-cari-penawaran" action="edit-penawaran.php" method="GET">
            <div class="fieldsets-table">
                  <legend>LIST PENAWARAN</legend>
                  <table style="font-size: 14px;" class="mytableclass table table-bordered table-secondary" cellspacing="0" width="100%">
                  <thead class="black">
                        <tr>
                              <!-- <th></th> -->
                              <th>Aksi</th>
                              <!-- <th>No Input</th> -->
                              <th>No. Penawaran</th>
                              <th>Kode Customer</th>
                              <th class="th-sm">Nama Customer</th>
                              <th class="th-sm">Alamat</th>
                              <th class="th-sm">No. Telp</th>   
                              <th class="th-sm">Tanggal</th>   
                        </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $queryLaporan = mysqli_query($conn, "select * from tb_penawaran");
                        
                        $row = mysqli_num_rows($queryLaporan);
                        
                              if($row > 0){
                        while($dataCari = mysqli_fetch_array($queryLaporan)){
                              echo "
                              <tr class='table-light'>
                                    
                                    <td>
                                    <a name='button-edit' class='btn btn-info btn-sm' href='aksi-penawaran.php?aksi=edit&no_pn=".$dataCari['no_pn']."'>Edit</a>
                                    <a href='' class='btn btn-danger btn-sm' data-toggle='modal' data-target='#konfirmasi_hapus' data-href='aksi-penawaran.php?aksi=hapus&no_pn=".$dataCari['no_pn']."'>Hapus</a>
                                    </td>
                                    <td>".$dataCari['no_pn']."</td>
                                    <td>".$dataCari['kode']."</td>                
                                    <td>".$dataCari['nama']."</td>                    
                                    <td>".$dataCari['alamat']."</td>                
                                    <td>".$dataCari['no_telp']."</td>                
                                    <td>".$dataCari['tanggal_pn']."</td>                
                              </tr>
                              ";
                        }
                  }

                  // PROSES EDIT / HAPUS
                  // if(isset($_GET['aksi']) && (isset($_GET['kode_produk']))){
                   
                  //      if($_GET['aksi'] == 'hapus'){
                  //             echo "
                  //                   <script>
                  //                         alert('TEST1');
                  //                   </script>";
                  //       }
                  // }

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
      // var aa = 
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