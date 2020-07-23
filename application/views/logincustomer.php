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
		
    <div class="container" style="margin-top:200px">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          <div class="card card-login border-0" style="background-color:#22215B;padding:50px 0;">
            <div class="card-body px-lg-5 py-lg-5" >
							<div class="text-center">
              <img  style="height:150px" src="<?php echo base_url();?>assets/images/mylogo.png" />
              <br>
							<h1 style="color:white;">Avenger Store</h1>
							</div>
              <div class="text-center text-muted mb-4">
							
                <p style="color:white;">LOGIN AS CUSTOMER</p>
                <?php if(isset($error)) { echo $error; }; ?>
                <?php if(isset($success)) { echo $success; }; ?>
                <?php echo $this->session->flashdata('message'); ?>
              </div>
              <form method="POST" action="<?php echo base_url() ?>customer/login">
                <div class="form-group mb-3">
                <?php echo form_error('email'); ?><br>
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" placeholder="Email" type="text" name="email">
                   
                  </div>
                </div>
                <div class="form-group">
                <?php echo form_error('password'); ?><br>
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    
                    <input class="form-control" placeholder="Password" type="password" name="password">
                    
                  </div>
                </div>
                
                <div class="text-center">
                  <button type="submit" class="btn my-2" style="background-color:#FF327B;color:white;">Sign in</button>
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
