<div class="container-fluid py-4">
    <div class="row mt-4">
        <div class="col-lg-8 mb-lg-0 mb-4">
            <?php if (validation_errors()) : ?>
                <?= validation_errors('<div class="mb-4 alert alert-danger" role="alert">', '</div>'); ?>
            <?php endif; ?>
            <?= $this->session->flashdata('message'); ?>
            <h4>Info device</h4><br>
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="d-flex flex-column h-100">
                            <ul class="list-group list-group-flush mt-2">
                                <li class="list-group-item">Device Name : <?= $user['deviceName'] ?></li>
                                <li class="list-group-item">Latitude &ensp;&ensp;&ensp;&ensp;&nbsp;: <span id="lat"></span></li>
                                <li class="list-group-item">Longitude &ensp;&ensp;&ensp;: <span id="long"></span></li>
                            </ul>
                            <br>
                            <div id="pesan"></div>
                            <div class="col-lg-6 mx-3 mb-2" id="map"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>