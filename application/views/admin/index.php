<div class="container-fluid py-4">
    <div class="row mt-4">
        <div class="col-lg-8 mb-lg-0 mb-4">
            <?php if (validation_errors()) : ?>
                <?= validation_errors('<div class="mb-4 alert alert-danger" role="alert">', '</div>'); ?>
            <?php endif; ?>
            <?= $this->session->flashdata('message'); ?>
            <h4>User device info</h4><br>
            <div class="card">
                <div class="table-responsive">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    User Name</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Device Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($deviceuser as $m) : ?>
                                <tr>
                                    <td class="align-middle">
                                        <p class="text-xs ms-3 font-weight-bold mb-0"><?= $i ?></p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0"><?= $m['name']; ?></p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0"><?= $m['deviceName']; ?></p>
                                    </td>
                                    <?php if ($m['deviceName'] == '-' and $m['api_device'] == '-') : ?>
                                    <?php else : ?>
                                        <td class="align-middle">
                                            <a href="<?= base_url('') ?>user/getinfo/<?= $m['id'] ?>" class="btn btn-outline-success" data-bs-toggle="modal-delete" data-bs-target="#modal-delete" onclick="return confirm('yakin?');">
                                                Info track
                                            </a>
                                            <a href="<?= base_url('') ?>user/getlog/<?= $m['id'] ?>" class="btn btn-outline-info" data-bs-toggle="modal-delete" data-bs-target="#modal-delete" onclick="return confirm('yakin?');">
                                                Log track
                                            </a>
                                            <a href="<?= base_url('') ?>admin/deleteuserdevice/<?= $m['id'] ?>" class="btn btn-outline-danger" data-bs-toggle="modal-delete" data-bs-target="#modal-delete" onclick="return confirm('yakin?');">
                                                Delete device user
                                            </a>
                                        </td>
                                    <?php endif; ?>
                                </tr>

                                <?php $i++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>