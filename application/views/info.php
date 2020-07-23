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
            <div class="card-body px-lg-3 py-lg-3" >
							<div class="text-center">
              <img  style="height:150px;border-radius:50%; border: 1px solid white;box-shadow: 0 0 4px 1px rgba(0, 0, 0, 0.2) !important;" src="<?= $seller['logo']?>" />
              <br>
							<h1 style="color:white;"><?= $seller['companyname'] ?></h1>
							</div>
              <div class="text-center text-muted mb-2">
							
                <h5 style="color:gray;"><?= $seller['notes'] ?></h5>
                <br>
                <a href="<?= base_url()."seller/tambah"?>" class="btn btn-primary" style="width:200px;background-color:#ff3278;border:0;padding:10px 0px;font-size:20px; ">Tambah Produk</a>
                <?php if(isset($error)) { echo $error; }; ?>
              </div>
              <?php echo form_open_multipart(); ?>
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

    <div class="container" >
      <div class="row justify-content-center">
          <div class="col-lg-10 col-md-10" >
            <div class="row " style="margin-top:5px;padding:0px 10px;" id="container-products">
            </div>
            <div id="pagination">

            </div>
          </div>
      </div>
    </div>
  </div>
  <!-- Footer -->
  <!-- Core -->
  <?php $this->load->view('layout/footer.php') ?>
  <script>
        $('#pagination').on('click','a',function(e){
            e.preventDefault(); 
            var pageno = $(this).attr('data-ci-pagination-page');
            getProductSeller(pageno);
        });

        function getProductSeller(row_no = 0){
            $.ajax({
                type: "get",
                url: "<?php echo base_url() ?>seller/getProductSeller/" + <?=$seller['sellerid']?> + '/page/' +row_no,
                dataType: "JSON",
                success: function(data) {
                    $('#pagination').html(data.pagination)
                    var datafix = data.result;
                    var html = '';
                    datafix.forEach(function(element){
                        var toAppend= `<div class="col-md-3 col-xs-6 w-50 p-1">
                                        <div class="card h-100" style="border-radius:15px;">
                                            <img style="border-radius:15px 15px 0px 0px;" class="card-img-top" src="${element.foto}">
                                            <div class="card-body" style="padding:10px;">
                                                <h5 class="card-title" style="font-size:18px"><a style="color:black" href="${element.link}">${element.productname}</a></h5>
                                                <svg version="1.1" viewBox="0 0 20 20" class="mr-1 svg-icon svg-fill" style="width: 20px; height: 20px;"><path fill="#FAA701" stroke="none" pid="0" fill-rule="evenodd" clip-rule="evenodd" d="M10.663 2.423l2.052 4.387 4.663.715c.589.09.83.81.413 1.24l-3.398 3.494.795 4.887a.732.732 0 0 1-1.077.76L10 15.626l-4.11 2.28a.732.732 0 0 1-1.077-.76l.794-4.887-3.398-3.494a.736.736 0 0 1 .414-1.24l4.663-.715 2.052-4.387a.73.73 0 0 1 1.325 0z" _fill="#000"></path></svg><p style="display:inline;">4.8</p>
                                                <p class="card-text" style="color:gray;text-align:left;">${element.state}.</p>
                                                <?php if($this->session->role){?>
                                                      <?php if($this->session->role == 'customer'){?>
                                                        <a href="${element.link}" class="btn btn-primary" style="width:100%;background-color:#ff3278;border:0;">Beli</a>
                                                      <?php }else{ ?>
                                                        <div class="row">
                                                        <div class="col-md-6 ">
                                                        <a href="${element.link}" class="btn btn-primary" style="width:100%;background-color:#ff3278;border:0;">Lihat</a>
                                                        </div>
                                                        <div class="col-md-6">
                                                        <a onClick=deleteProduct(${element.productid}) class="btn btn-primary" style="width:100%;background-color:#22215B;border:0;color:white;">Hapus</a>
                                                        </div>
                                                        </div>
                                                      <?php }?>
                                                <?php }else{ ?>
                                                  <a href="${element.link}" class="btn btn-primary" style="width:100%;background-color:#ff3278;border:0;">Beli</a>
                                                <?php }?>
                                                
                                            </div>
                                        </div>
                                    </div>`
                        
                        html += toAppend
                    })

                    $('#container-products').html(html)
                }
            });       
        }     

        getProductSeller();  

        function deleteProduct(productid){
          Swal.fire({
            title: 'Apakah kamu yakin?',
            text: "kamu tidak bisa mengembalikannya!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!'
          }).then((result) => {
            if (result.value) {
              $.ajax({
                  type: "POST",
                  url: "<?php echo base_url() ?>seller/deleteProduct",
                  data:{
                      productid:productid
                  },
                  dataType: "JSON",
                  success: function(data) {
                    Swal.fire(
                      'Berhasil!',
                      'Produk berhasil dihapus.',
                      'success'
                    )
                    getProductSeller();  
                  }
              }); 
              
            }
          })
        }

</script>
