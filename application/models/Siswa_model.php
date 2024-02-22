<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa_model extends CI_Model {

    public function get_jumlah_siswa_per_kelas() {
        $this->db->select('smart_kelas.nama_kelas, COUNT(smart_alternatif.id_alternatif) as jumlah_siswa');
        $this->db->from('smart_alternatif');
        $this->db->join('smart_kelas', 'smart_alternatif.id_kelas = smart_kelas.id_kelas');
        $this->db->group_by('smart_alternatif.id_kelas');
        $query = $this->db->get();
        return $query->result();
    }

}
