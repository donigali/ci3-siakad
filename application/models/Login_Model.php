<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Login_Model extends CI_Model {
       
    //cek user sebagai admin
    public function auth_admin($username)
    {
        return $this->db->get_where('tb_user',array('username' => $username));
    }   
    //cek user sebagai guru
    public function auth_guru($username)
    {
        return $this->db->get_where('tb_guru',array('nip' => $username));
    }

}
                    
/* End of file Login_Model.php */
    
                        