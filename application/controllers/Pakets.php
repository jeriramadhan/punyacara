<?php 
class pakets extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('M_paket','m_paket');
		$this->load->model('M_pengunjung','m_pengunjung');
		$this->m_pengunjung->count_visitor();
	}

	function index(){
		$x['data']=$this->m_paket->get_all_paket();
		$this->load->view('frontend/pakets_view',$x);
	}
}