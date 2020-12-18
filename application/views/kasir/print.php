<!DOCTYPE html>
<html>

<link href="<?= base_url() ?>assets/admin/dist/css/style.min.css" rel="stylesheet">

<style type="text/css">
    body {
        font-family: courier;
    }
</style>

<head>
    <title><?= $title ?></title>
</head>

<body class="p-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-6">
                <div class="text-center">
                    <h5>
                        <p><?= $title ?></p>
                    </h5>
                    <p>Jl. Pemuda No.29, Kutorejo, Jetis, Kec. Sukoharjo, Kabupaten Sukoharjo, Jawa Tengah</p>
                </div>
                <div class="d-flex justify-content-between">
                    <p><?= $transaksi['tanggal'] ?>/<?= $transaksi['id_transaksi'] ?></p>
                    <p><?= $transaksi['id_user'] ?>/<?= $transaksi['nama'] ?></p>
                </div>
                <div class="table-responsive">
                    <table class="table table-borderless">
                        <tr class="text-center">
                            <th colspan="2">Nama Produk</th>
                            <th>Qty</th>
                            <th>Harga</th>
                            <th>Subtotal</th>
                        </tr>
                        <?php foreach ($detail_transaksi as $detail) : ?>
                            <tr>
                                <td align="right"><?= $detail->id_product; ?></td>
                                <td><?= $detail->name_product; ?></td>
                                <td align="center"><?= $detail->qty; ?></td>
                                <td align="right">@<?= number_format($detail->price, 0, ',', '.'); ?></td>
                                <td align="right"><?= number_format($detail->subtotal, 0, ',', '.'); ?></td>
                            </tr>
                        <?php endforeach; ?>
                        <tr class="table-bordered-top">
                            <td colspan="4" align="right">
                                <h5>Total</h5>
                            </td>
                            <td align="right">
                                <h6>
                                    <?= number_format($transaksi['total'], 0, ',', '.') ?>
                                </h6>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="text-center">
                    <i>Terimakasih telah berbelanja</i>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
<script>
    window.print();
    window.location.href = "<?= base_url('kasir') ?>";
</script>
<script>
    Sub Print()
    OLECMDID_PRINT = 6
    OLECMDEXECOPT_DONTPROMPTUSER = 2
    OLECMDEXECOPT_PROMPTUSER = 1
    call WB.ExecWB(OLECMDID_PRINT, OLECMDEXECOPT_DONTPROMPTUSER, 1)
    End Sub
    document.write "<object ID='WB' WIDTH=0 HEIGHT=0 CLASSID='CLSID:8856F961-340A-11D0-A96B-00C04FD705A2'></object>"
</script>