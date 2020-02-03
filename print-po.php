<?php
   include 'model/config.php';

   if(isset($_GET['noPO'])){
      $no_po = $_GET['noPO'];
      $queryPrint = mysqli_query($conn, "select * from tb_po_hd where no_po = '$no_po' ");
      while($p = mysqli_fetch_array($queryPrint)){
         $tgl_po = $p['tgl_po'];
         $no_so = $p['no_so'];
         $kode = $p['kode_suplier'];
         $nama = $p['nama_suplier'];
         $alamat = $p['alamat_suplier'];
         $no_telp = $p['no_telp'];
         $email = $p['email'];
         $tgl_kirim = $p['tgl_kirim'];
         $total_all = $p['total_all'];
         $tot =+ $total_all;
      }
   }
?>
<style wtype="text/css">
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
                  <tr>No. PO &emsp;    : &emsp; <?php echo $no_po; ?></tr>
                  <br>
                  <tr>Tgl. PO &emsp;   : &emsp; <?php echo $tgl_po; ?></tr>
                  <br>
                  <tr>No. SO &emsp;    : &emsp; <?php echo $no_so; ?></tr>
            </table>
         </div>
         <div style="width: 20%; float: left; margin: 0px 20%;">
            <table>
                  <tr>Kode &emsp; : &emsp; <?php echo $kode; ?></tr>
                  <br>
                  <tr>Nama &emsp; : &emsp; <?php echo $nama; ?></tr>
                  <br>
                  <tr>Alamat &emsp; : &emsp; <?php echo $alamat; ?></tr>
                  <br>
                  <tr>No. Telp &emsp; : &emsp; <?php echo $no_telp; ?></tr>
            </table>
         </div>
         <div style="float: right;">
            <table>
               <tr>Email &emsp; : &emsp; <?php echo $email; ?></tr>
               <br>
               <tr>Tgl. Kirim &emsp; : &emsp; <?php echo $tgl_kirim; ?></tr>
               <br>
               <tr>Total Harga &emsp; : &emsp; <?php echo $total_all; ?></tr>
            </table>
         </div>
   </div>
   <div id="lembar-detail">
   <center>
         <table style="width: 100%;">
            <tr style="height: 30px; font-weight: bold;">
               <td>Kode Produk</td>
               <td>Kode Barang</td>
               <td>Nama Barang</td>
               <td>Ukuran</td>
               <td>Qty</td>
               <td>Satuan</td>
               <td>Sub Total</td>
            </tr>
            <?php
               $dtl = mysqli_query($conn, "select * from tb_po_dtl where no_po = '$no_po' ");
               while($d = mysqli_fetch_array($dtl)){
                  echo "
                     <tr>
                        <td>'".$d['kode_produk']."'</td>
                        <td>'".$d['kode_barang']."'</td>
                        <td>'".$d['nama_barang']."'</td>
                        <td>'".$d['ukuran_panjang_barang']."' X '".$d['ukuran_lebar_barang']."'</td>
                        <td>'".$d['qty_barang']."'</td>                        
                        <td>'".$d['satuan_barang']."'</td>                        
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
</div>
<br/>
<center>
   <button onClick="window.print()" class="btn btn-info" >Print</button>
   <a type="button" href="purchase-order.php" class="btn btn-info" >Kembali</a>
</center>