<?php

require APPPATH . 'libraries/REST_Controller.php';

class Services extends REST_Controller{
  
  public function __construct(){
    parent::__construct();
    $this->session->userdata('masuk');
    $this->load->model('M_pengunjung','m_pengunjung');
    $this->m_pengunjung->count_visitor();
    $this->load->model('M_service','m_service');
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
    $response['slider']=$this->m_service->get_all_slider();
    $response['pakets']=$this->m_service->get_all_paket();
    $response['blog']=$this->m_service->get_all_tulisan();
    if(empty($response)){
      return $this->empty_response();
    }else{
      $this->response($response);
      return $response;
    }
    
  }
  
  public function pesan_get(){
    $response = $this->m_service->get_pesan_semua();
    $this->response($response);
  }
  
  public function fasilitas_get(){
    $response['data']=$this->m_service->get_all_fasilitas();
    if(empty($response)){
      return $this->empty_response();
    }else{
      $this->response($response);
      return $response;
    }
  }
  
  public function events_get(){
    $response['data']=$this->m_service->get_all_events();
    if(empty($response)){
      return $this->empty_response();
    }else{
      $this->response($response);
      return $response;
    }
  }

    public function paket_get(){
    $response['data']=$this->m_service->get_all_paket();
    if(empty($response)){
      return $this->empty_response();
    }else{
      $this->response($response);
      return $response;
    }
  }
  
  public function pesan_post(){
    $response = $this->m_service->add_pesan(
      $this->post('nama'),
      $this->post('email'),
      $this->post('subject'),
      $this->post('pesan')
    );
    $this->response($response);
  }
  
}