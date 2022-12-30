          <!-- Page Heading -->
          <?php
            $session = \Config\Services::session();
            $session->getFlashdata('uniteDelete');
            if ($session->getFlashdata('uniteDelete')) {
            ?>
              <div class="alert alert-warning alert-dismissible fade show" role="alert">
                  <strong>Deleted ! </strong><?php echo  $session->getFlashdata('uniteDelete'); ?>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
          <?php } ?>
          <?php
            $session->getFlashdata('uniteSuccess');
            if ($session->getFlashdata('uniteSuccess')) {
            ?>
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Registred !</strong> <?php echo  $session->getFlashdata('uniteSuccess'); ?>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
          <?php } ?>
          <?php
            $session->getFlashdata('uniteUpdate');
            if ($session->getFlashdata('uniteUpdate')) {
            ?>
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Updated !</strong> <?php echo  $session->getFlashdata('uniteUpdate'); ?>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
          <?php } ?>



          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Add Unite</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                          <form method="post" id="add_create" name="add_create" action="<?= site_url('/unites/addUnite') ?>">
                              <div class="form-group">
                                  <label for="unite">Unite Name</label>
                                  <input id="my-input" class="form-control" type="text" name="unite" required>
                              </div>
                              <div class="form-group">
                                  <label for="">Alias</label>
                                  <input type="text" name="abv" id="" class="form-control" placeholder="" aria-describedby="helpId" required>
                              </div>
                              <div class="form-group">
                                  <label for=""></label>
                                  <select name="active" class="form-control" id="exampleFormControlSelect1">
                                      <option value="1" defult>Active</option>
                                      <option value="0">disabled</option>
                                  </select>
                              </div>
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">Save changes</button>
                          </form>
                      </div>
                  </div>
              </div>
          </div>


          <div class="row">
              <h1 class="h3 mb-2 text-gray-800">Unites</h1>
              <div class="container text-right">

                  <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#exampleModal">
                      Add Unite
                  </button>

              </div>
          </div>


          <!-- DataTales Example -->
          <div class="card shadow mb-4">
              <div class="card-body">
                  <div class="table-responsive">
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                          <thead>
                              <tr>
                                  <th>Unite</th>
                                  <th>Alias</th>
                                  <th>Status</th>
                                  <th>Edit</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php if (!empty($unites) && is_array($unites)) :
                                    foreach ($unites as $unite) : ?>
                                      <tr>
                                          <td><?= esc($unite['unit']); ?></td>
                                          <td> <?= esc($unite['abr']); ?></td>
                                          <td><?php if ($unite['active'] == 0) { ?>
                                                  <span class="badge badge-danger">disabled</span>
                                              <?php } else { ?>
                                                  <span class="badge badge-success">Active</span>
                                              <?php } ?>
                                          </td>
                                          <td><a href="<?php echo base_url('unites/editUnite/' . $unite['unit_id']); ?>" class="fa fa-pencil-square"><i class="fas fa-eye fa-2x "></i></a>
                                              <a href="<?php echo base_url('unites/delete/' . $unite['unit_id']); ?>" class=""><i style="color: #fc030f; " class="fas fa-user-times fa-2x"></i> </a>
                                          </td>
                                      </tr>
                                  <?php endforeach; ?>

                              <?php else : ?>

                                  <h3>No News</h3>

                                  <p>Unable to find any news for you.</p>

                              <?php endif ?>

                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
          