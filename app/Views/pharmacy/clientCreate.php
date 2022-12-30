<div class="card shadow">
    <div class="card-header">
        Add New Client
    </div>
    <div class="card-body">
        <form method="post" action="<?= base_url('clients/store'); ?>">
            <div class="form-group">
                <div class="row">
                    <div class="col">

                        <label for="name">name</label>
                        <input type="text"  name="name" class="form-control"  required>
                    </div>
                    <div class="col">
                        <label for="Number">Phone #</label>
                        <input type="number"  name="number" class="form-control">
                    </div>
                   
                </div>
            </div>

            <!-- Forth Row   -->
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <label for="email">Email </label>
                        <input type="email"  name="email" class="form-control" >
                    </div>
                    <div class="col">
                        <label for="stock_minimum">Address</label>
                        <input type="text"  name="address" class="form-control" >

                    </div>
                </div>
            </div>

            <!-- 5th Row   -->
            <div class="form-group">
               
                <input type="submit" name="subment" value="Register" class="btn btn-primary btn-user btn-block">

            </div>
        </form>
        <a href="<?= base_url('/clients'); ?>" class="btn btn-danger">Cancel</a>
    </div>
</div>