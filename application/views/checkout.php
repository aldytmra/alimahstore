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
            <div class="container">
              <div class="">
              <?php echo form_error('email'); ?>
                <?php echo form_error('firstname'); ?>
                <?php echo form_error('lastname'); ?>
                <?php echo form_error('address1'); ?>
                <?php echo form_error('address2'); ?>
                <?php echo form_error('postalcode'); ?>
                <?php echo form_error('country'); ?>
                <?php echo form_error('state'); ?>
                <?php echo form_error('cc-name'); ?>
                <?php echo form_error('cc-number'); ?>
                <?php echo form_error('cc-expiration'); ?>
                <?php echo form_error('cc-cvv'); ?>
                <div class="row">
                
                  <div class="col-md-4 order-md-2 mb-4">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                      <span class="text-muted">Your cart</span>
                      <span class="badge badge-secondary badge-pill">1</span>
                    </h4>
                    <ul class="list-group mb-3">
                      <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                          <h6 class="my-0"><?= $product_details['productname'] ?></h6>
                          <small class="text-muted"><?= $product_details['kondisi'] ?></small>
                        </div>
                        <span class="text-muted"><?= $product_details['price'] ?></span>
                      </li>
                      <li class="list-group-item d-flex justify-content-between">
                        <span>Total (Rupiah)</span>
                        <strong><?= $product_details['price'] ?></strong>
                      </li>
                    </ul>

                  </div>
                  <div class="col-md-8 order-md-1">
                    <h4 class="mb-3">Billing address</h4>
                    <form class="needs-validation" novalidate action="<?= base_url().'home/checkout/'.$product_details['productid'].'/'.$product_details['varian']?>" method="post">
                      <div class="row">
                        <div class="col-md-6 mb-3">
                          <label for="firstName">First name</label>'
                          <input type="text" class="form-control" id="firstname" name="firstname"placeholder="" value="<?= $customer['firstname'] ?>" required>
                          <div class="invalid-feedback">
                            Valid first name is required.
                          </div>
                        </div>
                        <div class="col-md-6 mb-3">
                          <label for="lastName">Last name</label>
                          <input type="text" class="form-control" id="lastName"  name="lastname" placeholder="" value="<?= $customer['lastname'] ?>" required>
                          <div class="invalid-feedback">
                            Valid last name is required.
                          </div>
                        </div>
                      </div>

                      <div class="mb-3">
                        <label for="email">Email <span class="text-muted">(Optional)</span></label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com" value="<?= $this->session->email; ?>" required>
                        <div class="invalid-feedback">
                          Please enter a valid email address for shipping updates.
                        </div>
                      </div>

                      <div class="mb-3">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address1" name="address1" placeholder="1234 Main St" value="<?= $customer['address1'] ?>"  required>
                        <div class="invalid-feedback">
                          Please enter your shipping address.
                        </div>
                      </div>

                      <div class="mb-3">
                        <label for="address2">Address 2 <span class="text-muted"></span></label>
                        <input type="text" class="form-control" id="address2" name="address2" placeholder="Apartment or suite" value="<?= $customer['address2'] ?>"  required>
                      </div>

                      <div class="row">
                        <div class="col-md-5 mb-3">
                          <label for="country">Country</label>
                          <input type="text" class="form-control" id="country" name="country" placeholder="Country"required value="<?= $customer['country'] ?>" >
                          <div class="invalid-feedback">
                            Please fill a valid country.
                          </div>
                        </div>
                        <div class="col-md-4 mb-3">
                          <label for="state">State</label>
                          <input type="text" class="form-control" id="state" name="state" placeholder="State" value="<?= $customer['state'] ?>"  required>
                          <div class="invalid-feedback">
                            Please provide a valid state.
                          </div>
                        </div>
                        <div class="col-md-3 mb-3">
                          <label for="zip">Zip</label>
                          <input type="text" class="form-control" id="postalcode" name="postalcode" placeholder="" value="<?= $customer['postalcode'] ?>"  required>
                          <div class="invalid-feedback">
                            Zip code required.
                          </div>
                        </div>
                      </div>
                      <hr class="mb-4">

                      <h4 class="mb-3">Payment</h4>
                      <div class="row">
                        <div class="col-md-6 mb-3">
                          <label for="cc-name">Name on card</label>
                          <input type="text" class="form-control" id="cc-name"  name="cc-name" placeholder="" required>
                          <small class="text-muted">Full name as displayed on card</small>
                          <div class="invalid-feedback">
                            Name on card is required
                          </div>
                        </div>
                        <div class="col-md-6 mb-3">
                          <label for="cc-number">Credit card number</label>
                          <input type="text" class="form-control" id="cc-number" name="cc-number" placeholder="" required>
                          <div class="invalid-feedback">
                            Credit card number is required
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-3 mb-3">
                          <label for="cc-expiration">Expiration</label>
                          <input type="text" class="form-control" id="cc-expiration" name="cc-expiration" placeholder="" required>
                          <div class="invalid-feedback">
                            Expiration date required
                          </div>
                        </div>
                        <div class="col-md-3 mb-3">
                          <label for="cc-cvv">CVV</label>
                          <input type="text" class="form-control" id="cc-cvv" name="cc-cvv" placeholder="" required>
                          <input type="hidden" class="form-control" id="productid" name="productid" value="<?= $product_details['productid'] ?>" required>
                          <input type="hidden" class="form-control" id="varian" name="varian" value="<?= $product_details['varian'] ?>" required>
                          <div class="invalid-feedback">
                            Security code required
                          </div>
                        </div>
                      </div>
                      <hr class="mb-4">
                      <button class="btn btn-primary btn-lg btn-block" style="border-radius:10px;margin-top:20px;width:100%;background-color:#ff3278;border:0;font-size:30px; color:white;" type="submit">Continue to checkout</button>
                    </form>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Footer -->
  <!-- Core -->
  <?php $this->load->view('layout/footer.php') ?>
