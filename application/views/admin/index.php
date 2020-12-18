<div class="page-wrapper">
    <div class="container-fluid">
        <div class="flash-data" data-type="<?= $this->session->flashdata('type'); ?>" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
        <div class="row">
            <div class="col-sm-3 mb-4">
                <div class="card">
                    <div class="card-body border text-center">
                        <h4 class="text-primary">Penjualan (Hari Ini)</h4>
                        <h6 class="my-1 text-danger"><?= number_format($penjualan['harian']['jumlah'], 0, ',', '.') ?> Transaksi</h6>
                        <h6 class="my-1">Total Pendapatan</h6>
                        <h6 class="my-1 text-success">Rp <?= number_format($penjualan['harian']['total'], 0, ',', '.') ?></h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 mb-4">
                <div class="card">
                    <div class="card-body border text-center">
                        <h4 class="text-primary">Penjualan (Bulan Ini)</h4>
                        <h6 class="my-1 text-danger"><?= number_format($penjualan['bulanan']['jumlah'], 0, ',', '.') ?> Transaksi</h6>
                        <h6 class="my-1">Total Pendapatan</h6>
                        <h6 class="my-1 text-success">Rp <?= number_format($penjualan['bulanan']['total'], 0, ',', '.') ?></h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 mb-4">
                <div class="card">
                    <div class="card-body border text-center">
                        <h4 class="text-primary">Penjualan Keseluruhan</h4>
                        <h6 class="my-1 text-danger"><?= number_format($penjualan['total']['jumlah'], 0, ',', '.') ?> Transaksi</h6>
                        <h6 class="my-1">Total Pendapatan</h6>
                        <h6 class="my-1 text-success">Rp <?= number_format($penjualan['total']['total'], 0, ',', '.') ?></h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 mb-4">
                <div class="card">
                    <div class="card-body border text-center">
                        <h4 class="text-primary">Penjualan Produk</h4>
                        <h6 class="my-1">Hari Ini : <?= number_format($produk['harian']['jumlah'], 0, ',', '.') ?> produk</h6>
                        <h6 class="my-1">Bulan Ini : <?= number_format($produk['bulanan']['jumlah'], 0, ',', '.') ?> produk</h6>
                        <h6 class="my-1">Total : <?= number_format($produk['total']['jumlah'], 0, ',', '.') ?> produk</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-md-flex align-items-center">
                            <h4 class="card-title">Grafik Pendapatan</h4>
                        </div>
                        <div class="ml-auto d-flex no-block align-items-center">
                            <h5 class="card-subtitle"><?= date('F Y') ?></h5>
                        </div>
                    </div>
                    <div class="row">
                        <!-- column -->
                        <div class="col-lg-11 mx-auto">
                            <div class="campaign ct-charts"></div>
                        </div>
                        <!-- column -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->