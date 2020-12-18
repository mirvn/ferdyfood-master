<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="p-15 m-t-10"><a href="<?= base_url('kasir') ?>" class="btn btn-block create-btn text-white no-block d-flex align-items-center"><i class="fa fa-plus-square"></i> <span class="hide-menu m-l-5">Kasir</span> </a></li>
                <!-- User Profile-->
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= base_url('admin') ?>" aria-expanded="false"><i class="fa fa-home"></i><span class="hide-menu">Dashboard</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= base_url('admin/produk') ?>" aria-expanded="false"><i class="fa fa-th"></i><span class="hide-menu">Produk</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= base_url('admin/laporan') ?>" aria-expanded="false"><i class="fa fa-file-alt"></i><span class="hide-menu">Laporan</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= base_url('admin/user') ?>" aria-expanded="false"><i class="mdi mdi-face"></i><span class="hide-menu">User</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= base_url('admin/pemesanan') ?>" aria-expanded="false"><i class="mdi mdi-face"></i><span class="hide-menu">Pemesanan</span></a></li>
            </ul>

        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->