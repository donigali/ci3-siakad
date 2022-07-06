<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Walikelas_model extends CI_Model {
                        
    public function get_siswa($id_guru)
    {
        $this->db->join('tb_kelas', 'tb_siswa_kelas.id_kelas=tb_kelas.id_kelas','left');
        $this->db->join('tb_siswa', 'tb_siswa_kelas.siswa_id=tb_siswa.id_siswa','left');
        $this->db->join('tb_akademik', 'tb_siswa_kelas.id_akademik=tb_akademik.id_akademik','left');
        $this->db->join('tb_walikelas', 'tb_walikelas.id_kelas=tb_siswa_kelas.id_kelas','left');
        $this->db->group_by('tb_siswa_kelas.siswa_id');
        $kelas = $this->db->get_where('tb_siswa_kelas',array('tb_akademik.status_akademik' => 'AKTIF','tb_walikelas.id_guru' => $id_guru));
        if ($kelas->num_rows() > 0) {
            return $kelas;
        }else{
            return 0;
        }                   
    }
    //rangkuman nilai siswa
    public function rangkuman_nilai_siswa()
    {
        $this->db->join('tb_mapel', 'tb_jadwal.id_mapel=tb_mapel.id_mapel','left');
        $this->db->join('tb_akademik', 'tb_jadwal.id_akademik=tb_akademik.id_akademik','left');
        $siswa = $this->db->get_where('tb_jadwal',array('tb_akademik.status_akademik' => 'AKTIF'));
        if ($siswa->num_rows() > 0) {
            return $siswa;
        }else{
            return 0;
        } 
    }
    //tb_siswa
    public function get_semester()
    {
        return $this->db->get('tb_semester')->result();
    }
    //raport siswa
    public function raport_siswa($id_semester,$id_siswa,$id_mapel)
    {
        $this->db->join('tb_mapel', 'tb_nilai_raport.id_mapel=tb_mapel.id_mapel','left');
        $this->db->join('tb_akademik', 'tb_nilai_raport.id_akademik=tb_akademik.id_akademik','left');
        return $this->db->get_where('tb_nilai_raport',array('tb_akademik.status_akademik' => 'AKTIF','tb_nilai_raport.id_semester'=>$id_semester,'tb_nilai_raport.id_siswa' => $id_siswa,'tb_mapel.id_mapel' => $id_mapel));
        
    }
    //get siswa by id
    public function get_siswa_by_id($id_siswa)
    {
        $this->db->join('tb_siswa', 'tb_siswa_kelas.siswa_id=tb_siswa.id_siswa','left');
        $this->db->join('tb_akademik', 'tb_siswa_kelas.id_akademik=tb_akademik.id_akademik','left');
        return $this->db->get_where('tb_siswa_kelas',array('tb_siswa_kelas.siswa_id' => $id_siswa))->row();
    }
    //get semester by id
    public function get_semester_by_id($id_semester)
    {
        return $this->db->get_where('tb_semester',array('id_semester' => $id_semester))->row();
    }                     
                        
}
                        
/* End of file Walikelas_model.php */
    
                        