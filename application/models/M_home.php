<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Home extends CI_Model {


	public function __construct()
    {
        parent::__construct();
        //load model admin
		$this->load->library('session');
    }
	 //fungsi cek session
	 function logged_id()
	 {
		 return $this->session->nama;
	 }
 
	 //fungsi check login
	   function getData($rowno,$rowperpage,$search="",$category="") {
 
		$this->db->select('products.productid,products.productname,products.productdescription,products.foto,sellers.state,sellers.companyname');
		$this->db->from('products');
		$this->db->join('sellers', 'products.sellerid = sellers.sellerid');
		$this->db->order_by('productid', 'desc');
		
		if($search != ''){
		  $this->db->like('productname', $search);
		  $this->db->or_like('productdescription', $search);
		}

		if($category != ''){
			$this->db->where('categoryid', $category);
		}
	
		$this->db->limit($rowperpage, $rowno); 
		$query = $this->db->get();
	 
		return $query->result_array();
	  }

	   function getProductDetails($productid){
 
		$this->db->select('products.*,sellers.state,sellers.companyname,sellers.logo,sellers.sellerid');
		$this->db->from('products');
		$this->db->join('sellers', 'products.sellerid = sellers.sellerid');
		$this->db->where('productid', $productid);

		$query = $this->db->get();
	 
		return $query->row_array();
	  }

	  function sendComment($post){
		$this->db->insert('discussions', $post);
		return $this->db->insert_id();
	 }
	 function checkout($post){
		$this->db->insert('orders', $post);
		return $this->db->insert_id();
	 }


	
	  // Select total records
	   function getrecordCount($search = '',$category='') {
	
		$this->db->select('count(*) as allcount');
		$this->db->from('products');
	 
		if($search != ''){
		  $this->db->like('productname', $search);
		  $this->db->or_like('productdescription', $search);
		}
		if($category != ''){
			$this->db->where('categoryid', $category);
		  }
	
		$query = $this->db->get();
		$result = $query->result_array();
	 
		return $result[0]['allcount'];
	  }

	  function getRecordCountComment($productid) {
	
		$this->db->select('count(*) as allcount');
		$this->db->from('discussions');
		$this->db->where('productid', $productid);
	 
		$query = $this->db->get();
		$result = $query->result_array();
	 
		return $result[0]['allcount'];
	  }

	  function getDataComment($rowno,$rowperpage,$productid) {
 
		$this->db->select('*');
		$this->db->from('discussions');
		$this->db->where('productid', $productid);
		$this->db->order_by('id', 'desc');
		
	
		$this->db->limit($rowperpage, $rowno); 
		$query = $this->db->get();
	 
		return $query->result_array();
	  }

	  function getSellerData($sellerid){
		$this->db->select('companyname,logo');
		$this->db->from('sellers');
		$query = $this->db->get();
	 
		return $query->row_array();
	  }

	  function getCustomerData($customerid){
		$this->db->select('firstname,lastname,foto');
		$this->db->from('customers');
		$query = $this->db->get();
	 
		return $query->row_array();
	  }

	  function getCategories($limit) {
 
		$this->db->select('categoryid,categoryname');
		$this->db->from('categories');
		$this->db->limit($limit, 0); 
		$query = $this->db->get();
	 
		return $query->result_array();
	  }
	  
}
