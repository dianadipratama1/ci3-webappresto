<?php if(! defined('BASEPATH')) exit('Akses langsung tidak diperbolehkan');

class Simple_login 
{
	// SET SUPER GLOBAL
 	var $CI = NULL;
 	public function __construct() {
 		$this->CI =& get_instance();
 	}
 
 	// Fungsi login
 	public function login($username, $password) {
 		$query = $this->CI->db->get_where('users',array('username'=>$username,'password' => $password));
 		if($query->num_rows() == 1) {
 			$row = $this->CI->db->query('SELECT id_user FROM users where username = "'.$username.'"');
 			$admin = $row->row();
 			$id = $admin->id_user;
 			$this->CI->session->set_userdata('username', $username);
 			$this->CI->session->set_userdata('id_login', uniqid(rand()));
 			$this->CI->session->set_userdata('id', $id);
 			redirect(base_url('dasbor'));
 		}else{
 			$this->CI->session->set_flashdata('sukses','Oops... Username/password salah');
 			redirect(base_url('login'));
 		}
 		return false;
 	}
 
 	// Proteksi halaman
 	public function cek_login() {
 		if($this->CI->session->userdata('username') == '') {
 			$this->CI->session->set_flashdata('sukses','Anda belum login');
 			redirect(base_url('login'));
 		}
 	}
 
 	// Fungsi logout
 	public function logout() {
 		$this->CI->session->unset_userdata('username');
 		$this->CI->session->unset_userdata('id_login');
 		$this->CI->session->unset_userdata('id');
 		$this->CI->session->set_flashdata('sukses','Anda berhasil logout');
 		redirect(base_url('login'));
 	}
}