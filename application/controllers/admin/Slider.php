<?php
class Slider extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->library('upload');
		$this->load->model('M_slider','m_slider');
		
	}


	function index(){
		$x['slider']=$this->m_slider->get_all_slider();
		$this->load->view('admin/v_slider',$x);
	}

	function simpan_slider(){
				$config['upload_path'] = './assets/images/'; //path folder
	            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
	            $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

	            $this->upload->initialize($config);
	            if(!empty($_FILES['filefoto']['name']))
	            {
	                if ($this->upload->do_upload('filefoto'))
	                {
	                        $gbr = $this->upload->data();
	                        //Compress Image
	                        $config['image_library']='gd2';
	                        $config['source_image']='./assets/images/'.$gbr['file_name'];
	                        $config['create_thumb']= FALSE;
	                        $config['maintain_ratio']= FALSE;
	                        $config['quality']= '60%';
	                        $config['width']= 1920;
	                        $config['height']= 980;
	                        $config['new_image']= './assets/images/'.$gbr['file_name'];
	                        $this->load->library('image_lib', $config);
	                        $this->image_lib->resize();

	                        $gambar=$gbr['file_name'];
							$caption1=strip_tags(htmlspecialchars($this->input->post('caption1',TRUE),ENT_QUOTES));
							$caption2=strip_tags(htmlspecialchars($this->input->post('caption2',TRUE),ENT_QUOTES));
							$caption3=strip_tags(htmlspecialchars($this->input->post('caption3',TRUE),ENT_QUOTES));
							
							$this->m_slider->simpan_slider($caption1,$caption2,$caption3,$gambar);
							echo $this->session->set_flashdata('msg','success');
							redirect('admin/slider');
					}else{
	                    echo $this->session->set_flashdata('msg','warning');
	                    redirect('admin/slider');
	                }
	                 
	            }else{
					redirect('admin/slider');
				}
				
	}
	
	function update_slider(){
				
	            $config['upload_path'] = './assets/images/'; //path folder
	            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
	            $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

	            $this->upload->initialize($config);
	            if(!empty($_FILES['filefoto']['name']))
	            {
	                if ($this->upload->do_upload('filefoto'))
	                {
	                        $gbr = $this->upload->data();
	                        //Compress Image
	                        $config['image_library']='gd2';
	                        $config['source_image']='./assets/images/'.$gbr['file_name'];
	                        $config['create_thumb']= FALSE;
	                        $config['maintain_ratio']= FALSE;
	                        $config['quality']= '60%';
	                        $config['width']= 1920;
	                        $config['height']= 980;
	                        $config['new_image']= './assets/images/'.$gbr['file_name'];
	                        $this->load->library('image_lib', $config);
	                        $this->image_lib->resize();

	                        $gambar=$gbr['file_name'];
	                        $kode=$this->input->post('xkode');
							$caption1=strip_tags(htmlspecialchars($this->input->post('caption1',TRUE),ENT_QUOTES));
							$caption2=strip_tags(htmlspecialchars($this->input->post('caption2',TRUE),ENT_QUOTES));
							$caption3=strip_tags(htmlspecialchars($this->input->post('caption3',TRUE),ENT_QUOTES));
							
							$this->m_slider->update_slider($kode,$caption1,$caption2,$caption3,$gambar);
							echo $this->session->set_flashdata('msg','success');
							redirect('admin/slider');
					}else{
	                    echo $this->session->set_flashdata('msg','warning');
	                    redirect('admin/slider');
	                }
	                 
	            }else{
	            	$kode=$this->input->post('xkode');
					$caption1=strip_tags(htmlspecialchars($this->input->post('caption1',TRUE),ENT_QUOTES));
					$caption2=strip_tags(htmlspecialchars($this->input->post('caption2',TRUE),ENT_QUOTES));
					$caption3=strip_tags(htmlspecialchars($this->input->post('caption3',TRUE),ENT_QUOTES));
							
					$this->m_slider->update_slider_no_images($kode,$caption1,$caption2,$caption3);
					echo $this->session->set_flashdata('msg','success');
					redirect('admin/slider');
				}

	}

	function hapus_slider(){
		$kode=$this->input->post('kode');
		$gambar=$this->input->post('gambar');
		$path='./assets/images/'.$gambar;
		unlink($path);
		$this->m_slider->hapus_slider($kode);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('admin/slider');
	}


	

}