<?php
class M_kategori extends CI_Model{

	function get_all_kategori(){
		$hsl=$this->db->query("SELECT * FROM kategori");
		return $hsl;
	}
	function simpan_kategori($kategori,$slug){
		$hsl=$this->db->query("insert into kategori(kategori_nama,kategori_slug) values('$kategori','$slug')");
		return $hsl;
	}
	function update_kategori($kode,$kategori,$slug){
		$hsl=$this->db->query("update kategori set kategori_nama='$kategori',kategori_slug='$slug' where kategori_id='$kode'");
		return $hsl;
	}
	function hapus_kategori($kode){
		$hsl=$this->db->query("delete from kategori where kategori_id='$kode'");
		return $hsl;
	}

	function get_kategori_byid($kategori_id){
		$hsl=$this->db->query("select * from kategori where kategori_id='$kategori_id'");
		return $hsl;
	}

}