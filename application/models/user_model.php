<?php
	class user_model extends CI_Model
	{
		public function tampildata($user,$id_user)
		{
    		return $this->db->from($user)
            	        	->order_by($id_user, 'ASC')
                	    	->get('');
    	}	 

    	public function simpandata($user,$data)
    	{
    		return $this->db->insert($user,$data);
    	}

    	public function hapusdata($user,$id,$idkey)
    	{
    		return $this->db->delete($user,array($idkey=>$id));
    	}

    	public function formeditdata($user,$idkey,$id)
    	{
    		return $this->db->get_where($user,array($idkey=>$id))->row();
    	}

    	public function editdata($user,$idkey,$id,$data)
    	{
        	$query=$this->db->where($idkey,$id)
            		        ->update($user,$data);
        	return $query;
    	}

        // public function combobox($user,$idkey,$nama_level,$id_level)
        public function combobox()
        {
            $query = $this->db->query("SELECT id_level,nama_level FROM level order by id_level");
            foreach ($query->result() as $key => $value) {
                $data[$value->id_level] = $value->nama_level;
            }
            return $data;
        }
	}
?>