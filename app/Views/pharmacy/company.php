
<h1><?php echo $company['0']['name']; ?></h1>
<button type="button" class="btn btn-success " data-toggle="modal" data-target="#billModal">
                                     Add Slip
                                     </button>
<div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Invoiced </div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $invoices_total['0']->total; ?> Afg</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-file-invoice fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Paid</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $sumCompanyCredit['0']->totalAmount;  ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-money-bill-wave fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Remaining Balence</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">

                        <?php $a =  $invoices_total['0']->total; 
                              $b = $sumCompanyCredit['0']->totalAmount;
                              if ($a>0){
                              $c = ($b * 100)/$a ; 

                              //echo round ($c, 2); 
                           }else{
                              $c = 0; 
                           }
                        
                        
                        ?>
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"> <?= $a-$b; ?> - <?= round ($c, 2); ?>%</div>
                        </div>
                        <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-info" role="progressbar" style="width: <?= round ($c, 2); ?>%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->


</div>
<div class="row">
   <div class="col-6 col-md-6 col-sm-12 col-xs-12 " >
   <!-- Project Card Example -->
   <div class="card shadow mb-4">
      <div class="card-header py-3">
         <h6 class="m-0 font-weight-bold text-primary">Company Information </h6>
      </div>
      <div class="card-body">
      <?php 
           $session = \Config\Services::session();
            $session->getFlashdata('com_update'); 
           if( $session->getFlashdata('com_update')){
           ?>
           <div class="alert alert-success alert-dismissible fade show" role="alert">
               <strong>Great!</strong>  <?php echo  $session->getFlashdata('com_update'); ?>
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
               </div>
           <?php } ?>
         <div class="table-responsive">                                                      
         <table class="table table-bordered table-dark " width="100%" cellspacing="0">
            <thead class="">
            <tr>
               <th>Name</th>
               <td><?php echo $company['0']['name']; ?>
               </td>
            </tr>
            </thead>
            <tfoot>
            <tr>
               <th>Address</th>
               <td><?php echo $company['0']['address']; ?></td>
            </tr>
            </tfoot>
            <tbody>
            <tr>
               <th>Representative </th>
               <td><?php echo $company['0']['representative']; ?></td>
            </tr>
            <tr>
               <th>Contact # </th>
               <td><?php echo $company['0']['rep_phone']; ?></td>
            </tr>
            <tr>
               <th>Record Created at </th>
               <td><?php echo $company['0']['created_at']; ?></td>
            </tr>
            <tr>
               <th>Record updated at </th>
               <td><?php echo $company['0']['updated_at']; ?></td>
            </tr>
            <tr>
               <th>Record Created by </th>
               <td><?php echo $company['0']['firstname']; ?></td>
            </tr>
            <tr>
                  <th>Notes</th>
                  <td><?php echo $company['0']['note']; ?></td>
               </tr>
            </tbody>
         </table>
       </div>                     
       </div>
     </div>
    <!--second cart -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
         <h6 class="m-0 font-weight-bold text-primary">Update Company</h6>
      </div>
      <div class="card-body">
      <form class="user" method="post" id="add_create" name="add_create" action="<?= site_url('/company/update') ?>">
                <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                <label for="name">Company Name</label>
                  <input type="text" name="name" value="<?php echo $company['0']['name']; ?>" class="form-control form-control-user"  placeholder="Company Name" required>
                </div>
                <div class="col-sm-6">
                <label for="phone">Company Contact</label>
                <input type="text" name="phone" value="<?php echo $company['0']['phone']; ?>" class="form-control form-control-user"placeholder="Company Contact No" required>
                </div>
                </div>
                <div class="form-group">
                <label for="address">Company Address</label>
                  <input type="text" name="address" value="<?php echo $company['0']['address']; ?>" class="form-control form-control-user"  placeholder="Company Address" required>
                </div>
                <div class="form-group ">
                <label for="rep_name">Representative Name</label>
                    <input type="text" name="rep_name" value="<?php echo $company['0']['representative']; ?>" class="form-control form-control-user" placeholder="Representative Name "required>
                </div>
                <div class="form-group">
                <label for="rep_phone">Representative Number</label>
                <input type="text" name="rep_phone" value="<?php echo $company['0']['rep_phone']; ?>" class="form-control form-control-user" placeholder="Representative Phone "required>
                </div>
                <div class="form-group">
                 
                <input type="hidden" name="company_id" value="<?php echo $company_id; ?>" class="form-control form-control-user" requiredd>
                </div>
                <div class="form-group">
                <label for="note">note</label>
                <textarea class="form-control form-control-user" value="" name="note"  rows="2"><?php echo $company['0']['note']; ?></textarea>
                </div>               
                <input type="submit" name="subment" class="btn btn-success btn-user btn-block">
                <hr>
         </form>

         
      </div>
     </div>
<!--second cart end -->
   </div>
   <!--second collumn timeline -->
   <div class="col-6 col-md-6 col-sm-12 col-xs-12" >
                        <!-- Project Card Example -->
                        <div class="card shadow mb-4">
                              <div class="card-header py-3">
                                 <h6 class="m-0 font-weight-bold text-primary">Company Invoices</h6>
                                 <!--add invoice model button  -->
               <!-- Modal -->
               <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
               <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                     <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLongTitle">Please Fill the Invoice Data </h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                     </button>
                     </div>
                     <div class="modal-body">
                     <form  class="user" method="post" action="<?= site_url('/company/inv_reg') ?>">
                     <div class="form-group">
                        <label for="invoice_no">Invoice No</label>
                        <input id="invoice_no" class="form-control form-control-user" type="number" name="invoice_no">
                     </div>
                     <div class="form-group">
                        <label for="invoice_date">Invoice Date</label>
                        <input id="invoice_date" class="form-control form-control-user" type="date" name="invoice_date">
                     </div>
                     <div class="form-group">
                        <label for="amount">Total Amount</label>
                        <input id="amount" class="form-control form-control-user" type="number" min="1" step="any" name="invoice_amount">
                     </div>
                     <div class="form-group">
                        <label for="detail">Detail</label>
                        <textarea id="detail" name="detail" class="form-control form-control-user" name="" rows="3"></textarea>
                        <input type="hidden" name="company_id" value="<?php echo $company_id; ?>" class="form-control form-control-user" requiredd>
                        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>" class="form-control form-control-user" requiredd>
                     </div>
                     </div>
                     <div class="modal-footer">
                     <button type="button" class="btn btn-secondary form-control-user" data-dismiss="modal">Close</button>
                     <input type="submit"  class="btn btn-primary" value="register">
                     </form>
                     </div>
                  </div>
               </div>
               </div> 
                </div>
                <div class="card-body">
                <div class="row">
                  <div class="col-sm">
                     <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#exampleModalCenter">
                     Register invoice
                     </button> 
                          
                  </div> 
                 
                              <?php 
                        $session->getFlashdata('invoice_success'); 
                     if( $session->getFlashdata('invoice_success')){
                     ?>
                     <div class="alert alert-success alert-dismissible fade show" role="alert">
                           <strong>Great!</strong>  <?php echo  $session->getFlashdata('invoice_success'); ?>
                           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                           </button>
                           </div>
                     <?php } ?>
                     <?php 
                        $session->getFlashdata('invoice_delete'); 
                     if( $session->getFlashdata('invoice_delete')){
                     ?>
                     <div class="alert alert-danger alert-dismissible fade show" role="alert">
                           <strong>Great!</strong>  <?php echo  $session->getFlashdata('invoice_delete'); ?>
                           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                           </button>
                           </div>
                     <?php } ?>


                   
                  </div>
                  <br> 
                <?php foreach ($invoice as $invoice): ?>
                <div class="card bg-secondary text-white shadow">
                    <div class="card-body">
                      <h5 class="card-title">Amount : <?= esc($invoice->invoice_amount); ?> Afg  | Invoice No:  <?= esc($invoice->invoice_no); ?></h5>
                      <div class="alert alert-primary" role="alert">
                        Invoiced At: <?= esc($invoice->invoice_date); ?>  
                      
                      </div>
                      <p>Invoice Detail: <?= esc($invoice->detail); ?></p>
                      Registerd By: <span class="badge badge-primary"><?= esc($invoice->firstname); ?></span> Registred at: <span class="badge badge-success"><?= esc($invoice->created_at); ?></span>
                      <br>
                      <a href="<?= site_url('/company/delete_invoice/'.$invoice->invoice_id.'/'.$invoice->company_id) ?>" class="btn btn-danger btn-circle btn-sm">
                        <i class="fas fa-trash"></i>
                      </a>
                    </div>
                  </div>
                <?php endforeach; ?>

                </div>
                <!-- Button trigger modal -->

              </div>

               <div class="card shadow mb-4">

                                 <div class="card-header py-3">
                                 <h6 class="m-0 font-weight-bold text-primary">Debate list</h6>
                                 </div>
                              <div class="card-body">
                              <div class="row">
                                  <div class="col-sm">
                                      <!-- Button trigger modal -->
                                     <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#billModal">
                                     Add Slip
                                     </button> 
                                    
                                    <!-- Modal -->
                                    <div class="modal fade" id="billModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                       <div class="modal-content">
                                          <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Register Payment Information</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                             <span aria-hidden="true">&times;</span>
                                          </button>
                                          </div>
                                          <div class="modal-body">
                                          <form action="<?= site_url('/company/bill_reg') ?>" method="post">
                                             <div class="form-group">
                                                <label for="billno">Bill Number</label>
                                                <input id="billno" class="form-control" type="number" name="bill_no">
                                             </div>
                                             <div class="form-group">
                                                <label for="amount">Amount Billed</label>
                                                <input id="amount" class="form-control" type="number" name="amount">
                                             </div>
                                             <div class="form-group">
                                               <label for="detail">Detail</label>
                                               <textarea class="form-control" name="detail" id="detail" rows="3"></textarea>
                                             </div>
                                             <input type="hidden" name="company_id" value="<?php echo $company_id; ?>">
                                         
                                          </div>
                                          <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                          <button type="submet" class="btn btn-primary">Register</button>
                                          </form>
                                          </div>
                                       </div>
                                    </div>
                                    </div>     
                                  </div> 
                             </div>

                              <div class="timeline p-4 block mb-4">
                                 <?php foreach ($comCredit as $credit): ?>
                                 <!-- paid receed registration list -->
                                 <div class="tl-item">
                                       <div class="tl-dot b-primary"></div>
                                       <div class="tl-content">
                                          <div class="">Bill No: <?= esc($credit->bill_no); ?></div>
                                          <div class=""><h5> Bill Amount :<?= esc($credit->amount); ?></h5></div>
                                          <div class="tl-date text-muted mt-1">Registred At <?=date("d-m-Y", strtotime($credit->created_at));  ?> </div>
                                          <div class="tl-date text-muted mt-1"><?= esc($credit->detail); ?> </div>
                                       </div>
                                 </div>
                                 <?php endforeach; ?>
                              </div>

                              </div>





               </div>
              





  </div>

</div>

