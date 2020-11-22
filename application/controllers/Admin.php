<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');

    }

    public function index()
    {
    	//echo "SELAMAT DATANG DI KASIR RESTORAN AMAKAB (ANDA MAKAN ANDA KENYANG ANDA BAYAR)";
        $data['tadmin']=$this->admin_model->tampildata('level','id_level');
        $this->load->view('template/header',$data);
        $this->load->view('template/main',$data);
        $this->load->view('admin/tampil_admin',$data);
        $this->load->view('template/footer',$data);
    }
}