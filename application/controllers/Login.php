<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Login extends CI_Controller {
    public function __construct() {
		parent:: __construct();
		
	}
    public function index()
    {
        if ($this->session->userdata('login')) {
			redirect(site_url('dashboard'),'refresh');
		}else if($this->session->userdata('login_guru')){
            redirect(site_url('guru'),'refresh');
        }else{
            $data = array(
                'title' => 'dashboard login'
            );
            $this->load->view('login', $data);
        }
                 
    }
    public function auth()
    {
        $username=htmlspecialchars($this->input->post('username',TRUE),ENT_QUOTES);
        $password=htmlspecialchars($this->input->post('password',TRUE),ENT_QUOTES);

        $admin = $this->Login_Model->auth_admin($username);
        if ($admin->num_rows() > 0) {
            $data = $admin->row_array();
            
            
            if (password_verify($password,$data['password'])) {
                $this->session->set_userdata('login',TRUE);
                $this->session->set_userdata('id_user',$data['id_user']);
                $this->session->set_userdata('username',$data['username']);
                $this->session->set_userdata('level',$data['level']);
                //jika sukses 
                redirect(site_url('dashboard'),'refresh');
            }else{
                $this->session->set_flashdata('pesan','Login Gagal');
                redirect(site_url('login'),'refresh');
            }
        }else{
            $guru = $this->Login_Model->auth_guru($username);
            $data = $guru->row_array();
            
            
            if (password_verify($password,$data['password'])) {
                $this->session->set_userdata('login_guru',TRUE);
                $this->session->set_userdata('id_user',$data['id_guru']);
                $this->session->set_userdata('username',$data['nama_guru']);
                $this->session->set_userdata('level',$data['level']);
                //jika sukses 
                redirect(site_url('guru'),'refresh');
            }else{
                $this->session->set_flashdata('pesan','Login Gagal');
                redirect(site_url('login'),'refresh');
            }
        }
    }
    //logout
    public function logout()
    {
        $data = array('user_id' => ' ','username' => '','login' => false,'login_guru' => false);
        $this->session->unset_userdata($data);
        $this->session->sess_destroy();
        redirect('login');
    }
   
}
        
    /* End of file  Login.php */
        
                            