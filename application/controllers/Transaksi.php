<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Transaksi extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('transaksi_model');
        /*if (empty($this->session->userdata('username')) AND empty($this->session->userdata('password'))) {
                redirect('Login/index');
            }else{
                $namalengkap=$this->session->userdata('nama_user');
            };*/
    }
   
   public function index()
    {
        $data['tmasakan']=$this->transaksi_model->tampildata('masakan','id_masakan');
        $data['torder']=$this->transaksi_model->tampildata('order','id_orders');
        $this->load->view('Template/header',$data);
        $this->load->view('Template/maintrans',$data);
        $this->load->view('transaksi/tampil_transaksi',$data);
        $this->load->view('Template/footer',$data);
    }

    public function formtransaksi()
    {
        $data['tmasakan']=$this->transaksi_model->tampildata('masakan','id_masakan');
        $this->load->view('Template/header',$data);
        $this->load->view('Template/maintrans',$data);
        $this->load->view('transaksi/tampil_transaksi',$data);
        $this->load->view('Template/footer',$data);
    }

    // public function simpanmasakan()
    // {
    //     $this->form_validation->set_rules('nama_masakan','Nama masakan','required');
    //     $this->form_validation->set_rules('harga_masakan','Harga masakan','required|numeric');
    //     $this->form_validation->set_rules('status_masakan','Status masakan','required');
    //     if($this->form_validation->run() == FALSE)
    //     {
    //         $this->load->view('transaksi/formtransaksi');
    //     }else{
    //             $data= array('nama_masakan' => $this->input->post('nama_masakan'),
    //                             'harga'=>$this->input->post('harga_masakan'),
    //                             'status_masakan'=>$this->input->post('status_masakan'));
    //             $query=$this->masakan_model->simpandata('masakan',$data);
    //             if($query)
    //             {
    //                 $this->session->set_flashdata('info','masakan berhasil disimpan');
    //                 redirect('Masakan/index');
    //             }else{
    //                     $this->session->set_flashdata('info','Ada sintak yang belum lengkap');
    //                     redirect('Masakan/index');
    //                  }
    //          }
                
    // }

    // public function hapusmasakan($id)
    // {
    //     $this->masakan_model->hapusdata('masakan',$id,'id_masakan');
    //     if ($this->db->affected_rows())
    //     {
    //         $this->session->set_flashdata('info','Berhasil terhapus');
    //         redirect('Masakan/index');
    //     }else{
    //             $this->session->set_flashdata('info','Gagal terhapus');
    //             redirect('Masakan/index');
    //          }
    // }

    // public function formeditmasakan($id)
    // {
    //     $data['editmasakan']=$this->masakan_model->formeditdata('masakan','id_masakan',$id);
    //     $this->load->view('Template/header',$data);
    //     $this->load->view('Template/main',$data);
    //     $this->load->view('Masakan/formeditmasakan',$data);
    //     $this->load->view('Template/footer',$data);
    // }

    // public function editmasakan()
    // {
    //     $data= array('nama_masakan'     => $this->input->post('nama_masakan'),
    //                         'harga'     => $this->input->post('harga_masakan'),
    //                  'status_masakan'   => $this->input->post('status_masakan'));
    //     $id=$this->input->post('id_masakan');
    //     $this->masakan_model->editdata('masakan','id_masakan',$id,$data);
    //     if ($this->db->affected_rows())
    //     {
    //         $this->session->set_flashdata('info','Berhasil terhapus');
    //         redirect('Masakan/index');
    //     }else{
    //             $this->session->set_flashdata('info','Gagal terhapus');
    //             redirect('Masakan/index');
    //          }
    // }
}