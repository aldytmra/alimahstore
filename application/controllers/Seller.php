<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seller extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->model('m_seller');
        $this->load->library('session');
        $this->load->library('pagination');
	}
	
	public function login()
	{
		if ($this->m_seller->logged_id()) {
            //jika memang session sudah terdaftar, maka redirect ke halaman dahsboard
            redirect("home");
        } else {

            //jika session belum terdaftar

            //set form validation
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');

            //set message form validation
            $this->form_validation->set_message('required', '<div class="alert alert-danger" style="margin-top: 3px">
                    <div class="header"><b><i class="fa fa-exclamation-circle"></i> {field}</b> harus diisi</div></div>');

            //cek validasi
            if ($this->form_validation->run() == TRUE) {

                //get data dari FORM
                $email = $this->input->post("email", TRUE);
                $password = $this->input->post('password', TRUE);

                //checking data via model
                $checking = $this->m_seller->check_login($email, $password);

                //jika ditemukan, maka create session
                if ($checking != FALSE) {


                    $sess = array('nama' => $checking['companyname'],'logo' => $checking['logo'],'email' => $checking['email'], 'role' => 'seller', 'id' => $checking['sellerid'],'keterangan'=>$checking['notes']);
                    $this->session->set_userdata($sess);
                    redirect('home');
                } else {

                    $data['error'] = '<div class="alert alert-danger" style="margin-top: 3px">
                        <div class="header"><b><i class="fa fa-exclamation-circle"></i> ERROR</b> Email atau Password salah!</div></div>';
                    $this->load->view('loginseller', $data);
                }
            } else {

                $this->load->view('loginseller.php');
            }
        }
    }

    public function logout()
	{
		if ($this->m_seller->logged_id()) {
            //jika memang session sudah terdaftar, maka redirect ke halaman dahsboard
            session_destroy();
            redirect("home/page");
        } 
    }
    
    public function register()
	{
		if ($this->m_seller->logged_id()) {
            //jika memang session sudah terdaftar, maka redirect ke halaman dahsboard
            redirect("home");
        } else {

            //jika session belum terdaftar

            //set form validation
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('phone', 'Phone', 'required');
            $this->form_validation->set_rules('companyname', 'Company Name', 'required');
            $this->form_validation->set_rules('notes', 'Information', 'required');
            $this->form_validation->set_rules('address1', 'Address1', 'required');
            $this->form_validation->set_rules('address2', 'Address2', 'required');
            $this->form_validation->set_rules('postalcode', 'Postalcode', 'required');
            $this->form_validation->set_rules('country', 'Country', 'required');
            $this->form_validation->set_rules('city', 'City', 'required');
            $this->form_validation->set_rules('state', 'State', 'required');
            $this->form_validation->set_rules('passwordconfirmation', 'Passwordconfirmation', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');

            //set message form validation
            $this->form_validation->set_message('required', '<div class="alert alert-danger" style="margin-top: 3px">
                    <div class="header"><b><i class="fa fa-exclamation-circle"></i> {field}</b> harus diisi</div></div>');

            //cek validasi
            if ($this->form_validation->run() == TRUE) {

                //get data dari FORM
                $post['email']= $this->input->post("email");
                $post['phone'] = $this->input->post("phone");
                $post['companyname'] = $this->input->post("companyname");
                $post['notes'] = $this->input->post("notes");
                $post['address1']= $this->input->post("address1");
                $post['address2'] = $this->input->post("address2");
                $post['postalcode'] = $this->input->post("postalcode");
                $post['country']= $this->input->post("country");
                $post['city'] = $this->input->post("city");
                $post['state']= $this->input->post("state");
                $post['password'] = $this->input->post('password');
                $passwordconfirmation = $this->input->post("passwordconfirmation");

                if($post['password'] != $passwordconfirmation){
                    
                    $data['error'] = '<div class="alert alert-danger" style="margin-top: 3px">
                        <div class="header"><b><i class="fa fa-exclamation-circle"></i> ERROR</b> Password dan Konfirmasi password tidak sama!</div></div>';
                    $this->load->view('registerseller', $data);
                }else{
                    $post['password'] = password_hash($post['password'], PASSWORD_DEFAULT);
                    $isThere = $this->m_seller->check_replicateemail($post['email']);
                   
                    //jika ditemukan, maka create session
                    if ($isThere == FALSE) {
                        $config['upload_path']   = './public/logos/'; 
                        $config['allowed_types'] = 'gif|jpg|png'; 
                        $config['max_size']      = 20000; 
                        $config['max_width']     = 2000; 
                        $config['max_height']    = 1500;  
                        
                        $dname = explode(".", $_FILES['logo']['name']);
                        $ext = end($dname);
                        $filename='file_'.time().'_'. $post['companyname'];
                        $config['file_name'] = $filename;
                        $this->load->library('upload', $config);
                           
                        if ( !$this->upload->do_upload('logo')) 
                        {
                            $data['error'] = '<div class="alert alert-danger" style="margin-top: 3px">
                            <div class="header"><b><i class="fa fa-exclamation-circle"></i> ERROR</b>Mohon upload logo toko anda!</div></div>';
                            $this->load->view('registerseller', $data);
                        }
                        else 
                        { 
                           $post['logo'] = $filename.'.'.$ext ; 
                           $id = $this->m_seller->registerdata($post);
                           if ($id) {
                               $this->session->set_flashdata("message", '<div class="alert alert-success">Selamat akun berhasil terdaftar silahkan login!</div>');
			                   redirect('seller/login');
                               
                           } else {
                               $data['error'] = '<div class="alert alert-danger" style="margin-top: 3px">
                               <div class="header"><b><i class="fa fa-exclamation-circle"></i> ERROR</b>Akun gagal terdaftar mohon coba lagi!</div></div>';
                               $this->load->view('registerseller', $data);
                           }
                        }
    
                       
                    } else {
    
                        $data['error'] = '<div class="alert alert-danger" style="margin-top: 3px">
                            <div class="header"><b><i class="fa fa-exclamation-circle"></i> ERROR</b> Email sudah terdaftar!</div></div>';
                        $this->load->view('registerseller', $data);
                    }
                }
               

                //checking data via model
                
            } else {

                $this->load->view('registerseller.php');
            }
        }
    }
    
    public function profile()
	{
		if ($this->m_seller->logged_id()) {
            //jika memang session sudah terdaftar, maka redirect ke halaman dahsboard
            //jika session belum terdaftar

            //set form validation
            $this->form_validation->set_rules('phone', 'Phone', 'required');
            $this->form_validation->set_rules('companyname', 'Company Name', 'required');
            $this->form_validation->set_rules('notes', 'Information', 'required');
            $this->form_validation->set_rules('address1', 'Address1', 'required');
            $this->form_validation->set_rules('address2', 'Address2', 'required');
            $this->form_validation->set_rules('postalcode', 'Postalcode', 'required');
            $this->form_validation->set_rules('country', 'Country', 'required');
            $this->form_validation->set_rules('city', 'City', 'required');
            $this->form_validation->set_rules('state', 'State', 'required');

            //set message form validation
            $this->form_validation->set_message('required', '<div class="alert alert-danger" style="margin-top: 3px">
                    <div class="header"><b><i class="fa fa-exclamation-circle"></i> {field}</b> harus diisi</div></div>');

            //cek validasi
            if ($this->form_validation->run() == TRUE) {

                //get data dari FORM
                $post['phone'] = $this->input->post("phone");
                $post['companyname'] = $this->input->post("companyname");
                $post['notes'] = $this->input->post("notes");
                $post['address1']= $this->input->post("address1");
                $post['address2'] = $this->input->post("address2");
                $post['postalcode'] = $this->input->post("postalcode");
                $post['country']= $this->input->post("country");
                $post['city'] = $this->input->post("city");
                $post['state']= $this->input->post("state");

                $config['upload_path']   = './public/logos/'; 
                $config['allowed_types'] = 'gif|jpg|png'; 
                $config['max_size']      = 20000; 
                $config['max_width']     = 2000; 
                $config['max_height']    = 1500;  
                
                if($_FILES['logo']){
                    $dname = explode(".", $_FILES['logo']['name']);
                    $ext = end($dname);
                    $filename='file_'.time().'_'. str_replace(" ","",$post['companyname']);
                    $config['file_name'] = $filename;
                    $this->load->library('upload', $config);
                       
                    if ( $this->upload->do_upload('logo')) 
                    { 
                        $post['logo'] = $filename.'.'.$ext ; 
                        $sess = array('logo' =>  $post['logo']);
                        $this->session->set_userdata($sess);
                    }   
                }
                
                    
                   $id = $this->m_seller->editprofile($post);
                   if ($id) {
                        $sess = array('nama' => $post['companyname']);
                        $this->session->set_userdata($sess);

                       $this->session->set_flashdata("message", '<div class="alert alert-success">Data profile berhasil diubah!</div>');
                       redirect('home/page');
                   } else {
                       $data['error'] = '<div class="alert alert-danger" style="margin-top: 3px">
                       <div class="header"><b><i class="fa fa-exclamation-circle"></i> ERROR</b>profile gagal diedit mohon coba lagi!</div></div>';
                       $this->load->view('profileseller.php', $data);
                   }
               
              

                //checking data via model
                
            } else {
                $data = $this->m_seller->getEditData($this->session->email);
                $this->load->view('profileseller.php',$data);
            }
            
        } else {
            redirect("seller/login");
            
        }
    }
    
    public function info($sellerid)
	{
        $data['seller'] = $this->m_seller->getDataSeller($sellerid);
        $data['seller']['logo'] = base_url().'public/logos/'.$data['seller']['logo'];
        $this->load->view('info',$data);
    }

    public function getProductSeller($sellerid,$page,$rowno){

		// Row per page
		$rowperpage = 12;
	
		// Row position
		if($rowno != 0){
		  $rowno = ($rowno-1) * $rowperpage;
		}
	 
		// All records count
		$allcount = $this->m_seller->getRecordCountProductSeller($sellerid);
	
		// Get records
		$products_record = $this->m_seller->getDataProductSeller($rowno,$rowperpage,$sellerid);

		foreach($products_record as $key => $data){
            $products_record[$key]['foto'] = base_url().'public/photoproducts/'.$products_record[$key]['foto'];	
            $products_record[$key]['link'] = base_url().'home/p/'.$products_record[$key]['productid'] ;
		}
	 
		// Pagination Configuration
		$config['base_url'] = base_url().'home/p/'.$sellerid;
		$config['use_page_numbers'] = TRUE;
		$config['total_rows'] = $allcount;
		$config['per_page'] = $rowperpage;
		$config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-start">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link" style="color: #FF3278;">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link" style="background-color: #FF3278;border-color: #FF3278;">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
 
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		$data['result'] = $products_record;
		$data['row'] = $rowno;
		$data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
	
		// Load view
		echo json_encode($data);
	 
    }
    
    public function tambah(){
        if($this->session->role){
            if($this->session->role == 'seller'){
                
                $this->form_validation->set_rules('productname', 'Nama Produk', 'required');
                $this->form_validation->set_rules('price', 'Harga', 'required');
                $this->form_validation->set_rules('productdescription', 'Deskripsi Produk', 'required');
                $this->form_validation->set_rules('categoryid', 'Kategori', 'required');
                $this->form_validation->set_rules('stock', 'Stock', 'required');
                $this->form_validation->set_rules('berat', 'Berat', 'required');
                $this->form_validation->set_rules('kondisi', 'Kondisi', 'required');
                $this->form_validation->set_rules('varian', 'Varian', 'required');

                //set message form validation
                $this->form_validation->set_message('required', '<div class="alert alert-danger" style="margin-top: 3px">
                        <div class="header"><b><i class="fa fa-exclamation-circle"></i> {field}</b> harus diisi</div></div>');

                //cek validasi
                if ($this->form_validation->run() == TRUE) {

                    //get data dari FORM
                    $post['productname'] = $this->input->post("productname");
                    $post['price'] = $this->input->post("price");
                    $post['productdescription'] = $this->input->post("productdescription");
                    $post['categoryid']= $this->input->post("categoryid");
                    $post['stock'] = $this->input->post("stock");
                    $post['berat'] = $this->input->post("berat");
                    $post['kondisi']= $this->input->post("kondisi");
                    $str =  $this->input->post("varian");
                    $splitted = explode(",", $str);
                    $post['varian']= json_encode($splitted);
                    $post['sellerid']= $this->session->id;

                    $config['upload_path']   = './public/photoproducts/'; 
                    $config['allowed_types'] = 'gif|jpg|png'; 
                    $config['max_size']      = 20000; 
                    $config['max_width']     = 2000; 
                    $config['max_height']    = 1500;  
                    
                    if($_FILES['foto']){
                        $dname = explode(".", $_FILES['foto']['name']);
                        $ext = end($dname);
                        $filename='file_'.time().'_'. str_replace(" ","",$this->session->nama);
                        $config['file_name'] = $filename;
                        $this->load->library('upload', $config);
                        
                        if ( $this->upload->do_upload('foto')) 
                        { 
                            $post['foto'] = $filename.'.'.$ext ;
                        }   
                    }
                    
                        
                    $id = $this->m_seller->addProduct($post);
                    if ($id) {
                        $this->session->set_flashdata("message", '<div class="alert alert-success">Produk berhasil ditambahkan!</div>');
                        redirect('seller/info/'.$this->session->id);
                    } else {
                        $data['error'] = '<div class="alert alert-danger" style="margin-top: 3px">
                        <div class="header"><b><i class="fa fa-exclamation-circle"></i> ERROR</b>Produk gagal ditambahkan!</div></div>';
                        $this->load->view('tambah', $data);
                    }
                
                

                    //checking data via model
                    
                } else {
                    $data['categories'] = $this->m_seller->getCategories();

                    $this->load->view('tambah',$data);
                }

               
            }else{
                redirect("seller/login");
            }
        }else{
            redirect("seller/login");
        }
    }  

    public function deleteProduct(){
        // Get records

        if($this->session->role == 'seller'){
            $productid = $this->input->post("productid");
            $result = $this->m_seller->deleteProduct($productid,$this->session->id);
    
            // Load view
            echo json_encode($result);   
        }else{
            redirect("seller/login");
        } 
         
    }

}
