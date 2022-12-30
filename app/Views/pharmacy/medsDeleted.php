          <!-- Page Heading -->
          <?php
            $session = \Config\Services::session();
            $session->getFlashdata('medDelete');
            if ($session->getFlashdata('medDelete')) {
            ?>
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Deleted !</strong><?php echo  $session->getFlashdata('medDelete'); ?>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
          <?php } ?>
          <?php
            $session->getFlashdata('MedsUpdate');
            if ($session->getFlashdata('MedsUpdate')) {
            ?>
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Updated !</strong> <?php echo  $session->getFlashdata('MedsUpdate'); ?>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
          <?php } ?>
          <?php
            $session->getFlashdata('medActivated');
            if ($session->getFlashdata('medActivated')) {
            ?>
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Activated !</strong> <?php echo  $session->getFlashdata('medActivated'); ?>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
          <?php } ?>
          <div class="row">
              <h1 class="h3 mb-2 text-gray-800">Deleted Medicine</h1>
              <div class="container text-right">

                  <a class="btn btn-success" href="<?= base_url('medicine') ?>" >All Medicine</a>

              </div>
          </div>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
              <div class="card-body">
                  <div class="table-responsive">
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                          <thead>
                              <tr>
                                  <th>ID</th>
                                  <th>Barcode</th>
                                  <th>Name</th>
                                  <th>Generic</th>
                                  <th>Price</th>
                                  <th>Stock</th>
                                  <th>Action</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php if (!empty($meds) && is_array($meds)) :
                                    foreach ($meds as $unite) : ?>

                                      <tr>
                                          <td><?= esc($unite['medicine_id']); ?> </td>
                                          <td><?= esc($unite['barcode']); ?> </td>
                                          <td><?= esc($unite['med_name']); ?> </td>
                                          <td><?= esc($unite['med_generic']); ?> </td>
                                          <td><?= esc($unite['price_sale']); ?> </td>
                                          <td><?= esc($unite['stock']); ?> </td>
                                          <td>
                                              <a href="<?= base_url('MedClass/view/' . $unite['medicine_id']) ?>" class="btn btn-secondary"><i class="fas fa-edit"></i> </a>
                                              <a href="<?= base_url('MedClass/reactivate/' . $unite['medicine_id']) ?>" class="btn btn-success"><i class="fas fa-check-square"></i> </a>
                                          </td>
                                      </tr>

                                  <?php endforeach; ?>

                              <?php else : ?>
                                  <h3>No Item</h3>
                                  <p>Unable to find any Item for you.</p>
                              <?php endif ?>

                          </tbody>
                      </table>
                  </div>
              </div>
          </div>