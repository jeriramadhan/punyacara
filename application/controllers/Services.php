<?php

require APPPATH . 'libraries/REST_Controller.php';

class Services extends REST_Controller{
  
  public function __construct(){
    parent::__construct();
    $this->load->model('M_fasilities','m_fasilities');
    $this->load->model('M_pengunjung','m_pengunjung');
    $this->m_pengunjung->count_visitor();
    $this->load->model('M_paket','m_paket');
    $this->load->model('M_slider','m_slider');
    $this->load->model('M_tulisan','m_tulisan');
    $this->load->model('M_kategori','m_kategori');
    $this->load->model('M_fasilities','m_fasilities');
  }
  
  public function empty_response(){
    $response['status']=502;
    $response['error']=true;
    $response['message']='Response failed';
    return $response;
  }
  
  public function success_response(){
    $response['status']=200;
    $response['error']=false;
    $response['message']='Response success';
    return $response;
  }
  
  public function index_get(){
    $response['slider']=$this->m_slider->get_all_slider();
    $response['pakets']=$this->m_paket->get_all_paket();
    $response['blog']=$this->m_tulisan->get_all_tulisan();
    if(empty($response)){
      return $this->empty_response();
    }else{
      $this->response($response);
      return $response;
    }
    
  }

  public function fasilitas_get(){
    $response['data']=$this->m_fasilities->get_all_fasilitas();
    if(empty($response)){
      return $this->empty_response();
    }else{
      $this->response($response);
      return $response;
    }
  }
  
}