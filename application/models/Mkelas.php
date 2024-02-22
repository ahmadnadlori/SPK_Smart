<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mkelas extends CI_Model
{

    //var $books = 'books'
    public function __construct()
    {
        parent::__construct();
    }

    public function getIdKelas($id_user){
        return $this->db->get_where('smart_wk', ["id_user" => $id_user])->row()->id_kelas;
    }

    public function daftar_kelas()
    {
        $this->db->select('*');
        $this->db->from('smart_kelas');
        $this->db->order_by('id_kelas', 'ASC');
        //$this->db->join('smart_kriteria', 'smart_kriteria.id_kriteria = smart_sub_kriteria.id_kriteria');
        //$this->db->group_by('nama_kriteria');

        $query = $this->db->get();
        return $query->result();
    }
    /* public function daftar_sub_kriteria_dua($id_kriteria){
		$this->db->select('*');
		$this->db->from('smart_sub_kriteria'); 
		$this->db->where('id_kriteria',$row->id_kriteria);
		//$this->db->join('smart_kriteria', 'smart_kriteria.id_kriteria = smart_sub_kriteria.$row');
		//$this->db->group_by('nama_kriteria');
		//$this->db->order_by('nilai_sub_kriteria','ASC');
		$query = $this->db->get();
		return $query->result();
} */
    public function simpan_kelas($data)
    {
        $this->db->insert('smart_kelas', $data);
        if ($this->db->affected_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }
    public function hapus_kelas($data)
    {
        $this->db->delete('smart_kelas', "id_kelas='$data'"); //, 'image_user');

        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function edit_kelas($id_kelas)
    {
        $this->db->select('*');
        $this->db->from('smart_kelas');
        $this->db->where('id_kelas', $id_kelas);
        $query = $this->db->get();
        return $query->result();
    }

    public function proses_edit_kelas($id_kelas, $data)
    {
        $this->db->update('smart_kelas', $data, 'id_kelas = ' . $id_kelas);
        if ($this->db->affected_rows() == '1') {
            return true;
        } else {
            return false;
        }
    }
}
