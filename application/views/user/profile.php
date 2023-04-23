<div class="container-fluid py-4">
    <div class="row mt-4">
        <div class="col-lg-7 mb-lg-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="d-flex flex-column h-100">
                                <p class="mt-6  pt-2 text-bold"></p>
                                <h5 class="ms-4 font-weight-bolder"><?= $user['name']; ?></h5>
                                <p class="ms-4 mt-3"><?= $user['email']; ?></p>
                                <p class="ms-4">Member since <?= date('d F Y', $user['date_create']); ?></p>
                            </div>
                        </div>
                        <div class="col-lg-5 ms-auto text-center mt-5 mt-lg-0">
                            <img src="<?= base_url('assets/'); ?>img/shapes/waves-white.svg" class="position-absolute h-100 w-50 top-0 d-lg-block d-none" alt="waves">
                            <div class="position-relative d-flex align-items-center justify-content-center h-100">
                                <img class="w-100 position-relative z-index-2 pt-4" src="<?= base_url('assets/img/profile/'); ?><?= $user['image']; ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>