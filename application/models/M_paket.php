<?php
class M_paket extends CI_Model{

	function get_paket_type(){
		$hsl=$this->db->get('paket_type');
		return $hsl;
	}

	function get_all_paket(){
		$hsl=$this->db->get('compare');
		return $hsl;
	}

	function simpan_paket($paket_type,$img_large,$img_thumb,$deskripsi,$paket_rate){
		$hsl=$this->db->query("INSERT INTO compare(type,gambar_large,gambar_kotak,detail,rate) VALUES ('$paket_type','$img_large','$img_thumb','$deskripsi','$paket_rate')");
		return $hsl;
	}

	//front End
	function get_all_paket_home(){
		$hsl=$this->db->query("SELECT * FROM compare LIMIT 4");
		return $hsl;
	}

	function get_paket_by_kode($kode){
		$hsl=$this->db->query("SELECT * FROM compare WHERE kd_compare='$kode'");
		return $hsl;
	}

	function update_paket($kode,$paket_type,$img_large,$img_thumb,$deskripsi,$paket_rate){
		$hsl=$this->db->query("UPDATE compare SET type='$paket_type',gambar_large='$img_large',gambar_kotak='$img_thumb',detail='$deskripsi',rate='$paket_rate' WHERE kd_compare='$kode'");
		return $hsl;
	}

	function update_paket_img_large($kode,$paket_type,$img_large,$deskripsi,$paket_rate){
		$hsl=$this->db->query("UPDATE compare SET type='$paket_type',gambar_large='$img_large',detail='$deskripsi',rate='$paket_rate' WHERE kd_compare='$kode'");
		return $hsl;
	}

	function update_paket_img_thumb($kode,$paket_type,$img_thumb,$deskripsi,$paket_rate){
		$hsl=$this->db->query("UPDATE compare SET type='$paket_type',gambar_kotak='$img_thumb',detail='$deskripsi',rate='$paket_rate' WHERE kd_compare='$kode'");
		return $hsl;
	}

	function update_paket_no_img($kode,$paket_type,$deskripsi,$paket_rate){
		$hsl=$this->db->query("UPDATE compare SET type='$paket_type',detail='$deskripsi',rate='$paket_rate' WHERE kd_compare='$kode'");
		return $hsl;
	}

	function hapus_paket($kode){
		$hsl=$this->db->query("DELETE FROM compare WHERE kd_compare='$kode'");
		return $hsl;
	}
}