<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->model('m_customer');
        $this->load->library('session');
        $this->load->library('pagination');
	}
    
    
	public function fotout()
	{
		if ($this->m_customer->logged_id()) {
            //jika memang session sudah terdaftar, maka redirect ke halaman dahsboard
            session_destroy();
            redirect("home/page");
        } 
    }
	public function login()
	{
		if ($this->m_customer->logged_id()) {
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
                $checking = $this->m_customer->check_login($email, $password);

                //jika ditemukan, maka create session
                if ($checking != FALSE) {


                    $sess = array('foto' => $checking['foto'],'email' => $checking['email'],'nama' => $checking['firstname'].' '.$checking['lastname'], 'role' => 'customer', 'id' => $checking['customerid']);
                    $this->session->set_userdata($sess);
                    redirect('home');
                } else {

                    $data['error'] = '<div class="alert alert-danger" style="margin-top: 3px">
                        <div class="header"><b><i class="fa fa-exclamation-circle"></i> ERROR</b> Email atau Password salah!</div></div>';
                    $this->load->view('logincustomer', $data);
                }
            } else {
                $this->load->view('logincustomer.php');
            }
        }
    }
    
    public function register()
	{
		if ($this->m_customer->logged_id()) {
            //jika memang session sudah terdaftar, maka redirect ke halaman dahsboard
            redirect("home");
        } else {

            //jika session belum terdaftar

            //set form validation
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('phone', 'Phone', 'required');
            $this->form_validation->set_rules('firstname', 'Firstname', 'required');
            $this->form_validation->set_rules('lastname', 'Lastname', 'required');
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
                $post['firstname'] = $this->input->post("firstname");
                $post['lastname'] = $this->input->post("lastname");
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
                    $this->load->view('registercustomer', $data);
                }else{
                    $post['password'] = password_hash($post['password'], PASSWORD_DEFAULT);
                    $isThere = $this->m_customer->check_replicateemail($post['email']);
                   
                    //jika ditemukan, maka create session
                    if ($isThere == FALSE) {
                        $config['upload_path']   = './public/profile'; 
                        $config['allowed_types'] = 'gif|jpg|jpeg|png'; 
                        $config['max_size']      = 20000; 
                        $config['max_width']     = 2000; 
                        $config['max_height']    = 1500;  
                        
                        $dname = explode(".", $_FILES['foto']['name']);
                        $ext = end($dname);
                        $filename='file_'.time().'_'. $post['firstname'].$post['lastname'];
                        $config['file_name'] = $filename;
                        $this->load->library('upload', $config);

                        if ( !$this->upload->do_upload('foto')) 
                        {
                            $data['error'] = '<div class="alert alert-danger" style="margin-top: 3px">
                            <div class="header"><b><i class="fa fa-exclamation-circle"></i> ERROR</b>Mohon upload foto profile anda!</div></div>';
                            $this->load->view('registercustomer', $data);
                        }
                        else 
                        { 
                           $post['foto'] = $filename.'.'.$ext ; 
                           $id = $this->m_customer->registerdata($post);
                            if ($id) {
                                $this->session->set_flashdata("message", '<div class="alert alert-success">Selamat akun berhasil terdaftar silahkan login!</div>');
                                redirect('customer/login');
                                
                            } else {
                                $data['error'] = '<div class="alert alert-danger" style="margin-top: 3px">
                                <div class="header"><b><i class="fa fa-exclamation-circle"></i> ERROR</b>Akun gagal terdaftar mohon coba lagi!</div></div>';
                                $this->load->view('registercustomer', $data);
                            }
                        }
                       
                    } else {
    
                        $data['error'] = '<div class="alert alert-danger" style="margin-top: 3px">
                            <div class="header"><b><i class="fa fa-exclamation-circle"></i> ERROR</b> Email sudah terdaftar!</div></div>';
                        $this->load->view('registercustomer', $data);
                    }
                }
               

                //checking data via model
                
            } else {

                $this->load->view('registercustomer.php');
            }
        }
    }
    
    public function profile()
	{
		if ($this->m_customer->logged_id()) {
            //jika memang session sudah terdaftar, maka redirect ke halaman dahsboard
            //jika session belum terdaftar
            $post['phone'] = $this->input->post("phone");
            $post['firstname'] = $this->input->post("firstname");
            $post['lastname'] = $this->input->post("lastname");
            $post['address1']= $this->input->post("address1");
            $post['address2'] = $this->input->post("address2");
            $post['postalcode'] = $this->input->post("postalcode");
            $post['country']= $this->input->post("country");
            $post['city'] = $this->input->post("city");
            $post['state']= $this->input->post("state");

            //set message form validation
            $this->form_validation->set_message('required', '<div class="alert alert-danger" style="margin-top: 3px">
                    <div class="header"><b><i class="fa fa-exclamation-circle"></i> {field}</b> harus diisi</div></div>');

            //cek validasi
            if ($this->form_validation->run() == TRUE) {

                //get data dari FORM
                $post['phone'] = $this->input->post("phone");
                $post['firstname'] = $this->input->post("firstname");
                $post['lastname'] = $this->input->post("lastname");
                $post['address1']= $this->input->post("address1");
                $post['address2'] = $this->input->post("address2");
                $post['postalcode'] = $this->input->post("postalcode");
                $post['country']= $this->input->post("country");
                $post['city'] = $this->input->post("city");
                $post['state']= $this->input->post("state");

                $config['upload_path']   = './public/profile/'; 
                $config['allowed_types'] = 'gif|jpg|png'; 
                $config['max_size']      = 20000; 
                $config['max_width']     = 2000; 
                $config['max_height']    = 1500;  
                
                if($_FILES['foto']){
                    $dname = explode(".", $_FILES['foto']['name']);
                    $ext = end($dname);
                    $filename='file_'.time().'_'. str_replace(" ","",$post['firstname'].$post['lastname']);
                    $config['file_name'] = $filename;
                    $this->load->library('upload', $config);
                       
                    if ( $this->upload->do_upload('foto')) 
                    { 
                        $post['foto'] = $filename.'.'.$ext ; 
                        $sess = array('foto' =>  $post['foto']);
                        $this->session->set_userdata($sess);
                    }   
                }
                
                    
                   $id = $this->m_customer->editprofile($post);
                   if ($id) {
                        $sess = array('nama' => $post['firstname'].$post['lastname']);
                        $this->session->set_userdata($sess);

                       $this->session->set_flashdata("message", '<div class="alert alert-success">Data profile berhasil diubah!</div>');
                       redirect('home/page');
                   } else {
                       $data['error'] = '<div class="alert alert-danger" style="margin-top: 3px">
                       <div class="header"><b><i class="fa fa-exclamation-circle"></i> ERROR</b>profile gagal diedit mohon coba lagi!</div></div>';
                       $this->load->view('profilecustomer.php', $data);
                   }
            } else {
                $data = $this->m_customer->getEditData($this->session->email);

                $this->load->view('profilecustomer.php',$data);
            }
            
        } else {
            redirect("customer/login");
            
        }
    }

    public function myOrders()
	{
		if ($this->m_customer->logged_id()) {
            //jika memang session sudah terdaftar, maka redirect ke halaman dahsboard
            $this->load->view('myorders');
        } else{
            redirect("customer/login");
        }
    }

    public function getDataMyOrders($rowno)
	{
		if ($this->m_customer->logged_id()) {

             // Row per page
             $rowperpage = 5;
            
             // Row position
             if($rowno != 0){
               $rowno = ($rowno-1) * $rowperpage;
             }
          
             // All records count
             $allcount = $this->m_customer->getRecordCountOrders($this->session->id);
         
             // Get records
             $orders_record = $this->m_customer->getMyOrders($rowperpage,$rowno,$this->session->id); 
     
             foreach($orders_record as $key => $data){
                 $orders_record[$key]['foto'] = base_url().'public/photoproducts/'.$orders_record[$key]['foto'];
                 $orders_record[$key]['price'] = $this->rupiah($orders_record[$key]['price']);
                 $date = date("Y-m-d", strtotime($orders_record[$key]['orderdate']));
                 $orders_record[$key]['orderdate'] = $this->tanggal_indonesia($date);
             }
          
             // Pagination Configurationga
             $config['base_url'] = base_url().'customer/getDataMyOrders/'.$this->session->id;
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
             $data['result'] = $orders_record;
             $data['row'] = $rowno;
             $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
         
             // Load view
             echo json_encode($data);
        } 
    }

    function tanggal_indonesia($tanggal){
        $bulan = array (
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
        );
        
        $pecahkan = explode('-', $tanggal);
        
        // variabel pecahkan 0 = tanggal
        // variabel pecahkan 1 = bulan
        // variabel pecahkan 2 = tahun
         
        return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
    }
    
    public function logout()
	{
		if ($this->m_customer->logged_id()) {
            //jika memang session sudah terdaftar, maka redirect ke halaman dahsboard
            session_destroy();
            redirect("home/page");
        } 
    }

    function rupiah($angka){
	
        $hasil_rupiah = "Rp " . number_format($angka,0,',','.');
        return $hasil_rupiah;
     
    }
}