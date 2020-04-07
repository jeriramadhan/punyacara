<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('M_pengunjung','m_pengunjung');
		$this->load->model('M_slider','m_slider');
		$this->load->model('M_tulisan','m_tulisan');
		$this->load->model('M_paket','m_paket');
        $this->m_pengunjung->count_visitor();
	}

	public function index(){
		$x['slider']=$this->m_slider->get_all_slider();
		$x['pakets']=$this->m_paket->get_all_paket_home();
		$x['blog']=$this->m_tulisan->get_blog_home();
		$this->load->view('frontend/home_view',$x);
		
	}

}
