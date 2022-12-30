
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Pharmacutical Company List </h6>
              <button type="button"  class="btn btn-primary float-right " data-toggle="modal" data-target="#exampleModal">
                  Add Company 
                </button>
                <?php 
                     $session = \Config\Services::session();
                      $session->getFlashdata('company_success'); 
                     if( $session->getFlashdata('company_success')){
                     ?>
                     <div class="col-lg-6 mb-12">
                             <div class="card bg-success text-white shadow">
                               <div class="card-body">
                                <?php echo  $session->getFlashdata('company_success'); ?>

                               </div>
                             </div>
                           </div>
                 <?php } ?>

             

            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Company Name</th>
                      <th>Representative </th>
                      <th>Phone</th>
                      <th>Action</th>                      
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Last Name</th>
                      <th>email</th>
                      <th>Action</th>                                
                    </tr>
                  </tfoot>
                  <tbody>

                     <?php $i = 1; 
                      if (! empty($companyList) && is_array($companyList)) : ?>

                        <?php foreach ($companyList as $company): ?>

                         <tr><td><?php echo $i; $i++;  ?></td>
                             <td><?= esc($company['name']); ?></td>
                             <td> <?= esc($company['representative']); ?></td>
                             <td><?= esc($company['rep_phone']); ?></td>  
                             <td><a href="<?php echo base_url('company/view/'.$company['id']);?>" class="fa fa-pencil-square"><i class="fas fa-eye fa-2x "></i></a></td>
                         </tr>


                        <?php endforeach; ?>

                        <?php else : ?>

                        <h3>No Users</h3>

                        <p>Unable to find any news for you.</p>

                        <?php endif ?>

                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Add New Company</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <form class="user" method="post" id="add_create" name="add_create" action="<?= site_url('/company/new') ?>">
                            <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                              <input type="text" name="name" class="form-control form-control-user"  placeholder="Company Name" require>
                            </div>
                            <div class="col-sm-6">
                            <input type="text" name="phone" class="form-control form-control-user"placeholder="Company Contact No" require>
                            </div>
                            </div>
                            <div class="form-group">
                              <input type="text" name="address" class="form-control form-control-user"  placeholder="Company Address" require>
                            </div>
                            <div class="form-group ">
                                <input type="text" name="rep_name" class="form-control form-control-user" placeholder="Representative Name "require>
                            </div>
                            <div class="form-group">
                            <input type="text" name="rep_phone" class="form-control form-control-user" placeholder="Representative Phone "required>
                            </div>
                            <div class="form-group">

                            <input type="hidden" name="user_id" value="<?php echo $user_id; ?>" class="form-control form-control-user" required>
                            </div>
                            <div class="form-group">
                            <textarea class="form-control form-control-user" name="note" placeholder="Note" rows="2"></textarea>
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

