<?php
class M_slider extends CI_Model{

	function get_all_slider(){
		$hasil=$this->db->query("SELECT * FROM slider");
		return $hasil->result();
	}

	function simpan_slider($caption1,$caption2,$caption3,$gambar){
		$hsl=$this->db->query("INSERT INTO slider (gambar,caption_1,caption_2,caption_3) VALUES ('$gambar','$caption1','$caption2','$caption3')");
		return $hsl;
	}

	function update_slider($kode,$caption1,$caption2,$caption3,$gambar){
		$hsl=$this->db->query("UPDATE slider SET gambar='$gambar',caption_1='$caption1',caption_2='$caption2',caption_3='$caption3' WHERE kd_gambar='$kode'");
		return $hsl;
	}

	function update_slider_no_images($kode,$caption1,$caption2,$caption3){
		$hsl=$this->db->query("UPDATE slider SET caption_1='$caption1',caption_2='$caption2',caption_3='$caption3' WHERE kd_gambar='$kode'");
		return $hsl;
	}

	function hapus_slider($kode){
		$hsl=$this->db->query("DELETE FROM slider WHERE kd_gambar='$kode'");
		return $hsl;
	}
}