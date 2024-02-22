<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//$this->load->model('Madmin');
        
		$this->load->model('Mlogin');

	}		

	public function index()
	{
		
			$this->load->view('Login/login');
	}

	// function cek_login() {
	// 	$this->load->library('form_validation');
	// 	$pesanError = [
	// 		'required'=>'<span style="color:red;">%s wajib diisi</span>',
	// 		'regex_match'=>'<span style="color:red;">%s tidak sesuai dengan format</span>',
	// 		'matches'=>'<span style="color:red;">%s tidak sama</span>',
	// 		'valid_email'=>'<span style="color:red;">%s tidak sesuai format',
	// 		'numeric'=>'<span style="color:red;">data %s harus berupa angka dan tidak boleh ada spasi</span>',
	// 		'min_length'=>'<span style="color:red;">panjang %s harus 10 karakter</span>',
	// 		'max_length'=>'<span style="color:red;">panjang %s harus 10 karakter</span>'
	// 	];
		
	// 	$this->form_validation->set_rules('username', 'Username', 'required');
	// 	$this->form_validation->set_rules('password', 'Password', 'callback_validate_password');
		
	// 	if ($this->form_validation->run() == FALSE) {
	// 		$data['error'] = validation_errors();
	// 		$this->load->view('Login/Login', $data);
	// 	}
	// 	else{
	// 		$username = $this->input->post('username');
	// 		$password = $this->input->post('password');
	// 		$akun = array(
	// 			'username' => $username,
	// 			'password' => md5($password)
	// 		);
	// 		$cek = $this->Mlogin->cek_akun($akun);
	// 		if($cek->num_rows() > 0){
	// 			$data_session = array(
	// 				'nama' => $username,
	// 				'akses'	=> $cek->row()->akses,
	// 				'status' => "login"
	// 			);
	
	// 			$this->session->set_userdata($data_session);
	// 			redirect(base_url("Admin"));
	
	// 		}else{
	// 			echo '<script type="text/javascript">alert("Username atau Password salah !!!")</script>';
	// 			redirect(base_url('Login'), 'refresh');
	// 		}
	// 	}
	// }

	public function cek_login(){
        $this->load->model('Mkelas');
		$this->load->library('form_validation');
		$pesanError = [  
			'username'=>'<span style="color:red;">%s wajib diisi</span>',
			'required'=>'<span style="color:red;">%s wajib diisi</span>',
			'regex_match'=>'<span style="color:red;">%s tidak sesuai dengan format</span>',
			'matches'=>'<span style="color:red;">%s tidak sama</span>',
			'valid_email'=>'<span style="color:red;">%s tidak sesuai format',
			'numeric'=>'<span style="color:red;">data %s harus berupa angka dan tidak boleh ada spasi</span>',
			'min_length'=>'<span style="color:red;">panjang %s harus 10 karakter</span>',
			'max_length'=>'<span style="color:red;">panjang %s harus 10 karakter</span>'];
	
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
	
		// tambahkan aturan validasi untuk password yang tidak diisi
		$this->form_validation->set_rules('password', 'Password', function($value) {
			if(empty($value)) {
				$this->form_validation->set_message('required', 'Password harus diisi!');
				return false;
			} else {
				return true;
			}
		});
	
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('Login/Login');
		}
		else{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$akun = array(
				'username' => $username,
				'password' => md5($password)
			);
			$cek = $this->Mlogin->cek_akun($akun);
			if($cek->num_rows() > 0){
				$data_session = array(
					'nama' => $username,
					'akses' => $cek->row()->akses,
					'status' => "login",
                    "wk" => ($cek->row()->akses == "wali kelas") ? true : false,
                    "id_kelas" => ($cek->row()->akses == "wali kelas") ? $this->Mkelas->getIdKelas($cek->row()->id_akun) : 0,
				);
                
				$this->session->set_userdata($data_session);
				redirect(base_url("Admin"));
	
			}else{
				echo '<script type="text/javascript">alert("Username atau Password salah !!!")</script>';
				redirect(base_url('Login'), 'refresh');
			}
		}
	}
	

	function validate_password($password) {
		if(empty($password)) {
			$this->form_validation->set_message('validate_password', 'Password harus diisi!');
			return FALSE;
		} else {
			return TRUE;
		}
	}
	

function logout(){
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}

}