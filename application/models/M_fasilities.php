<?php
class M_fasilities extends CI_Model{
	
	function get_all_falilitas(){
		$hsl=$this->db->get('fasilitas');
		return $hsl;
	}

		function get_all_fasilitas(){
		$hsl=$this->db->get('fasilitas');
		return $hsl->result();
	}

	function simpan_fasilitas($nama,$deskripsi,$gambar){
		$hsl=$this->db->query("INSERT INTO fasilitas (nama,gambar,detail) VALUES ('$nama','$gambar','$deskripsi')");
		return $hsl;
	}

	function get_fasilitas_by_kode($kode){
		$hsl=$this->db->query("SELECT * FROM fasilitas WHERE kd_fasilitas='$kode'");
		return $hsl;
	}

	function update_fasilitas($kode,$nama,$deskripsi,$gambar){
		$hsl=$this->db->query("UPDATE fasilitas SET nama='$nama',gambar='$gambar',detail='$deskripsi' WHERE kd_fasilitas='$kode'");
		return $hsl;
	}

	function update_fasilitas_no_img($kode,$nama,$deskripsi){
		$hsl=$this->db->query("UPDATE fasilitas SET nama='$nama',detail='$deskripsi' WHERE kd_fasilitas='$kode'");
		return $hsl;
	}

	function hapus_fasilitas($kode){
		$hsl=$this->db->query("DELETE FROM fasilitas WHERE kd_fasilitas='$kode'");
		return $hsl;
	}
	
}