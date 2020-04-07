<?php
class Responden extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('m_responden');
		$this->load->library('upload');
	}

	function index(){
		$jum=$this->db->get('tbl_responden');
        $page=$this->uri->segment(4);
        if(!$page):
            $offset = 0;
        else:
            $offset = $page;
        endif;
        $limit=9;
        $config['base_url'] = base_url() . 'admin/responden/index/';
        $config['total_rows'] = $jum->num_rows();
        $config['per_page'] = $limit;
        $config['uri_segment'] = 4;

        //Tambahan untuk styling
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $config['first_link'] = 'Awal';
        $config['last_link'] = 'Akhir';
        $config['next_link'] = 'Next >>';
        $config['prev_link'] = '<< Prev';
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();
		$data['data2'] = $this->db->query("SELECT * FROM tbl_responden ORDER BY responden_id DESC LIMIT $offset,$limit")->result();
		$this->load->view('admin/v_responden',$data);
	}

	function simpan(){
		$config['upload_path'] = './assets/images/'; //path folder
	    $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
	    $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

	    $this->upload->initialize($config);
	    if(!empty($_FILES['filefoto']['name'])){
	        if ($this->upload->do_upload('filefoto')){
	            $gbr = $this->upload->data();
	                        
	            $gambar=$gbr['file_name'];
	            $nama=htmlspecialchars($this->input->post('nama',TRUE),ENT_QUOTES);
				$email=$this->input->post('email',TRUE);
				$facebook=htmlspecialchars($this->input->post('facebook',TRUE),ENT_QUOTES);
				$twitter=htmlspecialchars($this->input->post('twitter',TRUE),ENT_QUOTES);
				$linkedin=htmlspecialchars($this->input->post('linkedin',TRUE),ENT_QUOTES);
							
				$this->m_responden->simpan_responden($nama,$email,$facebook,$twitter,$linkedin,$gambar);
				echo $this->session->set_flashdata('msg','success');
				redirect('admin/responden');
			}else{
	            echo $this->session->set_flashdata('msg','warning');
	            redirect('admin/responden');
	    	}
	                 
	    }else{
	    	$nama=htmlspecialchars($this->input->post('nama',TRUE),ENT_QUOTES);
			$email=$this->input->post('email',TRUE);
			$facebook=htmlspecialchars($this->input->post('facebook',TRUE),ENT_QUOTES);
			$twitter=htmlspecialchars($this->input->post('twitter',TRUE),ENT_QUOTES);
			$linkedin=htmlspecialchars($this->input->post('linkedin',TRUE),ENT_QUOTES);
			$this->m_responden->simpan_responden_no_img($nama,$email,$facebook,$twitter,$linkedin);
			echo $this->session->set_flashdata('msg','success');
			redirect('admin/responden');
		}
	}

	function update(){
		$config['upload_path'] = './assets/images/'; //path folder
	    $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
	    $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

	    $this->upload->initialize($config);
	    if(!empty($_FILES['filefoto']['name'])){
	        if ($this->upload->do_upload('filefoto')){
	            $gbr = $this->upload->data();
	                        
	            $gambar=$gbr['file_name'];
	            $kode=$this->input->post('xkode');
	            $nama=htmlspecialchars($this->input->post('nama2',TRUE),ENT_QUOTES);
				$email=$this->input->post('email2',TRUE);
				$facebook=htmlspecialchars($this->input->post('facebook2',TRUE),ENT_QUOTES);
				$twitter=htmlspecialchars($this->input->post('twitter2',TRUE),ENT_QUOTES);
				$linkedin=htmlspecialchars($this->input->post('linkedin2',TRUE),ENT_QUOTES);
							
				$this->m_responden->update_responden($kode,$nama,$email,$facebook,$twitter,$linkedin,$gambar);
				echo $this->session->set_flashdata('msg','success');
				redirect('admin/responden');
			}else{
	            echo $this->session->set_flashdata('msg','warning');
	            redirect('admin/responden');
	    	}
	                 
	    }else{
	    	$kode=$this->input->post('xkode');
	    	$nama=htmlspecialchars($this->input->post('nama2',TRUE),ENT_QUOTES);
			$email=$this->input->post('email2',TRUE);
			$facebook=htmlspecialchars($this->input->post('facebook2',TRUE),ENT_QUOTES);
			$twitter=htmlspecialchars($this->input->post('twitter2',TRUE),ENT_QUOTES);
			$linkedin=htmlspecialchars($this->input->post('linkedin2',TRUE),ENT_QUOTES);
			$this->m_responden->update_responden_no_img($kode,$nama,$email,$facebook,$twitter,$linkedin);
			echo $this->session->set_flashdata('msg','success');
			redirect('admin/responden');
		}
	}

	function hapus(){
		$kode=$this->input->post('kode');
		$this->m_responden->delete_responden($kode);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('admin/responden');
	}

}