<div class="card shadow">
    <div class="card-header">
        Edit Client
    </div>
    <div class="card-body">
        <form method="post" action="<?= base_url('clients/update'); ?>">
            <div class="form-group">
                <div class="row">
                    <div class="col">

                        <label for="name">name</label>
                        <input type="text" value="<?= $client["name"]; ?>" name="name" class="form-control"  required>
                    </div>
                    <div class="col">
                        <label for="Number">Phone #</label>
                        <input type="number" value="<?= $client["number"]; ?>" name="number" class="form-control" >
                    </div>
                   
                </div>
            </div>

            <!-- Forth Row   -->
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <label for="email">Email </label>
                        <input type="email" value="<?= $client["email"]; ?>" name="email" class="form-control" >
                    </div>
                    <div class="col">
                        <label for="stock_minimum">Address</label>
                        <input type="text" value="<?= $client["address"]; ?>" name="address" class="form-control" >

                    </div>
                </div>
            </div>

            <!-- 5th Row   -->
            <div class="form-group">
                <input type="hidden" name="client_id" value="<?= $client["client_id"]; ?>">
                <input type="submit" name="subment" value="Update" class="btn btn-success btn-user btn-block">

            </div>
        </form>
        <a href="<?= base_url('/clients'); ?>" class="btn btn-danger">Cancel</a>
    </div>
</div>