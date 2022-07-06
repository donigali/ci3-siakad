<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_dashboard extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	//get data jurusan
	public function get_jurusan()
	{
		return $this->db->get('tb_jurusan');
	}
	//get data siswa
	public function get_siswa()
	{
        return $this->db->get('tb_siswa')->result();
	}
	//get data siswa update
	public function get_siswa_update($id)
	{
        return $this->db->get_where('tb_siswa', array('id_siswa' => $id))->row();
	}
	//siswa tambah proses
	public function siswa_add_proses()
	{

		$data = array(
			'nis' 					=> $this->input->post('nis', TRUE),
			'nisn' 					=> $this->input->post('nisn', TRUE),
			'nama_lengkap_siswa'	=> $this->input->post('nama_lengkap_siswa', TRUE),
			// 'tingkat'				=> $this->input->post('tingkat', TRUE),
			'nomor_hp_siswa'		=> $this->input->post('nomor_hp_siswa', TRUE),
			'jenis_kelamin_siswa' 	=> $this->input->post('jenis_kelamin_siswa', TRUE),
			'alamat_siswa' 			=> $this->input->post('alamat_siswa', TRUE)
		);

		$this->db->insert('tb_siswa', $data);
		$id = $this->db->insert_id();
		
		if ($id) {
			$data2 = array('siswa_id' => $id,'id_akademik' => $this->input->post('id_akademik', TRUE),'jenjang' => $this->input->post('tingkat', TRUE));
			$this->db->insert('tb_siswa_kelas', $data2);
		}

		return true;
	}
	//update siswa
	public function update_siswa($data,$id)
	{
		return $this->db->update('tb_siswa', $data, array('id_siswa' => $id));
	}
	//hapus siswa
	public function hapus_siswa($id)
	{
		return $this->db->delete('tb_siswa', array('id_siswa' => $id));
	}
	//end of siswa


	//==================================================================
	//ini bagian guru
	//get data guru for update
	public function get_guru()
	{
        return $this->db->get('tb_guru')->result();
	}
	public function get_guru_update($id)
	{
        return $this->db->get_where('tb_guru', array('id_guru' => $id))->row();
	}
	//insert data guru
	public function guru_add_proses($data)
	{
		return $this->db->insert('tb_guru', $data);
	}
	//update data guru
	public function guru_update_proses($data,$id)
	{
		return $this->db->update('tb_guru', $data,array('id_guru' => $id));
	}
	//hapus data guru
	public function guru_delete_proses($id)
	{
		return $this->db->delete('tb_guru', array('id_guru' => $id));
	}
	//end of data guru
	//==================================================================

	//start of kelas
	//menampilkan wali kelas
	public function get_walikelas()
	{
		return $this->db->get('tb_guru')->result();
	}
	//menampilkan data kelas berdasarkan id kelas di form
	public function get_kelas_update($id)
	{
        return $this->db->get_where('tb_kelas', array('id_kelas' => $id))->row();
	}
	//kelas add proses
	public function kelas_add_proses($data)
	{
		return $this->db->insert('tb_kelas', $data);
	}
	//kelas update proses
	public function kelas_update_proses($data,$id)
	{
		return $this->db->update('tb_kelas', $data,array('id_kelas' => $id));
	}
	//kelas hapus proses
	public function kelas_delete_proses($id)
	{
		return $this->db->delete('tb_kelas', array('id_kelas' => $id));
	}
	//end of kelas
	//=================================================


	//menampilkan data mapel
	public function get_mapel_update($id)
	{
        return $this->db->get_where('tb_mapel', array('id_mapel' => $id))->row();
	}
	//mapel add proses
	public function mapel_add_proses($data)
	{
		return $this->db->insert('tb_mapel', $data);
	}
	//mapel update proses
	public function mapel_update_proses($data,$id)
	{
		return $this->db->update('tb_mapel', $data,array('id_mapel' => $id));
	}
	//mapel hapus proses
	public function mapel_delete_proses($id)
	{
		return $this->db->delete('tb_mapel', array('id_mapel' => $id));
	}
	//end of mapel
	//=================================================

	//menampilkan data akademik
	public function get_akademik_update($id)
	{
        return $this->db->get_where('tb_akademik', array('id_akademik' => $id))->row();
	}
	//akademik add proses
	public function akademik_add_proses($data)
	{
		$insert = $this->db->insert('tb_akademik', $data);
		$id = $this->db->insert_id();
		$data2 = array('status_akademik' => 'AKTIF');
		$this->akademik_hapus($id);
		if ($insert) {
			$this->akademik_update_proses($data2,$id);
			$this->siswa_kelas($id);
			$this->wali_kelas_add($id);
		}
		return true;
	}
	//hapus akademik berdasarkan id aktif
	public function akademik_hapus($id_akademik)
	{
		return $this->db->delete('tb_siswa_kelas', array('status' => '0'));
	}
	public function siswa_kelas($id_akademik)
	{
		$siswa = $this->get_siswa();

		foreach ($siswa as $a) {
			$data[] = array('siswa_id' => $a->id_siswa,'id_akademik' => $id_akademik,'status' => '0');
		}
		return $this->db->insert_batch('tb_siswa_kelas', $data);
	}
	//akademik update proses
	public function akademik_update_proses($data,$id)
	{
		
		$update = $this->db->update('tb_akademik', $data,array('id_akademik' => $id));
		
		if ($update) {
			$akademik = $this->get_tahun_akademik()->row();
			$this->akademik_hapus($id);
			$this->siswa_kelas($id);
			$this->wali_kelas_add($id);
		}
		return true;
	}
	//akademik hapus proses
	public function akademik_delete_proses($id)
	{
		return $this->db->delete('tb_akademik', array('id_akademik' => $id));
	}
	//end of akademik
	//=================================================

	//get kelas
	public function get_kelas()
	{
		return $this->db->get('tb_kelas')->result();
	}
	//get wali_kelas
	public function get_wali_kelas()
	{
		return $this->db->get('tb_guru')->result();
	}
	//wali kelas add
	public function wali_kelas_add($id)
	{
		$guru = $this->db->get('tb_kelas')->result();
			$this->db->join('tb_akademik', 'tb_akademik.id_akademik = tb_walikelas.id_akademik', 'left');
		$cek = $this->db->get_where('tb_walikelas', array('tb_akademik.id_akademik' => $id,'tb_akademik.status_akademik' => 'AKTIF'));

			if ($cek->num_rows() > 0) {
				$data = array();
				foreach ($cek->result() as $a) {
					$data[] = array('id_walikelas' => $a->id_walikelas,'id_kelas' => $a->id_kelas,'id_akademik' => $a->id_akademik);
				}
				$this->db->update_batch('tb_walikelas', $data, 'id_walikelas');
			}else{
				foreach ($guru as $a) {
					$data[] = array('id_kelas' => $a->id_kelas,'id_akademik' => $id);
				}
				$this->db->insert_batch('tb_walikelas', $data);
			}
		return true;
	}
	//wali kelas update
	
	//wali kelas hapus

	// get akademik
	public function get_akademik()
	{
		return $this->db->get('tb_akademik')->result();
	}

	//get jurusan byid
	public function get_jurusan_byid($id)
	{
		$this->db->join('tb_jurusan', 'tb_jurusan.id_jurusan = tb_kelas.jurusan', 'left');
		return $this->db->get_where('tb_kelas', array('tb_kelas.id_kelas' => $id));
	}

	//get tahun akademik aktif
	public function get_tahun_akademik($status='AKTIF')
	{
		return $this->db->get_where('tb_akademik', array('status_akademik' => $status));
	}
	//tambahkan wali kelas
	public function show_kelas_add()
	{
		$this->db->join('tb_kelas', 'tb_walikelas.id_kelas=tb_kelas.id_kelas','left');
		$this->db->join('tb_akademik', 'tb_walikelas.id_akademik=tb_akademik.id_akademik','left');
		$this->db->join('tb_guru', 'tb_walikelas.id_guru=tb_guru.id_guru','left');
		return $this->db->get_where('tb_walikelas',array('tb_akademik.status_akademik' => 'AKTIF'))->result();
	}
	
	//jadwal pelajaran
	public function get_mapel()
	{
		return $this->db->get('tb_mapel')->result();
		
	}
	//get nama hari
	public function get_hari()
	{
		return $this->db->get('tb_hari')->result();
		
	}
	//get jadwal
	public function get_jadwal_byid($id)
	{
		$this->db->join('tb_kelas', 'tb_jadwal.id_kelas=tb_kelas.id_kelas','left');
		$this->db->join('tb_guru', 'tb_jadwal.id_guru=tb_guru.id_guru','left');
		$this->db->join('tb_mapel', 'tb_jadwal.id_mapel=tb_mapel.id_mapel','left');
		$this->db->join('tb_hari', 'tb_jadwal.id_hari=tb_hari.id_hari','left');
		$this->db->join('tb_akademik', 'tb_jadwal.id_akademik=tb_akademik.id_akademik','left');
		return $this->db->get_where('tb_jadwal',array('tb_akademik.status_akademik' => 'AKTIF','tb_jadwal.id_kelas' => $id));
	}
	//get jadwal
	public function get_jadwal()
	{
		$this->db->join('tb_kelas', 'tb_jadwal.id_kelas=tb_kelas.id_kelas','left');
		$this->db->join('tb_guru', 'tb_jadwal.id_guru=tb_guru.id_guru','left');
		$this->db->join('tb_mapel', 'tb_jadwal.id_mapel=tb_mapel.id_mapel','left');
		$this->db->join('tb_hari', 'tb_jadwal.id_hari=tb_hari.id_hari','left');
		$this->db->join('tb_akademik', 'tb_jadwal.id_akademik=tb_akademik.id_akademik','left');
		return $this->db->get_where('tb_jadwal',array('tb_akademik.status_akademik' => 'AKTIF'));
	}
	//jadwal add proses
	public function jadwal_add_proses($data)
	{
		return $this->db->insert('tb_jadwal', $data);
	}
	//get jadwal update and display to form
	public function get_jadwal_update_byid($id)
	{
		return $this->db->get_where('tb_jadwal',array('id_jadwal' => $id))->row();
	}
	//update jadwal di database
	public function jadwal_update_proses($data,$id)
	{
		return $this->db->update('tb_jadwal',$data,array('id_jadwal' => $id));
	}
	//hapus jadwal pelajaran proses
	public function jadwal_pelajaran_hapus_proses($id)
	{
		return $this->db->delete('tb_jadwal',array('id_jadwal' => $id));
	}
	//get data profil sekolah
	public function profil_sekolah()
	{
		return $this->db->get('tb_profil_sekolah')->row();
	}
	//total siswa
	public function siswa()
	{
		$this->db->join('tb_siswa', 'tb_siswa_kelas.siswa_id=tb_siswa.id_siswa','left');
		$this->db->join('tb_akademik', 'tb_siswa_kelas.id_akademik=tb_akademik.id_akademik','left');
		return $this->db->get_where('tb_siswa_kelas',array('tb_akademik.status_akademik' => 'AKTIF'))->num_rows();
	}
	public function kelas()
	{
		return $this->db->get('tb_kelas')->num_rows();
	}
	public function guru()
	{
		return $this->db->get('tb_guru')->num_rows();
	}

}

/* End of file M_dashboard.php */
/* Location: ./application/models/M_dashboard.php */