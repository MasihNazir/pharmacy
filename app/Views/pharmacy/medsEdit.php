<div class="card shadow">
    <div class="card-header">
        Edit Medicine Information
    </div>
    <div class="card-body">
        <form method="post" action="<?= base_url('MedClass/update'); ?>">
            <div class="form-group">
                <div class="row">
                    <div class="col">

                        <label for="inputEmail4">Barcode</label>
                        <input type="text" value="<?= $meds["barcode"]; ?>" name="barcode" class="form-control" placeholder="Please Scan the Med barcode" required>
                    </div>
                    <div class="col">
                        <label for="medname">Medicen Name</label>
                        <input type="text" value="<?= $meds["med_name"]; ?>" name="med_name" class="form-control" placeholder="Company Name of Druge" required>
                    </div>
                    <div class="col">
                        <label>Medicine Generic </label>
                        <input type="text" value="<?= $meds["med_generic"]; ?>" name="med_generic" class="form-control" placeholder="Geniric name or Combination of medicine" required>
                    </div>
                </div>
            </div>

            <!-- second row  -->
            <div class="form-group">
                <div class="row">
                </div>
            </div>

            <!-- thired row  -->
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <label for="unit_id">Unite</label>
                        <select class="form-control" name="unit_id" id="exampleFormControlSelect1">
                            <?php foreach ($unites as $unite) : ?>
                                <option value="<?= $unite['unit_id']; ?>" <?php if ($unite['unit_id'] == $meds["unit_id"]) {
                                                                                echo "selected";
                                                                            }; ?>><?= $unite['unit']; ?></option>
                            <?php endforeach;  ?>
                        </select>
                    </div>

                    <div class="col">
                        <label for="catagory">Catagory</label>
                        <select class="form-control" name="category_id" id="exampleFormControlSelect1">
                            <?php foreach ($catagories as $catagory) : ?>
                                <option value="<?= $catagory['catagory_id']; ?>" <?php if ($catagory['catagory_id'] == $meds["category_id"]) {
                                                                                        echo "selected";
                                                                                    }; ?>><?= $catagory['catagory_name']; ?></option>
                            <?php endforeach;  ?>
                        </select>
                    </div>
                    <div class="col">
                        <label for="Campany">Campany</label>
                        <select class="form-control" name="company_id" id="exampleFormControlSelect1">
                            <?php foreach ($campanies as $campany) : ?>
                                <option value="<?= $campany['id']; ?>" <?php if ($campany['id'] == $meds["company_id"]) {
                                                                            echo "selected";
                                                                        }; ?>><?= $campany['name']; ?></option>
                            <?php endforeach;  ?>
                        </select>

                    </div>
                </div>
            </div>

            <!-- Forth Row   -->
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <label for="stock">Stock</label>
                        <input type="text" value="<?= $meds["stock"]; ?>" name="stock" class="form-control" placeholder="Number of Unites Availibal " required>
                    </div>
                    <div class="col">
                        <label for="stock_minimum">Stock Minimum</label>
                        <input type="text" value="<?= $meds["stock_minimum"]; ?>" name="stock_minimum" class="form-control" placeholder="Minimum range " required>

                    </div>
                </div>
            </div>

            <!-- 5th Row   -->
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <label for="price_purchase">Purchas Price</label>
                        <input type="number" value="<?= $meds["price_purchase"]; ?>" name="price_purchase" class="form-control" placeholder="After Discount" required>
                    </div>
                    <div class="col">
                        <label for="price_sale">Sale Price</label>
                        <input type="number" value="<?= $meds["price_sale"]; ?>" name="price_sale" class="form-control" placeholder="" required>
                    </div>
                    <div class="col">
                        <label for="Avaible">Availibal</label>
                        <select class="form-control" name="available" id="exampleFormControlSelect1" name="availibal" required>
                            <option value="1"> Yes </option>
                            <option value="0" selected> No </option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <input type="hidden" name="medicine_id" value="<?= $meds["medicine_id"]; ?>">
                <input type="submit" name="subment" value="Update" class="btn btn-success btn-user btn-block">

            </div>
        </form>
        <a href="<?= base_url('medicine'); ?>" class="btn btn-danger">Cancel</a>
    </div>
</div>