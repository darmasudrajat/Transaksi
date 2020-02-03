<?php
    include 'model/config.php';
    include 'index.php';

?>
<fieldset>
    <legend>TABEL TRANSAKSI PENJUALAN</legend>
    <form class="tabel-transaksi" action="tabel-transaksi" method="post/get">
            <!-- Style Table -->
            <style>
                .table{
                    margin: auto;
                    height: 370px;
                    display: block;
                    /* width: 100%; */
                    overflow-y: scroll;
                }
                thead{
                    font-size: 13px;
                }
                .table tbody{
                    width: 100%;
                    height: 10px !important;
                    overflow-y: scroll;
                    font-size: 12px;
                }
                tbody tr{
                    width: 100%;
                }
                
            </style>
            <!-- End Style Table -->
            <table border="1" class="table table-dark table-hover">
                <thead>
                    <tr>
                        <th width="5%">No. Tr.</th>
                        <th width="9%">Kode Barang</th>
                        <th width="6%">Tanggal</th>
                        <th width="21%">Nama Barang</th>
                        <th width="10%">Spek</th>
                        <th width="6%">Qty</th>
                        <th width="9%">Total</th>
                        <th width="11%">Kasir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $queryTampilTabel = mysqli_query($conn, "select * from tb_transaksi");
                        while($row = mysqli_fetch_array($queryTampilTabel)){
                    ?>
                    <tr>
                        <td><?php echo $row['no_transaksi']; ?></td>
                        <td><?php echo $row['kode_barang']; ?></td>
                        <td><?php echo $row['tanggal_transaksi']; ?></td>
                        <td><?php echo $row['nama_barang']; ?></td>
                        <td><?php echo $row['spek_barang']; ?></td>
                        <td><?php echo $row['qty_barang']; ?></td>
                        <td><?php echo $row['total_harga']; ?></td>
                        <td><?php echo $row['nama_kasir']; ?></td>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
               
            </table>
        </form>
</fieldset>
<br/>
<br/>
<br/>
<center>
    <button type="submit" class="btn btn-outline-primary" name="button-proses">INPUT PENJUALAN</button> 
</center>