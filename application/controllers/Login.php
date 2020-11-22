<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        /*if (empty($this->session->userdata('username')) AND empty($this->session->userdata('password'))) {
                redirect('Login/index');
            }else{
                $namalengkap=$this->session->userdata('nama_user');
            };*/
    }
    public function index() 
    {
        //$data['tlogin']=$this->login_model->login_admin('user','id_user');
        $this->load->view('login/tampil_login');
    }

    public function proses_login(){
        $user=$this->input->post('username');
        $pass=$this->input->post('password');
 
        $cekuser=$this->login_model->login_admin($user,$pass);
        if ($cekuser){
            foreach ($cekuser as $row) {
                if ($row->id_level=='1') {
                   $this->session->set_userdata('id_user', $row->id_user);
                   $this->session->set_userdata('username', $row->username);
                   $this->session->set_userdata('password', $row->password);
                   $this->session->set_userdata('nama_user', $row->nama_user);
                   $this->session->set_userdata('id_level', $row->id_level);
                   redirect('Admin');
                }else{
                    $this->session->set_userdata('id_user', $row->id_user);
                    $this->session->set_userdata('username', $row->username);
                    $this->session->set_userdata('password', $row->password);
                    $this->session->set_userdata('nama_user', $row->nama_user);
                    $this->session->set_userdata('id_level', $row->id_level);
                    redirect('Transaksi');
                }                
             }
         }else {
             
             $data['pesan']="Username atau Password tidak sesuai";
             $this->load->view('login/tampil_login',$data);
         }
    }
    
     public function logout(){
        $this->session->sess_destroy();
        redirect('Login');
    }
}