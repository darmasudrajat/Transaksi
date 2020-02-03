<?php
    include 'model/config.php';

    if(isset($_GET['noBtb'])){
        $no_btb = $_GET['noBtb'];
        $queryPrint  = mysqli_query($conn, "select * from tb_btb_hd where no_btb = '$no_btb' ");
        while($p = mysqli_fetch_array($queryPrint)){
            $tgl_btb = $p['tgl_btb'];
            $no_po = $p['no_po'];
            $no_so = $p['no_so'];
            $no_do = $p['no_sj'];
            $kode_suplier = $p['kode_suplier'];
            $nama_suplier = $p['nama_suplier'];
            $alamat_suplier = $p['alamat_suplier'];
        }
    }
?>

<style type="text/css">
    #lebar-print{
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
    #border-footer{
        width: 100%;
        height: 150px;
    }
</style>

<div id="lembar-print">
    <div id="lembar-header">
        <center>
            <h2><u>Bukti Terima Barang</u></h2>
        </center>
        <div style="width: 20%; float: left;">
            <table>
                <tr>No. BTB &emsp;  : &emsp; <?php echo $no_btb ?> </tr>
                <br>
                <tr>Tgl. BTB &emsp; : &emsp; <?php echo $tgl_btb ?> </tr>
            </table>
        </div>
        <div style="width: 20%; float: left; margin: 0px 20%;">
            <table>
                <tr>Kode &emsp; : &emsp; <?php echo $kode_suplier ?> </tr>
                <br>
                <tr>Nama &emsp; : &emsp; <?php echo $nama_suplier ?> </tr>
                <br>
                <tr>Alamat &emsp; : &emsp; <?php echo $alamat_suplier ?> </tr>
            </table>
        <div>
        <div style="width: 20%; float: right;">
            <table>
                <tr>No. PO &emsp;   : &emsp; <?php echo $no_po ?></tr>
                <br>
                <tr>No. SO &emsp;   : &emsp; <?php echo $no_so ?></tr>
                <br>
                <tr>No. DO &emsp;   : &emsp; <?php echo $no_do ?></tr>
            </table>
        </div>
    </div>

    <div id="lembar-detail">
        <center>
            <table style="width: 100%;">
                <tr style="height: 30px; font-weight: bold;">
                    <th>kode Produk</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Qty</th>
                    <th>Diterima</th>
                </tr>
                <?php
                    $dtl = mysqli_query($conn, "select * from tb_btb_dtl where no_btb = '$no_btb' ");
                    while($b = mysqli_fetch_array($dtl)){
                        echo "
                            <tr>
                                <td>'".$b['kode_produk']."'</td>
                                <td>'".$b['kode_barang']."'</td>
                                <td>'".$b['nama_barang']."'</td>
                                <td>'".$b['qty_barang']."'</td>
                                <td>'".$b['qty_diterima']."'</td>
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
        <center>
            <button onClick="window.print()" class="btn btn-info">Print</button>
            <a type="button" href="btb.php" class="btn btn-danger">Kembali</a>
        </center>
    </div>
</div>