<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Guru extends CI_Controller {
    public function __construct() {
		parent:: __construct();
		if (!$this->session->userdata('login_guru')) {
			redirect(site_url('login'),'refresh');
		}
	}
    public function index()
    {
        $data = array(
			'title' => 'Dashboard - Guru',
			'isi'   => 'guru/dashboard_guru',
			'profil' => $this->M_dashboard->profil_sekolah(),
			'kelas' => $this->M_dashboard->kelas(),
			'siswa' => $this->M_dashboard->siswa(),
			'guru' => $this->M_dashboard->guru()
		);
		$this->load->view('template/wraper',$data);            
    }
    //show jadwal
    public function jadwal()
    {
        $id_guru = $this->session->userdata('id_user');
        $data = array(
			'title' => 'Jadwal kelas - Guru',
            'isi'   => 'guru/jadwal_kelas',
            'jadwal'=> $this->guru->get_jadwal($id_guru)->result()
		);
		$this->load->view('template/wraper',$data);
        // echo json_encode($data);
    }
    //nilai siswa input perkelas
    public function nilai()
    {
        $id_guru = $this->session->userdata('id_user');
        $data = array(
			'title' => 'Jadwal kelas - Guru',
            'isi'   => 'guru/nilai_siswa',
            'jadwal'=> $this->guru->get_jadwal($id_guru)->result()
		);
		$this->load->view('template/wraper',$data);
        // echo json_encode($data);
    }
    //input nilai
    public function input_nilai()
    {
        $id_guru = $this->session->userdata('id_user');
        $id_kelas = $this->uri->segment(3);
        $cek_kelas = $this->guru->get_siswa($id_kelas);
        if ($cek_kelas == 0) {
            $data = array(
                'title'     => '403 akses terbatas - Guru',
                'kelas'     => 'ini'
            );
            $this->load->view('error',$data);
        }else{
            //cek apakah guru tersebut mengajar di kelas ini apa tidak
            foreach ($cek_kelas as $kelas) {
                if($kelas->id_kelas !=  $id_kelas){
                $pesan = 1;
                $nama_kelas = $kelas->nama_kelas;
                }else{
                    $pesan = 0;
                    $nama_kelas = $kelas->nama_kelas;
                }
            }
            if ($pesan == 1) {
                $data = array(
                    'title'     => '403 akses terbatas - Guru',
                    'kelas'     => $nama_kelas
                );
                $this->load->view('error',$data);
                
            }else{
                
                $data = array(
                    'title'     => 'Jadwal kelas - Guru',
                    'isi'       => 'guru/input_nilai',
                    'semester'  => $this->guru->get_semester()->result(),
                    'mapel'     => $this->guru->get_jadwal($id_guru)->result(),
                    'akademik'  => $this->guru->get_akademik_active(),
                    'siswa'     => $cek_kelas,
                    'kelas'     => $nama_kelas
                );
                $this->load->view('template/wraper',$data);
                // echo json_encode($data);
            }
        }
        
        
    }
    //lihat nilai
    public function lihat_nilai()
    {
        $id_guru = $this->session->userdata('id_user');
        $id_kelas = $this->uri->segment(3);
        $cek_kelas = $this->guru->get_siswa($id_kelas);
        if ($cek_kelas == 0) {
            $data = array(
                'title'     => '403 akses terbatas - Guru',
                'kelas'     => 'ini'
            );
            $this->load->view('error',$data);
        }else{
            //cek apakah guru tersebut mengajar di kelas ini apa tidak
            foreach ($cek_kelas as $kelas) {
                if($kelas->id_kelas !=  $id_kelas){
                $pesan = 1;
                $nama_kelas = $kelas->nama_kelas;
                }else{
                    $pesan = 0;
                    $nama_kelas = $kelas->nama_kelas;
                }
            }
            if ($pesan == 1) {
                $data = array(
                    'title'     => '403 akses terbatas - Guru',
                    'kelas'     => $nama_kelas
                );
                $this->load->view('error',$data);
                
            }else{
                if ($this->input->post('id_semester',TRUE)) {
                    $id_semester = $this->input->post('id_semester',TRUE);
                }else{
                    $id_semester = 0;
                }
                $data = array(
                    'title'     => 'Jadwal kelas - Guru',
                    'isi'       => 'guru/nilai_lihat',
                    'semester'  => $this->guru->get_semester()->result(),
                    'mapel'     => $this->guru->get_jadwal($id_guru)->result(),
                    'akademik'  => $this->guru->get_akademik_active(),
                    'raport'  => $this->guru->get_nilai_raport_byid($id_kelas,$id_semester),
                    'siswa'     => $cek_kelas,
                    'kelas'     => $nama_kelas
                );
                $this->load->view('template/wraper',$data);
                // echo json_encode($data);
            }
        }
    }
    //input nilai proses
    public function input_nilai_proses($id)
    {
        $mapel = $this->input->post('id_mapel');
        $cek_semester = $this->guru->get_nilai_raport($mapel);
        if ($cek_semester->num_rows() > 0) {
            $semester = $this->input->post('id_semester');
            if ($semester == 1) {
                $this->session->set_flashdata('pesan', 'Nilai siswa untuk semester ganjil sudah anda input ');
                echo '<script>window.history.back(-1);</script>';
            }
        }else{
            

            $this->form_validation->set_rules('id_semester', 'kolom semester', 'required',
                     array('required' => '%s tidak boleh kosong')
                );
            $this->form_validation->set_rules('id_mapel', 'kolom mapel', 'required',
                    array('required' => '%s tidak boleh kosong')
                );
            $this->form_validation->set_rules('nilai_uh[]', 'Nilai Ulangan Harian', 'numeric',
                array('numeric' => '%s Harus Berupa Angka')
            );
            $this->form_validation->set_rules('nilai_tugas[]', 'Nilai Tugas', 'numeric',
                array('numeric' => '%s Harus Berupa Angka')
            );
            $this->form_validation->set_rules('nilai_uts[]', 'Nilai Uts', 'numeric',
                array('numeric' => '%s Harus Berupa Angka')
            );
            $this->form_validation->set_rules('nilai_uas[]', 'Nilai Uas', 'numeric',
                array('numeric' => '%s Harus Berupa Angka')
            );
            $this->form_validation->set_rules('nilai_akhir[]', 'Nilai Akhir', 'numeric',
                array('numeric' => '%s Harus Berupa Angka')
            );
            $this->form_validation->set_rules('predikat[]', 'predikat', 'alpha',
                array('alpha' => '%s Harus Berupa Angka')
            );
            $this->form_validation->set_rules('keterangan[]', 'keterangan', 'alpha',
                array('alpha' => '%s Harus Berupa Angka')
            );
            //form validation
            if ($this->form_validation->run() == true){
                $this->input_nilai($id);
            }else{
                $akademik = $this->input->post('id_akademik');
                $semester = $this->input->post('id_semester');
                $mapel = $this->input->post('id_mapel');

                $data = $this->input->post();
                $insertData = array();
                for ($i=0; $i < count($data['id_siswa']); $i++) { 
                    $insertData[] = array(
                        'id_siswa'                       => $data['id_siswa'][$i],
                        'id_akademik'                    => $akademik,
                        'id_semester'                    => $semester,
                        'id_mapel'                       => $mapel,
                        'id_kelas'                       => $this->uri->segment(3),
                        'rata_rata_nilai_ulangan_harian' => $data['nilai_uh'][$i],
                        'rata_rata_nilai_tugas'          => $data['nilai_tugas'][$i],
                        'nilai_uts'                      => $data['nilai_uts'][$i],
                        'nilai_uas'                      => $data['nilai_uas'][$i],
                        'nilai_akhir'                    => $data['nilai_akhir'][$i],
                        'predikat'                       => $data['predikat'][$i],
                        'keterangan'                     => $data['keterangan'][$i]
                    );
                }
                // echo json_encode($insertData);
                $insert = $this->guru->nilai_input_proses($insertData);
                if ($insert) {
                    $this->session->set_flashdata('pesan', 'Data Nilai Siswa Berhasil Di Insert');
                    redirect(site_url('guru/input_nilai/'.$id));
                }else{
                    $this->session->set_flashdata('pesan_error', 'Data Nilai Siswa Berhasil Gagal Di input');
                    redirect(site_url('guru/input_nilai/'.$id));
                }
            }
        }
    }
    //update nilai
    public function update_nilai_proses($id)
    {
        $this->form_validation->set_rules('id_semester', 'kolom semester', 'required',
        array('required' => '%s tidak boleh kosong')
        );
        $this->form_validation->set_rules('id_mapel', 'kolom mapel', 'required',
            array('required' => '%s tidak boleh kosong')
        );
        $this->form_validation->set_rules('nilai_uh[]', 'Nilai Ulangan Harian', 'numeric',
        array('numeric' => '%s Harus Berupa Angka')
        );
        $this->form_validation->set_rules('nilai_tugas[]', 'Nilai Tugas', 'numeric',
        array('numeric' => '%s Harus Berupa Angka')
        );
        $this->form_validation->set_rules('nilai_uts[]', 'Nilai Uts', 'numeric',
        array('numeric' => '%s Harus Berupa Angka')
        );
        $this->form_validation->set_rules('nilai_uas[]', 'Nilai Uas', 'numeric',
        array('numeric' => '%s Harus Berupa Angka')
        );
        $this->form_validation->set_rules('nilai_akhir[]', 'Nilai Akhir', 'numeric',
        array('numeric' => '%s Harus Berupa Angka')
        );
        $this->form_validation->set_rules('predikat[]', 'predikat', 'alpha',
        array('alpha' => '%s Harus Berupa Angka')
        );
        $this->form_validation->set_rules('keterangan[]', 'keterangan', 'alpha',
        array('alpha' => '%s Harus Berupa Angka')
        );
        //form validation
        if ($this->form_validation->run() == true){
        $this->input_nilai($id);
        }else{
        $akademik = $this->input->post('id_akademik');
        $semester = $this->input->post('id_semester');
        $mapel = $this->input->post('id_mapel');

        $data = $this->input->post();
        $updateData = array();
        for ($i=0; $i < count($data['id_nilai']); $i++) { 
            $updateData[] = array(
                'id_nilai'                       => $data['id_nilai'][$i],
                'id_siswa'                       => $data['id_siswa'][$i],
                'id_akademik'                    => $akademik,
                'id_semester'                    => $semester,
                'id_mapel'                       => $mapel,
                'rata_rata_nilai_ulangan_harian' => $data['nilai_uh'][$i],
                'rata_rata_nilai_tugas'          => $data['nilai_tugas'][$i],
                'nilai_uts'                      => $data['nilai_uts'][$i],
                'nilai_uas'                      => $data['nilai_uas'][$i],
                'nilai_akhir'                    => $data['nilai_akhir'][$i],
                'predikat'                       => $data['predikat'][$i],
                'keterangan'                     => $data['keterangan'][$i]
            );
        }
        // echo json_encode($insertData);
        $update = $this->guru->nilai_update_proses($updateData,'id_nilai');
        if ($update) {
            $this->session->set_flashdata('pesan', 'Data Nilai Siswa Berhasil Di Update');
            redirect(site_url('guru/lihat_nilai/'.$id));
        }else{
            $this->session->set_flashdata('pesan_error', 'Data Nilai Siswa Berhasil Gagal Di Update');
            redirect(site_url('guru/lihat_nilai/'.$id));
        }
        }
    }
    //ganti password
    public function ganti_password()
    {
        
        $data = array(
			'title' => 'Form Ganti Password - Guru',
            'isi'   => 'guru/ganti_password'
		);
		$this->load->view('template/wraper',$data);
        // echo json_encode($data);
    }
    //ganti password proses
    public function ganti_password_proses()
    {
        $id_guru = $this->session->userdata('id_user');
        $password_lama = $this->input->post('password_lama',true);
        $password_baru = $this->input->post('password_baru',true);
        $guru = $this->guru->get_guru_byid($id_guru);
        if (password_verify($password_lama,$guru->password)) {
            $data = array('password' => password_hash($password_baru,PASSWORD_DEFAULT));
            $update = $this->guru->update_password($data,$guru->id_guru);
            if ($update) {
                $this->session->set_flashdata('pesan','Password berhasil di ganti');
                redirect(site_url('guru/ganti_password'),'refresh');
            }
        }else{
            $this->session->set_flashdata('pesan_error','Password lama salah,password Gagal Di ganti');
            redirect(site_url('guru/ganti_password'),'refresh');
            // echo 'password lama salah';
        }
    }
}
        
    /* End of file  Guru.php */
        
                            