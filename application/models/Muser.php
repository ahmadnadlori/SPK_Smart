<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Muser extends CI_Model {

    public function tambah_user($data) {
        $this->db->insert('smart_akun', $data);
    }
    
    public function get_user() {
        $query = $this->db->get('smart_akun');
        return $query->result();
    }
    
    public function get_user_by_id($username) {
        $user = $this->db->get_where('smart_akun', array('username' => $username))->row();
        return $user;
    }

    public function update_user($username, $data) {
        $this->db->where('username', $username);
        $this->db->update('smart_akun', $data);
    }

    public function hapus_user($data){
		$this->db->delete('smart_akun',"username='$data'");
		
		if($this->db->affected_rows()>0){
			return true;
		}
		else{
			return false;
		}
	}
    
}