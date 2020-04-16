<?php
class M_service extends CI_Model{
  
  function get_all_slider(){
    $hasil=$this->db->query("SELECT * FROM slider");
    return $hasil->result();
  }
  
  function get_all_paket(){
    $hsl=$this->db->get('compare');
    return $hsl->result();
  }
  
  function get_all_tulisan(){
    $hsl=$this->db->query("SELECT tulisan.*,DATE_FORMAT(tulisan_tanggal,'%d/%m/%Y') AS tanggal FROM tulisan ORDER BY tulisan_id DESC");
    return $hsl->result();
  }
  
  function get_pesan_semua(){
    $all = $this->db->get("inbox")->result();
    $response['status']=200;
    $response['error']=false;
    $response['person']=$all;
    return $response;
  }
  
  function get_all_fasilitas(){
    $hsl=$this->db->get('fasilitas');
    return $hsl->result();
  }
  
  public function add_pesan($nama,$email,$subject,$pesan){
    if(empty($nama) || empty($email) || empty($subject) || empty($pesan)){
      return $this->empty_response();
    }else{
      $data = array(
        "inbox_nama"=>$nama,
        "inbox_email"=>$email,
        "inbox_subject"=>$subject,
        "inbox_pesan"=>$pesan
      );
      $insert = $this->db->insert("inbox", $data);
      
      if($insert){
        $response['status']=200;
        $response['error']=false;
        $response['message']='Data pesan ditambahkan.';
        return $response;
      }else{
        $response['status']=502;
        $response['error']=true;
        $response['message']='Data pesan gagal ditambahkan.';
        return $response;
      }
    } 
  }

  function get_all_events(){
    $hsl=$this->db->query("SELECT * FROM events ORDER BY event_id DESC");
    return $hsl->result();
  } 
  
}