<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mkriteria extends CI_Model
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
	public function simpan_kriteria($data){
		$this->db->insert('smart_kriteria', $data);
		if ($this->db->affected_rows()==1) {
			return true;
		}
		else{
			return false;
		}
	}

	public function cekbobot(){
		$this->db->select('SUM(bobot_kriteria) as total');
		$this->db->from('smart_kriteria');
		$this->db->get()->row()->total;

	}

	public function hapus_kriteria($data){
		$this->db->delete('smart_kriteria',"id_kriteria='$data'");//, 'image_user');
		
		if($this->db->affected_rows()>0){
			return true;
		}
		else{
			return false;
		}
	}

	public function delete_data($data)
{
    $this->db->where('smart_kriteria.id_kriteria=smart_sub_kriteria.id_kriteria');
    $this->db->where('smart_kriteria.id_kriteria=smart_alternatif_kriteria.id_kriteria');
    $this->db->where('smart_kriteria.id_kriteria',$data);
    $this->db->delete('smart_kriteria','smart_sub_kriteria','smart_alternatif_kriteria');
}

	
	public function edit_kriteria($id_kriteria){
		$this->db->select('*');
		$this->db->from('smart_kriteria');
		$this->db->where('id_kriteria', $id_kriteria);
		$query = $this->db->get();
		return $query->result();
	}

	public function edit_penilaian($id_kriteria){
		$this->db->select('*');
		$this->db->from('smart_alternatif_kriteria');
		$this->db->where('id_kriteria', $id_kriteria);
		$query = $this->db->get();
		return $query->result();
	}

	//proses edit kriteria
	public function proses_edit_kriteria($id_kriteria, $data)
	{
		$this->db->update('smart_kriteria', $data, 'id_kriteria = '.$id_kriteria);
		if($this->db->affected_rows()=='1'){
			return true;
		}
		else{
			return false;
		}
	}
}