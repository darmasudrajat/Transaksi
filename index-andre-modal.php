<!-- =============================================== -->

<section class="content-header">
    <h1>
        Purchase Order (PO)
        <small>Halaman Purchase Order (PO)</small>
    </h1>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="box box-default">
                <form class="form-horizontal">
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-4">No PO</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" readonly>
                            </div>
                        </div>
                        <div class=" form-group">
                            <label class="col-sm-4">Pengguna</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="<?= $this->fungsi->pengguna_masuk()->nama  ?>" readonly>
                            </div>
                        </div>
                        <div class=" form-group">
                            <label class="col-sm-4">Date</label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control" value="<?= date('Y-m-d') ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4">Supplier</label>
                            <div class="col-sm-8">
                                <div class="input-group input-group-sm">
                                    <input type="hidden" id="id_supplier" name="id_supplier">
                                    <input type="text" class="form-control" id="supplier" name="supplier" autofocus>
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-supplier">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class=" form-group">
                            <label class="col-sm-4">Nama Supplier</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nama_supplier" name="nama_supplier" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4">Alamat</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" id="alamat_supplier" name="alamat_supplier" readonly></textarea>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- =============================================== -->

        <div class="col-md-6">
            <div class="box box-default">
                <form class="form-horizontal" method="post" class="form-product">
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-4">Kode Product</label>
                            <div class="col-sm-8">
                                <div class="input-group input-group-sm">
                                    <input type="hidden" class="form-control" id="id_product" name="id_product">
                                    <input type="text" class="form-control" id="product_po" name="product_po" autofocus>
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-product">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4">Nama Product</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nama_product_po" name="nama_product_po" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4">Jumlah</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="jumlah_po" name="jumlah_po" onkeyup="hitung();">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4">Satuan</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="satuan_po" name="satuan_po" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4">Harga</label>
                            <div class="col-sm-8">
                                <div class="input-group input-group-sm">
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-default">
                                            Rp.
                                        </button>
                                    </span>
                                    <input type="text" class="form-control" id="harga_po" name="harga_po" onkeyup="hitung();" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4">Total</label>
                            <div class="col-sm-8">
                                <div class="input-group input-group-sm">
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-default">
                                            Rp.
                                        </button>
                                    </span>
                                    <input type="text" class="form-control" id="total_harga_po" name="total_harga_po" onkeyup="hitung();" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="button" class="btn btn-success" id="add_product" name="add_product">
                            <i class="fa fa-shopping-cart"></i> Add
                        </button>
                        <button type="reset" class="btn btn-default">Reset</button>
                    </div>
                </form>
            </div>
        </div>
        <form class="form-horizontal" method="post">
            <div class="col-md-4">
                <div class="box box-default">
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-4">PO Untuk Gudang</label>
                            <div class="col-sm-8">
                                <div class="radio">
                                    <label>
                                        <input type="radio" id="po_untuk" name="po_untuk" value="pusat"> PUSAT
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" id="po_untuk" name="po_untuk" value="tekno"> TAMAN TEKNO
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box box-default">
                    <form class="form-horizontal" method="post">
                        <div class="box-body">
                            <div class="form-group">
                                <label class="col-sm-4">Keterangan</label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" id="keterangan" name="keterangan"></textarea>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box box-default">
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-4">Sub Total</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" readonly>
                            </div>
                        </div>
                        <div class=" form-group">
                            <label class="col-sm-4">Discount</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control">
                            </div>
                        </div>
                        <div class=" form-group">
                            <label class="col-sm-4">Grand Total</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box box-default">
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-4">Total</label>
                            <div class="col-sm-8">
                                <h1 class="pull-right">
                                    <b>
                                        INI HARGA
                                    </b>
                                </h1>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-success btn-lg">
                    <i class="fa fa-paper-plane"></i> Process PO
                </button>
                <button type="reset" class="btn btn-danger btn-lg">
                    <i class="fa fa-remove"></i> Cancel
                </button>
            </div>
        </form>
    </div>
</section>
<!-- =============================================== -->

<section class="content">
    <div class="box">
        <div class="box-body table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Kode Product</th>
                        <th>Nama Product</th>
                        <th>Jumlah</th>
                        <th>Satuan</th>
                        <th>Harga</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="isi_product">

                </tbody>
            </table>
        </div>
    </div>
</section>

<!-- =============================================== -->


<!-- =============================================== -->

<div class="modal fade" id="modal-supplier" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title"><span class="fa fa-truck"></span> Data Supplier</h4>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered table-hover" id="TablemyBSS">
                    <thead>
                        <tr>
                            <th>Kode Supplier</th>
                            <th>Nama Supplier</th>
                            <th>Alamat</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($supplier as $s => $data) { ?>
                            <tr>
                                <td><?= $data->id_supplier ?></td>
                                <td><?= $data->nama_supplier ?></td>
                                <td><?= $data->alamat ?></td>
                                <td class="text-center"><?= $data->status == 1 ? '<span class="label label-success">Aktif</span>' : null ?>
                                    <?= $data->status == 2 ? '<span class="label label-danger">Tidak Aktif</span>' : null ?>
                                </td>
                                <td>
                                    <button class="btn btn-xs btn-info" id="pilih-supplier" data-id="<?= $data->id_supplier ?>" data-name="<?= $data->nama_supplier ?>" data-alamat="<?= $data->alamat ?>">
                                        <i class="fa fa-check"></i> Pilih
                                    </button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>

<!-- =============================================== -->

<div class="modal fade" id="modal-product" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title"><span class="fa fa-truck"></span> Data Product</h4>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered table-hover" id="TablemyBSS">
                    <thead>
                        <tr>
                            <th>Kode Product</th>
                            <th>Nama Product</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($product as $key => $data) { ?>
                            <tr>
                                <td><?= $data->id_product ?></td>
                                <td><?= $data->nama_product ?></td>
                                <td>
                                    <button class="btn btn-xs btn-info" id="pilih-product" data-id="<?= $data->id_product ?>" data-name="<?= $data->nama_product ?>" data-satuan="<?= $data->nama_satuan ?>" data-harga="<?= $data->harga_jual ?>">
                                        <i class="fa fa-check"></i> Pilih
                                    </button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>

<!-- =============================================== -->

<!-- JUMLAH PRODUCT -->

<script>
    function hitung() {
        var a = document.getElementById('jumlah_po').value;
        var b = document.getElementById('harga_po').value;
        var total = parseInt(a) * parseInt(b);
        if (!isNaN(total)) {
            document.getElementById('total_harga_po').value = total;
        }
    }
</script>