<?php
   include 'model/config.php';

   if(isset($_GET['noSJ'])){
      $no_sj = $_GET['noSJ'];
      $queryPrint = mysqli_query($conn, "select * from tb_sj_hd where no_sj = '$no_sj' ");
      while($p = mysqli_fetch_array($queryPrint)){
         $tgl_sj = $p['tgl_sj'];
         $kode = $p['kode'];
         $nama = $p['nama'];
         $alamat = $p['alamat'];
         $kota = $p['kota'];
         $total_qty = $p['total_qty'];
      }
   }
?>
<style type="text/css">
   #lembar-print{
      margin: auto;
      width: 1000px;
      height: 500px;
      border: 1px solid black;
      padding: 5px;
   }
   #lembar-header{
      width: 100%;
      height: 150px;
   }
   #lembar-detail{
      width: 100%;
      height: 200px;
      border: 1px solid black;
   }
   
   #lembar-footer{
      width: 100%;
      height: 150px;
   }
</style>
<div id="lembar-print">
   <div id="lembar-header">
      <center>
         <h2><u>Purchase Order</u></h2>
      </center>
         
      <div style="width: 20%; float: left;">
         <table>
            <!-- <tr> -->
               <tr>No. SJ &emsp;    : &emsp; <?php echo $no_sj; ?></tr>
               <br>
               <tr>Tgl. SJ &emsp;   : &emsp; <?php echo $tgl_sj; ?></tr>
               <!-- <br> -->
               <!-- <tr>No. SO &emsp;    : &emsp; <?php echo $no_so; ?></tr> -->
            <!-- </tr> -->
         </table>
      </div>
      <div style="width: 20%; float: left; margin: 0px 20%;">
         <table>
            <!-- <tr> -->
               <tr>Kode &emsp; : &emsp; <?php echo $kode; ?></tr>
               <br>
               <tr>Nama &emsp; : &emsp; <?php echo $nama; ?></tr>
               <br>
               <tr>Alamat &emsp; : &emsp; <?php echo $alamat; ?></tr>
               <br>
               <tr>Kota &emsp; : &emsp; <?php echo $kota; ?></tr>
            <!-- </tr> -->
         </table>
      </div>
      <div style="float: right;">
         <table>
            <!-- <tr> -->
               <!-- <tr>Tgl. Kirim &emsp; : &emsp; <?php echo $tgl_kirim; ?></tr> -->
               <!-- <br> -->
               <tr>Total Qty &emsp; : &emsp; <?php echo $total_qty; ?></tr>
             
            <!-- </tr> -->
         </table>
      </div>
   </div>
   <div id="lembar-detail">
      <center>
         <table style="width: 100%;">
            <tr style="height: 30px; font-weight: bold;">
               <td>Kode Produk</td>
               <!-- <td>Kode Barang</td> -->
               <td>Nama Produk</td>
               <td>Ukuran</td>
               <td>Qty</td>
               <td>Satuan</td>
               <td>Sub Total</td>
            </tr>
            <?php
               $dtl = mysqli_query($conn, "select * from tb_sj_dtl where no_sj = '$no_sj' ");
               while($d = mysqli_fetch_array($dtl)){
                  echo "
                     <tr>
                        <td>'".$d['kode_produk']."'</td>
                        <td>'".$d['nama_produk']."'</td>
                        <td>'".$d['ukuran_panjang_produk']."' X '".$d['ukuran_lebar_produk']."'</td>
                        <td>'".$d['qty']."'</td>                        
                        <td>'".$d['satuan_produk']."'</td>                        
                        <td>'".$d['sub_total']."'</td>                        
                     </tr>
                  ";
               }
            ?>
         </table>
      </center>
   </div>
   <div id="lembar-footer">
      <div style="width: 20%; float: left;">
         <center>
            <label>TTD1</label>
         </center>
      </div>
      <div style="width: 20%; float: left; margin-left: 20%;">
         <center>
            <label>TTD2</label>
         </center>
      </div>
      <div style="width: 20%; float: right;">
         <center>
            <label>TTD3</label>
         </center>
      </div>
   </div>
   <center>
      <button onClick="window.print()" class="btn btn-info" >Print</button>
      <a type="button" href="surat-jalan.php" class="btn btn-info" >Kembali</a>
   </center>
</div>
