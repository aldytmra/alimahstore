<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Seller extends CI_Model {


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
		 $query = $this->db->get('sellers');
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
		 $query = $this->db->get('sellers');
		 $result = $query->row_array(); // get the row first
	 
		 if (!empty($result)) {
			 // if this username exists, and the input password is verified using password_verify
			 return $result['email'];
		 } else {
			 return FALSE;
		 }
	 }

	 
	 function registerdata($post){
		$this->db->insert('sellers', $post);
		return $this->db->insert_id();
	 }

	 function addProduct($post){
		$this->db->insert('products', $post);
		return $this->db->insert_id();
	 }

	 function editprofile($post){
		$this->db->where('email', $this->session->email);
		$this->db->update('sellers', $post);
		return $this->session->email;
	 }

	 function deleteProduct($productid,$id){
		$this->db->where('productid', $productid);
		$this->db->where('sellerid', $id);
		$this->db->from('products');
		$this->db->delete();
		return $this->session->id;
	 }

	 function getDataSeller($sellerid){
		$this->db->select('companyname,sellerid,notes,logo');
		$this->db->where('sellerid', $sellerid);
		$query = $this->db->get('sellers');
		$result = $query->row_array();
		return $result;
	 }


	 function change_pass($user_id,$new_pass)
	{

		$passwordfix = password_hash($new_pass, PASSWORD_DEFAULT);
		$update_pass=$this->db->query("UPDATE admin set password='$passwordfix' where id='$user_id'");
	}

	function getEditData($email){
		$this->db->select('companyname,phone,firstname,lastname,address1,address2,postalcode,notes,country,city,state');
		$this->db->where('email', $email);
		$query = $this->db->get('sellers');
		$result = $query->row_array();
		return $result;
	}

	function getDataProductSeller($rowno,$rowperpage,$sellerid) {
 
		$this->db->select('products.productid,products.productname,products.productdescription,products.foto,sellers.state,sellers.companyname');
		$this->db->from('products');
		$this->db->join('sellers', 'products.sellerid = sellers.sellerid');
		$this->db->order_by('productid', 'desc');
		$this->db->where('products.sellerid', $sellerid);
		$this->db->limit($rowperpage, $rowno); 
		$query = $this->db->get();
	 
		return $query->result_array();
	  }

	  function getCategories() {
 
		$this->db->select('*');
		$this->db->from('categories');
		$query = $this->db->get();
	 
		return $query->result_array();
	  }

	  function getRecordCountProductSeller($sellerid) {
	
		$this->db->select('count(*) as allcount');
		$this->db->from('products');
		$this->db->where('sellerid', $sellerid);

		$query = $this->db->get();
		$result = $query->result_array();
	 
		return $result[0]['allcount'];
	  }

}
