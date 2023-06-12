   <!-- beranda -->
   <section id="beranda">
       <div class="container">
           <div class="row">
               <div class="col">
                   <h2 class="text-center">Monitoring Device</h2>
               </div>
           </div>
           <div class="row mt-4">
               <div class="col-lg-12 mb-lg-0 mb-4">
                   <?php if (validation_errors()) : ?>
                       <?= validation_errors('<div class="mb-4 p-3 text-white bg-danger border border-primary-subtle rounded-3" role="alert">', '</div>'); ?>
                   <?php endif; ?>
                   <?= $this->session->flashdata('message'); ?>
                   <h4>Device active</h4><br>
                   <?php if ($deviceuser == null) : ?>
                       <div class="p-3 text-white bg-danger border border-primary-subtle rounded-3" role="alert">
                           Tidak ada device aktif
                       </div>
                   <?php else : ?>
                       <div class="card">
                           <div class="table-responsive">
                               <table class="table align-items-center mb-0">
                                   <thead>
                                       <tr>
                                           <th class="text-uppercase text-secondary mb-2 mt-2 ">#
                                           </th>
                                           <th class="text-uppercase text-secondary mb-2 mt-2 ">
                                               User Name</th>
                                           <th class="text-uppercase text-secondary mb-2 mt-2">
                                               Device Name</th>
                                       </tr>
                                   </thead>
                                   <tbody>
                                       <?php $i = 1; ?>
                                       <?php foreach ($deviceuser as $m) : ?>
                                           <tr>
                                               <td class="align-middle">
                                                   <p class="text-xs ms-3 font-weight-bold mb-2 mt-3"><?= $i ?></p>
                                               </td>
                                               <td>
                                                   <p class="text-xs font-weight-bold mb-2 mt-3"><?= $m['name']; ?></p>
                                               </td>
                                               <td>
                                                   <p class="text-xs font-weight-bold mb-2 mt-3"><?= $m['deviceName']; ?></p>
                                               </td>
                                               <td class="align-middle">
                                                   <a href="<?= base_url('') ?>home/getinfo/<?= $m['id'] ?>" class="btn btn-outline-success mb-2 mt-2">
                                                       Info track
                                                   </a>
                                                   <a href="<?= base_url('') ?>home/getlog/<?= $m['id'] ?>" class="btn btn-outline-info mb-2 mt-2">
                                                       Log track
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
       </div>
   </section>
   <!-- end beranda -->