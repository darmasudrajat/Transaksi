<?php
    // include 'control/act-penjualan.php';    
    include 'model/config.php';
    include 'head.php';
    // error_reporting(0);

   //  Kode Customer Auto
    $queryAmbilNo = mysqli_query($conn, "select MAX(kode_suplier) from tb_suplier");
    $ambilNo = mysqli_fetch_array($queryAmbilNo);
    $maxNoTransaksi = $ambilNo[0];
    $noTr = (int) substr($maxNoTransaksi,4,4);
    $noTr++;
    $noTransaksiBaru = "SP".sprintf("%04s",$noTr);
    
?>
    
<center>
    <form action="aksi-suplier.php" method="POST">

        <div class="fieldsets-table">    
            <legend>Suplier Baru</legend>
            <table border="0" class="fieldtab1">
                <tr>
                    <td>Kode</td>
                    <td width="1">:</td>
                    <td>
                        <input type="text" class="form-control" name="kode_suplier"
                        value="<?php echo $noTransaksiBaru?>"/>
                    </td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td width="1">:</td>
                    <td>
                        <input type="text" class="in form-control" name="nama_suplier"/>
                    </td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td width="1">:</td>
                    <td>
                        <input type="text" class="in form-control" name="alamat_suplier" />
                    </td>
                </tr>
                
            </table>
            <table border="0" class="fieldtab3">
                <tr>
                    <td>email</td>
                    <td width="1">:</td>
                    <td>
                        <input type="text" class="in form-control" name="email"/>
                    </td>
                </tr>
                <tr>
                    <td>No. Telp</td>
                    <td width="1">:</td>
                    <td>
                        <input type="text" class="in form-control" name="no_telp"/>
                    </td>
                </tr>
            </table>
            <!-- <table border="0" style="float: left; width: 250px; margin-left: 10px;">
                <tr>
                    <td>Jenis</td>
                    <td>
                        <input type="text" class="in form-control" name="jenis"/>
                    </td>
                </tr>
                <tr>
                    <td>No. Fax</td>
                    <td>
                        <input type="text" class="in form-control" name="no_fax"/>
                    </td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>
                        <input type="text" class="in form-control" name="email"/>
                    </td>
                </tr>
                <tr>
                    <td>Website</td>
                    <td>
                        <input type="text" class="in form-control" name="website"/>
                    </td>
                </tr>
            </table> -->
        </div>
   
        <button type="submit" name="button-simpan" class="btn btn-dark ">Simpan</button>
        <button type="button" name="button-cancel" class="btn btn-danger " onclick="cancelclear()">Cancel</button>
   </form>
        <div class="fieldsets-table">
            <form action="aksi-customer.php" method="GET">
            <legend>Daftar Suplier</legend>
            <table id="myTable" class="mytableclass table table-striped table-bordered table-secondary" cellspacing="0" width="100%">
                <thead>
                    <tr style="height: 8px; font-weight: bold;">
                        <th class="th-sm">Aksi</th>
                        <th class="th-sm">Kode Suplier</th>
                        <th class="th-sm">Nama Suplier</th>
                        <th class="th-sm">Alamat</th>
                        <th class="th-sm">No. Telp</th>
                        <!-- <th class="th-sm">No. HP</th> -->
                        <th class="th-sm">Email</th>
                        <!-- <th class="th-sm">Website</th>    -->
                    </tr>
                </thead>
                <tbody>
                   <?php 
                      $query = mysqli_query($conn, "select * from tb_suplier");   
                      while($dataCari = mysqli_fetch_array($query)){
                            echo "
                            <tr>
                                  <td>
                                     <a name='button-edit' class='btn btn-info btn-sm' href='aksi-suplier.php?aksi=edit&kode_suplier=".$dataCari['kode_suplier']."'>Edit</a>
                                     <a href='' class='btn btn-danger btn-sm' data-toggle='modal' data-target='#konfirmasi_hapus' data-href='aksi-suplier.php?aksi=hapus&kode_suplier=".$dataCari['kode_suplier']."'>Hapus</a>
                                  </td>
                                  <td>".$dataCari['kode_suplier']."</td>
                                  <td>".$dataCari['nama_suplier']."</td>
                                  <td>".$dataCari['alamat_suplier']."</td>
                                  <td>".$dataCari['no_telp']."</td>
                                  <td>".$dataCari['email']."</td>
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