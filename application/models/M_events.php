<?php
class M_events extends CI_Model{
	
	function get_all_events(){
		$hsl=$this->db->query("SELECT * FROM events ORDER BY event_id DESC");
		return $hsl;
	}

	function simpan_events($nama,$jadwal){
		$hsl=$this->db->query("INSERT INTO events(event_nama,event_jadwal) VALUES ('$nama','$jadwal')");
		return $hsl;
	}

	function update_events($kode,$nama,$jadwal){
		$hsl=$this->db->query("UPDATE events SET event_nama='$nama',event_jadwal='$jadwal' WHERE event_id='$kode'");
		return $hsl;
	}

	function hapus_events($kode){
		$hsl=$this->db->query("DELETE FROM events WHERE event_id='$kode'");
		return $hsl;
	}
}