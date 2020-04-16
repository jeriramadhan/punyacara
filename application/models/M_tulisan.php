<?php
class M_tulisan extends CI_Model{


	//BACK END DEVELOPMENT
	function get_all_post() {
        $this->datatables->select('tulisan_id,tulisan_judul,tulisan_isi,tulisan_kategori_id,tulisan_kategori_nama,tulisan_views,tulisan_gambar,tulisan_pengguna_id,tulisan_author,tulisan_slug,tulisan_deskripsi,tulisan_lang');
        $this->datatables->select("DATE_FORMAT(tulisan_tanggal,'%d/%m/%Y') AS tanggal",FALSE);
        $this->datatables->from('tulisan');
        $this->db->order_by('tulisan_id', 'DESC');
        $this->datatables->add_column('view', '<a href="tulisan/get_edit/$1" class="btn btn-sm btn-secondary btn-circle edit_record" data-id="$1"><span class="fa fa-pencil"></span></a> <a href="javascript:void(0);" class="btn btn-sm btn-secondary btn-circle hapus_record" data-id="$1"><span class="fa fa-trash"></span></a>','tulisan_id');
        return $this->datatables->generate();
    }



	function get_all_tulisan(){
		$hsl=$this->db->query("SELECT tulisan.*,DATE_FORMAT(tulisan_tanggal,'%d/%m/%Y') AS tanggal FROM tulisan ORDER BY tulisan_id DESC");
		return $hsl;
	}

	function simpan_tulisan($judul,$isi,$kategori_id,$kategori_nama,$user_id,$user_nama,$gambar,$slug,$deskripsi,$lang){
		$hsl=$this->db->query("INSERT INTO tulisan(tulisan_judul,tulisan_isi,tulisan_kategori_id,tulisan_kategori_nama,tulisan_pengguna_id,tulisan_author,tulisan_gambar,tulisan_slug,tulisan_deskripsi,tulisan_lang) VALUES ('$judul','$isi','$kategori_id','$kategori_nama','$user_id','$user_nama','$gambar','$slug','$deskripsi','id')");
		return $hsl;
	}

	function get_tulisan_by_kode($kode){
		$hsl=$this->db->query("SELECT tulisan.*,DATE_FORMAT(tulisan_tanggal,'%d/%m/%Y') AS tanggal FROM tulisan where tulisan_id='$kode'");
		return $hsl;
	}

	function update_tulisan($tulisan_id,$judul,$isi,$kategori_id,$kategori_nama,$user_id,$user_nama,$gambar,$slug,$deskrispi,$lang){
		$hsl=$this->db->query("UPDATE tulisan SET tulisan_judul='$judul',tulisan_isi='$isi',tulisan_kategori_id='$kategori_id',tulisan_kategori_nama='$kategori_nama',tulisan_pengguna_id='$user_id',tulisan_author='$user_nama',tulisan_gambar='$gambar',tulisan_slug='$slug',tulisan_deskripsi='$deskrispi',tulisan_lang='id' WHERE tulisan_id='$tulisan_id'");
		return $hsl;
	}
	
	function update_tulisan_tanpa_img($tulisan_id,$judul,$isi,$kategori_id,$kategori_nama,$user_id,$user_nama,$slug){
		$hsl=$this->db->query("UPDATE tulisan SET tulisan_judul='$judul',tulisan_isi='$isi',tulisan_kategori_id='$kategori_id',tulisan_kategori_nama='$kategori_nama',tulisan_pengguna_id='$user_id',tulisan_author='$user_nama',tulisan_slug='$slug',tulisan_deskripsi='$deskrispi',tulisan_lang='id' WHERE tulisan_id='$tulisan_id'");
		return $hsl;
	}
	
	function hapus_tulisan($kode){
		$hsl=$this->db->query("DELETE FROM tulisan WHERE tulisan_id='$kode'");
		return $hsl;
	}


	//FRONTEND
	function blog_perpage($offset,$limit){
		$hsl=$this->db->query("SELECT tulisan.*,DATE_FORMAT(tulisan_tanggal,'%d/%m/%Y') AS tanggal,DAY(tulisan_tanggal) AS hari,LEFT(DATE_FORMAT(tulisan_tanggal,'%M'),3) AS bulan FROM tulisan WHERE tulisan_lang='id' ORDER BY tulisan_id DESC limit $offset,$limit");
		return $hsl;
	}

	function blog(){
		$hsl=$this->db->query("SELECT tulisan.*,DATE_FORMAT(tulisan_tanggal,'%d/%m/%Y') AS tanggal FROM tulisan WHERE tulisan_lang='id' ORDER BY tulisan_id DESC");
		return $hsl;
	} 
	function get_blog_by_kode($kode){
		$hsl=$this->db->query("SELECT tulisan.*,DATE_FORMAT(tulisan_tanggal,'%d %M %Y') AS tanggal,kategori_slug,DAY(tulisan_tanggal) AS hari,LEFT(DATE_FORMAT(tulisan_tanggal,'%M'),3) AS bulan FROM tulisan JOIN kategori ON kategori_id=tulisan_kategori_id WHERE tulisan_id='$kode'");
		return $hsl;
	}
	function update_baca($kode){
		$hsl=$this->db->query("UPDATE tulisan SET tulisan_views=tulisan_views+1 where tulisan_id='$kode'");
		return $hsl;
	}

	function post_terbaru(){
		$hsl=$this->db->query("SELECT tulisan.*,DATE_FORMAT(tulisan_tanggal,'%d/%m/%Y') AS tanggal FROM tulisan ORDER BY tulisan_id DESC limit 6");
		return $hsl;
	}

	//Blog Perkategori
	function blog_perkategori_perpage_id($kategori,$offset,$limit){
		$hsl=$this->db->query("SELECT tulisan.*,DATE_FORMAT(tulisan_tanggal,'%d/%m/%Y') AS tanggal FROM tulisan WHERE tulisan_kategori_id='$kategori' AND tulisan_lang='id' ORDER BY tulisan_id DESC limit $offset,$limit");
		return $hsl;
	}

	function blog_perkategori_id($kategori){
		$hsl=$this->db->query("SELECT tulisan.*,DATE_FORMAT(tulisan_tanggal,'%d/%m/%Y') AS tanggal FROM tulisan WHERE tulisan_kategori_id='$kategori' AND tulisan_lang='id' ORDER BY tulisan_id DESC");
		return $hsl;
	} 
	//End Blog Perkategori

	function search_blog($tulisan_judul){
		 $this->db->like('tulisan_judul', $tulisan_judul , 'both');
		 $this->db->order_by('tulisan_judul', 'ASC');
		 $this->db->where('tulisan_lang','id');
		 $this->db->limit(10);
		 return $this->db->get('tulisan')->result();
	}

	function cari_blog($judul){
		$hsl=$this->db->query("SELECT tulisan.*,DATE_FORMAT(tulisan_tanggal,'%d/%m/%Y') AS tanggal FROM tulisan WHERE tulisan_judul LIKE '%$judul%' AND tulisan_lang='id'");
		return $hsl;
	}

	function cari_blog_perpage($offset,$limit,$judul){
		$hsl=$this->db->query("SELECT tulisan.*,DATE_FORMAT(tulisan_tanggal,'%d/%m/%Y') AS tanggal FROM tulisan WHERE tulisan_judul LIKE '%$judul%' AND tulisan_lang='id' limit $offset,$limit");
		return $hsl;
	}

	function count_views($kode){
        $user_ip=$_SERVER['REMOTE_ADDR'];
        $cek_ip=$this->db->query("SELECT * FROM post_views WHERE views_ip='$user_ip' AND views_tulisan_id='$kode' AND DATE(views_tanggal)=CURDATE()");
        if($cek_ip->num_rows() <= 0){
            $this->db->trans_start();
				$this->db->query("INSERT INTO post_views (views_ip,views_tulisan_id) VALUES('$user_ip','$kode')");
				$this->db->query("UPDATE tulisan SET tulisan_views=tulisan_views+1 where tulisan_id='$kode'");
			$this->db->trans_complete();
			if($this->db->trans_status()==TRUE){
				return TRUE;
			}else{
				return FALSE;
			}
        }
    }

    function jum_views($kode){
    	$hsl=$this->db->query("SELECT * FROM post_views WHERE views_tulisan_id='$kode'");
    	return $hsl;
    }
    
    function get_berita_by_slug($slug){
		$hsl=$this->db->query("SELECT tulisan.*,DATE_FORMAT(tulisan_tanggal,'%d %M %Y') AS tanggal FROM tulisan where tulisan_slug='$slug'");
		return $hsl;
	}

    function get_berita_by_slug_id($slug){
		$hsl=$this->db->query("SELECT tulisan.*,DATE_FORMAT(tulisan_tanggal,'%d %M %Y') AS tanggal FROM tulisan where tulisan_slug='$slug' AND tulisan_lang='id'");
		return $hsl;
	}
	
	function get_kategori_by_slug($slug){
		$hsl=$this->db->query("SELECT * FROM kategori WHERE kategori_slug='$slug'");
		return $hsl;
	}

	//show kategori berdasarkan bahasa
	function get_all_kategori_id(){
		$hsl=$this->db->query("SELECT DISTINCT kategori_id,kategori_nama,kategori_slug FROM kategori JOIN tbl_tulisan ON kategori_id=tulisan_kategori_id WHERE tulisan_lang='id'");
		return $hsl;
	}

	function get_blog_home(){
		$hsl=$this->db->query("SELECT tulisan.*,DATE_FORMAT(tulisan_tanggal,'%d/%m/%Y') AS tanggal FROM tulisan ORDER BY tulisan_id DESC LIMIT 3");
		return $hsl;
	}

}