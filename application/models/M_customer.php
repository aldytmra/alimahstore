<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Customer extends CI_Model {


	public function __construct()
    {
        parent::__construct();
        //load model admin
		$this->load->library('session');
    }
	 //fungsi cek session
	 function logged_id()
	 {
		 return $this->session->email;
	 }
 
	 //fungsi check login
	 function check_login($email, $password)
	 {

		 // fetch by username first
		 $this->db->where('email', $email);
		 $query = $this->db->get('customers');
		 $result = $query->row_array(); // get the row first
	 
		 if (!empty($result) && password_verify($password, $result['password'])) {
			 // if this username exists, and the input password is verified using password_verify
			 return $result;
		 } else {
			 return FALSE;
		 }
	 }

	 function check_replicateemail($email)
	 {

		 // fetch by username first
		 $this->db->where('email', $email);
		 $query = $this->db->get('customers');
		 $result = $query->row_array(); // get the row first
	 
		 if (!empty($result)) {
			 // if this username exists, and the input password is verified using password_verify
			 return $result['email'];
		 } else {
			 return FALSE;
		 }
	 }

	 function registerdata($post){
		$this->db->insert('customers', $post);
		return $this->db->insert_id();
	 }

	 function change_pass($user_id,$new_pass)
	{

		$passwordfix = password_hash($new_pass, PASSWORD_DEFAULT);
		$update_pass=$this->db->query("UPDATE admin set password='$passwordfix' where id='$user_id'");
	}

	function editprofile($post){
		$this->db->where('email', $this->session->email);
		$this->db->update('customers', $post);
		return $this->session->email;
	 }

	function getEditData($email){
		$this->db->select('firstname,lastname,phone,address1,address2,postalcode,country,city,state');
		$this->db->where('email', $email);
		$query = $this->db->get('customers');
		$result = $query->row_array();
		return $result;
	}

	function getMyOrders($rowperpage,$rowno,$id) {
 
		$this->db->select('orders.*,products.price,products.foto,products.productname');
		$this->db->from('orders');
		$this->db->join('products','orders.productid = products.productid');
		$this->db->where('customerid', $id);
		$this->db->order_by('orderid', 'desc');
		
	
		$this->db->limit($rowperpage, $rowno); 
		$query = $this->db->get();
	 
		return $query->result_array();
	  }

	  function getRecordCountOrders($id) {
	
		$this->db->select('count(*) as allcount');
		$this->db->from('orders');
		$this->db->where('customerid', $id);
	 
		$query = $this->db->get();
		$result = $query->result_array();
	 
		return $result[0]['allcount'];
	  }
}
