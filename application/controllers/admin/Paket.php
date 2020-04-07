<?php
class paket extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('M_paket','m_paket');
		
	}
	function index(){
		$x['paket']=$this->m_paket->get_all_paket();
		$this->load->view('admin/v_pakets',$x);
	}

	function add_new(){
		$x['type']=$this->m_paket->get_paket_type();
		$this->load->view('admin/v_add_paket',$x);
	}

	function get_edit(){
		$kode=$this->uri->segment(4);
		$x['record']=$this->m_paket->get_paket_by_kode($kode);
		$x['type']=$this->m_paket->get_paket_type();
		$this->load->view('admin/v_edit_paket',$x);
	}

	function simpan_paket(){
		$data = array();
		$config['upload_path'] = './assets/images/'; //path folder
	    $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
	    $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

	    $this->load->library('upload', $config);

	    if (!$this->upload->do_upload('userfile')) {
		    $error = array('error' => $this->upload->display_errors());
		}else{
		    $fileData = $this->upload->data();
		    $data['userfile'] = $fileData['file_name'];
		}

		if (!$this->upload->do_upload('userfile2')) {
		    $error = array('error' => $this->upload->display_errors()); 
		}else{
		    $fileData = $this->upload->data();
		    $data['userfile2'] = $fileData['file_name'];
		}

		$img_large=$data['userfile'];
		$img_thumb=$data['userfile2'];
		$deskripsi=$this->input->post('xdeskripsi');
		$paket_type=strip_tags($this->input->post('xtype'));
		$paket_rate=strip_tags($this->input->post('xrate'));

		$this->m_paket->simpan_paket($paket_type,$img_large,$img_thumb,$deskripsi,$paket_rate);
	    redirect('admin/paket');
	}

	function update_paket(){
		$data = array();
		$config['upload_path'] = './assets/images/'; //path folder
	    $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
	    $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

	    $this->load->library('upload', $config);

	    if(!empty($_FILES['userfile']['name']) && !empty($_FILES['userfile2']['name'])){
		    
		    if (!$this->upload->do_upload('userfile')) { //upload image 1
			    $error = array('error' => $this->upload->display_errors());
			}else{
			    $fileData = $this->upload->data();
			    $data['userfile'] = $fileData['file_name'];
			    
			}

			if (!$this->upload->do_upload('userfile2')) { //upload image 2
			    $error = array('error' => $this->upload->display_errors()); 
			}else{
			    $fileData = $this->upload->data();
			    $data['userfile2'] = $fileData['file_name'];
			}

			$img_large=$data['userfile'];
			$img_thumb=$data['userfile2'];
			$kode=$this->input->post('xkode');
			$deskripsi=$this->input->post('xdeskripsi');
			$paket_type=strip_tags($this->input->post('xtype'));
			$paket_rate=strip_tags($this->input->post('xrate'));

			$this->m_paket->update_paket($kode,$paket_type,$img_large,$img_thumb,$deskripsi,$paket_rate);
		    redirect('admin/paket');

	    }elseif (!empty($_FILES['userfile']['name']) || !empty($_FILES['userfile2']['name'])) {

	    	if(!empty($_FILES['userfile']['name'])){
	    		if (!$this->upload->do_upload('userfile')) { //upload image 1
			    $error = array('error' => $this->upload->display_errors());
				}else{
				    $fileData = $this->upload->data();
				    $data['userfile'] = $fileData['file_name'];
				    
				}
				$img_large=$data['userfile'];
				$kode=$this->input->post('xkode');
				$deskripsi=$this->input->post('xdeskripsi');
				$paket_type=strip_tags($this->input->post('xtype'));
				$paket_rate=strip_tags($this->input->post('xrate'));

				$this->m_paket->update_paket_img_large($kode,$paket_type,$img_large,$deskripsi,$paket_rate);
			    redirect('admin/paket');
	    	}else{
	    		if (!$this->upload->do_upload('userfile2')) { //upload image 2
			    $error = array('error' => $this->upload->display_errors()); 
				}else{
				    $fileData = $this->upload->data();
				    $data['userfile2'] = $fileData['file_name'];
				}
				$img_thumb=$data['userfile2'];
				$kode=$this->input->post('xkode');
				$deskripsi=$this->input->post('xdeskripsi');
				$paket_type=strip_tags($this->input->post('xtype'));
				$paket_rate=strip_tags($this->input->post('xrate'));

				$this->m_paket->update_paket_img_thumb($kode,$paket_type,$img_thumb,$deskripsi,$paket_rate);
			    redirect('admin/paket');
	    	}
	    
	    }else{
	    	$kode=$this->input->post('xkode');
			$deskripsi=$this->input->post('xdeskripsi');
			$paket_type=strip_tags($this->input->post('xtype'));
			$paket_rate=strip_tags($this->input->post('xrate'));

			$this->m_paket->update_paket_no_img($kode,$paket_type,$deskripsi,$paket_rate);
			redirect('admin/paket');
	    }

	    
	}

	function hapus_paket(){
		$kode=$this->input->post('kode');
		$this->m_paket->hapus_paket($kode);
		redirect('admin/paket');
	}

	

}