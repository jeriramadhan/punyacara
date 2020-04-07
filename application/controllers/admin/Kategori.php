<?php
class Kategori extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('M_kategori','m_kategori');
		$this->load->library('upload');
	}


	function index(){
		if($this->session->userdata('akses')=='1'){
			$x['data']=$this->m_kategori->get_all_kategori();
			$this->load->view('admin/v_kategori',$x);
		}else{
			redirect('administrator');
		}
	}

	function simpan_kategori(){
		if($this->session->userdata('akses')=='1'){
			$kategori=strip_tags($this->input->post('xkategori'));
			$string=preg_replace('/[^a-zA-Z0-9 \&%|{.}=,?!*()"-_+$@;<>\']/', '', $kategori);
			$trim=trim($string);
			$add_slash=strtolower(str_replace(" ", "-", $trim));
			$slug=$add_slash;
			$this->m_kategori->simpan_kategori($kategori,$slug);
			echo $this->session->set_flashdata('msg','success');
			redirect('admin/kategori');
		}else{
			redirect('administrator');
		}
	}

	function update_kategori(){
		if($this->session->userdata('akses')=='1'){
			$kode=strip_tags($this->input->post('xkode'));
			$kategori=strip_tags($this->input->post('xkategori2'));
			$string=preg_replace('/[^a-zA-Z0-9 \&%|{.}=,?!*()"-_+$@;<>\']/', '', $kategori);
			$trim=trim($string);
			$add_slash=strtolower(str_replace(" ", "-", $trim));
			$slug=$add_slash;

			$this->m_kategori->update_kategori($kode,$kategori,$slug);
			echo $this->session->set_flashdata('msg','info');
			redirect('admin/kategori');
		}else{
			redirect('administrator');
		}
	}
	function hapus_kategori(){
		if($this->session->userdata('akses')=='1'){
			$kode=strip_tags($this->input->post('kode'));
			$this->m_kategori->hapus_kategori($kode);
			echo $this->session->set_flashdata('msg','success-hapus');
			redirect('admin/kategori');
		}else{
			redirect('administrator');
		}
	}

}