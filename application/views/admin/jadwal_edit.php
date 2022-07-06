<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Jadwal Pelajaran</li>
      </ol>
    </section>
	<br>
    <!-- Main content -->
    <section class="content">
    	<div class="box box-success box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Update Jadwal Pelajaran</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            	<?php echo form_open(site_url('dashboard/jadwal_update_proses/'.$this->uri->segment(3)
                ),array('class' => 'form-horizontal')); ?>
	              <div class="box-body text-left">
	              	<div class="form-group">
	                  <label for="inputEmail3" class="col-sm-3 control-label  text-left">Tahun Ajaran</label>

	                  <div class="col-sm-9">
	                  	<input type="hidden" class="form-control" name="id_akademik" value="<?php if(isset($status->id_akademik)) echo $status->id_akademik; ?>" id="inputEmail3" placeholder="NIS">
	                    <input type="text" class="form-control" value="<?php if(isset($status->tahun_akademik)) echo $status->tahun_akademik; ?>" id="inputEmail3" placeholder="tahun_akademik" readonly>
	                  </div>
	                </div>
	                <div class="form-group">
	                  <label for="inputEmail3" class="col-sm-3 control-label  text-left">Ruangan Kelas</label>

	                  <div class="col-sm-9">
                        <select name="id_kelas" id="" class="form-control">
	                    	<option value="">PILIH RUANGAN KELAS</option>
	                    	<?php foreach ($kelas as $tampil): ?>
	                    		<option value="<?php echo $tampil->id_kelas ?>" <?php if($tampil->id_kelas == $jadwal->id_kelas) echo 'selected'; ?>><?php echo $tampil->nama_kelas ?></option>
	                    	<?php endforeach ?>
	                    </select>
	                  </div>
	                </div>
	                <div class="form-group">
	                  <label for="inputEmail3" class="col-sm-3 control-label  text-left">Nama Mata Pelajaran</label>

	                  <div class="col-sm-9">
                        <select name="id_mapel" id="" class="form-control">
	                    	<option value="">PILIH MATA PELAJARAN</option>
	                    	<?php foreach ($mapel as $tampil): ?>
	                    		<option value="<?php echo $tampil->id_mapel ?>" <?php if($jadwal->id_mapel == $tampil->id_mapel) echo 'selected'; ?>><?php echo $tampil->nama_mapel ?></option>
	                    	<?php endforeach ?>
	                    </select>
	                  </div>
	                </div>
	                <div class="form-group">
	                  <label for="inputEmail3" class="col-sm-3 control-label  text-left">Pilih Guru B.study</label>

	                  <div class="col-sm-9">
                        <select name="id_guru" id="" class="form-control">
	                    	<option value="">PILIH GURU PENGAJAR</option>
	                    	<?php foreach ($guru as $tampil): ?>
	                    		<option value="<?php echo $tampil->id_guru ?>" <?php if($jadwal->id_guru == $tampil->id_guru) echo 'selected'; ?>><?php echo $tampil->nama_guru ?></option>
	                    	<?php endforeach ?>
	                    </select>
	                  </div>
	                </div>

	                <div class="form-group">
	                  <label for="inputEmail3" class="col-sm-3 control-label  text-left">Pilih Hari</label>

	                  <div class="col-sm-9">
                        <select name="id_hari" id="" class="form-control">
	                    	<option value="">PILIH HARI</option>
	                    	<?php foreach ($hari as $tampil): ?>
	                    		<option value="<?php echo $tampil->id_hari ?>" <?php if($jadwal->id_hari == $tampil->id_hari) echo 'selected'; ?>><?php echo $tampil->nama_hari ?></option>
	                    	<?php endforeach ?>
	                    </select>
	                  </div>
	                </div>
	                <div class="form-group">
	                  <label for="inputPassword3" class="col-sm-3 control-label  text-left">Jam Ke</label>

	                  <div class="col-sm-9">
	                    <input type="text" class="form-control" value="<?php if(isset($jadwal->jam_mulai)) echo $jadwal->jam_mulai; ?>" name="jam_mulai" id="inputPassword3" placeholder="ex:Jam Ke 1">
	                  </div>
	                </div>
	             
	              <!-- /.box-body -->
	              <div class="box-footer pull-right">
                    <button type="button" onclick="history.back(-1);" class="btn btn-danger ">batal</button>
	                <button type="submit" class="btn btn-info ">Simpan</button>
	              </div>
	              <!-- /.box-footer -->
              	<?php echo form_close(); ?>
            </div>
            <!-- /.box-body -->
         </div>
		
    </section>
