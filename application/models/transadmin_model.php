<?php
	class transadmin_model extends CI_Model
	{
		public function tampildata($masakan,$id_masakan)
		{
    		return $this->db->from($masakan)
            	        	->order_by($id_masakan, 'ASC')
                	    	->get('');
    	}	 

    	public function simpandata($masakan,$data)
    	{
    		return $this->db->insert($masakan,$data);
    	}

    	public function hapusdata($masakan,$id,$idkey)
    	{
    		return $this->db->delete($masakan,array($idkey=>$id));
    	}

    	public function formeditdata($masakan,$idkey,$id)
    	{
    		return $this->db->get_where($masakan,array($idkey=>$id))->row();
    	}

    	public function editdata($masakan,$idkey,$id,$data)
    	{
        	$query=$this->db->where($idkey,$id)
            		        ->update($masakan,$data);
        	return $query;
    	}

    	public function no_invoice()
        {
            // pada table orders (Tambah 's'), AI (Auto Increament) dihilangkan 
            $n = $this->db->query("SELECT MAX(RIGHT(id_orders,4)) AS kd_max FROM orders WHERE DATE(tgl_orders)=CURDATE()");
            $kd = "";
            if($n->num_rows()>0){
                foreach($n->result() as $k){
                    $tmp = ((int)$k->kd_max)+1;
                    $kd = sprintf("%04s", $tmp);
                }
            }else{
                $kd = "0001";
            }
            date_default_timezone_set('Asia/Jakarta');
            return date('dmy').$kd;
        }


	}
?>