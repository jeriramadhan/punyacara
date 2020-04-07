<?php
class Fasilitas extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
        $this->load->model('M_fasilities','m_fasilities');
        $this->load->library('upload');
    }

    function index(){
        $x['fasilitas']=$this->m_fasilities->get_all_falilitas();
        $this->load->view('admin/v_fasilitas',$x);
    }

    function add_new(){
        $this->load->view('admin/v_add_fasilitas');
    }

    function edit(){
        $kode=$this->uri->segment(4);
        $x['fasilitas']=$this->m_fasilities->get_fasilitas_by_kode($kode);
        $this->load->view('admin/v_edit_fasilitas',$x);
    }

    function simpan_fasilitas(){
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
                $config['width']= 770;
                $config['height']= 420;
                $config['new_image']= './assets/images/'.$gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $gambar=$gbr['file_name'];
                $nama=strip_tags(htmlspecialchars($this->input->post('xnama',TRUE),ENT_QUOTES));
                $deskripsi=$this->input->post('xdeskripsi',TRUE);
                            
                $this->m_fasilities->simpan_fasilitas($nama,$deskripsi,$gambar);
                echo $this->session->set_flashdata('msg','success');
                redirect('admin/fasilitas');
            }else{
                echo $this->session->set_flashdata('msg','warning');
                redirect('admin/fasilitas');
            }
                     
        }else{
            redirect('admin/fasilitas');
        }
    }

    function update_fasilitas(){
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
                $config['width']= 770;
                $config['height']= 420;
                $config['new_image']= './assets/images/'.$gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $gambar=$gbr['file_name'];
                $kode=$this->input->post('kode');
                $nama=strip_tags(htmlspecialchars($this->input->post('xnama',TRUE),ENT_QUOTES));
                $deskripsi=$this->input->post('xdeskripsi',TRUE);
                            
                $this->m_fasilities->update_fasilitas($kode,$nama,$deskripsi,$gambar);
                echo $this->session->set_flashdata('msg','success');
                redirect('admin/fasilitas');
            }else{
                echo $this->session->set_flashdata('msg','warning');
                redirect('admin/fasilitas');
            }
                     
        }else{
            $kode=$this->input->post('kode');
            $nama=strip_tags(htmlspecialchars($this->input->post('xnama',TRUE),ENT_QUOTES));
            $deskripsi=$this->input->post('xdeskripsi',TRUE);
                            
            $this->m_fasilities->update_fasilitas_no_img($kode,$nama,$deskripsi);
            echo $this->session->set_flashdata('msg','success');
            redirect('admin/fasilitas');
        }
    }

    function hapus_fasilitas(){
        $kode=$this->input->post('kode2');
        $this->m_fasilities->hapus_fasilitas($kode);
        echo $this->session->set_flashdata('msg','success-hapus');
        redirect('admin/fasilitas');
    }


}