<?php $this->load->view('layout/header.php') ?>
<style>
html,body{
  background-color:#22215B;
}
</style>
<div class="main-content">
    <!-- Navbar -->
    
    <!-- Header -->
    <!-- <div class="header bg-gradient-primary py-7 py-lg-8">
      <div class="container">
        <div class="header-body text-center">
          <div class="row justify-content-center">
					
          </div>
        </div>
      </div>
    </div> -->
		<!-- Page content -->
		
    <div class="container" style="margin-top:50px">
      <div class="row justify-content-center">
        <div class="col-lg-10 col-md-10">
          <div class="card card-login border-0" style="background-color:#22215B;padding:50px 0;">
            <div class="card-body px-lg-5 py-lg-5" >
							<div class="text-center">
              <img  style="height:150px" src="<?php echo base_url();?>assets/images/mylogo.png" />
              <br>
							<h1 style="color:white;">Avenger Store</h1>
							</div>
              <div class="text-center text-muted mb-4">
							
                <p style="color:white;">REGISTER AS SELLER</p>
                <?php if(isset($error)) { echo $error; }; ?>
                <?php echo form_error('email'); ?>
                <?php echo form_error('phone'); ?>
                <?php echo form_error('companyname'); ?>
                <?php echo form_error('notes'); ?>
                <?php echo form_error('address1'); ?>
                <?php echo form_error('address2'); ?>
                <?php echo form_error('postalcode'); ?>
                <?php echo form_error('country'); ?>
                <?php echo form_error('city'); ?>
                <?php echo form_error('state'); ?>
                <?php echo form_error('password'); ?>
                <?php echo form_error('passwordconfirmation'); ?>
              </div>
              <?php echo form_open_multipart(); ?>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group mb-3">
                      <label for="email" style="color:white;">Email address</label>
                        <input class="form-control" placeholder="Email" type="text" name="email">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group mb-3">
                      <label for="phone" style="color:white;">Phone</label>
                        <input class="form-control" placeholder="Phone" type="text" name="phone">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group mb-3">
                      <label for="companyname" style="color:white;">Company Name</label>
                        <input class="form-control" placeholder="Company Name" type="text" name="companyname">
                    </div>
                    <div class="form-group mb-3">
                      <label for="logo" style="color:white;">Logo</label>
                      <?php echo form_upload('logo', null, 'class="form-control" style="border-radius:5px;padding:4px;border:1px solid white"', 'required'); ?>
                      <!-- <input type="file" class="form-control-file" id="logo" style="border-radius:5px;padding:4px;color:white;border:1px solid white"> -->
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group mb-3">
                      <label for="notes" style="color:white;">Information</label>
                        <textarea style="height:127px" class="form-control" placeholder="Information" name="notes"></textarea>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group mb-3">
                      <label for="address1" style="color:white;">Address 1</label>
                        <input class="form-control" placeholder="Address 1" type="text" name="address1">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group mb-3">
                      <label for="address2" style="color:white;">Address 2</label>
                        <input class="form-control" placeholder="Address 2" type="text" name="address2">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group mb-3">
                      <label for="postalcode" style="color:white;">Postal Code</label>
                        <input class="form-control" placeholder="Postal Code" type="text" name="postalcode">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group mb-3">
                      <label for="country" style="color:white;">Country</label>
                        <input class="form-control" placeholder="Country" type="text" name="country">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group mb-3">
                      <label for="city" style="color:white;">City</label>
                        <input class="form-control" placeholder="City" type="text" name="city">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group mb-3">
                      <label for="state" style="color:white;">State</label>
                        <input class="form-control" placeholder="State" type="text" name="state">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="password"  style="color:white;">Password</label>
                        <input class="form-control" placeholder="Password" type="password" name="password">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="confirmpassword"  style="color:white;">Password Confirmation</label>
                        <input class="form-control" placeholder="Password Confirmation" type="password" name="passwordconfirmation">
                    </div>
                  </div>
                </div>
                <div class="text-center" style="margin-top:30px">
                  <button type="submit" class="btn my-2" style="background-color:#FF327B;color:white;">Create Account</button>
                </div>
              </form>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-6">
              <!-- <small href="<?php echo base_url();?>main/register" class="text-light"><small>Sign Up?</small></a> -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Footer -->
  <!-- Core -->
  <?php $this->load->view('layout/footer.php') ?>
