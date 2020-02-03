<?php
    include 'model/config.php';

    if(isset($_GET['noAp'])){
        $no_ap = $_GET['noAp'];
        $queryPrint = mysqli_query($conn, "select * from tb_ap_hd where no_ap = '$no_ap'");
        while($p = mysqli_fetch_array($queryPrint)){
            $tgl_ap = $p['tgl_ap'];
            $kode_suplier = $p['kode_suplier'];
            $nama_suplier = $p['nama_suplier'];
            $no_account = $p['no_account'];
            $nama_account = $p['nama_account'];
            $keterangan = $p['keterangan'];
            $jumlah_uang = $p['jumlah_uang'];
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
            <h2><u>AP</u></h2>
        </center>
        <div style="width: 20%; float: left;">
            <table>
                <tr>No. AP &emsp;  : &emsp; <?php echo $no_ap ?> </tr>
                <br>
                <tr>Tgl. AP &emsp; : &emsp; <?php echo $tgl_ap ?> </tr>
            </table>
        </div>
        <div style="width: 20%; float: left; margin: 0px 20%;">
            <table>
                <tr>Suplier &emsp; : &emsp; <?php echo $nama_suplier ?> </tr>
                <br>
                <tr>No. Account &emsp; : &emsp; <?php echo $no_account ?> </tr>
                <br>
                <tr>Account &emsp; : &emsp; <?php echo $nama_account ?> </tr>
            </table>
        <div>
        <div style="width: 20%; float: right;">
            <table>
                <tr>Jumlah Uang &emsp;   : &emsp; <?php echo $jumlah_uang ?></tr>
                <br>
                <tr>Keterangan &emsp;   : &emsp; <?php echo $keterangan ?></tr>
                
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
                    $dtl = mysqli_query($conn, "select * from tb_ap_dtl where no_ap = '$no_ap' ");
                    while($b = mysqli_fetch_array($dtl)){
                        echo "
                            <tr>
                                <td>'".$b['no_btb']."'</td>
                                <td>'".$b['tgl_btb']."'</td>
                                <td>'".$b['jumlah_tagihan']."'</td>
                                <td>'".$b['diskon']."'%</td>
                                <td>'".$b['total']."'</td>
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