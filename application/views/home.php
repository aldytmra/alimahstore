<?php $this->load->view('layout/header.php') ?>
<link href="<?php echo base_url();?>assets/css/stylenav.css" rel="stylesheet" type="text/css" />
<style>

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

@media only screen and (max-width: 600px) {
  /* For tablets: */
  .bxslidercontainer {display:none}
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
</style>
<div class="navigation-wrap bg-light start-header start-style">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<nav class="navbar navbar-expand-md navbar-light">
    
						<a class="navbar-brand" href="<?= base_url()?>"><img src="<?php echo base_url();?>assets/images/mylogo.png" alt=""></a>	
						<div class="search_box" id="bottomCard" >
                            <form action="<?=base_url().'home/page'?>" method="post" style="width:610px;">
                                <input type='text' class="categoryid" id="categoryid" name='categoryid' style="display:none;" value='<?= $categoryid ?>'>
                                <input type='text' class="search" name='search' placeholder="Apa yang kamu cari?" value='<?= $search ?>'><button type='submit' name='submit' id="submit" value='Submit' style="padding: 0;border: none;background: none;"> <i class="fa fa-search" style="fill:black;position:absolute;top:25%;right:15px;font-size:25px;color:gray;" ></i></button>
                            </form>
                        </div>
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
<div class="container" style="margin-top:100px;">
    <div class="row">
        <div class="col-md-12 p-2">
        <?php echo $this->session->flashdata('message'); ?>
        </div>
        <div class="col-md-3 p-2">
            <div class="card" style="border-radius:15px;">
                    <div class="card-body">
                        <h5 class="card-title color-pink">KATEGORI</h5>
                        <?php 
                            $sno = $row+1;
                            foreach($categories as $data){

                            echo '<button style="padding: 10px;border: none;background: none;display:block" class="nav-link" onclick="getDataByCategory('.$data["categoryid"].')">'.$data['categoryname'].'</button>';
                            $sno++;

                            }
                            if(count($result) == 0){
                            echo '<center>There;s No category.</center>';
                            }
                        ?>
                    </div>
            </div>
                <div class="card" style="border-radius:15px;margin-top:20px;">
                    <div class="card-body">
                        <h5 class="card-title color-pink">POPULER</h5>
                        <a class="nav-link" href="#" style="display:block">Sepatu Pria</a>
                        <a class="nav-link" href="#" style="display:block">Sepeda Brompton</a>
                        <a class="nav-link" href="#" style="display:block">Alat Gym</a>
                        <a class="nav-link" href="#" style="display:block">Setelan Wanita</a>
                        <a class="nav-link" href="#" style="display:block">Jacket Slimfit</a>
                        <a class="nav-link" href="#" style="display:block">Kaos Champion</a>
                    </div>
                </div>
        </div>
        <div class="col-md-9">
            <div class="row p-1" style="margin-top:5px;">
            <center class="bxslidercontainer">
                <div class="bxslider">
                    <div><img src="<?php echo base_url(); ?>assets/images/banner/banner1.jpg" style="width:100%"></div>
                    <div><img src="<?php echo base_url(); ?>assets/images/banner/banner2.jpg" style="width:100%"></div>
                    <div><img src="<?php echo base_url(); ?>assets/images/banner/banner3.jpg" style="width:100%"></div>
                </div>
            </center>
            <?php 
            $sno = $row+1;
            foreach($result as $data){

            echo '<div class="col-md-3 col-xs-6 w-50 p-1">
            <div class="card h-100" style="border-radius:15px;">
                <img style="border-radius:15px 15px 0px 0px;" class="card-img-top" src="' .base_url() .'public/photoproducts/'.$data['foto'].'" alt="'.$data['productname'].'">
                <div class="card-body" style="padding:10px;">
                    <h5 class="card-title" style="font-size:18px"><a style="color:black" href="'.base_url().'home/p/'.$data['productid'].'">'.$data['productname'].'</a></h5>
                    <svg version="1.1" viewBox="0 0 20 20" class="mr-1 svg-icon svg-fill" style="width: 20px; height: 20px;"><path fill="#FAA701" stroke="none" pid="0" fill-rule="evenodd" clip-rule="evenodd" d="M10.663 2.423l2.052 4.387 4.663.715c.589.09.83.81.413 1.24l-3.398 3.494.795 4.887a.732.732 0 0 1-1.077.76L10 15.626l-4.11 2.28a.732.732 0 0 1-1.077-.76l.794-4.887-3.398-3.494a.736.736 0 0 1 .414-1.24l4.663-.715 2.052-4.387a.73.73 0 0 1 1.325 0z" _fill="#000"></path></svg><p style="display:inline;">4.8</p>
                    <p class="card-text" style="color:gray;text-align:left;">'.$data['state'].'.</p>
                    <a href="'.base_url().'home/p/'.$data['productid'].'" class="btn btn-primary" style="width:100%;background-color:#ff3278;border:0;">Beli</a>
                </div>
            </div>
        </div>';
            $sno++;

            }
            if(count($result) == 0){
            echo '<center>No record found.</center>';
            }
            ?>
            
                
            </div>
            <div style='margin-top: 10px;float:left;margin-left:-5px;'>
   <?= $pagination; ?>
</div>
        </div>
    </div>
    

   <!-- Paginate -->
   

<?php $this->load->view('layout/footer.php') ?>
<script>
		$('.bxslider').bxSlider({
			auto: true,
			autoControls: false,
			stopAutoOnClick: false,
			pager: true,
			slideWidth: 900
		});

        $('#searchNow').on('click',function(){
            $('#submit').click()
        })

        function getDataByCategory(categoryid){
            $('#categoryid').val(categoryid)
            $('#submit').trigger('click')
        }

</script>