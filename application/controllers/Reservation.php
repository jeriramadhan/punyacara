<?php
class Reservation extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('M_pengunjung','m_pengunjung');
		$this->m_pengunjung->count_visitor();
	}

	function index(){
		$this->load->view('frontend/reservation_view');
	}
}