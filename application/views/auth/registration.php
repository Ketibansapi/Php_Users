  <div class="container">

    <div class="card border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
  <!--   <div class="col-lg-5 d-none d-lg-block bg-register-image"> </div> -->

          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-left">
                <h1 class="h4 text-gray-900 mb-2">Enter Your Personal Information Below</h1>
                <h1 class="h6 text-gray-900 mb-4">Please fill up the fields below correctly</h1>
              </div>
              <form class="user" method="post" action="<?= base_url('auth/registration');  ?>">

                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                  <placeholder>Last Name </placeholder>
                  <input type="text" class="form-control "  id="name2" name="name2"  value="<?= set_value('name2'); ?>">
                  <?= form_error('name', '<small class="text-danger pl-3">', '</small>' ); ?>
                </div>

                <div class="col-sm-6">
                  <placeholder>First Name </placeholder>
                  <input type="text" class="form-control "  id="name" name="name"  value="<?= set_value('name'); ?>">
                  <?= form_error('name', '<small class="text-danger pl-3">', '</small>' ); ?>
                </div>
              </div>

                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                  <placeholder> Contact Number </placeholder>
                  <input type="number" class="form-control "  id="mobile" name="mobile"  value="<?= set_value('mobile'); ?>">
                  <?= form_error('mobile', '<small class="text-danger pl-3">', '</small>' ); ?>
                </div>

                <div class="col-sm-6">
                  <placeholder> Email Address </placeholder>
                  <input type="text" class="form-control " id="email" name="email" value="<?= set_value('email'); ?>">
                  <?= form_error('email', '<small class="text-danger pl-3">', '</small>' ); ?>
                </div>
              </div>


                <div class="form-group">
                  <placeholder> NRIC/Passport Number </placeholder>
                  <input type="number" class="form-control "  id="nric" name="nric" value="<?= set_value('nric'); ?>">
                  <?= form_error('nric', '<small class="text-danger pl-3">', '</small>' ); ?>
                </div>

                <div class="form-group">
                  <placeholder> Address Line </placeholder>
                  <input type="text" class="form-control "  id="address" name="address" value="<?= set_value('address'); ?>">
                </div>

                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                  <placeholder> City </placeholder>
                  <input type="text" class="form-control"  id="city" name="city"  value="<?= set_value('city'); ?>">
                  <?= form_error('city', '<small class="text-danger pl-3">', '</small>' ); ?>
                </div>

                <div class="col-sm-6">
                  <placeholder> State </placeholder>
                  <input type="text" class="form-control "  id="state" name="state"  value="<?= set_value('state'); ?>">
                  <?= form_error('state', '<small class="text-danger pl-3">', '</small>' ); ?>
                </div>
              </div>

                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                  <placeholder> Country </placeholder>
                  <input type="text" class="form-control "  id="country" name="country"  value="<?= set_value('country'); ?>">
                  <?= form_error('country', '<small class="text-danger pl-3">', '</small>' ); ?>
                </div>

                <div class="col-sm-6">
                  <placeholder> Zip Code </placeholder>
                  <input type="number" class="form-control"  id="zip" name="zip"  value="<?= set_value('zip'); ?>">
                  <?= form_error('zip', '<small class="text-danger pl-3">', '</small>' ); ?>
                </div>
              </div>

                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <placeholder> Password </placeholder>
                    <input type="password" class="form-control" id="password1" name="password1" >
                    <?= form_error('password1', '<small class="text-danger pl-3">', '</small>' ); ?>
                  </div>

                  <div class="col-sm-6">
                    <placeholder> Repeat Password </placeholder>
                    <input type="password" class="form-control " id="password2" name="password2" >
                  </div>
                </div>

                <button type="submit" class="btn btn-primary  btn-block">
                  Next
                </button>

              </form>
              <hr>



            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
