<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mpenilaian extends CI_Model
{

	//var $books = 'books'
	public function __construct()
	{
		parent::__construct();
	}

	public function daftar_sub_kriteria2(){
		$this->db->select('*');
		$this->db->from('smart_sub_kriteria'); 
		$this->db->join('smart_kriteria', 'smart_kriteria.id_kriteria = smart_sub_kriteria.id_kriteria');
		$this->db->group_by('nama_kriteria');
		//$this->db->order_by('nilai_sub_kriteria','ASC');
		$query = $this->db->get();
		return $query->result();
	}

	public function daftar_penilaian(){
		$this->db->select('*');
		$this->db->from('smart_alternatif_kriteria');
		//$this->db->join('smart_penduduk','smart_penduduk.id_pen=smart_alternatif_penduduk.id_pen');
		$query = $this->db->get();
		return $query->result();
	}


	public function hapus_penilaian($data){
		$this->db->delete('smart_alternatif_kriteria',"id_alternatif='$data'");//, 'image_user');
		
		if($this->db->affected_rows()>0){
			return true;
		}
		else{
			return false;
		}
	}
	public function reset_penilaian($data){
		$query = "UPDATE smart_alternatif SET hasil_alternatif = '0', ket_alternatif='ditolak' where id_alternatif='$data'";
		$res = $this->db->query($query);
		return true;
	}



	public function edit_penilaian($id_alternatif){
		$this->db->select('*');
		$this->db->from('smart_alternatif_kriteria');
		$this->db->where('id_alternatif', $id_alternatif);
		$query = $this->db->get();
		return $query->result();
	}
	public function edit_penilaian2($id_alternatif){
		$this->db->select('*');
		$this->db->from('smart_alternatif');
		$this->db->where('id_alternatif', $id_alternatif);
		$query = $this->db->get();
		return $query->result();
	}
	public function edit_penilaian3($id_alternatif){
		$this->db->select('*');
		$this->db->from('smart_sub_kriteria');
		$this->db->where('id_kriteria', $id_alternatif);
		$query = $this->db->get();
		return $query->result();
	}

	//proses edit kriteria
	public function proses_edit_penilaian($id_alternatif, $data)
	{
		$this->db->update('smart_alternatif_kriteria', $data, 'id_alternatif = '.$id_alternatif);
		if($this->db->affected_rows()=='1'){
			return true;
		}
		else{
			return false;
		}
	}

	public function simpan_penilaian($data){
		$this->db->insert('smart_alternatif_kriteria', $data);
		if ($this->db->affected_rows()==1) {
			return true;
		}
		else{
			return false;
		}
	}

	public function cekid($data){
		$this->db->select('*');
		$this->db->from('smart_alternatif_kriteria');
		$this->db->where('id_alternatif', $data);
		$query = $this->db->get();
		if($query->num_rows()>0){
			return true;
		}else{
			return false;
		}
	}

}