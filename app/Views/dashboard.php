<div class="row">
  <pre><?php
 
        $invoice = $totalInvoice[0]->totalAmount;
        $credit =  $totalcridet[0]->totalAmount;



        ?></pre>

  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Registred Compaies</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalcompany[0]->name;  ?></div>
          </div>
          <div class="col-auto">
            <i class="fas fa-building fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Remaining Balance</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $invoice - $credit; ?></div>
          </div>
          <div class="col-auto">
            <i class="fas fa-coins fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-info shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Meds Registerd</div>
            <div class="row no-gutters align-items-center">
              <div class="col-auto">
                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $medTotal[0]->med_name;  ?></div>
              </div>
            </div>
          </div>
          <div class="col-auto">
            <i class="fas fa-pills fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Pending Requests Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending Requests</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
          </div>
          <div class="col-auto">
            <i class="fas fa-comments fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-sm-12 col-md-6">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Companies Payment Monthly</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered table-striped"  width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Date</th>
                <th>Amount</th>
              </tr>
            </thead>
            <tbody>
              <?php if (!empty($sumCompanyCreditMonth) && is_array($sumCompanyCreditMonth)) :
                foreach ($sumCompanyCreditMonth as $item) : ?>
                  <tr>
                    <td><?= esc($item->date); ?> </td>
                    <td><?= esc($item->total); ?></td>
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
  </div>
  <div class="col-sm-12 col-md-6">
  <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Invoices Monthly</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered table-striped" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Date</th>
                <th>Amount</th>
              </tr>
            </thead>
            <tbody>
              <?php if (!empty($sumInvoiceMonthly) && is_array($sumInvoiceMonthly)) :
                foreach ($sumInvoiceMonthly as $item) : ?>
                  <tr>
                    <td><?= esc($item->date); ?> </td>
                    <td><?= esc($item->total); ?></td>
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
  </div>
  </div>