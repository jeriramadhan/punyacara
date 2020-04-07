<?php
class Schedule extends CI_Controller{
	
	function __construct(){
        parent::__construct();
        if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
        $this->load->model('M_schedule','m_schedule');
        $this->load->library('upload');
    }

    function index(){
    	$x['schedule']=$this->m_schedule->get_all_schedule();
    	$this->load->view('admin/v_schedule',$x);
    }

    function simpan_schedule(){
    	$nama=htmlspecialchars($this->input->post('xnama',TRUE),ENT_QUOTES);
    	$jam=htmlspecialchars($this->input->post('xjam',TRUE),ENT_QUOTES);
    	$this->m_schedule->simpan_schedule($nama,$jam);
    	redirect('admin/schedule');
    }

    function update_schedule(){
    	$kode=$this->input->post('xkode');
    	$nama=htmlspecialchars($this->input->post('xnama2',TRUE),ENT_QUOTES);
    	$jam=htmlspecialchars($this->input->post('xjam2',TRUE),ENT_QUOTES);
    	$this->m_schedule->update_schedule($kode,$nama,$jam);
    	redirect('admin/schedule');
    }

    function hapus_schedule(){
    	$kode=$this->input->post('kode');
    	$this->m_schedule->hapus_schedule($kode);
    	redirect('admin/schedule');
    }
}