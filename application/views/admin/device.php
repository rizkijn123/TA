<div class="container-fluid py-4">
    <div class="row mt-4">
        <div class="col-lg-8 mb-lg-0 mb-4">
            <?php if (validation_errors()) : ?>
                <?= validation_errors('<div class="mb-4 alert alert-danger text-white" role="alert">', '</div>'); ?>
            <?php endif; ?>
            <?= $this->session->flashdata('message'); ?>
            <a href="" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#addmodal">Add new menu</a>
            <div class="card">
                <div class="table-responsive">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Device Name</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Active</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($device as $m) : ?>
                                <tr>
                                    <td class="align-middle">
                                        <p class="text-xs ms-3 font-weight-bold mb-0"><?= $i ?></p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0"><?= $m['device_name']; ?></p>
                                    </td>
                                    <td>
                                        <?php if ($m['is_active'] == 0) : ?>
                                            <span class="badge bg-danger">Has been used</span>
                                        <?php else : ?>
                                            <span class="badge bg-success">Can be used</span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="align-middle">
                                        <a href="<?= base_url('') ?>admin/activate/<?= $m['id'] ?>" class="btn btn-outline-success" data-bs-toggle="modal-delete" data-bs-target="#modal-delete" onclick="return confirm('yakin?');">
                                            Activate
                                        </a>
                                        <a href="<?= base_url('') ?>admin/nonactivate/<?= $m['id'] ?>" class="btn btn-outline-info" data-bs-toggle="modal-delete" data-bs-target="#modal-delete" onclick="return confirm('yakin?');">
                                            Nonactivate
                                        </a>
                                        <a href="<?= base_url('') ?>admin/deletedevice/<?= $m['id'] ?>" class="btn btn-outline-danger" data-bs-toggle="modal-delete" data-bs-target="#modal-delete" onclick="return confirm('yakin?');">
                                            Delete
                                        </a>
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

    <!-- Modal -->
    <div class="modal fade" id="addmodal" tabindex="-1" role="dialog" aria-labelledby="addmodal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addmodal">Add Device </h5>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?= base_url('admin/device'); ?>">
                        <div class="form-group">
                            <label for="device_name" class="col-form-label">Device Name</label>
                            <input type="text" class="form-control" value="" id="device_name" name="device_name">
                        </div>
                        <div class="form-group">
                            <label for="api" class="col-form-label">API Device</label>
                            <input type="text" class="form-control" value="" id="api" name="api">
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="is_active" value="1" id="fcustomCheck1" checked>
                            <label class="custom-control-label" for="customCheck1">Active?</label>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-success">Add Device</button>
                </div>
                </form>
            </div>
        </div>
    </div>