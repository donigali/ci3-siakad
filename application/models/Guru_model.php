<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Guru_model extends CI_Model {
                        
    public function get_jadwal($id_guru)
    {
        $this->db->join('tb_kelas', 'tb_jadwal.id_kelas=tb_kelas.id_kelas','left');
        $this->db->join('tb_guru', 'tb_jadwal.id_guru=tb_guru.id_guru','left');
        $this->db->join('tb_mapel', 'tb_jadwal.id_mapel=tb_mapel.id_mapel','left');
        $this->db->join('tb_hari', 'tb_jadwal.id_hari=tb_hari.id_hari','left');
        $this->db->join('tb_akademik', 'tb_jadwal.id_akademik=tb_akademik.id_akademik','left');
        return $this->db->get_where('tb_jadwal',array('tb_jadwal.id_guru' => $id_guru));
    } 
    //get siswa
    public function get_siswa($id_kelas)
    {
        $this->db->join('tb_kelas', 'tb_siswa_kelas.id_kelas=tb_kelas.id_kelas','left');
        $this->db->join('tb_siswa', 'tb_siswa_kelas.siswa_id=tb_siswa.id_siswa','left');
        $this->db->join('tb_akademik', 'tb_siswa_kelas.id_akademik=tb_akademik.id_akademik','left');
        // $this->db->join('tb_jadwal', 'tb_kelas.id_kelas=tb_jadwal.id_kelas','left');
        $kelas = $this->db->get_where('tb_siswa_kelas',array('tb_akademik.status_akademik' => 'AKTIF','tb_kelas.id_kelas' => $id_kelas));
        if ($kelas->num_rows() > 0) {
            return $kelas->result();
        }else{
            return 0;
        }
    }  
    //get semester
    public function get_semester()
    {
        return $this->db->get('tb_semester');
    }    
    //tb_mapel
    public function get_mapel()
    {
        return $this->db->get('tb_mapel');
    }
    //get akademik
    public function get_akademik_active()
    {
        return $this->db->get_where('tb_akademik',array('status_akademik' => 'AKTIF'))->row();
    }            
    //validasi input nilai raport
    public function get_nilai_raport($id_mapel)
    {
        $this->db->join('tb_siswa', 'tb_nilai_raport.id_siswa=tb_siswa.id_siswa','left');
        $this->db->join('tb_akademik', 'tb_nilai_raport.id_akademik=tb_akademik.id_akademik','left');
        return $this->db->get_where('tb_nilai_raport',array('tb_akademik.status_akademik' => 'AKTIF','tb_nilai_raport.id_semester' => 1,'tb_nilai_raport.id_mapel' => $id_mapel));
    }
    //get nilai raport by id
    public function get_nilai_raport_byid($id_kelas,$id_semester)
    {
        $this->db->join('tb_siswa', 'tb_nilai_raport.id_siswa=tb_siswa.id_siswa','left');
        $this->db->join('tb_mapel', 'tb_nilai_raport.id_mapel=tb_mapel.id_mapel','left');
        $this->db->join('tb_kelas', 'tb_nilai_raport.id_kelas=tb_kelas.id_kelas','left');
        $this->db->join('tb_akademik', 'tb_nilai_raport.id_akademik=tb_akademik.id_akademik','left');
        $kelas = $this->db->get_where('tb_nilai_raport',array('tb_akademik.status_akademik' => 'AKTIF','tb_nilai_raport.id_semester' => $id_semester,'tb_nilai_raport.id_kelas' => $id_kelas));
        if ($kelas->num_rows() > 0) {
           return $kelas;
        }else{
            return 0;
        }
    }
    //input nilai proses
    public function nilai_input_proses($insertData)
    {
       return $this->db->insert_batch('tb_nilai_raport', $insertData);
       
    }                    
    //update nilai proses
    public function nilai_update_proses($updateData,$colomn)
    {
       return$this->db->update_batch('tb_nilai_raport', $updateData,$colomn);
       
    }
    //get guru by id for change password
    public function get_guru_byid($id_guru)
    {
        return $this->db->get_where('tb_guru',array('id_guru' => $id_guru))->row();
    }  
    //update password proses
    public function update_password($data,$id_guru)
    {
        return $this->db->update('tb_guru', $data,array('id_guru' => $id_guru));
        
    }               
}
                        
/* End of file Guru_model.php */
    
                        