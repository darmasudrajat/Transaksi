<?php
    include 'model/config.php';

    if(isset($_GET['noInv'])){
        $no_inv = $_GET['noInv'];
        $queryPrint = mysqli_query($conn, "select * from tb_invoice_hd where no_inv = '$no_inv' ");
        while($p = mysqli_fetch_array($queryPrint)){
            $tgl_inv = $p['tgl_inv'];
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
            <h2><u>INVOICE</u></h2>
        <center>
        <div style="width: 20%; float: left;">
            <table>
                <tr>No. Inv &emsp;  : &emsp; <?php echo $no_inv; ?></tr>
                <br>
                <tr>Tgl. Inv &emsp; : &emsp; <?php echo $tgl_inv; ?></tr>
            </table>
        </div>
        <div style="width: 20%; float: left; margin: 0px 20%;">
            <table>
                <tr>Kode &emsp; :  &emsp; <?php echo $kode; ?></tr>
                <br>
                <tr>Nama &emsp; :  &emsp; <?php echo $nama; ?></tr>
                <br>
                <tr>Alamat &emsp; :  &emsp; <?php echo $alamat; ?></tr>
            </table>
        </div>
        <div style="width: 20%; float: right;">
            <table>
                <tr>Kota &emsp; :  &emsp; <?php echo $kota; ?></tr>
                <br>
                <tr>Total Qty &emsp; : &emsp; <?php echo $total_qty; ?></tr>
            </table>
        </div>
    </div>
    <div id="lembar-detail">
        <center>
            <table style="width: 100%;">
                <tr  style="height: 30px; font-weight: bold;">
                    <td>Kode Produk</td>
                    <td>Nama Produk</td>
                    <td>Ukuran</td>
                    <td>Qty</td>
                    <td>Satuan</td>
                    <td>Sub Total</td>
                    <td>Total All</td>
                </tr>
                <?php
                    $dtl = mysqli_query($conn, "select * from tb_invoice_dtl where no_inv = '$no_inv' ");
                    while($i = mysqli_fetch_array($dtl)){
                        echo "
                            <tr>
                                <td>'".$i['kode_produk']."'</td>
                                <td>'".$i['nama_produk']."'</td>
                                <td>'".$i['ukuran_panjang_produk']."' X '".$i['ukuran_lebar_produk']."'</td>
                                <td>'".$i['qty']."'</td>
                                <td>'".$i['satuan_produk']."'</td>
                                <td>'".$i['sub_total']."'</td>
                                <td>'".$i['total_all']."'</td>
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
        <button onClick="window.print()" class="btn btn-info">Print</button>
        <a type="button" href="invoice.php" class="btn btn-danger">Kembali</a>
    </center>
</div>