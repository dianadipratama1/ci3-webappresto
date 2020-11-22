<?php
	class masakan_model extends CI_Model
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

    	/*public function tampildatamasakan($makanan,$id_makanan)
    	{
    		return $this->db->from($makanan)
    						->order_by($id_makanan)
    						->get('');
    	}*/


	}
?>