<div class="page-wrapper">
    <div class="container-fluid">
        <div class="flash-data" data-type="<?= $this->session->flashdata('type'); ?>" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Produk</h3>
                        <hr>
                        <form action="<?= base_url('admin/produk') ?>" method="POST" id="input">
                            <table width="100%">
                                <tr>
                                    <td width="80%"><a class="btn btn-success" data-toggle="modal" data-target="#productModal" href=""><i class="fa fa-plus addProductModal"></i> Tambah Produk</a></td>
                                    <td align="right">Tampilkan: </td>
                                    <td>
                                        <div class="input-group">
                                            <select class="form-control" name="category" onchange="refresh()">
                                                <option hidden>Pilih kategori</option>
                                                <option value="">Semua</option>
                                                <?php foreach ($category as $c) : ?>
                                                    <option value="<?= $c->category ?>"><?= $c->category ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                            </table>

                        </form>
                        <div class="table-responsive p-t-10">
                            <table id="product" class="table display">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col" class="text-center">No</th>
                                        <th scope="col" class="text-center">Gambar</th>
                                        <th scope="col">Nama Produk</th>
                                        <th scope="col">Informasi</th>
                                        <th scope="col" class="text-center">Harga</th>
                                        <th scope="col" class="text-center">Stok</th>
                                        <th scope="col" class="text-center">Kelola</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($product as $p) : ?>
                                        <tr>
                                            <td class="text-center"><?= $i; ?></td>
                                            <td class="text-center"><img src="<?= base_url() . '/assets/images/uploads/' . $p->image ?>" class="img-fluid" style="width:100px; height:100px;" alt="No Image"></td>
                                            <td><?= $p->name_product ?></td>
                                            <td><?= $p->information ?></td>
                                            <td class="text-center">Rp. <?= number_format($p->price, 0, ',', '.') ?></td>
                                            <td class="text-center"><label class="text-danger"><?= $p->stock ?></label></td>
                                            <td class="text-center">
                                                <a href="" class="btn btn-sm btn-success m-1 updateStockModal" data-toggle="modal" data-target="#stockModal" data-id="<?= $p->id_product ?>">Tambah Stok</a><br>
                                                <a href="" class="btn btn-sm btn-warning m-1 editProductModal" data-toggle="modal" data-target="#productModal" data-id="<?= $p->id_product ?>"><i class=" fa fa-edit"></i></a>
                                                <a href="<?= base_url('backend/product/hapus/') . $p->id_product ?>" class="btn btn-sm btn-danger m-1 delete"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="productModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="productModalLabel">Tambah Produk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url() . 'backend/product/tambah_aksi'; ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <label>Nama Barang</label>
                            <input type="text" name="name_product" id="name_product" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Keterangan</label>
                            <input type="text" name="information" id="information" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Kategori</label>
                            <select class="form-control" name="category">
                                <?php foreach ($category as $c) : ?>
                                    <option id="category" value="<?= $c->category ?>"><?= $c->category ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Harga</label>
                            <input type="text" name="price" id="price" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Stok</label>
                            <input type="text" name="stock" id="stock" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Gambar</label><br>
                            <img id="output" src="" class="img-fluid" style="width:100px; height:100px;" alt="No Image">
                            <input id="image" type="file" name="image">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="stockModal" tabindex="-1" role="dialog" aria-labelledby="stockModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="stockModalLabel">Tambah Stok</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url() . 'backend/product/updatestock'; ?>" method="post">
                        <div class="form-group">
                            <label>Masukkan tambahan stok</label>
                            <input type="hidden" name="id_product" id="id_product">
                            <input type="text" name="stock" id="stock" class="form-control">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>