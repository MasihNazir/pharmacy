<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Unite</h6>
    </div>
    <div class="card-body">
    <form action="<?= site_url('/updateunite')?>" method="post">
        <div class="form-group">
            <label for="unite">Unite</label>
            <input id="unite" class="form-control" type="text" name="unit" value="<?= $unite['unit']; ?>">
        </div>
        <div class="form-group">
            <label for="abr">Alias</label>
            <input id="abr" class="form-control" type="text" name="abr" value="<?= $unite['abr']; ?>">
        </div>
        <div class="form-group">
            <label for="">Status</label>
            <select name="active" class="form-control" id="exampleFormControlSelect1">
                <option value="1" defult>Active</option>
                <option value="0">disabled</option>
            </select>
        </div>
        <input type="hidden" name="uniteId" value="<?= $unite['unit_id']; ?>">
        <input type="submit" class="btn btn-success" value="Update">
        </form>
        </div>
</div>