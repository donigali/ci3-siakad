<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Walikelas extends CI_Controller {
    public function __construct() {
        parent:: __construct();
        $this->load->helper("terbilang");
		if (!$this->session->userdata('login_guru')) {
			redirect(site_url('login'),'refresh');
		}
    }
    public function lihat_nilai()
    {
        $id_guru = $this->session->userdata('id_user');
         $data = array(
             'title' => 'Lihat Nilai Siswa - Wali Kelas',
             'isi'   => 'walikelas/siswa_saya',
             'siswa' => $this->wali->get_siswa($id_guru)
         );  
         $this->load->view('template/wraper',$data);         
    }
    //lihat nilai per siswa
    public function lihat_detail_nilai($id_siswa)
    {
        $id_guru = $this->session->userdata('id_user');
         $data = array(
             'title' => 'Lihat Nilai Siswa - Wali Kelas',
             'isi'   => 'walikelas/lihat_nilai',
             'nilai' => $this->wali->rangkuman_nilai_siswa()
         );  
         $this->load->view('template/wraper',$data);         
    }
    //cetak raport
    public function cetak_raport()
    {
        $id_semester = $this->input->post('id_semester',TRUE);
        $id_siswa = $this->input->post('id_siswa',TRUE);
        
        $id_guru = $this->session->userdata('id_user');
         $data = array(
             'title' => 'Cetak Raport Siswa - Wali Kelas',
             'isi'   => 'walikelas/cetak_raport',
             'siswa' => $this->wali->get_siswa($id_guru),
             'semester' => $this->wali->get_semester(),
             'nilai' => $this->wali->rangkuman_nilai_siswa(),
             'id_semester' =>  $id_semester,
             'id_siswa' =>  $id_siswa
         );  
         $this->load->view('template/wraper',$data);     
           
    }
    //cek
    public function cetak(){
        $id_semester = $this->input->post('id_semester',TRUE);
        $id_siswa = $this->input->post('id_siswa',TRUE);
        $id_guru = $this->session->userdata('id_user');
        
        if ($this->input->post('tampil') == 'tampil') {
            $this->cetak_raport();
        }else{
            $siswa = $this->wali->get_siswa_by_id($id_siswa);
            if(isset($siswa->nama_lengkap_siswa)){
                $nama = $siswa->nama_lengkap_siswa;
            }
            $data = array(
                'title' => 'Cetak Raport Siswa - Wali Kelas',
                'nilai' => $this->wali->rangkuman_nilai_siswa(),
                'id_semester' =>  $id_semester,
                'id_siswa' =>  $id_siswa
            ); 
           // echo $this->cetak_raport();
           $data = array('data' => $this->load->view('walikelas/pdf',$data,TRUE));
           $this->pdf_report->setPaper('A4', 'potrait');
           $this->pdf_report->filename = $nama.".pdf";
           $this->pdf_report->load_view('walikelas/laporan_pdf', $data);
        // echo 'cetak';
        } 
    }
    
        
}
        
    /* End of file  Walikelas.php */
        
                            