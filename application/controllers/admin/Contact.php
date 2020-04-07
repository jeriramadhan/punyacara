<?php
class Contact extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
	}

	function index(){
		$this->load->view('admin/v_contact');
	}

	function update_contact(){
		$kode=$this->input->post('kode');
		$data=array(
			'des' => htmlspecialchars($this->input->post('xdesc',TRUE),ENT_QUOTES),
			'alamat' => htmlspecialchars($this->input->post('xalamat',TRUE),ENT_QUOTES),
			'telp' => htmlspecialchars($this->input->post('xtelp',TRUE),ENT_QUOTES),
			'email' => htmlspecialchars($this->input->post('xemail',TRUE),ENT_QUOTES)
			);
		$this->db->where('kd_kontak', $kode);
		$this->db->update('kontak', $data);
		redirect('admin/contact');
	}
}