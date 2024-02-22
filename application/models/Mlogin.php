<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mlogin extends CI_Model {

	//public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function cek_akun($akun){
		$this->db->select('*');
		$this->db->from('smart_akun');
		$this->db->where('username', $akun['username']);
		$this->db->where('password',$akun['password']);
		$query = $this->db->get();
		return $query;
	}

	public function cek_login($table,$where){		
		return $this->db->get_where($table,$where);
	}

	function cek_user($username)
{
	$this->db->select('username');
	$this->db->from('akun');
	$this->db->where('username',$username);
	$this->db->limit(1);
	$query=$this->db->get();

	if($query->num_rows()==1){
		return  true;
	}
	else{
		return false;
	}
}

function login($username,$password)
{
	$this->db->select('username,password');
	$this->db->from('akun');
	$this->db->where('username',$username);
	$this->db->where('password',md5($password));
	$this->db->limit(1);
	$query=$this->db->get();
	if($query->num_rows()==1){
		return  $query->result();
	}
	else{
		return false;
	}
}
	
}

/* End of file mlogin.php */
/* Location: ./application/models/mlogin.php */