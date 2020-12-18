<!-- ============================================================== -->
<!-- footer -->
<!-- ============================================================== -->
<footer class="footer text-center">
    All Rights Reserved by Xtreme Admin. Designed and Developed by <a href="https://wrappixel.com">WrapPixel</a>.
</footer>
<!-- ============================================================== -->
<!-- End footer -->
<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
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
<!--This page JavaScript -->
<!--chartis chart-->
<script src="<?= base_url() ?>assets/admin/libs/chartist/dist/chartist.min.js"></script>
<script src="<?= base_url() ?>assets/admin/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.21/datatables.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>

<script src="<?= base_url() ?>assets/admin/dist/js/sweetalert2.all.min.js"></script>
<script src="<?= base_url() ?>assets/admin/dist/js/myswal.js"></script>
<script src="<?= base_url() ?>assets/admin/dist/js/custom.js"></script>
<script>
    $(document).ready(function() {
        $('#product').DataTable({
            "dom": 'ifrt',
            "paging": false
        });
    });

    function refresh() {
        document.getElementById("input").submit();
    }

    $(document).ready(function() {
        var numFormat = $.fn.dataTable.render.number('\.', ',', 0).display;
        $('#laporan').DataTable({
            "language": {
                "thousands": "."
            },
            "footerCallback": function(row, data, start, end, display) {
                var api = this.api(),
                    data;

                // Remove the formatting to get integer data for summation
                var intVal = function(i) {
                    return typeof i === 'string' ?
                        i.replace(/[\$.]/g, '') * 1 :
                        typeof i === 'number' ?
                        i : 0;
                };

                // Total over all pages
                total = api
                    .column(6)
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                // Total over this page
                pageTotal = api
                    .column(6, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                // Update footer
                $(api.column(6).footer()).html(
                    'Total : Rp ' + numFormat(total)
                );
            },
            dom: 'Bfrtip',
            buttons: ['excel', 'pdf', {
                extend: 'print',
                footer: true,
                text: 'Print',
                customize: function(win) {
                    $(win.document.body)
                        .css('font-size', '10pt');

                    $(win.document.body).find('table')
                        .addClass('compact')
                        .css('font-size', 'inherit');
                }
            }]
        });
    });

    $(function() {
        $('.addProductModal').on('click', function() {
            $('#productModalLabel').html('Tambah Produk');
            $('#name_product').val('');
            $('#information').val('');
            $('#price').val('');
            $('#stock').val('');
            $('#image').val('');
        });

        $('.editProductModal').on('click', function() {
            $('#productModalLabel').html('Edit Produk');
            $('.modal-body form').attr('action', '<?= base_url() . "backend/product/update" ?>');

            const id = $(this).data('id');

            $.ajax({
                url: '<?= base_url() . "backend/product/detail" ?>',
                data: {
                    id: id
                },
                method: 'post',
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    $('#id').val(data.id_product);
                    $('#name_product').val(data.name_product);
                    $('#information').val(data.information);
                    $('#category').html(data.category);
                    $('#price').val(data.price);
                    $('#stock').val(data.stock);
                    $('#output').attr('src', '<?= base_url() . "/assets/images/uploads/" ?>' + data.image);
                    $('#image').var(data.image);
                }
            });
        });

        $('.updateStockModal').on('click', function() {
            const id = $(this).data('id');
            $.ajax({
                url: '<?= base_url() . "backend/product/detail" ?>',
                data: {
                    id: id
                },
                method: 'post',
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    $('#id_product').val(data.id_product);
                }
            });
        });

    });

    $(function() {
        $('.addUserModal').on('click', function() {
            $('#userModalLabel').html('Tambah User');
            $('#nama').val('');
            $('#username').val('');
            $('#password').val('');
        });

        $('.editUserModal').on('click', function() {
            $('#userModalLabel').html('Edit User');
            $('.modal-body form').attr('action', '<?= base_url() . "backend/user/update" ?>');

            const id = $(this).data('id');

            $.ajax({
                url: '<?= base_url() . "backend/user/detail" ?>',
                data: {
                    id: id
                },
                method: 'post',
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    $('#id').val(data.id_user);
                    $('#nama').val(data.nama);
                    $('#username').val(data.username);
                    $('#password').val(data.password);
                    if (data.role == 2) {
                        var role = 'Kasir';
                    } else {
                        var role = 'Admin'
                    }
                    $('#role').html(role);
                    $('#role').val(data.role);
                }
            });
        });
    });
</script>

<script>
    $(function() {
        "use strict";

        var numFormat = $.fn.dataTable.render.number('\.', ',', 0).display;
        var chart = new Chartist.Line('.campaign', {
            labels: [<?php foreach ($tanggal as $t) {
                            echo "'$t',";
                        } ?>],
            series: [
                [<?php foreach ($total as $t) {
                        echo "'$t',";
                    } ?>]
            ]
        }, {
            low: 0,
            high: 1000000,

            showArea: true,
            fullWidth: false,
            plugins: [
                Chartist.plugins.tooltip()
            ],
            axisY: {
                onlyInteger: true,
                scaleMinSpace: 20,
                offset: 100,
                labelInterpolationFnc: function(value) {
                    return (value / 1);
                }
            },

        });

        chart.on('draw', function(ctx) {
            if (ctx.type === 'area') {
                ctx.element.attr({
                    x1: ctx.x1 + 0.001
                });
            }
        });

        chart.on('created', function(ctx) {
            var defs = ctx.svg.elem('defs');
            defs.elem('linearGradient', {
                id: 'gradient',
                x1: 0,
                y1: 1,
                x2: 0,
                y2: 0
            }).elem('stop', {
                offset: 0,
                'stop-color': 'rgba(255, 255, 255, 1)'
            }).parent().elem('stop', {
                offset: 1,
                'stop-color': 'rgba(64, 196, 255, 1)'
            });
        });

        var chart = [chart];
    });
</script>
</body>

</html>