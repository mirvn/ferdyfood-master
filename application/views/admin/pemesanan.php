<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Laporan Penjualan</h3>
                        <hr>
                        <div class="form-group">
                            <label for="">Masukkan rentang tanggal transaksi yang akan ditampilkan</label>

                            <table class="table-responsive">
                                <tr>
                                    <form action="<?= base_url('admin/laporan?type=date') ?>" method="POST">
                                        <td class="pr-2"><input type="date" class="form-control" name="from" value="<?php if ($from != null) {
                                                                                                                        echo $from;
                                                                                                                    } else {
                                                                                                                        echo date("Y-m-d");
                                                                                                                    }  ?>"></td>
                                        <td class="pr-2">-</td>
                                        <td class="pr-2"><input type="date" class="form-control" name="to" value="<?php if ($from != null) {
                                                                                                                        echo $to;
                                                                                                                    } else {
                                                                                                                        echo date("Y-m-d");
                                                                                                                    }  ?>"></td>
                                        <td class="pr-2"><button type="submit" class="btn btn-success">Tampilkan</button></td>
                                        <td class="pr-2"><a href="<?= base_url('admin/laporan') ?>" class="btn btn-danger float-right">Reset</a></td>
                                    </form>
                                </tr>
                            </table>
                        </div>
                        <div class="table-responsive">
                            <table class="table display" id="laporan">
                                <thead class="thead-light">
                                    <tr>
                                        <th width="10vw" class="text-center">ID</th>
                                        <th class="text-center">Tanggal</th>
                                        <th class="text-center">Kasir</th>
                                        <th class="text-center">Produk</th>
                                        <th class="text-center">Harga</th>
                                        <th width="10vw" class="text-center">Qty</th>
                                        <th width="150vw" class="text-center">Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($transaksi as $t) : ?>
                                        <tr>
                                            <td><?= $t->id_transaksi ?></td>
                                            <td><?= $t->tanggal ?></td>
                                            <td><?= $t->nama ?></td>
                                            <td><?= $t->id_product ?> - <?= $t->name_product ?></td>
                                            <td align="center"><?= number_format($t->price, 0, ',', '.') ?></td>
                                            <td align="right"><?= $t->qty ?></td>
                                            <td align="right"><?= number_format($t->subtotal, 0, ',', '.') ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr class="text-right">
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>