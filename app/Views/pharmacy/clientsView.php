          <!-- Page Heading -->
          <?php
            $session = \Config\Services::session();
            $session->getFlashdata('clientDelete');
            if ($session->getFlashdata('clientDelete')) {
            ?>
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Deleted !</strong><?php echo  $session->getFlashdata('clientDelete'); ?>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
          <?php } ?>
          <?php
            $session->getFlashdata('clientUpdate');
            if ($session->getFlashdata('clientUpdate')) {
            ?>
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Updated !</strong> <?php echo  $session->getFlashdata('clientUpdate'); ?>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
          <?php } ?>
          <?php
            $session->getFlashdata('clientSave');
            if ($session->getFlashdata('clientSave')) {
            ?>
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Inserted !</strong> <?php echo  $session->getFlashdata('clientSave'); ?>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
          <?php } ?>
          <div class="row">
              <h1 class="h3 mb-2 text-gray-800">Clients</h1>
              <div class="container text-right">

                  <a href="<?= base_url('clients/clientCreate') ?>" class="btn btn-primary"> <i class="fas fa-plus-square"></i></a>

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
                                  <th>Name</th>
                                  <th>address</th>
                                  <th>Action</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php if (!empty($clients) && is_array($clients)) :
                                    foreach ($clients as $client) : ?>

                                      <tr>
                                          <td><?= esc($client['client_id']); ?> </td>
                                          <td><?= esc($client['name']); ?> </td>
                                          <td><?= esc($client['address']); ?> </td>
                                          <td>
                                              <a href="<?= base_url('clients/edit/' . $client['client_id']) ?>" class="btn btn-success"><i class="fas fa-edit"></i> </a>
                                              <a href="<?= base_url('clients/delete/' . $client['client_id']) ?>" class="btn btn-danger"><i class="fas fa-trash"></i> </a>
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