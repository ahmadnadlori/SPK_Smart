<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mpenduduk extends CI_Model
{

	//var $books = 'books'
	public function __construct()
	{
		parent::__construct();
	}
public function daftar_kriteria(){
		$this->db->select('*');
		$this->db->from('smart_kriteria');
		$query = $this->db->get();
		return $query->result();
	}

	public function daftar_kelas(){
		$this->db->select('*');
		$this->db->from('smart_kelas');
		$query = $this->db->get();
		return $query->result();
	}

public function daftar_sub_kriteria(){
		$this->db->select('*');
		$this->db->from('smart_sub_kriteria'); 
		//$this->db->order_by('nama_kriteria','ASC');
		$this->db->join('smart_kriteria', 'smart_kriteria.id_kriteria = smart_sub_kriteria.id_kriteria');
		//$this->db->
		//$this->db->group_by('nama_kriteria');
		
		$query = $this->db->get();
		return $query->result();
}

public function daftar_penduduk($id_aktif, $id_kelas = ""){
		$this->db->select('*');
		$this->db->from('smart_alternatif');
        if ($id_kelas != ""){
            $this->db->where('smart_alternatif.id_kelas', $id_kelas);    
        }
		$this->db->where('id_tahun_akademik', $id_aktif);
		$this->db->join('smart_kelas', 'smart_alternatif.id_kelas = smart_kelas.id_kelas');
		$query = $this->db->get();
		return $query->result();
	}
	public function simpan_penduduk($data){
		$this->db->insert('smart_alternatif', $data);
		if ($this->db->affected_rows()==1) {
			return true;
		}
		else{
			return false;
		}
	}


	public function hapus_penduduk($data){
		$tables = array('smart_alternatif', 'smart_alternatif_kriteria');//, 'image_user');
		$this->db->where('id_alternatif', $data);
		$this->db->delete($tables);
		if($this->db->affected_rows()>0){
			return true;
		}
		else{
			return false;
		}
	}


	public function edit_penduduk($id_alternatif){
		//$this->db->select('*');
		//$this->db->from('smart_alternatif');
		//$this->db->where('id_alternatif', $id_alternatif);
		//$query = $this->db->get();
		//return $query->result();
		$this->db->select('*');
		$this->db->from('smart_alternatif');
		$this->db->join('smart_kelas', 'smart_alternatif.id_kelas = smart_kelas.id_kelas');
		$this->db->where('id_alternatif', $id_alternatif);
		$query = $this->db->get();
		return $query->result();
	}

	//proses edit kriteria
	public function proses_edit_penduduk($id_alternatif, $data)
	{
		$this->db->update('smart_alternatif', $data, 'id_alternatif = '.$id_alternatif);
		if($this->db->affected_rows()=='1'){
			return true;
		}
		else{
			return false;
		}
	}
}