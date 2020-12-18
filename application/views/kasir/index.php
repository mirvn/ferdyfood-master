<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>assets/admin/images/favicon.png">
    <title><?= $title ?></title>
    <!-- Custom CSS -->
    <link href="<?= base_url() ?>assets/admin/libs/chartist/dist/chartist.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?= base_url() ?>assets/admin/dist/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
    <!-- ============================================================== -->
    <!-- Topbar header - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <header class="topbar" data-navbarbg="skin5">
        <nav class="navbar top-navbar navbar-expand-md navbar-dark">
            <div class="navbar-header" data-logobg="skin5">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <a class="navbar-brand" href="index.html">
                    <span class="logo-text m-l-10">
                        Ferdy Frozen Food
                    </span>
                </a>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <!-- This is for the sidebar toggle which is visible on mobile only -->
                <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
            </div>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                <!-- ============================================================== -->
                <!-- toggle and nav items -->
                <!-- ============================================================== -->
                <ul class="navbar-nav float-left mr-auto">
                </ul>
                <!-- ============================================================== -->
                <!-- Right side toggle and nav items -->
                <!-- ============================================================== -->
                <ul class="navbar-nav float-right">
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <?php if ($this->session->userdata('id') == 1) : ?>
                        <a class="btn btn-warning mx-1" href="<?= base_url('admin') ?>"><i class="fa fa-home"></i></a>
                    <?php endif ?>
                    <a class="btn btn-danger mx-1" href="<?= base_url('auth/logout') ?>"><i class="fa fa-power-off"></i></a>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                </ul>
            </div>
        </nav>
    </header>
    <!-- ============================================================== -->
    <!-- End Topbar header -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Recent comment and chats -->
        <!-- ============================================================== -->
        <div class="row p-t-10">
            <div class="col-lg-7">
                <div class="card bg-light border">
                    <div class="card-body">
                        <h3 class="card-title text-center">Produk</h3>
                        <hr>
                        <form action="">
                            <div class="form-group">
                                <input type="text" class="form-control" id="search" placeholder="Cari barang">
                            </div>
                        </form>
                        <div class="row" id="produk" style="max-height: 70vh; overflow-y: auto;">
                            <?php foreach ($product as $p) : ?>
                                <div class="card col-sm-3 bg-light">
                                    <div class="card-body d-flex flex-column border bg-white">
                                        <ul class="list-unstyled text-center">
                                            <li><img src="<?= base_url() . '/assets/images/uploads/' . $p->image ?>" class="img-fluid" style="width:100px; height:100px;"></li>
                                            <li class="mt-1">
                                                <h5><?= $p->name_product ?></h5>
                                            </li>
                                            <li class="text-muted"><i><?= $p->information ?></i></li>
                                        </ul>
                                        <h6 class="mt-auto text-center text-danger">Rp. <?= number_format($p->price, 0, ',', '.') ?></h6>
                                        <button type="button" name="add_cart" class="btn btn-success add_cart" data-id="<?= $p->id_product ?>" data-nama="<?= $p->name_product ?>" data-price="<?= $p->price ?>"><i class="fa fa-plus"></i></button>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- column -->
            <div class="col-lg-3">
                <div class="card bg-light border">
                    <div class="card-body">
                        <h3 class="card-title text-center">Check Out</h3>
                        <hr>
                        <div id="checkout">
                            <h4 class="text-center text-muted">Kosong</h4>
                        </div>
                    </div>

                </div>
            </div>
            <!-- column -->
            <!-- column -->
            <div class="col-lg-2">
                <div class="card bg-light border">
                    <div class="card-body">
                        <h3 class="card-title text-center">Pemesanan</h3>
                        <hr>
                        <div id="checkout">
                            <h4 class="text-center text-muted">Kosong</h4>
                        </div>
                    </div>

                </div>
            </div>
            <!-- column -->
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Recent comment and chats -->
    <!-- ============================================================== -->
</div>


<script src="<?= base_url() ?>assets/admin/libs/jquery/dist/jquery.min.js"></script>

<!-- Bootstrap tether Core JavaScript -->
<script src="<?= base_url() ?>assets/admin/libs/popper.js/dist/umd/popper.min.js"></script>
<script src="<?= base_url() ?>assets/admin/libs/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets/admin/dist/js/app-style-switcher.js"></script>
<!--Wave Effects -->
<script src="<?= base_url() ?>assets/admin/dist/js/waves.js"></script>
<!--Menu sidebar -->
<script src="<?= base_url() ?>assets/admin/dist/js/sidebarmenu.js"></script>
<!--Custom JavaScript -->
<script src="<?= base_url() ?>assets/admin/dist/js/custom.js"></script>
<!--This page JavaScript -->
<!--chartis chart-->
<script src="<?= base_url() ?>assets/admin/libs/chartist/dist/chartist.min.js"></script>
<script src="<?= base_url() ?>assets/admin/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
<script src="<?= base_url() ?>assets/admin/dist/js/pages/dashboards/dashboard1.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.21/sc-2.0.2/sl-1.3.1/datatables.min.css" />

<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.21/sc-2.0.2/sl-1.3.1/datatables.min.js"></script>


<script>
    $(document).ready(function() {
        $("#search").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#produk .card").filter(function() {
                $(this).toggle($(this).find('h5').text().toLowerCase().indexOf(value) > -1)
            });
        });

        $('.add_cart').click(function() {
            var id = $(this).data("id");
            var nama = $(this).data("nama");
            var price = $(this).data("price");
            var qty = 1;
            if (qty != '' && qty > 0) {
                $.ajax({
                    url: "<?= base_url(); ?>kasir/add",
                    method: "POST",
                    data: {
                        id: id,
                        nama: nama,
                        price: price,
                        qty: qty
                    },
                    success: function(data) {
                        $('#checkout').html(data);
                    }
                });
            }
        });
        $('#checkout').load("<?= base_url(); ?>kasir/load");

        $(document).on('click', '.remove', function() {
            var row_id = $(this).attr("id");
            $.ajax({
                url: "<?= base_url(); ?>kasir/remove",
                method: "POST",
                data: {
                    row_id: row_id
                },
                success: function(data) {
                    $('#checkout').html(data);
                }
            })
        })

        $(document).on('click', '.up', function() {
            var row_id = $(this).attr("id");
            var qty = $(this).data("qty");
            $.ajax({
                url: "<?= base_url(); ?>kasir/up",
                method: "POST",
                data: {
                    row_id: row_id,
                    qty: qty
                },
                success: function(data) {
                    $('#checkout').html(data);
                }
            })
        })

        $(document).on('click', '.down', function() {
            var row_id = $(this).attr("id");
            var qty = $(this).data("qty");
            $.ajax({
                url: "<?= base_url(); ?>kasir/down",
                method: "POST",
                data: {
                    row_id: row_id,
                    qty: qty
                },
                success: function(data) {
                    $('#checkout').html(data);
                }
            })
        })
    });

    function count() {
        var bayar = document.getElementById("bayar").value;
        var total = document.getElementById("total").value;
        var kembali = document.getElementById("kembali");
        kembali.value = bayar - total;
    }

    function insert() {
        if (event.key === 'Enter') {
            window.location = "<?= base_url('kasir/insert'); ?>";
        }
    }
</script>

</body>

</html>