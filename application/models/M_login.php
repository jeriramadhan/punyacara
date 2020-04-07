<?php
class M_login extends CI_Model{
    function cekadmin($u,$p){
        $hasil=$this->db->query("SELECT * FROM pengguna WHERE pengguna_username='$u' AND pengguna_password=md5('$p')");
        return $hasil;
    }
    function get_pengguna_login($kode){
    	$hsl=$this->db->query("SELECT * FROM pengguna WHERE pengguna_id='$kode'");
    	return $hsl;
    }
  
}
