<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct() {
		parent:: __construct();
		if (!$this->session->userdata('login')) {
			redirect(site_url('login'),'refresh');
		}
	}
	public function index()
	{
		$data = array(
			'title' => 'Dashboard - admin',
			'isi'   => 'admin/dashboard',
			'profil' => $this->M_dashboard->profil_sekolah(),
			'kelas' => $this->M_dashboard->kelas(),
			'siswa' => $this->M_dashboard->siswa(),
			'guru' => $this->M_dashboard->guru()
		);
		$this->load->view('template/wraper',$data);
	}
	//profil sekolah
	public function profil_sekolah()
	{
		$data = array(
			'title' => 'Dashboard - admin',
			'isi'   => 'admin/profil_sekolah',
			'profil'=> $this->M_dashboard->profil_sekolah()
		);
		$this->load->view('template/wraper',$data);
	}
	//data siswa
	public function siswa()
	{
		
		$data = array(
			'title' => 'Data Siswa - Dashboard',
			'isi'   => 'admin/siswa',
 		);
		$this->load->view('template/wraper',$data);
	}
	//siswa edit view
	public function siswa_edit()
	{
		$id = $this->uri->segment(3);
		$data = array(
			'title' => 'Edit Data Siswa - Dashboard',
			'isi'   => 'admin/siswa_edit',
			'data'  =>  $this->M_dashboard->get_siswa_update($id),
			'status' => $this->M_dashboard->get_tahun_akademik()->row()
 		);
		$this->load->view('template/wraper',$data);
	}
	//form sisswa add
	public function siswa_add()
	{
		$data = array(
			'title' => 'Tambah Data Siswa - Dashboard',
			'isi'   => 'admin/siswa_tambah',
			'status' => $this->M_dashboard->get_tahun_akademik()->row()
 		);
		$this->load->view('template/wraper',$data);
	}
	//tampil data siswa
	public function data_siswa()
	{
		$this->datatables->select('id_siswa,nis,nama_lengkap_siswa,jenis_kelamin_siswa,tingkat,nomor_hp_siswa')
			 ->unset_column('id_siswa')
			 ->add_column('nomor', '1')
			 ->from('tb_siswa')
			 ->add_column('actions', '<a href="javascript:void(0);" class="edit_record btn btn-info btn-xs" data-id="$1">Edit</a>  <a href="javascript:void(0);" class="hapus_record btn btn-danger btn-xs" data-id="$1">Hapus</a>','id_siswa,nis,nama_lengkap_siswa,jenis_kelamin_siswa,tingkat,nomor_hp_siswa,actions');

			echo $this->datatables->generate('json','');
	}
	//siswa add proses
	public function siswa_add_proses()
	{
		

		$update = $this->M_dashboard->siswa_add_proses();
		if ($update) {
			$this->session->set_flashdata('pesan', 'Data siswa berhasil di Tambah');
			redirect(site_url('dashboard/siswa'));
		}
	}
	//siswa edit proses
	public function siswa_edit_proses()
	{
		$id = $this->uri->segment(3);
		$data = array(
			'nis' 					=> $this->input->post('nis', TRUE),
			'nisn' 					=> $this->input->post('nisn', TRUE),
			'nama_lengkap_siswa'	=> $this->input->post('nama_lengkap_siswa', TRUE),
			'tingkat'				=> $this->input->post('tingkat', TRUE),
			'nomor_hp_siswa'		=> $this->input->post('nomor_hp_siswa', TRUE),
			'jenis_kelamin_siswa' 	=> $this->input->post('jenis_kelamin_siswa', TRUE),
			'alamat_siswa' 			=> $this->input->post('alamat_siswa', TRUE)
		);

		$update = $this->M_dashboard->update_siswa($data,$id);
		if ($update) {
			$this->session->set_flashdata('pesan', 'Data siswa berhasil di update');
			redirect(site_url('dashboard/siswa'));
		}
	}
	//hapus siswa proses
	public function hapus_siswa()
	{
		$id = $this->uri->segment(3);
		$update = $this->M_dashboard->hapus_siswa($id);
		if ($update) {
			$this->session->set_flashdata('pesan', 'Data siswa berhasil di Hapus');
			redirect(site_url('dashboard/siswa'));
		}
	}
	//end of siswa

	//=========================================================================

	//guru
	public function guru()
	{
		
		$data = array(
			'title' => 'Data Guru - Dashboard',
			'isi'   => 'admin/guru',
 		);
		$this->load->view('template/wraper',$data);
	}
	//tambah data guru
	public function guru_add()
	{
		
		$data = array(
			'title' => 'Tambah Data Guru - Dashboard',
			'isi'   => 'admin/guru_tambah',
 		);
		$this->load->view('template/wraper',$data);
	}
	//guru ipdate
	public function guru_update()
	{
		$id = $this->uri->segment(3);
		$data = array(
			'title' => 'Edit Data Guru - Dashboard',
			'isi'   => 'admin/guru_edit',
			'data'  => $this->M_dashboard->get_guru_update($id)
 		);
		$this->load->view('template/wraper',$data);
	}
	//guru hapus
	public function guru_delete()
	{
		$id = $this->uri->segment(3);
		$update = $this->M_dashboard->guru_delete_proses($id);
		if ($update) {
			$this->session->set_flashdata('pesan', 'Data guru berhasil di Hapus');
			redirect(site_url('dashboard/guru'));
		}
	}
	//guru tambah proses
	public function guru_add_proses()
	{
		$data = array(
			'nip' 					=> $this->input->post('nip', TRUE),
			'nama_guru' 		 	=> $this->input->post('nama_guru', TRUE),
			'nomor_hp_guru'			=> $this->input->post('nomor_hp_guru', TRUE),
			'jenis_kelamin'			=> $this->input->post('jenis_kelamin', TRUE),
			'alamat_guru' 			=> $this->input->post('alamat_guru', TRUE),
			'password' 				=> password_hash('123456',PASSWORD_DEFAULT),
			'level' 				=> 'guru'
		);

		$update = $this->M_dashboard->guru_add_proses($data);
		if ($update) {
			$this->session->set_flashdata('pesan', 'Data Guru berhasil di Tambah');
			redirect(site_url('dashboard/guru'));
		}
	}
	//guru update proses
	public function guru_update_proses()
	{
		$id = $this->uri->segment(3);
		$data = array(
			'nip' 					=> $this->input->post('nip', TRUE),
			'nama_guru' 		 	=> $this->input->post('nama_guru', TRUE),
			'nomor_hp_guru'			=> $this->input->post('nomor_hp_guru', TRUE),
			'jenis_kelamin'			=> $this->input->post('jenis_kelamin', TRUE),
			'alamat_guru' 			=> $this->input->post('alamat_guru', TRUE)
		);

		$update = $this->M_dashboard->guru_update_proses($data,$id);
		if ($update) {
			$this->session->set_flashdata('pesan', 'Data Guru berhasil di Update');
			redirect(site_url('dashboard/guru'));
		}
	}
	//data guru
	public function data_guru()
	{
    	$this->datatables->select('id_guru,nip,nama_guru,nomor_hp_guru,jenis_kelamin,alamat_guru')
       			->unset_column('id_guru')
                ->from('tb_guru')
                ->add_column('actions', '<a href="javascript:void(0);" class="edit_record btn btn-info btn-xs" data-id="$1">Edit</a>  <a href="javascript:void(0);" class="hapus_record btn btn-danger btn-xs" data-id="$1">Hapus</a>','id_guru,nip,nama_guru,nomor_hp_guru,actions');

        echo $this->datatables->generate('json','');
	}
	//end of guru

	//=========================================================================
	
	//data kelas
	public function kelas()
	{
		
		$data = array(
			'title' => 'Data Kelas - Dashboard',
			'isi'   => 'admin/kelas'
			// 'guru'  => $this->wali_kelas()
 		);
		$this->load->view('template/wraper',$data);
	}
	// wali kelas
	public function add_wali_kelas()
	{
		// $id_kelas = $this->input->post('id_kelas', TRUE);
		$akademik = $this->M_dashboard->get_tahun_akademik()->row();
		$data = $this->input->post();
		$updateData = array();
		for ($i=0; $i < count($data['id_kelas']); $i++) { 
			$updateData[] = array(
			 'id_kelas' => $data['id_kelas'][$i],
			 'id_guru' => $data['id_guru'][$i],
		 	);
		 }
			
			
 			// echo json_encode($updateData);

	     
	     $update = $this->db->update_batch('tb_walikelas', $updateData,'id_kelas');
	     if ($update) {
			$this->session->set_flashdata('pesan', 'Data wali kelas berhasil di update');
			redirect(site_url('dashboard/wali_kelas'));
		}
	}
	//kelas add
	public function kelas_add()
	{
		
		$data = array(
			'title' => 'Data Kelas Tambah - Dashboard',
			'isi'   => 'admin/kelas_tambah',
			'jurusan' => $this->M_dashboard->get_jurusan()->result()
 		);
		$this->load->view('template/wraper',$data);
	}
	//kelas update
	public function kelas_update()
	{
		$id = $this->uri->segment(3);
		$data = array(
			'title' => 'Edit Data Kelas - Dashboard',
			'isi'   => 'admin/kelas_edit',
			'data'  => $this->M_dashboard->get_kelas_update($id),
			'jurusan' => $this->M_dashboard->get_jurusan()->result()
 		);
		$this->load->view('template/wraper',$data);
	}
	//kelas delete
	public function kelas_delete()
	{
		$id = $this->uri->segment(3);
		$update = $this->M_dashboard->kelas_delete_proses($id);
		if ($update) {
			$this->session->set_flashdata('pesan', 'Data kelas berhasil di Hapus');
			redirect(site_url('dashboard/kelas'));
		}
	}
	//data kelas
	public function data_kelas()
	{
		$guru = $this->M_dashboard->get_wali_kelas();
		$select ='';
		foreach ($guru as $data) {
            $select .= '<option value="'.$data->id_guru.'">'.$data->nama_guru.'</option>';	
        }
    	$this->datatables->select('id_kelas,nama_kelas,kelas,nama_jurusan')
       			->unset_column('id_kelas')
       			->add_column('pilih', '')
                ->from('tb_kelas')
                ->join('tb_jurusan', 'tb_kelas.jurusan=tb_jurusan.id_jurusan','left')
                ->add_column('actions', ' <a href="javascript:void(0);" class="kelas_siswa btn btn-success btn-xs" data-id="$1">Detail</a> <a href="javascript:void(0);" class="jadwal btn btn-info btn-xs" data-id="$1">Lihat Jadwal</a> <a href="javascript:void(0);" class="edit_record btn btn-warning btn-xs" data-id="$1">Edit</a> <a href="javascript:void(0);" class="hapus_record btn btn-danger btn-xs" data-id="$1">Hapus</a> ','id_kelas,nama_kelas,kelas,nama_jurusan,actions,pilih');

        echo $this->datatables->generate('json','');
	}
	//kelas add proses
	public function kelas_add_proses()
	{
		$data = array(
			'nama_kelas' 		=> $this->input->post('nama_kelas', TRUE),
			'kelas' 		 	=> $this->input->post('kelas', TRUE),
			'jurusan'			=> $this->input->post('jurusan', TRUE)
		);

		$update = $this->M_dashboard->kelas_add_proses($data);
		if ($update) {
			$this->session->set_flashdata('pesan', 'Data Kelas berhasil di Tambah');
			redirect(site_url('dashboard/kelas'));
		}
	}
	//kelas update proses
	public function kelas_update_proses()
	{
		$id = $this->uri->segment(3);
		$data = array(
			'nama_kelas' 		=> $this->input->post('nama_kelas', TRUE),
			'kelas' 		 	=> $this->input->post('kelas', TRUE),
			'jurusan'			=> $this->input->post('jurusan', TRUE)
		);

		$update = $this->M_dashboard->kelas_update_proses($data,$id);
		if ($update) {
			$this->session->set_flashdata('pesan', 'Data Kelas berhasil di Update');
			redirect(site_url('dashboard/kelas'));
		}
	}
	//wali perkelas
	public function wali_kelas()
	{
		$data = array(
			'title' => 'Tambahkan wali Kelas - Dashboard',
			'isi'   => 'admin/kelas_walikelas',
			'data'  => $this->M_dashboard->show_kelas_add()
 		);
		$this->load->view('template/wraper',$data);
	}
	//end of kelas
	//================================================================================

	//ini bagian mata pelajaran
	public function mapel()
	{
		
		$data = array(
			'title' => 'Data Mapel - Dashboard',
			'isi'   => 'admin/mapel',
 		);
		$this->load->view('template/wraper',$data);
	}
	//mapel add
	public function mapel_add()
	{
		
		$data = array(
			'title' => 'Data Mapel Tambah - Dashboard',
			'isi'   => 'admin/mapel_tambah',
			'jurusan' => $this->M_dashboard->get_jurusan()->result(),
			'pengajar' => $this->M_dashboard->get_walikelas(),
 		);
		$this->load->view('template/wraper',$data);
	}
	//mapel update
	public function mapel_update()
	{
		$id = $this->uri->segment(3);
		$data = array(
			'title' => 'Edit Data Mapel - Dashboard',
			'isi'   => 'admin/mapel_edit',
			'data'  => $this->M_dashboard->get_mapel_update($id),
			'pengajar' => $this->M_dashboard->get_walikelas(),
			'jurusan' => $this->M_dashboard->get_jurusan()->result()
 		);
		$this->load->view('template/wraper',$data);
	}
	//mapel delete
	public function mapel_delete()
	{
		$id = $this->uri->segment(3);
		$update = $this->M_dashboard->mapel_delete_proses($id);
		if ($update) {
			$this->session->set_flashdata('pesan', 'Data mapel berhasil di Hapus');
			redirect(site_url('dashboard/mapel'));
		}
	}
	//data mapel
	public function data_mapel()
	{
    	$this->datatables->select('id_mapel,nama_mapel,tingkat,nama_jurusan')
       			->unset_column('id_mapel')
                ->add_column('nomor','1')
                ->join('tb_jurusan', 'tb_mapel.id_jurusan=tb_jurusan.id_jurusan','left')
                
                ->from('tb_mapel')
                ->add_column('actions', '<a href="javascript:void(0);" class="edit_record btn btn-info btn-xs" data-id="$1">Edit</a>  <a href="javascript:void(0);" class="hapus_record btn btn-danger btn-xs" data-id="$1">Hapus</a>','id_mapel,nama_mapel,nama_jurusan,tingkat,actions');

        echo $this->datatables->generate('json','');
	}
	//mapel add proses
	public function mapel_add_proses()
	{
		$data = array(
			'nama_mapel' 		=> $this->input->post('nama_mapel', TRUE),
			'tingkat' 			=> $this->input->post('tingkat', TRUE),
			'id_jurusan'		=> $this->input->post('id_jurusan', TRUE)
		);

		$update = $this->M_dashboard->mapel_add_proses($data);
		if ($update) {
			$this->session->set_flashdata('pesan', 'Data Mapel berhasil di Tambah');
			redirect(site_url('dashboard/mapel'));
		}
	}
	//mapel update proses
	public function mapel_update_proses()
	{
		$id = $this->uri->segment(3);
		$data = array(
			'nama_mapel' 		=> $this->input->post('nama_mapel', TRUE),
			'tingkat' 			=> $this->input->post('tingkat', TRUE),
			'id_jurusan'		=> $this->input->post('id_jurusan', TRUE)
		);
		$update = $this->M_dashboard->mapel_update_proses($data,$id);
		if ($update) {
			$this->session->set_flashdata('pesan', 'Data mapel berhasil di Update');
			redirect(site_url('dashboard/mapel'));
		}
	}
	//end of mapel

	//=======================================================================================

	//ini bagian akademik
	public function akademik()
	{
		
		$data = array(
			'title' => 'Data Akademik - Dashboard',
			'isi'   => 'admin/akademik',
 		);
		$this->load->view('template/wraper',$data);
	}
	//akademik add
	public function akademik_add()
	{
		
		$data = array(
			'title' => 'Data Akademik Tambah - Dashboard',
			'isi'   => 'admin/akademik_tambah',
 		);
		$this->load->view('template/wraper',$data);
	}
	//akademik update
	public function akademik_update()
	{
		$id = $this->uri->segment(3);
		$data = array(
			'title' => 'Edit Data akademik - Dashboard',
			'isi'   => 'admin/akademik_edit',
			'data'  => $this->M_dashboard->get_akademik_update($id)
 		);
		$this->load->view('template/wraper',$data);
	}
	//akademik delete
	public function akademik_delete()
	{
		$id = $this->uri->segment(3);
		$update = $this->M_dashboard->akademik_delete_proses($id);
		if ($update) {
			$this->session->set_flashdata('pesan', 'Data akademik berhasil di Hapus');
			redirect(site_url('dashboard/akademik'));
		}
	}
	//data akademik
	public function data_akademik()
	{
    	$this->datatables->select('id_akademik,tahun_akademik,status_akademik,kurikulum')
       			->unset_column('id_akademik')
                ->from('tb_akademik')
                ->add_column('actions', '<a href="javascript:void(0);" class="edit_record btn btn-info btn-xs" data-id="$1">Edit</a>  <a href="javascript:void(0);" class="hapus_record btn btn-danger btn-xs" data-id="$1">Hapus</a>','id_akademik,tahun_akademik,status_akademik,kurikulum,actions');

        echo $this->datatables->generate('json','');
	}
	//akademik add proses
	public function akademik_add_proses()
	{
		$akademik = $this->db->update('tb_akademik', array('status_akademik' => 'NONATIF'));
		$data = array(
			'tahun_akademik' 	 => $this->input->post('tahun_akademik', TRUE),
			// 'status_akademik' 	 => $this->input->post('status_akademik', TRUE),
			'kurikulum' 		 => $this->input->post('kurikulum', TRUE)
		);
		
		$update = $this->M_dashboard->akademik_add_proses($data);
		if ($update) {
			$this->session->set_flashdata('pesan', 'Data akademik berhasil di Tambah');
			redirect(site_url('dashboard/akademik'));
		}
	}
	//akademik update proses
	public function akademik_update_proses()
	{
		$id = $this->uri->segment(3);
		$akademik = $this->db->update('tb_akademik', array('status_akademik' => 'NONATIF'));
		$data = array(
			'tahun_akademik' 	 => $this->input->post('tahun_akademik', TRUE),
			'status_akademik' 	 => $this->input->post('status_akademik', TRUE),
			'kurikulum' 		 => $this->input->post('kurikulum', TRUE)
		);
		$update = $this->M_dashboard->akademik_update_proses($data,$id);
		if ($update) {
			$this->session->set_flashdata('pesan', 'Data akademik berhasil di Update');
			redirect(site_url('dashboard/akademik'));
		}
	}
	//aktifkan akademik
	public function akademik_aktif_proses()
	{
		$id = $this->uri->segment(3);
		$data = array(
			'status_akademik' 	 => $this->input->post('status_akademik', TRUE)
		);
		$update = $this->M_dashboard->akademik_update_proses($data,$id);
		if ($update) {
			$this->session->set_flashdata('pesan', 'Data akademik berhasil di Diaktifkan');
			redirect(site_url('dashboard/akademik'));
		}
	}
	//end of data akademik
	public function naik_kelas()
	{
		$id = $this->uri->segment(3);
		$data = array(
			'title' => 'Naik Kelas Kelas - Dashboard',
			'isi'   => 'admin/naik_kelas',
			'kelas'  => $this->M_dashboard->get_kelas(),
			'wali_kelas' => $this->M_dashboard->get_walikelas(),
			'data'  => $this->M_dashboard->get_kelas_update($id),
			'jurusan' => $this->M_dashboard->get_jurusan()->result()
 		);
		$this->load->view('template/wraper',$data);
	}
	//pembagian kelas
	public function pembagian_kelas()
	{
		$id = $this->uri->segment(3);
		$kelas = $this->db->get_where('tb_kelas', array('id_kelas' => $id))->row();
    	$this->datatables->select('id_siswa_kelas,nis,nama_lengkap_siswa,jenis_kelamin_siswa,nomor_hp_siswa')
       			->unset_column('id_siswa_kelas')
       			->add_column('pilih', '<input type="checkbox" name="id_kelas[]" value="'.$kelas->id_kelas.'">')
                ->from('tb_siswa_kelas')
                ->join('tb_siswa','tb_siswa.id_siswa=tb_siswa_kelas.siswa_id','left')
                ->join('tb_kelas','tb_kelas.id_kelas=tb_siswa_kelas.id_kelas','left')
                ->join('tb_akademik','tb_akademik.id_akademik=tb_siswa_kelas.id_akademik','left')
                ->where('tb_akademik.status_akademik','AKTIF')
                ->where('tb_kelas.id_kelas',$id);
                

        echo $this->datatables->generate('json','');
	}

	//view pembagian kelas
	public function kelas_siswa()
	{
		$id = $this->uri->segment(3);
		$kelas = $this->db->get_where('tb_kelas', array('id_kelas' => $id))->row();
		$data = array(
			'title' => 'Data siswa Di Kelas '.$kelas->nama_kelas.' - Dashboard',
			'isi'   => 'admin/kelas_siswa',
			'kelas' => $kelas->nama_kelas
 		);
		$this->load->view('template/wraper',$data);
	}
	public function add_siswa_per_kelas()
	{
		$id_kelas = $this->input->post('id_kelas', TRUE);
		redirect(site_url('dashboard/kelas_siswa/'.$id_kelas));
	}

	//add rombel siswa
	public function rombel()
	{
		$data = array(
			'title' => 'Tambah Rombel belajar | Dashboard',
			'isi'   => 'admin/siswa_rombel',
			'kelas' => $this->M_dashboard->get_kelas(),
			'status' => $this->M_dashboard->get_tahun_akademik()->row()
 		);
		$this->load->view('template/wraper',$data);
	}

	public function rombel_siswa()
	{
		$this->datatables->select('id_siswa_kelas,nis,nama_lengkap_siswa,jenis_kelamin_siswa,nomor_hp_siswa')
       			->unset_column('id_siswa_kelas')
       			->add_column('pilih', '1')
                ->from('tb_siswa_kelas')
                ->join('tb_siswa','tb_siswa.id_siswa=tb_siswa_kelas.siswa_id','left')
                ->join('tb_kelas','tb_kelas.id_kelas=tb_siswa_kelas.id_kelas','left')
                ->join('tb_akademik','tb_akademik.id_akademik=tb_siswa_kelas.id_akademik','left')
                ->where('tb_akademik.status_akademik','AKTIF')
                ->where('tb_siswa_kelas.id_kelas', '0')
                ->where('tb_siswa_kelas.status', '1');
                

        echo $this->datatables->generate('json','');
	}
	//rombel siswa
	public function rombel_add()
	{
		$id_kelas = $this->input->post('id_kelas', TRUE);
		$jenjang = $this->input->post('tingkat', TRUE);

		$data = $this->input->post();
		$updateData = array();
	     for ($i=0; $i < count($data['id_siswa_kelas']); $i++) { 
	     	$updateData[] = array(
	     		'id_siswa_kelas' => $data['id_siswa_kelas'][$i],
	     		'id_kelas' => $id_kelas,
	     		'jenjang' => $jenjang,
	     		'status' => '1'
	     	);
	     }
	     // echo json_encode($updateData);
	     $update = $this->db->update_batch('tb_siswa_kelas', $updateData,'id_siswa_kelas');
	     if ($update) {
			$this->session->set_flashdata('pesan', 'Rombel Baru Siswa Berhasil Dibuat');
			redirect(site_url('dashboard/'.$this->input->post('uri', TRUE)));
		}
	}

	// form pendaftaran ulang
	public function daftar_ulang()
	{
		$data = array(
			'title' => 'form daftar ulang sisiwa | Dashboard',
			'isi'   => 'admin/siswa_daftar_ulang',
			'kelas' => $this->M_dashboard->get_kelas(),
			'status' => $this->M_dashboard->get_tahun_akademik()->row()
 		);
		$this->load->view('template/wraper',$data);
	}
	//form daftar ulang/kenaikan kelas
	public function kenaikan_kelas_form()
	{
		$this->datatables->select('id_siswa_kelas,nis,nama_lengkap_siswa,jenis_kelamin_siswa,nomor_hp_siswa,tingkat')
       			->unset_column('id_siswa_kelas')
       			->add_column('pilih', '1')
                ->from('tb_siswa_kelas')
                ->join('tb_siswa','tb_siswa.id_siswa=tb_siswa_kelas.siswa_id','left')
                ->join('tb_kelas','tb_kelas.id_kelas=tb_siswa_kelas.id_kelas','left')
                ->join('tb_akademik','tb_akademik.id_akademik=tb_siswa_kelas.id_akademik','left')
                ->where('tb_akademik.status_akademik','AKTIF')
                ->where('tb_siswa_kelas.id_kelas', '0');
                // ->where('tb_siswa_kelas.status', '1');
                

        echo $this->datatables->generate('json','');
	}
	//jadwal pelajaran
	public function jadwal_add()
	{
		$id = $this->uri->segment(3);
		$data = array(
			'title' => 'Input Jadwal Pelajaran - Dashboard',
			'isi'   => 'admin/jadwal_tambah',
			'status' => $this->M_dashboard->get_tahun_akademik()->row(),
			'mapel' => $this->M_dashboard->get_mapel(),
			'hari' => $this->M_dashboard->get_hari(),
			'guru' => $this->M_dashboard->get_guru(),
			'kelas' => $this->M_dashboard->get_kelas(),
			'jadwal' => $this->M_dashboard->get_jadwal_byid($id),
			'kelas_id'  => $this->M_dashboard->get_kelas_update($id),
 		);
		$this->load->view('template/wraper',$data);
	}
	//jadwal detail
	public function jadwal_pelajaran()
	{
		$id = $this->uri->segment(3);
		$kelas = $this->db->get_where('tb_kelas', array('id_kelas' => $id))->row();
		$data = array(
			'title' => 'jadwal Perkelas - Dashboard',
			'isi'   => 'admin/jadwal',
			'kelas' => $kelas->nama_kelas
 		);
		$this->load->view('template/wraper',$data);
	}
	//form jadwal pelajaran update 
	public function jadwal_pelajaran_update()
	{
		$id = $this->uri->segment(3);
		$data = array(
			'title' => 'jadwal Perkelas update- Dashboard',
			'isi'   => 'admin/jadwal_edit.php',
			'status' => $this->M_dashboard->get_tahun_akademik()->row(),
			'mapel' => $this->M_dashboard->get_mapel(),
			'hari' => $this->M_dashboard->get_hari(),
			'guru' => $this->M_dashboard->get_guru(),
			'kelas' => $this->M_dashboard->get_kelas(),
			'jadwal' => $this->M_dashboard->get_jadwal_update_byid($id)
 		);
		$this->load->view('template/wraper',$data);
	}
	//tampil jadwal
	public function show_jadwal()
	{
		$id = $this->uri->segment(3);
		$this->datatables->select('id_jadwal,nama_kelas,nama_mapel,nama_guru,nama_hari,jam_mulai')
       			->unset_column('id_jadwal')
                ->from('tb_jadwal')
                ->join('tb_kelas', 'tb_jadwal.id_kelas=tb_kelas.id_kelas','left')
				->join('tb_guru', 'tb_jadwal.id_guru=tb_guru.id_guru','left')
				->join('tb_mapel', 'tb_jadwal.id_mapel=tb_mapel.id_mapel','left')
				->join('tb_hari', 'tb_jadwal.id_hari=tb_hari.id_hari','left')
				->join('tb_akademik', 'tb_jadwal.id_akademik=tb_akademik.id_akademik','left')
                ->where('tb_akademik.status_akademik','AKTIF')
				->where('tb_jadwal.id_kelas', $id)
				->add_column('actions', '<a href="javascript:void(0);" class="edit_record btn btn-warning btn-xs" data-id="$1">Edit</a> <a href="javascript:void(0);" class="hapus_record btn btn-danger btn-xs" data-id="$1">Hapus</a> ','id_jadwal,nama_kelas,nama_mapel,nama_guru,nama_hari,jam_mulai');
                

		echo $this->datatables->generate('json','');
	}
	//jadwal add proses
	public function jadwal_add_proses()
	{
		$id_kelas = $this->input->post('id_kelas', TRUE);
		$id_akademik = $this->input->post('id_akademik', TRUE);
		$id_mapel = $this->input->post('id_mapel', TRUE);
		$data = array(
			'id_akademik' 	 => $id_akademik,
			'id_kelas' 	 	 => $id_kelas,
			'id_mapel' 	 	 => $id_mapel,
			'id_guru' 	 	 => $this->input->post('id_guru', TRUE),
			'id_hari' 	 	 => $this->input->post('id_hari', TRUE),
			'jam_mulai' 	 => $this->input->post('jam_mulai', TRUE)
		);
		$update = $this->M_dashboard->jadwal_add_proses($data);
		if ($update) {
			$this->session->set_flashdata('pesan', 'Jadwal Pelajaran Berhasil Di input');
			redirect(site_url('dashboard/jadwal_add/'.$this->input->post('id_kelas', TRUE)));
		}
	}
	//jadwal update proses
	public function jadwal_update_proses()
	{
		$id = $this->uri->segment(3);
		
		$data = array(
			'id_akademik' 	 => $this->input->post('id_akademik', TRUE),
			'id_kelas' 		 => $this->input->post('id_kelas', TRUE),
			'id_mapel' 		 => $this->input->post('id_mapel', TRUE),
			'id_guru' 	 	 => $this->input->post('id_guru', TRUE),
			'id_hari' 	 	 => $this->input->post('id_hari', TRUE),
			'jam_mulai' 	 => $this->input->post('jam_mulai', TRUE)
		);
		$update = $this->M_dashboard->jadwal_update_proses($data,$id);
		if ($update) {
			$this->session->set_flashdata('pesan', 'Jadwal Pelajaran Berhasil Di update');
			redirect(site_url('dashboard/jadwal_pelajaran/'.$this->input->post('id_kelas', TRUE)));
		}
	}
	//hapus jadwal pelajaran dari database
	public function jadwal_pelajaran_hapus()
	{
		$id = $this->uri->segment(3);
		$update = $this->M_dashboard->jadwal_pelajaran_hapus_proses($id);
		if ($update) {
			$this->session->set_flashdata('pesan', 'Data Jadwal berhasil di Hapus');
			echo '<script>window.history.back(-1);</script>';
		}
	}
	public function profil_sekolah_input()
	{

		if ($this->input->post('simpan') == 'simpan') {
				$uploadPath = 'image/';
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                
                // Load and initialize upload library
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                
                // Upload file to server
                if($this->upload->do_upload('logo')){
                    // Uploaded file data
                    $file = $this->upload->data();
                    $data = array(
						'nama_sekolah' 	 	 => $this->input->post('nama_sekolah', TRUE),
						'kepala_sekolah' 	 => $this->input->post('kepala_sekolah', TRUE),
						'alamat_sekolah' 	 => $this->input->post('alamat_sekolah', TRUE),
						'logo' => $file['file_name']
					);
					$insert = $this->db->insert('tb_profil_sekolah', $data);
					if($insert){
						redirect(site_url('dashboard/profil_sekolah'));
					}
                }else{
					redirect(site_url('dashboard/profil_sekolah'),'refresh');
				}
		}else{
			$id = $this->input->post('id_sekolah', TRUE);
			$get = $this->db->get_where('tb_profil_sekolah',array('id_sekolah' => $id))->row();
			
			$uploadPath = 'image/';
			$config['upload_path'] = $uploadPath;
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			
			// Load and initialize upload library
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			
			// Upload file to server
			if($this->upload->do_upload('logo')){
				unlink('image/'.$get->logo);
				// Uploaded file data
				$file = $this->upload->data();
				$data = array(
					'nama_sekolah' 	 	 => $this->input->post('nama_sekolah', TRUE),
					'kepala_sekolah' 	 => $this->input->post('kepala_sekolah', TRUE),
					'alamat_sekolah' 	 => $this->input->post('alamat_sekolah', TRUE),
					'logo' => $file['file_name']
				);
				$update = $this->db->update('tb_profil_sekolah', $data,array('id_sekolah' => $id));
				if($update){
					redirect(site_url('dashboard/profil_sekolah'));
				}
			}else{
				$id = $this->input->post('id_sekolah', TRUE);
				$data = array(
					'nama_sekolah' 	 	 => $this->input->post('nama_sekolah', TRUE),
					'kepala_sekolah' 	 => $this->input->post('kepala_sekolah', TRUE),
					'alamat_sekolah' 	 => $this->input->post('alamat_sekolah', TRUE),
					'logo' => $this->input->post('logo_update', TRUE)
				);
				$update = $this->db->update('tb_profil_sekolah', $data,array('id_sekolah' => $id));
				if($update){
					redirect(site_url('dashboard/profil_sekolah'));
				}
			}
		}

	}
}
