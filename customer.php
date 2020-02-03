<?php
    // include 'control/act-penjualan.php';    
    include 'model/config.php';
    include 'head.php';
    // error_reporting(0);

   //  Kode Customer Auto
    $queryAmbilNo = mysqli_query($conn, "select MAX(kode) from tb_customer");
    $ambilNo = mysqli_fetch_array($queryAmbilNo);
    $maxNoTransaksi = $ambilNo[0];
    $noTr = (int) substr($maxNoTransaksi,4,4);
    $noTr++;
    $noTransaksiBaru = "Cust".sprintf("%04s",$noTr);
    
?>
    
<center>
    <form action="aksi-customer.php" method="POST">

        <div class="fieldsets-table">    
            <legend>Customer Baru</legend>
            <table class="fieldtab1" border="0">
                <tr>
                    <td>Kode</td>
                    <td width="1">:</td>
                    <td>
                        <input type="text" class="form-control" name="kode"
                        value="<?php echo $noTransaksiBaru?>"/>
                    </td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td width="1">:</td>
                    <td>
                        <input type="text" class="in form-control" name="nama"/>
                    </td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td width="1">:</td>
                    <td>
                        <input type="text" class="in form-control" name="alamat" />
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
            <table class="fieldtab2" border="0">
                <tr>
                    <td>Kota</td>
                    <td width="1">:</td>
                    <td>
                        <input type="text" class="in form-control" name="kota"/>
                    </td>
                    <td>
                        <!-- <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#myModal">Cari Produk</button> -->
                    </td>
                </tr>
                <tr>
                    <td>PIC</td>
                    <td width="1">:</td>
                    <td>
                        <input type="text" class="in form-control" name="pic"/>
                    </td>
                </tr>
                <tr>
                    <td>Jabatan</td>
                    <td width="1">:</td>
                    <td>
                        <input type="text" class="in form-control" name="jabatan"/>
                    </td>
                </tr>
                <tr>
                    <td>No. HP</td>
                    <td width="1">:</td>
                    <td>
                        <input type="text" class="in form-control" name="no_hp">
                    </td>
                </tr>
            </table>
            <table class="fieldtab3" border="0">
                <tr>
                    <td>Jenis</td>
                    <td width="1">:</td>
                    <td>
                        <input type="text" class="in form-control" name="jenis"/>
                    </td>
                </tr>
                <tr>
                    <td>No. Fax</td>
                    <td width="1">:</td>
                    <td>
                        <input type="text" class="in form-control" name="no_fax"/>
                    </td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td width="1">:</td>
                    <td>
                        <input type="text" class="in form-control" name="email"/>
                    </td>
                </tr>
                <tr>
                    <td>Website</td>
                    <td width="1">:</td>
                    <td>
                        <input type="text" class="in form-control" name="website"/>
                    </td>
                </tr>
            </table>
        </div>
   
        <button type="submit" name="button-simpan" class="btn btn-dark ">Simpan</button>
        <button type="button" name="button-cancel" class="btn btn-danger " onclick="cancelclear()">Cancel</button>
   </form>
        <div class="fieldsets-table myTableWrap">
            <form action="aksi-customer.php" method="GET">
            <legend>Daftar Customer</legend>
            <table id="myTable" class="mytableclass table table-striped table-bordered table-secondary" cellspacing="0" width="100%">
                <thead>
                    <tr style="height: 8px; font-weight: bold;">
                        <th class="th-sm">Aksi</th>
                        <th class="th-sm">Kode Customer</th>
                        <th class="th-sm">Nama Customer</th>
                        <th class="th-sm">Alamat</th>
                        <th class="th-sm">No. Telp</th>
                        <th class="th-sm">No. HP</th>
                        <th class="th-sm">Email</th>
                        <th class="th-sm">Website</th>   
                    </tr>
                </thead>
                <tbody>
                   <?php 
                      $queryBarang = mysqli_query($conn, "select * from tb_customer");   
                      while($dataCari = mysqli_fetch_array($queryBarang)){
                            echo "
                            <tr>
                                  <td>
                                     <a name='button-edit' class='btn btn-info btn-sm' href='aksi-customer.php?aksi=edit&kode=".$dataCari['kode']."'>Edit</a>
                                     <a href='' class='btn btn-danger btn-sm' data-toggle='modal' data-target='#konfirmasi_hapus' data-href='aksi-customer.php?aksi=hapus&kode=".$dataCari['kode']."'>Hapus</a>
                                  </td>
                                  <td>".$dataCari['kode']."</td>
                                  <td>".$dataCari['nama']."</td>
                                  <td>".$dataCari['alamat']."</td>
                                  <td>".$dataCari['no_telp']."</td>
                                  <td>".$dataCari['no_hp']."</td>
                                  <td>".$dataCari['email']."</td>
                                  <td>".$dataCari['website']."</td>
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