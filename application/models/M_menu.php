<?php
class M_menu extends CI_Model{

	function get_all_menu(){
		$hsl=$this->db->query("SELECT makanan.*,nama,jam FROM makanan JOIN jam_makan ON makanan.kd_makan=jam_makan.kd_makan");
		return $hsl;
	}

	function simpan_menu($jadwal,$menu,$deskripsi,$harga,$diskon,$gambar){
		$hsl=$this->db->query("INSERT INTO makanan (kd_makan,disc,makanan,gambar,keterangan,harga) VALUES ('$jadwal','$diskon','$menu','$gambar','$deskripsi','$harga')");
		return $hsl;
	}

	function update_menu($kode,$jadwal,$menu,$deskripsi,$harga,$diskon,$gambar){
		$hsl=$this->db->query("UPDATE makanan SET kd_makan='$jadwal',disc='$diskon',makanan='$menu',gambar='$gambar',keterangan='$deskripsi',harga='$harga' WHERE kd_makanan='$kode'");
		return $hsl;
	}

	function update_menu_no_img($kode,$jadwal,$menu,$deskripsi,$harga,$diskon){
		$hsl=$this->db->query("UPDATE makanan SET kd_makan='$jadwal',disc='$diskon',makanan='$menu',keterangan='$deskripsi',harga='$harga' WHERE kd_makanan='$kode'");
		return $hsl;
	}

	function hapus_menu($kode){
		$hsl=$this->db->query("DELETE FROM makanan WHERE kd_makanan='$kode'");
		return $hsl;
	}
}