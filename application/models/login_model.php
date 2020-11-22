<?php
class login_model extends CI_Model
{
    public function login_admin($user,$pass){
    //  htmlspecialchars
        $u=htmlspecialchars($user);
        $p=md5($pass);
        $us=$this->db->escape_str($u);
        $ps=$this->db->escape_str($p);
        $query=$this->db->select('*')
                         ->from('user')
                         ->where('username',$us)
                         ->where('password',$ps)
                         ->limit(1)
                         ->get();
         
         if ($query->num_rows()==1) {
              return $query->result_object();
         }else{
              return false;
         }

}}
 
?>