<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mtahun extends CI_Model
{

	//var $books = 'books'
	public function __construct()
	{
		parent::__construct();
	}

	public function daftar_tahun(){
		$this->db->select('*');
		$this->db->from('smart_tahun_akademik');
		$query = $this->db->get();
		return $query->result();
	}
	
	public function simpan_tahun($data){
		$this->db->insert('smart_tahun_akademik', $data);
		if ($this->db->affected_rows()==1) {
			return true;
		}
		else{
			return false;
		}
	}

	public function hapus_tahun($data){
		$this->db->delete('smart_tahun_akademik',"id_tahun_akademik='$data'");//, 'image_user');
		
		if($this->db->affected_rows()>0){
			return true;
		}
		else{
			return false;
		}
	}
	
	public function tahun_aktif(){
		$this->db->select('*');
		$this->db->from('smart_tahun_akademik');
		$this->db->where('status', '1');
		$query = $this->db->get();
		return $query->row();
	}
	
	public function aktif($tahun_baru)
	{
		$ubah = array(
			'status'  => "1",
		);

		$this->db->where('id_tahun_akademik', $tahun_baru);
		$this->db->update('smart_tahun_akademik', $ubah);
	}
	
	public function nonaktif($tahun_lama)
	{
		$ubah = array(
			'status'  => "0",
		);

		$this->db->where('id_tahun_akademik', $tahun_lama);
		$this->db->update('smart_tahun_akademik', $ubah);
	}

	
	public function edit_tahun($id_tahun_akademik){
		$this->db->select('*');
		$this->db->from('smart_tahun_akademik');
		$this->db->where('id_tahun_akademik', $id_tahun_akademik);
		$query = $this->db->get();
		return $query->result();
	}

	//proses edit kriteria
	public function proses_edit_tahun($id_tahun_akademik, $data)
	{
		$this->db->update('smart_tahun_akademik', $data, 'id_tahun_akademik = '.$id_tahun_akademik);
		if($this->db->affected_rows()=='1'){
			return true;
		}
		else{
			return false;
		}
	}
}