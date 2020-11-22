<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Level extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('level_model');

    }

	//awal lvl
    public function index()
    {
    	$data['tlevel']=$this->level_model->tampildata('level','id_level');
        $this->load->view('template/header',$data);
        $this->load->view('template/main',$data);
        $this->load->view('level/tampil_level',$data);
        $this->load->view('template/footer',$data);

    }

    public function formlevel()
    {
        $data['tlevel']=$this->level_model->tampildata('level','id_level');
        $this->load->view('template/header',$data);
        $this->load->view('template/main',$data);
    	$this->load->view('level/formlevel',$data);
        $this->load->view('template/footer',$data);
    }

    public function simpanlevel()
    {
    	$this->form_validation->set_rules('nama_level','Nama Level','required');
    	if ($this->form_validation->run()==FALSE){
    		$this->load->view('level/formlevel');
    	}else{
    		$data=array('nama_level'=>$this->input->post('nama_level'));	
    		$query=$this->level_model->simpandata('level',$data);
    		if ($query){
    			$this->session->set_flashdata('info','Level Berhasil Disimpan');
    			redirect('Level');                          
    		}else{
    			$this->session->set_flashdata('info','Ada Syntax Yang Belum Lengkap');
    			redirect('Level');
    			}
    		}
    }

    public function hapuslevel($id)
    {
    	$this->level_model->hapusdata('level',$id,'id_level');
    	if ($this->db->affected_rows())
    	{
    		$this->session->set_flashdata('info','Data Berhasil Dihapus');
    		redirect('Level');
    	}else{
    		$this->session->set_flashdata('info','Data Gagal Dihapus');
    		redirect('Level');
    	}
    }

    public function formeditlevel($id)
    {
    	$data['editlevel']=$this->level_model->formeditdata('level','id_level',$id);
    	$this->load->view('template/header',$data);
        $this->load->view('template/main',$data);
        $this->load->view('level/formeditlevel',$data);
        $this->load->view('template/footer',$data);
    }

    public function editlevel()
    { 
    	$data=array('nama_level'=>$this->input->post('nama_level'));
    	$id=$this->input->post('id_level');
    	$this->level_model->editdata('level','id_level',$id,$data);
    	if ($this->db->affected_rows()) 
    	{
    		$this->session->set_flashdata('info','Data Berhasil Di Edit');
    		redirect('Level');
    	}else{
 			$this->session->set_flashdata('info','Data Tidak Berhasil Di Edit');
    		redirect('Level');
     	}
    }
	//akhir levl
}