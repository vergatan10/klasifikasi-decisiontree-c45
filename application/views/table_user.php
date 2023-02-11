<?php if ($this->session->flashdata('info_data')) : ?>
    <script>
        $(document).ready(function() {
            $("#show_modal").modal('show');
        });
    </script>
    <!-- Modal -->
    <div class="modal fade" id="show_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="<?= site_url('user/edit') ?>">
                    <div class="modal-body">
                        <?php foreach ($query2 as $user2) { ?>
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="id" value="<?= $user2->id; ?>" required>
                                <label for="username">Username</label>
                                <input type="text" class="form-control" name="username" value="<?= $user2->username; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" value="<?= $user2->email; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="telp">Telp</label>
                                <input type="tel" class="form-control" name="telp" value="<?= $user2->telp; ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Role</label>
                                <select class="form-control" name="role" required>
                                    <option value="1" <?= ($user2->role == '1' ? 'selected' : '') ?>>Super Admin</option>
                                    <option value="2" <?= ($user2->role == '2' ? 'selected' : '') ?>>Admin</option>
                                    <option value="3" <?= ($user2->role == '3' ? 'selected' : '') ?>>User</option>
                                </select>
                            </div>
                    </div>
                <?php } ?>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    <button type="submit" name="edit" class="btn btn-primary">Edit</button>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php endif; ?>


<!-- Modal -->
<div class="modal fade" id="add_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Add User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="<?= site_url('user/add') ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="text" class="form-control" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="telp">Telp</label>
                        <input type="tel" class="form-control" name="telp" required>
                    </div>
                    <div class="form-group">
                        <label>Role</label>
                        <select class="form-control" name="role" value="" required>
                            <option value="">- Pilih -</option>
                            <option value="1">Super Admin</option>
                            <option value="2">Admin</option>
                            <option value="3">User</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    <button type="submit" name="tambah" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php if ($this->session->flashdata('flash_user')) : ?>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash_user'); ?>">
        <script>
            Swal.fire(
                '<?= $this->session->flashdata('keterangan'); ?>',
                '<?= $this->session->flashdata('flash_user'); ?>',
                '<?= $this->session->flashdata('info'); ?>'
            )
        </script>
    </div>
<?php endif; ?>


<section class="section">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Table Users</h4>
                    <button type="button" class="btn btn-primary mr-1" data-toggle="modal" data-target="#add_user"><i class="fas fa-plus"></i> Add
                        User</button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Telp</th>
                                    <th>Role</th>
                                    <th>Created at</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($row->result() as $user) {
                                ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td><?= $user->username ?></td>
                                        <td><?= $user->email ?></td>
                                        <td><?= $user->telp ?></td>
                                        <td><?= $user->role_name ?></td>
                                        <td><?= $user->created_at ?></td>
                                        <td>
                                            <a href="<?= site_url() ?>user/show_edit/<?= $user->id ?>" class="btn btn-primary mr-1"><i class="fas fa-pencil-alt"></i></a>
                                            <?php if ($user->id != $this->fungsi->user_login()->id) { ?>
                                                <a href="<?= site_url() ?>user/del/<?= $user->id ?>" class="btn btn-danger btn-action"><i class="fas fa-trash"></i></a>
                                            <?php } ?>

                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>