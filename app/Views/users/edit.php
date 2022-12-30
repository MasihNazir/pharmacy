<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">User Edit</h1>
<div class="row">
  <div class="col-xl-6 col-lg-6">
    <div class="card shadow mb-4">
      <!-- Card Header - Dropdown -->
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">User Image </h6>

      </div>

      <!-- Card Body flash data for image upload  -->
      <div class="card-body">
        <?php
        $session = \Config\Services::session();
        $session->getFlashdata('image');
        if ($session->getFlashdata('image')) {
        ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Holy guacamole!</strong> <?php echo  $session->getFlashdata('image'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php } ?>

        <?php
        if (empty($user_obj['image'])) {
          $image = base_url('/uploads/noimage.jpg');
        } else {
          $image = base_url('/uploads/' . $user_obj['image']);
        }
        ?>
        <div class="pt-4 pb-2">
          <img id="blah" src="<?php echo $image; ?>" class="img-thumbnail" alt="your image" />
        </div>

        <form method="post" id="upload_form" action="<?php echo site_url("/users/upload_image"); ?>" enctype="multipart/form-data">
          <div class="col-md-7">
            <input type="hidden" name="id" value="<?php echo $user_obj['id']; ?>">
            <input type="file" name="files" accept="image/*"></br></br>
            <button class="btn btn-success">Submit</button>
          </div>


        </form>
      </div>
    </div>
  </div>

  <div class="col-xl-6">
    <div class="card shadow mb-4">
      <!-- Card Header - Dropdown -->
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Edit User</h6>
      </div>
      <!-- Card Body -->
      <div class="card-body">
        <form class="user" method="post" id="add_create" name="add_create" action="<?= site_url('/update') ?>">
          <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
              <input type="hidden" name="id" id="id" value="<?php echo $user_obj['id']; ?>">
              <input type="text" name="firstname" class="form-control form-control-user" placeholder="First Name" value="<?php echo $user_obj['firstname']; ?>">
            </div>
            <div class="col-sm-6">
              <input type="text" name="lastname" class="form-control form-control-user" placeholder="Last Name" value="<?php echo $user_obj['lastname']; ?>">
            </div>
          </div>
          <div class="form-group">
            <input type="email" name="email" class="form-control form-control-user" placeholder="Email Address" value="<?php echo $user_obj['email']; ?>">
          </div>
          <div class="form-group ">
            <input type="password" name="password" class="form-control form-control-user" placeholder="Password" value="<?php echo $user_obj['password']; ?>">
          </div>
          <div class="form-group">
            <div class="col-sm-6 mb-3 mb-sm-0">
              <select name="level" class="form-control " value="<?php echo $user_obj['level']; ?>">
                <option>admin</option>
                <option>pharmacy</option>
                <option>lab</option>
                <option>finance</option>
              </select>
            </div>
          </div>
          <input type="submit" name="submet" class="btn btn-success btn-user btn-block">
          <hr>
        </form>

      </div>
    </div>
  </div>

</div>