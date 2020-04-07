<?php
class Fasilities extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('M_fasilities','m_fasilities');
		$this->load->model('M_pengunjung','m_pengunjung');
		$this->m_pengunjung->count_visitor();
	}

	function index(){
		$x['data']=$this->m_fasilities->get_all_falilitas();
		$this->load->view('frontend/fasilities_view',$x);
	}
}