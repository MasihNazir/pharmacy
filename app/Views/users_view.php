        <?php
        $session = \Config\Services::session();
        $session->getFlashdata('success');
        if ($session->getFlashdata('success')) {
        ?>
          <div class="col-lg-6 mb-12">
            <div class="card bg-success text-white shadow">
              <div class="card-body">
                Success

              </div>
            </div>
          </div>
        <?php } ?>
        <?php
        $session = \Config\Services::session();
        $session->getFlashdata('delete');
        if ($session->getFlashdata('delete')) {
        ?>
          <div class="col-lg-6 mb-12">
            <div class="card bg-danger text-white shadow">
              <div class="card-body">
                <?php echo  $session->getFlashdata('delete'); ?>

              </div>
            </div>
          </div>
        <?php } ?>

        <?php
        $session->getFlashdata('update');
        if ($session->getFlashdata('update')) {
        ?>
          <div class="col-lg-6 mb-12">
            <div class="card bg-danger text-white shadow">
              <div class="card-body">
                <?php echo  $session->getFlashdata('update'); ?>

              </div>
            </div>
          </div>
        <?php } ?>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="row">
            <div class="container text-right">
              <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#exampleModal">
                Add User
              </button>

            </div>
          </div>

          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Software User List </h6>
            <!-- Button trigger modal -->

          </div>
          <div class="card-body ">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Last Name</th>
                    <th>email</th>
                    <th>user Level</th>
                    <th>action</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Name</th>
                    <th>Last Name</th>
                    <th>email</th>
                    <th>user Level</th>
                    <th>Action</th>
                  </tr>
                </tfoot>
                <tbody>
                  <?php if (!empty($users) && is_array($users)) :
                    foreach ($users as $user) : ?>
                      <tr>
                        <td><?= esc($user['firstname']); ?></td>
                        <td> <?= esc($user['lastname']); ?></td>
                        <td><?= esc($user['email']); ?></td>
                        <td><?= esc($user['level']); ?></td>
                        <td><a href="<?php echo base_url('edit-view/' . $user['id']); ?>" class="fa fa-pencil-square"><i class="fas fa-eye fa-2x "></i></a>
                          <a href="<?php echo base_url('delete/' . $user['id']); ?>" class=""><i style="color: #fc030f; " class="fas fa-user-times fa-2x"></i> </a>
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

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Fill in to create application user </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form class="user" method="post" id="add_create" name="add_create" action="<?= site_url('/submit-form') ?>">
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <input type="text" name="firstname" class="form-control form-control-user" placeholder="First Name" required>
                    </div>
                    <div class="col-sm-6">
                      <input type="text" name="lastname" class="form-control form-control-user" placeholder="Last Name" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <input type="email" name="email" class="form-control form-control-user" placeholder="Email Address" required>
                  </div>
                  <div class="form-group ">

                    <input type="password" name="password" class="form-control form-control-user" placeholder="Password" required>

                  </div>
                  <div class="form-group">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <select name="level" class="form-control ">
                        <option>admin</option>
                        <option>pharmacy</option>
                        <option>lab</option>
                        <option>finance</option>
                      </select>
                    </div>

                  </div>
                  <input type="submit" name="subment" class="btn btn-success btn-user btn-block">
                  <hr>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

              </div>
            </div>
          </div>
        </div>