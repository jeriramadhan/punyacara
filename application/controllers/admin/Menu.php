<?php
class Menu extends CI_Controller{
	
	function __construct(){
        parent::__construct();
        if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
        $this->load->model('M_schedule','m_schedule');
        $this->load->model('M_menu','m_menu');
        $this->load->library('upload');
    }

    function index(){
        $x['menus']=$this->m_menu->get_all_menu();
        $x['schedule']=$this->m_schedule->get_all_schedule();
        $this->load->view('admin/v_menu_resto',$x);
    }

    function simpan_menu(){
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
                $config['width']= 740;
                $config['height']= 500;
                $config['new_image']= './assets/images/'.$gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $gambar=$gbr['file_name'];
                $jadwal=$this->input->post('xjadwal');
                $menu=strip_tags(htmlspecialchars($this->input->post('xmenu',TRUE),ENT_QUOTES));
                $deskripsi=strip_tags(htmlspecialchars($this->input->post('xdesc',TRUE),ENT_QUOTES));
                $harga=strip_tags(htmlspecialchars($this->input->post('xprice',TRUE),ENT_QUOTES));
                $diskon=strip_tags(htmlspecialchars($this->input->post('xdisc',TRUE),ENT_QUOTES));
                            
                $this->m_menu->simpan_menu($jadwal,$menu,$deskripsi,$harga,$diskon,$gambar);
                echo $this->session->set_flashdata('msg','success');
                redirect('admin/menu');
            }else{
                echo $this->session->set_flashdata('msg','warning');
                redirect('admin/menu');
            }
                     
        }else{
            redirect('admin/menu');
        }
                
    }


    function update_menu(){
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
                $config['width']= 740;
                $config['height']= 500;
                $config['new_image']= './assets/images/'.$gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $gambar=$gbr['file_name'];
                $jadwal=$this->input->post('xjadwal');
                $menu=strip_tags(htmlspecialchars($this->input->post('xmenu',TRUE),ENT_QUOTES));
                $deskripsi=strip_tags(htmlspecialchars($this->input->post('xdesc',TRUE),ENT_QUOTES));
                $harga=strip_tags(htmlspecialchars($this->input->post('xprice',TRUE),ENT_QUOTES));
                $diskon=strip_tags(htmlspecialchars($this->input->post('xdisc',TRUE),ENT_QUOTES));
                $kode=$this->input->post('xkode');
                            
                $this->m_menu->update_menu($kode,$jadwal,$menu,$deskripsi,$harga,$diskon,$gambar);
                echo $this->session->set_flashdata('msg','success');
                redirect('admin/menu');
            }else{
                echo $this->session->set_flashdata('msg','warning');
                redirect('admin/menu');
            }
                     
        }else{
            $jadwal=$this->input->post('xjadwal');
            $menu=strip_tags(htmlspecialchars($this->input->post('xmenu',TRUE),ENT_QUOTES));
            $deskripsi=strip_tags(htmlspecialchars($this->input->post('xdesc',TRUE),ENT_QUOTES));
            $harga=strip_tags(htmlspecialchars($this->input->post('xprice',TRUE),ENT_QUOTES));
            $diskon=strip_tags(htmlspecialchars($this->input->post('xdisc',TRUE),ENT_QUOTES));
            $kode=$this->input->post('xkode');
                            
            $this->m_menu->update_menu_no_img($kode,$jadwal,$menu,$deskripsi,$harga,$diskon);
            echo $this->session->set_flashdata('msg','success');
            redirect('admin/menu');
        }
                
    }

    function hapus_menu(){
        $kode=$this->input->post('kode');
        $this->m_menu->hapus_menu($kode);
        echo $this->session->set_flashdata('msg','success-hapus');
        redirect('admin/menu');
    }

}