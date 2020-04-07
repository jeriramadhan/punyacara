<?php
class Inbox extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
	}

	function index(){
		$this->load->view('admin/v_inbox');
	}

	function read(){
		$kode=$this->uri->segment(4);
		$data['record']=$this->db->query("SELECT inbox.*,DATE_FORMAT(inbox_tanggal,'%d %M %Y %H:%i') AS tanggal FROM inbox WHERE inbox_id='$kode'");
		$this->db->query("UPDATE inbox SET inbox_status='0' WHERE inbox_id='$kode'");
		$this->load->view('admin/v_inbox_read',$data);
	}

	function hapus_inbox(){
		$kode=$this->input->post("kode");
		$this->db->query("DELETE FROM inbox WHERE inbox_id='$kode'");
		redirect('admin/inbox');
	}
}