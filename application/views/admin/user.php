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
                                    <td width="80%"><a class="btn btn-success" data-toggle="modal" data-target="#userModal" href=""><i class="fa fa-plus addUserModal"></i> Tambah User</a></td>
                                </tr>
                            </table>

                        </form>
                        <div class="table-responsive p-t-10">
                            <table id="product" class="table display">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col" class="text-center" width="10vw">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Username</th>
                                        <th scope="col">Password</th>
                                        <th scope="col">Role</th>
                                        <th scope="col" class="text-center">Kelola</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($user as $u) : ?>
                                        <tr>
                                            <td class="text-center"><?= $i; ?></td>
                                            <td><?= $u->nama ?></td>
                                            <td><?= $u->username ?></td>
                                            <td><?= $u->password ?></td>
                                            <td><?php if ($u->role == 2) {
                                                    echo 'Kasir';
                                                } else {
                                                    echo 'Admin';
                                                } ?></td>
                                            <td class="text-center">
                                                <a href="" class="btn btn-sm btn-warning m-1 editUserModal" data-toggle="modal" data-target="#userModal" data-id="<?= $u->id_user ?>"><i class=" fa fa-edit"></i></a>
                                                <a href="<?= base_url('backend/user/hapus/') . $u->id_user ?>" class="btn btn-sm btn-danger m-1"><i class="fa fa-trash"></i></a>
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
    <div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="userModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="userModalLabel">Tambah User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url() . 'backend/user/tambah_aksi'; ?>" method="post">
                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" id="username" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Role</label>
                            <select class="form-control" name="role">
                                <option id="role" value="" hidden>Pilih role</option>
                                <option value="1">Admin</option>
                                <option value="2">Kasir</option>
                            </select>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>