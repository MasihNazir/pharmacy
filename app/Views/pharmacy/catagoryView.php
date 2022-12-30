          <!-- Page Heading -->
          <?php
            $session = \Config\Services::session();
            $session->getFlashdata('catagoryDelete');
            if ($session->getFlashdata('catagoryDelete')) {
            ?>
              <div class="alert alert-warning alert-dismissible fade show" role="alert">
                  <strong>Deleted ! </strong><?php echo  $session->getFlashdata('catagoryDelete'); ?>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
          <?php } ?>
          <?php
            $session->getFlashdata('catagoryUpdate');
            if ($session->getFlashdata('catagoryUpdate')) {
            ?>
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Registred !</strong> <?php echo  $session->getFlashdata('catagoryUpdate'); ?>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
          <?php } ?>
          <?php
            $session->getFlashdata('addSuccess');
            if ($session->getFlashdata('addSuccess')) {
            ?>
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Updated !</strong> <?php echo  $session->getFlashdata('addSuccess'); ?>
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
                          <h5 class="modal-title" id="exampleModalLabel">Add Catagory</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                          <form method="post" id="add_create" name="add_create" action="<?= site_url('/catagory/addCatagory') ?>">
                              <div class="form-group">
                                  <label for="unite">Catagory Name</label>
                                  <input id="my-input" class="form-control" type="text" name="catagory_name" required>
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
              <h1 class="h3 mb-2 text-gray-800">Medicine Catagories</h1>
              <div class="container text-right">

                  <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#exampleModal">
                      Add Catagory
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
                                  <th>Catagory Name</th>
                                  <th>Action</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php if (!empty($catagory) && is_array($catagory)) :
                                    foreach ($catagory as $unite) : ?>
                                    
                                          <tr>
                                              <td>
                                                  <form action=" <?= site_url('/catagory/update')?>" method="post">    
                                                  <input id="my-input" class="form-control" value="<?= esc($unite['catagory_name']); ?>" type="text" name="catagory_name">
                                                  <input id="my-input2" class="form-control" value="<?= esc($unite['catagory_id']); ?>" type="hidden" name="catagory_id">
                                              </td>
                                              <td>
                                                 
                                              <input type="submit" class="btn btn-success" value="Update">
                                                  </form>

                                      <a href="<?php echo base_url('catagory/delete/' . $unite['catagory_id']); ?>" class="btn btn-danger">Delete </a>
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