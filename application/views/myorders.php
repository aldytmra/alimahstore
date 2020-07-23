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
p,.pagination{
    text-align:left;
}
.textarea-container {
  position: relative;
}
.textarea-container textarea {
  width: 100%;
  height: 100%;
  box-sizing: border-box;
}
.textarea-container button {
  position: absolute;
  top: 0;
  right: 2px;
  margin:12px 0px;
  height:45px;
  background-color:#ff3278;
  border:0;
  color:white;
  width:100px;
}
</style>
<div class="navigation-wrap bg-light start-header start-style">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<nav class="navbar navbar-expand-md navbar-light">
    
						<a class="navbar-brand" href="<?= base_url()?>"><img src="<?php echo base_url();?>assets/images/mylogo.png" alt=""></a>	
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
    <div class="container" style="margin-top:120px;">
            <div class="row mt-1">
                <div class="col-md-12 p-2">
                    <div class="card p-4" style="border-radius:15px;box-shadow: 0 0 4px 1px rgba(0, 0, 0, 0.1) !important;">
                            <h2 style="text-align:left;font-size:30px;color:#22215B;font-weight:bold">Pesanan Saya : </h2>
                            <div id="container-myorders" class="container-myorders">

                            </div>
                            
                            <div id="pagination">

                            </div>
                    </div>            
                </div>
            </div>
    </div>
<?php $this->load->view('layout/footer.php') ?>
<script>
        $('#pagination').on('click','a',function(e){
            e.preventDefault(); 
            var pageno = $(this).attr('data-ci-pagination-page');
            getDataMyOrders(pageno);
        });

        function getDataMyOrders(row_no = 0){
            $.ajax({
                type: "get",
                url: "<?php echo base_url() ?>customer/getDataMyOrders/"+row_no,
                dataType: "JSON",
                success: function(data) {
                    $('#pagination').html(data.pagination)
                    var datafix = data.result;
                    var html = '';
                    datafix.forEach(function(element){
                        var toAppend= `<div class="row" style="border:1px solid #f1f1f1;padding:10px 0px;margin:10px 0px;">
                                <div class="col-md-4">
                                    <img src="${element.foto}" alt="Avatar" class="avatar">&nbsp;
                                    <b>${element.productname}</b>  
                                </div>
                                <div class="col-md-2">
                                <b>Status</b> : ${element.status}<span style="margin-right:50px;"></span>
                                </div>
                                <div class="col-md-2">
                                <b>Harga</b> : ${element.price}
                                </div>
                                <div class="col-md-3">
                                <b>Tanggal</b> : ${element.orderdate}
                                </div>
                            </div>`
                        
                        html += toAppend
                    })

                    $('#container-myorders').html(html)
                }
            });       
        }     

        getDataMyOrders();  

                  

</script>