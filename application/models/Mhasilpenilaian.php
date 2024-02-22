<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mhasilpenilaian extends CI_Model
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

	public function daftar_smart_alternatif_kriteria(){
		$this->db->select('*');
		$this->db->from('smart_alternatif_kriteria');
		//$this->db->join('smart_penduduk','smart_penduduk.id_pen=smart_alternatif_penduduk.id_pen');
		$query = $this->db->get();
		return $query->result();
	}

	public function daftar_smart_alternatif($id_aktif, $id_kelas = ""){
        if ($id_kelas != ""){
            $query = $this->db->query("SELECT * FROM smart_alternatif JOIN smart_kelas ON smart_alternatif.id_kelas = smart_kelas.id_kelas WHERE id_tahun_akademik='$id_aktif' AND smart_alternatif.id_kelas = '$id_kelas' ORDER BY smart_alternatif.hasil_alternatif DESC;");
        }else {
            $query = $this->db->query("SELECT * FROM smart_alternatif JOIN smart_kelas ON smart_alternatif.id_kelas = smart_kelas.id_kelas WHERE id_tahun_akademik='$id_aktif' ORDER BY smart_alternatif.hasil_alternatif DESC;");
        }
		
		return $query->result();
	}
	
	public function daftar_smart_alternatif_kelas($id_aktif,$id_kelas){
		$query = $this->db->query("SELECT * FROM smart_alternatif JOIN smart_kelas ON smart_alternatif.id_kelas = smart_kelas.id_kelas WHERE smart_alternatif.id_kelas='$id_kelas' AND smart_alternatif.id_tahun_akademik='$id_aktif' ORDER BY smart_alternatif.hasil_alternatif DESC;");
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