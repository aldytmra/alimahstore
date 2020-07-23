<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
        //load model admin;
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->model('m_home');
		$this->load->model('m_customer');
	}
	
	public function index()
	{
        redirect('home/page');
	}

	public function page($rowno=0){

		// Search text
		$search_text = "";
		$category = "";
		if($this->input->post('submit') != NULL ){
		  $search_text = $this->input->post('search');
		  $this->session->set_userdata(array("search"=>$search_text));
		  $category = $this->input->post('categoryid');
		}else{
		  if($this->session->userdata('search') != NULL){
			$search_text = $this->session->userdata('search');
		  }
		}
		
	
		// Row per page
		$rowperpage = 12;
	
		// Row position
		if($rowno != 0){
		  $rowno = ($rowno-1) * $rowperpage;
		}
	 
		// All records count
		$allcount = $this->m_home->getrecordCount($search_text,$category);
	
		// Get records
		$products_record = $this->m_home->getData($rowno,$rowperpage,$search_text,$category);

		// Get 7 category
		$get_category = $this->m_home->getCategories(7);
	 
		// Pagination Configuration
		$config['base_url'] = base_url().'home/page';
		$config['use_page_numbers'] = TRUE;
		$config['total_rows'] = $allcount;
		$config['per_page'] = $rowperpage;
		$config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
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
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
	 
		$data['pagination'] = $this->pagination->create_links();
		$data['result'] = $products_record;
		$data['row'] = $rowno;
		$data['search'] = $search_text;
		$data['categories'] = $get_category;
		$data['categoryid'] = $category;
	
		// Load view
		$this->load->view('home',$data);
	 
	}

	public function p($productid){
	
		// Get records
		$products_details = $this->m_home->getProductDetails($productid);
		$products_details['varian'] = json_decode($products_details['varian']);
		$products_details['price'] = $this->rupiah($products_details['price']);
		$products_details['logo'] = base_url().'public/logos/'.$products_details['logo'];
		$products_details['link'] = base_url().'seller/info/'.$products_details['sellerid'] ;
		$data['product'] = $products_details;
	
		// Load view
		$this->load->view('productdetail',$data);
	 
	}

	
	public function checkout($productid,$varian){
	
		// Get records
		if($this->session->nama){
			if($this->session->role =='customer'){

				$this->form_validation->set_rules('email', 'Email', 'required');
				$this->form_validation->set_rules('firstname', 'Firstname', 'required');
				$this->form_validation->set_rules('lastname', 'Lastname', 'required');
				$this->form_validation->set_rules('address1', 'Address1', 'required');
				$this->form_validation->set_rules('address2', 'Address2', 'required');
				$this->form_validation->set_rules('postalcode', 'Postalcode', 'required');
				$this->form_validation->set_rules('country', 'Country', 'required');
				$this->form_validation->set_rules('state', 'State', 'required');
				$this->form_validation->set_rules('cc-name', 'CC Name', 'required');
				$this->form_validation->set_rules('cc-number', 'CC Number', 'required');
				$this->form_validation->set_rules('cc-expiration', 'CC Expiration', 'required');
				$this->form_validation->set_rules('cc-cvv', 'CC CVV', 'required');

				//set message form validation
				$this->form_validation->set_message('required', '<div class="alert alert-danger" style="margin-top: 3px">
						<div class="header"><b><i class="fa fa-exclamation-circle"></i> {field}</b> harus diisi</div></div>');

				//cek validasi
				if ($this->form_validation->run() == TRUE) {

					//get data dari FORM
					$post['email']= $this->input->post("email");
					$post['firstname'] = $this->input->post("firstname");
					$post['lastname'] = $this->input->post("lastname");
					$post['address1']= $this->input->post("address1");
					$post['address2'] = $this->input->post("address2");
					$post['postalcode'] = $this->input->post("postalcode");
					$post['country']= $this->input->post("country");
					$post['state']= $this->input->post("state");
					$post['ccname']= $this->input->post("cc-name");
					$post['ccnumber']= $this->input->post("cc-number");
					$post['ccexpiration']= $this->input->post("cc-expiration");
					$post['cccvv']= $this->input->post("cc-cvv");
					$post['customerid']= $this->session->id;
					$post['productid']= $this->input->post("productid");
					$post['varian']= $this->input->post("varian");
					$post['status']= 'Delivered';
					$post['paid']= 'yes';
					$id = $this->m_home->checkout($post);
					if ($id) {
						$this->session->set_flashdata("message", '<div class="alert alert-success">Selamat anda berhasil checkout!</div>');
						redirect('home/page');
						
					} else {
						$data['error'] = '<div class="alert alert-danger" style="margin-top: 3px">
						<div class="header"><b><i class="fa fa-exclamation-circle"></i> ERROR</b>akun anda tidak terdaftar!</div></div>';
						$this->load->view('registercustomer', $data);
					}
				

					//checking data via model
					
				} else {
					$data['product_details'] = $this->m_home->getProductDetails($productid);
					$data['product_details']['price'] = $this->rupiah($data['product_details']['price']);
					$data['product_details']['varian'] = $varian;
					$data['customer'] = $this->m_customer->getEditData($this->session->email);
					$this->load->view('checkout',$data);
				}
				
			}else{
				redirect('home/page');
			}
			// Load view
			
		}else{
			redirect('home/page');
		}
	 
	}

	public function sendcomment(){
	
		$post['comment'] = $this->input->post('comment');
		$post['productid'] = $this->input->post('productid');
		$post['idcomentator'] = $this->session->id;
		$post['rolecomentator'] = $this->session->role;
		// Get records
		$result = $this->m_home->sendComment($post);
	
		// Load view
		echo json_encode($result);
	 
	}

	public function comments($productid,$page,$rowno){

		// Row per page
		$rowperpage = 5;
	
		// Row position
		if($rowno != 0){
		  $rowno = ($rowno-1) * $rowperpage;
		}
	 
		// All records count
		$allcount = $this->m_home->getRecordCountComment($productid);
	
		// Get records
		$comments_record = $this->m_home->getDataComment($rowno,$rowperpage,$productid);

		foreach($comments_record as $key => $data){
			if($data['rolecomentator'] == 'seller'){
				$seller = $this->m_home->getSellerData($data['idcomentator']);
				$comments_record[$key]['avatar'] = base_url().'public/logos/'.$seller['logo'];
				$comments_record[$key]['nama'] = $seller['companyname'];
			}else{
				$customer = $this->m_home->getCustomerData($data['idcomentator']);
				$comments_record[$key]['avatar'] = base_url().'public/profile/'.$customer['foto'];
				$comments_record[$key]['nama'] = $customer['firstname'].$customer['lastname'];
			}
		}
	 
		// Pagination Configuration
		$config['base_url'] = base_url().'home/p/'.$productid;
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
		$data['result'] = $comments_record;
		$data['row'] = $rowno;
		$data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
	
		// Load view
		echo json_encode($data);
	 
	}

    function rupiah($angka){
	
        $hasil_rupiah = "Rp " . number_format($angka,0,',','.');
        return $hasil_rupiah;
     
    }
	
}
