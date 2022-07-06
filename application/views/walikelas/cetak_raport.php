<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Lihat Nilai Siswa</li>
      </ol>
    </section>
	<br>
    <!-- Main content -->
    
    <section class="content">
    	<?php if ($this->session->flashdata('pesan')): ?>
	    	<div class="alert alert-success"><?php echo $this->session->flashdata('pesan') ?></div>
	    <?php endif ?>
    	<div class="box box-success box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Cetak Nilai Raport</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <?php echo form_open(site_url('walikelas/cetak')); ?>
            <div class="row">
                <div class="col-md-6">
                    <label for="akademik">Pilih Semester</label>
                    <select name="id_semester" class="form-control" id="">
                        <option value="">Pilih Semester</option>
                        <?php foreach ($semester as $a) { ?>
                            <option value="<?php echo $a->id_semester ?>" <?php echo  set_select('id_semester', $a->id_semester); ?>><?php echo $a->kode_semester ?></option>
                        <?php } ?>
                    </select>
                    <br>
                    <button class="btn btn-primary" type="submit" value="tampil" name="tampil">Tampilkan</button>
                    <button class="btn btn-danger" type="submit" target="_blank" name="cetak">Cetak PDF</button>
                </div>
                <div class="col-md-6">
                    <label for="akademik">Pilih siswa</label>
                    <select name="id_siswa" class="form-control" id="">
                        <option value="">Pilih siswa</option>
                        <?php foreach ($siswa->result() as $a) { ?>
                            <option value="<?php echo $a->id_siswa ?>" <?php echo  set_select('id_siswa', $a->id_siswa); ?>><?php echo $a->nama_lengkap_siswa; ?></option>
                        <?php } ?>
                    </select>
                </div>
                
            </div>
            <?php echo form_close(); ?>
            <hr>
            <?php
            $CI =& get_instance();
            $CI->load->model('Walikelas_model','wali');

            $siswa = $CI->wali->get_siswa_by_id($id_siswa); 
            $semester = $CI->wali->get_semester_by_id($id_semester); 
            if(!empty($id_siswa) && !empty($id_semester)){
            ?>
            <table style="width: 100%;">
                <tbody>
                    <tr>
                        <td style="font-size:10px;width: 10%;">Nama Peserta Didik</td>
                        <td style="font-size:10px;width: 2%;" class="text-center">:</td>
                        <td style="font-size:10px;width: 22%;"><?php if(isset($siswa->nama_lengkap_siswa)) echo $siswa->nama_lengkap_siswa ?></td>
                        <td style="font-size:10px;width: 7%;">Kelas/Semester</td>
                        <td style="font-size:10px;width: 2%;" class="text-center">:</td>
                        <td style="font-size:10px;width: 16%;"><?php if(isset($semester->kode_semester)) echo $semester->kode_semester ?></td>
                        </tr>
                        <tr>
                        <td style="font-size:10px;width: 10%;">Nomor Induk/NISN</td>
                        <td style="font-size:10px;width: 2%;" class="text-center">:</td>
                        <td style="font-size:10px;width: 22%;"><?php if(isset($siswa->nis)) echo $siswa->nis ?>/<?php if(isset($siswa->nisn)) echo $siswa->nisn ?></td>
                        <td style="font-size:10px;width: 7%;">Tahun Pelajaran</td>
                        <td style="font-size:10px;width: 2%;" class="text-center">:</td>
                        <td style="font-size:10px;width: 16%;"><?php if(isset($siswa->tahun_akademik)) echo $siswa->tahun_akademik ?></td>
                        </tr>
                        <tr>
                        <td style="font-size:10px;width: 10%;">Nama Sekolah</td>
                        <td style="font-size:10px;width: 2%;" class="text-center">:</td>
                        <td style="font-size:10px;width: 22%;">&nbsp;</td>
                        <td style="font-size:10px;width: 7%;">&nbsp;</td>
                        <td style="font-size:10px;width: 2%;">&nbsp;</td>
                        <td style="font-size:10px;width: 16%;">&nbsp;</td>
                    </tr>
                </tbody>
            </table>
            <br>
            <table class="text-center" style="width: 100%; height: 100px;" border="1">
                <thead>
                    
                    <tr>
                        <th style="width: 3%;" rowspan="3">No.</th>
                        <th style="width: 15%;" rowspan="3">Komponen</th>
                        <th style="width: 7%;" rowspan="3">Kriteria <br> Ketuntasan <br> Minimal <br>(KKM)</th>
                        <th style="width: 477px;" colspan="5">Nilai Hasil Belajar</th>
                    </tr>
                    <tr>
                        <th style="width: 24px;" colspan="2">Pengetahuan</th>
                        <th style="width: 129px;" colspan="2">Praktik</th>
                        <th style="width: 66px;">Sikap/Afektif</th>
                    </tr>
                    <tr>
                        <th style="width: 24px;">Angka</th>
                        <th style="width: 129px;">Huruf</th>
                        <th style="width: 24px;">Angka</th>
                        <th style="width: 129px;">Huruf</th>
                        <th style="width: 24px;">Predikat</th>
                    </tr>
                    <tr>
                        <th style="width: 24px;">A.</th>
                        <th style="width: 129px;">Mata Pelajaran</th>
                        <th style="width: 66px;">&nbsp;</th>
                        <th style="width: 26.0667px;">&nbsp;</th>
                        <th style="width: 141.933px;">&nbsp;</th>
                        <th style="width: 31px;">&nbsp;</th>
                        <th style="width: 114px;">&nbsp;</th>
                        <th style="width: 164px;">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                
                $no=1; foreach($nilai->result() as $a): ?>
                <?php $data= $CI->wali->raport_siswa($id_semester,$id_siswa,$a->id_mapel)->row(); ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td class="text-left"><?php echo $a->nama_mapel; ?></td>
                        <td ><?php if(isset($data->kkm)) echo $data->kkm; ?></td>
                        <td ><?php if(isset($data->nilai_akhir)) echo $data->nilai_akhir; ?></td>
                        <td ><?php if(isset($data->nilai_akhir)) echo ucwords(number_to_words($data->nilai_akhir)); ?></td>
                        <td ><?php if(isset($data->nilai_uas)) echo $data->nilai_uas; ?></td>
                        <td ><?php if(isset($data->nilai_akhir)) echo $data->nilai_akhir; ?></td>
                        <td ><?php if(isset($data->predikat)) echo $data->predikat; ?></td>
                    </tr>
                <?php endforeach ?>
                </tbody>
            </table>
            <?php } ?>
                <!-- DivTable.com -->
                <p>&nbsp;</p>
            </div>
            <!-- /.box-body -->
         </div>
		
    </section>
</div>
