<?php
class Administrator extends CI_Controller{
    function __construct(){
        parent:: __construct();
        $this->load->model('M_login','m_login');

    }
    function index(){
        $this->load->view('admin/v_login');
    }
    function auth(){
        $username=htmlspecialchars($this->input->post('username',TRUE),ENT_QUOTES);
        $password=htmlspecialchars($this->input->post('password',TRUE),ENT_QUOTES);
        $u=$username;
        $p=$password;
        $cadmin=$this->m_login->cekadmin($u,$p);
        if($cadmin->num_rows() > 0){
         $this->session->set_userdata('masuk',true);
         $this->session->set_userdata('user',$u);
         $xcadmin=$cadmin->row_array();
         if($xcadmin['pengguna_level']=='1')
            $this->session->set_userdata('akses','1');
            $idadmin=$xcadmin['pengguna_id'];
            $user_nama=$xcadmin['pengguna_nama'];
            $this->session->set_userdata('idadmin',$idadmin);
            $this->session->set_userdata('nama',$user_nama);

         if($xcadmin['pengguna_level']=='2'){
             $this->session->set_userdata('akses','2');
             $idadmin=$xcadmin['pengguna_id'];
             $user_nama=$xcadmin['pengguna_nama'];
             $this->session->set_userdata('idadmin',$idadmin);
             $this->session->set_userdata('nama',$user_nama);
         } 

        }
        
        if($this->session->userdata('masuk')==true){
            redirect('administrator/berhasillogin');
        }else{
            redirect('administrator/gagallogin');
        }
    }
        function berhasillogin(){
            redirect('admin/dashboard');
        }
        function gagallogin(){
            $url=base_url('administrator');
            echo $this->session->set_flashdata('msg','<div class="alert alert-warning" role="alert"><button type="button" class="close" data-dismiss="alert"><i class="fa fa-close"></i></button> Username Atau Password Salah</div>');
            redirect($url);
        }
        function logout(){
            $this->session->sess_destroy();
            $url=base_url('administrator');
            redirect($url);
        }
}