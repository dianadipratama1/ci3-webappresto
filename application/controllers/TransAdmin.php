<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class TransAdmin extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('transadmin_model');
        /*if (empty($this->session->userdata('username')) AND empty($this->session->userdata('password'))) {
                redirect('Login/index');
            }else{
                $namalengkap=$this->session->userdata('nama_user');
            };*/
    }
   
   public function index()
    {
        $data['tmasakan']=$this->transadmin_model->tampildata('masakan','id_masakan');
        $data['orders']=$this->transadmin_model->no_invoice();
        $this->load->view('Template/header',$data);
        $this->load->view('Template/main',$data);
        $this->load->view('transaksi/tampil_transaksi',$data);
        $this->load->view('Template/footer',$data);
    }

    public function formtransaksi()
    {
        $data['tmasakan']=$this->transadmin_model->tampildata('masakan','id_masakan');
        $this->load->view('Template/header',$data);
        $this->load->view('Template/main',$data);
        $this->load->view('transaksi/tampil_transaksi',$data);
        $this->load->view('Template/footer',$data);
    }

    public function simpantransaksi()
    {   
        $data= array('id_orders' => $this->input->post('no_orders'),
                     'no_meja'=> $this->input->post('no_meja'),
                     'tanggal'=> date('Y-m-d'),
                     'id_user'=> $this->input->post('id_user'),
                     'keterangan'=> $this->input->post('keterangan'),
                     'status_orders'=> $this->input->post('status_order')
                    );
        $query=$this->transadmin_model->simpandata('orders', $data);
        $datatransaksi= array('id_user'=>$this->input->post('id_user'),                         
                              'id_orders' => $this->input->post('no_orders'),
                               'tanggal'=>date('Y-m-d'),
                               'total_bayar'=>$this->input->post('total'));
        $query=$this->transadmin_model->simpandata('transaksi',$datatransaksi);
        $id_orders=$this->input->post('no_orders');
        $id=$this->input->post('id_masakan');
        $datadetail=array();
        foreach ($id as $key => $value) 
        {
            $datadetail[]= array('id_orders' => $id_orders,
                                 'id_masakan' => $_POST['id_masakan'][$key],
                                 'keterangan' => $_POST['qty'][$key],
                                 'status_detail_orders' => $_POST['status_masakan'][$key]) ;
        }
        
        $query=$this->transadmin_model->simpan_multi('detail_orders',$datadetail);
        if($query)
        {
            $this->session->set_flashdata('info','Transaksi berhasil disimpan');
            $this->cart->destroy();
            redirect('Admin/transaksi');
        }else{
                $this->session->set_flashdata('info','Transaksi gagal disimpan'); 
                redirect('Admin/transaksi');
             }
                
    }

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

    public function simpan_keranjang(){ //fungsi tambah keranjang
            $data = array(
                'id' => $this->input->post('id_masakan'), 
                'name' => $this->input->post('nama_masakan'), 
                'price' => $this->input->post('harga_masakan'), 
                'qty' => '1',
                'coupon' => $this->input->post('status_masakan'), 
                 
            );
            $this->cart->insert($data); // cara simpan menggunakan cart
            echo $this->tampil_keranjang(); //tampilkan cart setelah ditambah
    }

    public function load_keranjang(){ //tampil data keranjang
            echo $this->tampil_keranjang();
    }

    public function tampil_keranjang(){ //Fungsi untuk menampilkan Cart
            $output = '';
            $no = 0;
            foreach ($this->cart->contents() as $items) {
                $no++;
                $output .='
                    <tr>
                        <td><input type=hidden value="'.$items['id'].'" name="id_masakan[]">'.$items['name'] .'</td>
                        <td>'.number_format($items['price']).'</td>
                        <td><input type=hidden value="'.$items['qty'].'" name="qty[]">'.$items['qty'].'</td>
                        <td><input type=hidden value="'.$items['coupon'].'" name="status_masakan[]">'.$items['coupon'].'</td>
                        <td>'.number_format($items['subtotal']).'</td>
                        <td><button type="button" id="'.$items['rowid'].'" class="hapus_cart btn btn-danger btn-xs">Hapus</button></td>
                    </tr>
                ';
            }
            $output .= '
                <tr>
                    <th colspan="4">Total</th>
                    <th colspan="2">'.'Rp '.number_format($this->cart->total()).'</th>
                </tr>
            ';
            return $output;
    }

    public function hapus_cart(){ //fungsi untuk menghapus item cart
            $data = array(
                'rowid' => $this->input->post('row_id'), 
                'qty' => 0, 
            );
            $this->cart->update($data);
            echo $this->tampil_keranjang();
    }
}