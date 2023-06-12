<div class="container-fluid py-4">
    <div class="row mt-4">
        <div class="col-lg-8 mb-lg-0 mb-4">
            <?php if (validation_errors()) : ?>
                <?= validation_errors('<div class="mb-4 alert alert-danger" role="alert">', '</div>'); ?>
            <?php endif; ?>
            <?= $this->session->flashdata('message'); ?>
            <h4>Add device to user</h4><br>
            <?php if ($device == null) : ?>
                <div class="mb-4 alert alert-danger text-white" role="alert">
                    Data not found!
                </div>
            <?php else : ?>
                <div class="card">
                    <div class="table-responsive">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Device Name</th>
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
                                        <td class="align-middle">
                                            <a href="<?= base_url('') ?>user/inputdevice/<?= $m['id'] ?>" class="btn btn-outline-success" data-bs-toggle="modal-delete" data-bs-target="#modal-delete" onclick="return confirm('yakin?');">
                                                Input this device
                                            </a>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>