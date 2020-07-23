<?php $this->load->view('layout/header.php') ?>
<link href="<?php echo base_url();?>assets/css/stylenav.css" rel="stylesheet" type="text/css" />
<style>
html,body{
  background-color:white;
}

.page-link a{
    color:#FF3278 !important;
}
  .card{
    box-shadow: 0 0 1px 1px rgba(0, 0, 0, 0.1) !important;
  border:0px !important;
  background-color:white;
}
.avatar {
  vertical-align: middle;
  width: 30px;
  height: 30px;
  border-radius: 50%;
}

.search_box{
    width: 610px;
    position: relative;
    margin:auto;
    margin-left:21%;
    margin-top:-20px;
    }
.search_box input[type="text"]{
    width: 610px;
    padding: 10px 15px;
    padding-right: 60px;
    box-sizing: border-box;
    background: white;
    border: 2px solid #ff3278;
    border-radius: 10px;
    font-size: 18px;
    color: black;
    outline: none;
}

.fa-search{
    position: absolute;
    margin-top: 30px;
    transform: translateY(-50%);
    right: 25px;
    color: white;
    font-size: 25px;
    }
.search{
    margin-top:23px;
}

::-webkit-input-placeholder {
    /* Chrome/Opera/Safari */
    color: black;
}
::-moz-placeholder {
    /* Firefox 19+ */
    color: black;
}
:-ms-input-placeholder {
    /* IE 10+ */
    color: black;
}

@media screen and (max-width: 425px){
    .search_box{
    width: 95%;
    margin-top: 13px;
    display:none;
    }
}

label,h1,p{
  color:black !important;
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
		<div class="navigation-wrap bg-light start-header start-style">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<nav class="navbar navbar-expand-md navbar-light">
					
						<a class="navbar-brand" href="<?= base_url()?>"><img src="<?php echo base_url();?>assets/images/mylogo.png" alt="" ></a>	
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>
						
						<div class="collapse navbar-collapse" id="navbarSupportedContent">
							<ul class="navbar-nav ml-auto py-4 py-md-0">
                                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
									<a class="nav-link" href="<?=base_url()?>">Home</a>
								</li>
                <?php if(!$this->session->email){?>
                                    <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Register</a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="<?php echo base_url();?>seller/register">Register as Seller</a>
                                            <a class="dropdown-item" href="<?php echo base_url();?>customer/register">Register as Customer</a>
                                        </div>
                                </li>
                                <?php } ?>
								<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                    <?php if($this->session->email){?>
                                        
                                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                            <?= $this->session->nama ?>&nbsp;
                                        <?php if($this->session->role == 'customer'){?>
                                            <img src="<?= base_url().'public/profile/'.$this->session->foto?>" alt="Avatar" class="avatar">
                                        <?php }else{?>
                                            <img src="<?= base_url().'public/logos/'.$this->session->logo?>" alt="Avatar" class="avatar">
                                        <?php }?></a>
                                        <div class="dropdown-menu">
                                        <?php if($this->session->role == 'customer'){?>
                                                <a class="dropdown-item" href="<?php echo base_url();?>customer/myorders">My Orders</a>
                                                <a class="dropdown-item" href="<?php echo base_url();?>customer/profile">Profile</a>
                                                <a class="dropdown-item" href="<?php echo base_url();?>customer/logout">Logout</a>
                                               
                                            <?php }else{?>
                                                <a class="dropdown-item" href="<?php echo base_url();?>seller/info/<?= $this->session->id ?>">My Store</a>
                                                <a class="dropdown-item" href="<?php echo base_url();?>seller/profile">Profile</a>
                                                <a class="dropdown-item" href="<?php echo base_url();?>seller/logout">Logout</a>
                                                
                                            <?php }?>
                                            
                                        </div>
                                       
                                    <?php }else{?>
                                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Login</a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="<?php echo base_url();?>seller/login">Login as Seller</a>
                                            <a class="dropdown-item" href="<?php echo base_url();?>customer/login">Login as Customer</a>
                                        </div>
                                    <?php }?>
                                    
								</li>
							</ul>
						</div>
						
					</nav>		
				</div>
			</div>
		</div>
	</div>
    <div class="container" style="margin-top:130px">
      <div class="row justify-content-center">
        <div class="col-lg-10 col-md-10">
          <div class="card card-login border-0" style="background-color:#ffffff;padding:50px 0;">
            <div class="card-body px-lg-5 py-lg-5" >
							<div class="text-center">
              <img  style="height:150px;border-radius:50%; border: 1px solid white;box-shadow: 0 0 4px 1px rgba(0, 0, 0, 0.2) !important;" src="<?= base_url().'public/logos/'.$this->session->logo?>" />
              <br>
							<h1 style="color:white;"><?= $this->session->nama ?></h1>
							</div>
              <div class="text-center text-muted mb-4">
							
                <p style="color:white;">PROFILE SELLER</p>
                <?php if(isset($error)) { echo $error; }; ?>
                <?php echo form_error('phone'); ?>
                <?php echo form_error('companyname'); ?>
                <?php echo form_error('notes'); ?>
                <?php echo form_error('address1'); ?>
                <?php echo form_error('address2'); ?>
                <?php echo form_error('postalcode'); ?>
                <?php echo form_error('country'); ?>
                <?php echo form_error('city'); ?>
                <?php echo form_error('state'); ?>
              </div>
              <?php echo form_open_multipart(); ?>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group mb-3">
                      <label for="companyname" style="color:white;">Company Name</label>
                        <input class="form-control" placeholder="Company Name" type="text" name="companyname" value="<?=$companyname?>">
                    </div>
                    <div class="form-group mb-3">
                      <label for="companyname" style="color:white;">Phone</label>
                        <input class="form-control" placeholder="Phone" type="text" name="phone" value="<?=$phone?>">
                    </div>
                    <div class="form-group mb-3">
                      <label for="logo" style="color:white;">Logo</label>
                      <?php echo form_upload('logo', null, 'class="form-control" style="border-radius:5px;padding:4px;border:1px solid white"'); ?>
                      <!-- <input type="file" class="form-control-file" id="logo" style="border-radius:5px;padding:4px;color:white;border:1px solid white"> -->
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group mb-3">
                      <label for="notes" style="color:white;">Information</label>
                        <textarea style="height:210px" class="form-control" placeholder="Information" name="notes" ><?=$notes?></textarea>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group mb-3">
                      <label for="address1" style="color:white;">Address 1</label>
                        <input class="form-control" placeholder="Address 1" type="text" name="address1" value="<?=$address1?>">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group mb-3">
                      <label for="address2" style="color:white;">Address 2</label>
                        <input class="form-control" placeholder="Address 2" type="text" name="address2"value="<?=$address2?>">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group mb-3">
                      <label for="postalcode" style="color:white;">Postal Code</label>
                        <input class="form-control" placeholder="Postal Code" type="text" name="postalcode" value="<?=$postalcode?>">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group mb-3">
                      <label for="country" style="color:white;">Country</label>
                        <input class="form-control" placeholder="Country" type="text" name="country" value="<?=$country?>">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group mb-3">
                      <label for="city" style="color:white;">City</label>
                        <input class="form-control" placeholder="City" type="text" name="city" value="<?=$city?>">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group mb-3">
                      <label for="state" style="color:white;">State</label>
                        <input class="form-control" placeholder="State" type="text" name="state" value="<?=$state?>">
                    </div>
                  </div>
                </div>
                <div class="text-center" style="margin-top:30px">
                  <button type="submit" class="btn my-2" style="background-color:#FF327B;color:white;">Save Profile</button>
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
