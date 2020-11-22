<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');

    }

	public function index()
	{
    	$data['tuser']=$this->user_model->tampildata('user','id_user');
         $this->load->view('Template/header',$data);
         $this->load->view('Template/main',$data);
         $this->load->view('User/tampil_user',$data);
         //$this->load->view('Template/content',$data);
         $this->load->view('Template/footer',$data);
    }

    public function formuser()
    {
        // $data['combobox']=$this->user_model->combobox('level','id_level','--Pilih Level--','--Nama Level--');
        $data['combobox']=$this->user_model->combobox();
    	$this->load->view('Template/header',$data);
        $this->load->view('Template/main',$data);
        $this->load->view('User/formuser',$data);
        $this->load->view('Template/footer',$data);
    }

    public function simpanuser()
    {
    	$this->form_validation->set_rules('nama_user','Nama user','required');
    	$this->form_validation->set_rules('password','Password','required');
        $this->form_validation->set_rules('username','Username','required');
       if ($this->form_validation->run() == FALSE){
                $data['combobox']=$this->user_model->combobox('level','id_level','-- Pilih Level--','nama_level');
                $this->load->view('User/formuser',$data);
            }else{
 
                $data= array('nama_user' => $this->input->post('nama_user'),
                            'password'=>md5($this->input->post('password')),
                            'username'=>$this->input->post('username'),
                            'id_level'=>$this->input->post('level'));
                $query=$this->user_model->simpandata('user',$data);
                if($query){
                    $this->session->set_flashdata('info','user berhasil disimpan');
                    redirect('User/index');
                }else{
                    $this->session->set_flashdata('info','Ada sintak yang belum lengkap');
                    redirect('User/index');
                }
            }
    }

    public function hapususer($id){
    	$this->user_model->hapusdata('user',$id,'id_user');
        if ($this->db->affected_rows())
        {
        	$this->session->set_flashdata('info','Berhasil terhapus');
            redirect('User/index');
        }else{
        		$this->session->set_flashdata('info','Gagal terhapus');
                redirect('User/index');
             }
    }

    public function formedituser($id)
    {
        $data['edituser']=$this->user_model->formeditdata('user','id_user',$id);
        $data['combo']=$this->user_model->combobox('level','id_level','--  Pilih Level --','nama_level');
        $this->load->view('Template/header',$data);
        $this->load->view('Template/main',$data);
        $this->load->view('User/formedituser',$data);
        $this->load->view('Template/footer',$data);
    }

    public function edituser()
    {
        // if (!isset($this->input->post('password'))) 
        if ($this->input->post('password')!='' and $this->input->post('password')!=null) 
        {
            $data= array('nama_user' => $this->input->post('nama_user'),
                         'password'=>md5($this->input->post('password')),
                         'username'=>$this->input->post('username'),
                         'id_level'=>$this->input->post('level'));
            $id=$this->input->post('id_user');
            $this->user_model->editdata('user','id_user',$id,$data);
            if ($this->db->affected_rows())
            {
                $this->session->set_flashdata('info','Berhasil terhapus');
                redirect('User/index');
            }else{
                $this->session->set_flashdata('info','Gagal terhapus');
                redirect('User/index');
            }
        }else{
                $data= array('nama_user' => $this->input->post('nama_user'),
                             'username'=>$this->input->post('username'),
                             'id_level'=>$this->input->post('level'));
                $id=$this->input->post('id_user');
                $this->user_model->editdata('user','id_user',$id,$data);
                if ($this->db->affected_rows())
                {
                    $this->session->set_flashdata('info','Berhasil terhapus');
                    redirect('User/user');
                }else{
                        $this->session->set_flashdata('info','Gagal terhapus');
                        redirect('User/user');
                     }
            }
    
    }
}