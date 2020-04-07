<?php
class M_schedule extends CI_Model{

	function get_all_schedule(){
		$hsl=$this->db->get('jam_makan');
		return $hsl;
	}

	function simpan_schedule($nama,$jam){
		$hsl=$this->db->query("INSERT INTO jam_makan (nama,jam) VALUES ('$nama','$jam')");
		return $hsl;
	}

	function update_schedule($kode,$nama,$jam){
		$hsl=$this->db->query("UPDATE jam_makan SET nama='$nama',jam='$jam' WHERE kd_makan='$kode'");
		return $hsl;
	}

	function hapus_schedule($kode){
		$hsl=$this->db->query("DELETE FROM jam_makan WHERE kd_makan='$kode'");
		return $hsl;
	}
}