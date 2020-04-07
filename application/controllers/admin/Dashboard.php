<?php
class Dashboard extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
        $this->load->helper('short_number');
		$this->load->model('M_pengunjung','m_pengunjung');
		$this->load->model('M_tulisan','m_tulisan');
	}

	function index(){
		if($this->session->userdata('akses')=='1'){
			$x['visitor'] = $this->m_pengunjung->statistik_pengujung();
			$x['visitor_this_year'] = $this->m_pengunjung->visitor_this_year();
			$x['sum_visitor_year']=$this->m_pengunjung->get_sum_visitor_this_year();
			$x['sum_visitor_last_year']=$this->m_pengunjung->get_sum_visitor_last_year();
			$x['sum_visitor_average_this_year']=$this->m_pengunjung->get_average_perbulan();
			$x['visitor_this_month']=$this->m_pengunjung->get_sum_visitor_this_month();
			$x['visitor_last_month']=$this->m_pengunjung->get_sum_visitor_last_month();
			$x['visitor_average_day']=$this->m_pengunjung->get_average_perday();
			$x['total_post']=$this->m_tulisan->get_all_tulisan()->num_rows();
			$x['pengunjung_total']=$this->m_pengunjung->get_all_visitors()->num_rows();
			$x['total_users']=$this->db->query("SELECT * FROM pengguna")->num_rows();
			$x['page_views']=$this->db->query("SELECT * FROM post_views")->num_rows();
			$this->load->view('admin/v_dashboard',$x);
		}else{
			redirect('administrator');
		}
		
	}
}