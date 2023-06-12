   <!-- beranda -->
   <section id="beranda">
       <div class="container">
           <div class="row">
               <div class="col">
                   <h2 class="text-center">Device log track</h2>
               </div>
           </div>
           <div class="row mt-4">
               <div class="col-lg-12 mb-lg-0 mb-4">
                   <?php if (validation_errors()) : ?>
                       <?= validation_errors('<div class="mb-4 p-3 text-white bg-danger border border-primary-subtle rounded-3" role="alert">', '</div>'); ?>
                   <?php endif; ?>
                   <?= $this->session->flashdata('message'); ?>
                   <h4>Info device</h4><br>
                   <div class="card">
                       <div class="card-body p-3">
                           <div class="row">
                               <div class="d-flex flex-column h-100">
                                   <ul class="list-group list-group-flush mt-2">
                                       <li class="list-group-item">Device Name &ensp;&ensp;&ensp;: &ensp;<?= $user['deviceName'] ?></li>
                                       <li class="list-group-item">Last data track &ensp; :</li>
                                       <li class="list-group-item">Latitude &ensp;&ensp;&ensp;&ensp;&nbsp;&ensp;&ensp;&ensp;:&ensp; <span id="lat"></span></li>
                                       <li class="list-group-item">Longitude &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;: &ensp;<span id="long"></span></li>
                                   </ul>
                                   <br>
                                   <div class="col-lg-6 mx-3 mb-2" id="map"></div>
                                   <div class="col-md-4 mx-3 mt-4">
                                       <a href="<?= base_url(''); ?>" class="btn btn-outline-primary">Kembali</a>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </section>
   <!-- end beranda -->