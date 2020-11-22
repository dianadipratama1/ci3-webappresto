<?php
	class level_model extends CI_Model
	{
		public function tampildata($level,$id_level)
		{
    		return $this->db->from($level)
            	        	->order_by($id_level, 'ASC')
                	    	->get('');
    	}	 

    	public function simpandata($level,$data)
    	{
    		return $this->db->insert($level,$data);
    	}

    	public function hapusdata($level,$id,$idkey)
    	{
    		return $this->db->delete($level,array($idkey=>$id));
    	}

    	public function formeditdata($level,$idkey,$id)
    	{
    		return $this->db->get_where($level,array($idkey=>$id))->row();
    	}

    	public function editdata($level,$idkey,$id,$data)
    	{
        	$query=$this->db->where($idkey,$id)
            		        ->update($level,$data);
        	return $query;
    	}                                                                                                             
	}
?>