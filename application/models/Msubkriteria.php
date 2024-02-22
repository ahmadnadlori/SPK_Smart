<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Msubkriteria extends CI_Model
{

	//var $books = 'books'
	public function __construct()
	{
		parent::__construct();
	}
public function daftar_sub_kriteria(){
		$this->db->select('*');
		$this->db->from('smart_sub_kriteria'); 
		$this->db->order_by('nilai_sub_kriteria','DESC');
		//$this->db->join('smart_kriteria', 'smart_kriteria.id_kriteria = smart_sub_kriteria.id_kriteria');
		//$this->db->group_by('nama_kriteria');
		
		$query = $this->db->get();
		return $query->result();
}
public function daftar_sub_kriteria_dua($id_kriteria){
		$this->db->select('*');
		$this->db->from('smart_sub_kriteria'); 
		$this->db->where('id_kriteria',$row->id_kriteria);
		//$this->db->join('smart_kriteria', 'smart_kriteria.id_kriteria = smart_sub_kriteria.$row');
		//$this->db->group_by('nama_kriteria');
		//$this->db->order_by('nilai_sub_kriteria','ASC');
		$query = $this->db->get();
		return $query->result();
}
public function simpan_sub_kriteria($data){
		$this->db->insert('smart_sub_kriteria', $data);
		if ($this->db->affected_rows()==1) {
			return true;
		}
		else{
			return false;
		}
	}
public function hapus_sub_kriteria($data){
		$this->db->delete('smart_sub_kriteria',"id_sub_kriteria='$data'");//, 'image_user');
		
		if($this->db->affected_rows()>0){
			return true;
		}
		else{
			return false;
		}
	}
public function edit_sub_kriteria($id_sub_kriteria){
		$this->db->select('*');
		$this->db->from('smart_sub_kriteria');
		$this->db->join('smart_kriteria', 'smart_kriteria.id_kriteria = smart_sub_kriteria.id_kriteria');
		$this->db->where('id_sub_kriteria', $id_sub_kriteria);
		$query = $this->db->get();
		return $query->result();
	}

public function proses_edit_sub_kriteria($id_sub_kriteria, $data)
	{
		$this->db->update('smart_sub_kriteria', $data, 'id_sub_kriteria = '.$id_sub_kriteria);
		if($this->db->affected_rows()=='1'){
			return true;
		}
		else{
			return false;
		}
	}
}