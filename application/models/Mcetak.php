<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mcetak extends CI_Model
{

	//var $books = 'books'
	public function __construct()
	{
		parent::__construct();
	}
	
	public function daftar_smart_alternatif($id_aktif){
		$query = $this->db->query("SELECT * FROM smart_alternatif JOIN smart_kelas ON smart_alternatif.id_kelas = smart_kelas.id_kelas WHERE id_tahun_akademik='$id_aktif' ORDER BY smart_alternatif.hasil_alternatif DESC;");
		return $query->result();
	}

	public function daftar_smart_kriteria(){
		$this->db->select('*');
		$this->db->from('smart_kriteria');
		//$this->db->join('smart_penduduk','smart_penduduk.id_pen=smart_alternatif_penduduk.id_pen');
		$query = $this->db->get();
		return $query->result();
	}
	}
	
?>