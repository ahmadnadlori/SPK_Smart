<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mexcel extends CI_Model
{

	//var $books = 'books'
	public function __construct()
	{
		parent::__construct();
	}

	public function daftar_smart_alternatif(){
		$this->db->select('*');
		$this->db->from('smart_alternatif');
		//$this->db->join('smart_penduduk','smart_penduduk.id_pen=smart_alternatif_penduduk.id_pen');
		$query = $this->db->get();
		//return $query->result();
	}

	public function daftar_smart_kriteria(){
		$this->db->select('*');
		$this->db->from('smart_kriteria');
		//$this->db->join('smart_penduduk','smart_penduduk.id_pen=smart_alternatif_penduduk.id_pen');
		$query = $this->db->get();
		//return $query->result();
	}
	}
?>